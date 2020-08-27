<?php
/**
 * Copyright (C) 2013-2020 Combodo SARL
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 */

namespace Combodo\iTop\Application\UI\Layout\ActivityPanel\ActivityEntry\CMDBChangeOp;


use AttributeDateTime;
use Combodo\iTop\Application\UI\Layout\ActivityPanel\ActivityEntry\EditsEntry;
use DateTime;
use iCMDBChangeOp;

/**
 * Class CMDBChangeOpSetAttributeFactory
 *
 * Default factory for CMDBChangeOpSetAttribute change ops
 *
 * @author Guillaume Lajarige <guillaume.lajarige@combodo.com>
 * @package Combodo\iTop\Application\UI\Layout\ActivityPanel\ActivityEntry\CMDBChangeOp
 */
class CMDBChangeOpSetAttributeFactory extends CMDBChangeOpFactory
{
	/**
	 * Make an EditsEntry from the iCMDBChangeOpSetAttribute $oChangeOp
	 *
	 * @param \iCMDBChangeOp $oChangeOp
	 *
	 * @return \Combodo\iTop\Application\UI\Layout\ActivityPanel\ActivityEntry\EditsEntry
	 * @throws \OQLException
	 * @throws \Exception
	 */
	public static function MakeFromCmdbChangeOp(iCMDBChangeOp $oChangeOp)
	{
		$sHostObjectClass = $oChangeOp->Get('objclass');
		$sAttCode = $oChangeOp->Get('attcode');
		$oDateTime = DateTime::createFromFormat(AttributeDateTime::GetInternalFormat(), $oChangeOp->Get('date'));

		// Retrieve author login
		$sAuthorLogin = static::GetUserLoginFromChangeOp($oChangeOp);

		$oEntry = new EditsEntry($oDateTime, $sAuthorLogin, $sHostObjectClass);
		$oEntry->AddAttribute($sAttCode, $oChangeOp->GetDescription());

		return $oEntry;
	}
}