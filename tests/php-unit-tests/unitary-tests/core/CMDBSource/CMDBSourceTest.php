<?php


namespace Combodo\iTop\Test\UnitTest\Core;

use CMDBSource;
use Combodo\iTop\Core\DbConnectionWrapper;
use Combodo\iTop\Test\UnitTest\ItopTestCase;
use Exception;
use IssueLog;
use LogChannels;
use utils;

/**
 * @since 2.7.0
 *
 * @package Combodo\iTop\Test\UnitTest\Core
 */

class CMDBSourceTest extends ItopTestCase
{
	protected function setUp(): void
	{

		parent::setUp();
		$this->RequireOnceItopFile('/core/cmdbsource.class.inc.php');
	}

	/**
	 * @covers       CMDBSource::IsSameFieldTypes
	 * @dataProvider compareFieldTypesProvider
	 *
	 * @param boolean $bResult
	 * @param string $sItopFieldType
	 * @param string $sDbFieldType
	 */
	public function testCompareFieldTypes($bResult, $sItopFieldType, $sDbFieldType)
	{
		$this->assertEquals($bResult, CMDBSource::IsSameFieldTypes($sItopFieldType, $sDbFieldType), "$sItopFieldType\n VS\n $sDbFieldType");
	}

	public function compareFieldTypesProvider()
	{
		return array(
			'same datetime types' => array(true, 'DATETIME', 'DATETIME'),
			'different types' => array(false, 'VARCHAR(255)', 'INT(11)'),
			'different types, same type options' => array(false, 'VARCHAR(11)', 'INT(11)'),
			'same int declaration, same case' => array(true, 'INT(11)', 'INT(11)'),
			'same int declaration, different case on data type' => array(true, 'INT(11)', 'int(11)'),
			'same enum declaration, same case' => array(
				true,
				"ENUM('error','idle','planned','running')",
				"ENUM('error','idle','planned','running')",
			),
			'same enum declaration, different case on data type' => array(
				true,
				"ENUM('error','idle','planned','running')",
				"enum('error','idle','planned','running')",
			),
			'same enum declaration, different case on type options' => array(
				false,
				"ENUM('ERROR','IDLE','planned','running')",
				"ENUM('error','idle','planned','running')",
			),
			'same enum declaration, different case on both data type and type options' => array(
				false,
				"ENUM('ERROR','IDLE','planned','running')",
				"enum('error','idle','planned','running')",
			),
			'MariaDB 10.2 nullable datetime' => array(
				true,
				'DATETIME',
				"datetime DEFAULT 'NULL'",
			),
			'MariaDB 10.2 nullable text' => array(
				true,
				'TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci',
				"text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'NULL'",
			),
			'MariaDB 10.2 nullable unsigned int' => array(
				true,
				'INT(11) UNSIGNED',
				"int(11) unsigned DEFAULT 'NULL'",
			),
			'MariaDB 10.2 varchar with default value' => array(
				true,
				'VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 0',
				"varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0'",
			),
			'varchar with default value not at the end' => array(
				true,
				"VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 0 COMMENT 'my comment'",
				"varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'my comment'",
			),
			'MariaDB 10.2 Enum with string default value' => array(
				true,
				"ENUM('error','idle','planned','running') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'planned'",
				"enum('error','idle','planned','running') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'planned'",
			),
			'MariaDB 10.2 Enum with numeric default value' => array(
				true,
				"ENUM('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1'",
				"enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1'",
			),
			'ENUM with values containing parenthesis' => array(
				true, // see N°3065 : if having distinct values having parenthesis in enum values will cause comparison to be inexact
				"ENUM('CSP A','CSP M','NA','OEM(ROC)','OPEN(VL)','RETAIL (Boite)') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci",
				"enum('CSP A','CSP M','NA','OEM(ROC)','OPEN(VL)','RETAIL (Boite)') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci",
			),
			// N°3065 before the fix this returned true :(
			'ENUM with different values, containing parenthesis' => array(
				false,
				"ENUM('value 1 (with parenthesis)','value 2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci",
				"enum('value 1 (with parenthesis)','value 3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci",
			),
		);
	}

	/**
	 * @throws \ConfigException
	 * @throws \CoreException
	 * @throws \MySQLException
	 * @since 3.0.0 N°4215
	 *
	 * @runInSeparateProcess Resetting DB connection, thus making other tests to fail!
	 */
	public function testIsOpenedDbConnectionUsingTls()
	{
		$oConfig = utils::GetConfig();
		CMDBSource::InitFromConfig($oConfig);
		$oMysqli = CMDBSource::GetMysqli();

		// resets \CMDBSource::$oMySQLiForQuery to simulate call to \CMDBSource::Init with a TLS connexion
		DbConnectionWrapper::SetDbConnection(null);

		// before N°4215 fix, this was crashing : "Call to a member function query() on null"
		$bIsTlsCnx = $this->InvokeNonPublicStaticMethod(CMDBSource::class, 'IsOpenedDbConnectionUsingTls', [$oMysqli]);
		$this->assertFalse($bIsTlsCnx);
	}

	/**
	 * @since 2.7.10 3.0.4 3.1.1 3.2.0 N°6643 Checks writing in IssueLog is really done
	 */
	public function testLogDeadLock(): void
	{
		$sExceptionMessage = 'Test exception for deadlock';
		$oDeadlockException = new Exception($sExceptionMessage);

		// \CMDBSource::LogDeadLock uses mysqli::errno and mysqli::query()
		// I didn't achieve mocking the errno property by either of the following means :
		// - PHPUnit mock => property is read only error
		// - DbConnectionWrapper::SetDbConnectionMockForQuery with a custom mysqli children
		//    - override of errno property with an assignment (public $errno = ...;) => property is read only error
		//    - override of __get() for the errno property => no error but no change
		// Solution for errno was to add a new parameter to disable errno read :/
		/** @noinspection PhpDeprecationInspection */
		$oMockMysqli = $this->getMockBuilder('mysqli')
			->setMethods(['query'])
			->getMock();
		$oMockMysqli->expects($this->any())
			->method('query')
			->willReturnCallback(function () {
				return false;
			});
		DbConnectionWrapper::SetDbConnectionMockForQuery($oMockMysqli);

		$sTestErrorLogPath = APPROOT . 'log/error.phpunit.log';
		IssueLog::Enable($sTestErrorLogPath);
		try {
			$this->InvokeNonPublicStaticMethod(CMDBSource::class, 'LogDeadLock', [$oDeadlockException, true, false]);
			$sLastErrorLogLine = $this->GetErrorLogLastLines($sTestErrorLogPath, 10); // we are getting multiple lines as the context log introduced multiple lines per log
			$this->assertStringContainsString(LogChannels::DEADLOCK, $sLastErrorLogLine);
			$this->assertStringContainsString($sExceptionMessage, $sLastErrorLogLine);
		} finally {
			if (file_exists($sTestErrorLogPath)) {
				unlink($sTestErrorLogPath);
			}
		}
	}

	private function GetErrorLogLastLines(string $sErrorLogPath, int $iLineNumbers = 1): string
	{
		return trim(implode("", array_slice(file($sErrorLogPath), -$iLineNumbers)));
	}
}
