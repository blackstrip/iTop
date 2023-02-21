<?php
// Copyright (C) 2010-2021 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>
/*
* @author ITOMIG GmbH <martin.raenker@itomig.de>

* @copyright     Copyright (C) 2021 Combodo SARL
* @licence	http://opensource.org/licenses/AGPL-3.0
*		
*/
Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Menu:IncidentManagement' => 'Incident Management',
	'Menu:IncidentManagement+' => '',
	'Menu:Incident:Overview' => 'Übersicht',
	'Menu:Incident:Overview+' => '',
	'Menu:NewIncident' => 'Neuer Incident',
	'Menu:NewIncident+' => '',
	'Menu:SearchIncidents' => 'Nach Incidents suchen',
	'Menu:SearchIncidents+' => '',
	'Menu:Incident:Shortcuts' => 'Shortcuts',
	'Menu:Incident:Shortcuts+' => '',
	'Menu:Incident:MyIncidents' => 'Mir zugewiesene Incidents',
	'Menu:Incident:MyIncidents+' => '',
	'Menu:Incident:EscalatedIncidents' => 'Eskalierte Incidents',
	'Menu:Incident:EscalatedIncidents+' => '',
	'Menu:Incident:OpenIncidents' => 'Alle offenen Incidents',
	'Menu:Incident:OpenIncidents+' => '',
	'UI-IncidentManagementOverview-IncidentByPriority-last-14-days' => 'Incidents der letzten 14 Tage nach Priorität',
	'UI-IncidentManagementOverview-Last-14-days' => 'Anzahl Incidents der letzten 14 Tage',
	'UI-IncidentManagementOverview-OpenIncidentByStatus' => 'Offene Incidents nach Status',
	'UI-IncidentManagementOverview-OpenIncidentByAgent' => 'Offene Incidents nach Bearbeiter',
	'UI-IncidentManagementOverview-OpenIncidentByCustomer' => 'Offene Incidents nach Kunde',
));


// Dictionnay conventions
// Class:<class_name>
// Class:<class_name>+
// Class:<class_name>/Attribute:<attribute_code>
// Class:<class_name>/Attribute:<attribute_code>+
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>+
// Class:<class_name>/Stimulus:<stimulus_code>
// Class:<class_name>/Stimulus:<stimulus_code>+

//
// Class: Incident
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:Incident' => 'Incident',
	'Class:Incident+' => '',
	'Class:Incident/Attribute:status' => 'Status',
	'Class:Incident/Attribute:status+' => '',
	'Class:Incident/Attribute:status/Value:new' => 'Neu',
	'Class:Incident/Attribute:status/Value:new+' => '',
	'Class:Incident/Attribute:status/Value:escalated_tto' => 'Eskaliert TTO',
	'Class:Incident/Attribute:status/Value:escalated_tto+' => '',
	'Class:Incident/Attribute:status/Value:assigned' => 'Zugewiesen',
	'Class:Incident/Attribute:status/Value:assigned+' => '',
	'Class:Incident/Attribute:status/Value:escalated_ttr' => 'Eskaliert TTR',
	'Class:Incident/Attribute:status/Value:escalated_ttr+' => '',
	'Class:Incident/Attribute:status/Value:waiting_for_approval' => 'Wartend auf Genehmigung',
	'Class:Incident/Attribute:status/Value:waiting_for_approval+' => '',
	'Class:Incident/Attribute:status/Value:pending' => 'Auszeit',
	'Class:Incident/Attribute:status/Value:pending+' => '',
	'Class:Incident/Attribute:status/Value:resolved' => 'Gelöst',
	'Class:Incident/Attribute:status/Value:resolved+' => '',
	'Class:Incident/Attribute:status/Value:closed' => 'Geschlossen',
	'Class:Incident/Attribute:status/Value:closed+' => '',
	'Class:Incident/Attribute:impact' => 'Auswirkung',
	'Class:Incident/Attribute:impact+' => '',
	'Class:Incident/Attribute:impact/Value:1' => 'Eine Abteilung',
	'Class:Incident/Attribute:impact/Value:1+' => '',
	'Class:Incident/Attribute:impact/Value:2' => 'Ein Service',
	'Class:Incident/Attribute:impact/Value:2+' => '',
	'Class:Incident/Attribute:impact/Value:3' => 'Eine Person',
	'Class:Incident/Attribute:impact/Value:3+' => '',
	'Class:Incident/Attribute:priority' => 'Priorität',
	'Class:Incident/Attribute:priority+' => '',
	'Class:Incident/Attribute:priority/Value:1' => 'Kritisch',
	'Class:Incident/Attribute:priority/Value:1+' => '',
	'Class:Incident/Attribute:priority/Value:2' => 'Hoch',
	'Class:Incident/Attribute:priority/Value:2+' => '',
	'Class:Incident/Attribute:priority/Value:3' => 'Mittel',
	'Class:Incident/Attribute:priority/Value:3+' => '',
	'Class:Incident/Attribute:priority/Value:4' => 'Niedrig',
	'Class:Incident/Attribute:priority/Value:4+' => '',
	'Class:Incident/Attribute:urgency' => 'Dringlichkeit',
	'Class:Incident/Attribute:urgency+' => '',
	'Class:Incident/Attribute:urgency/Value:1' => 'Kritisch',
	'Class:Incident/Attribute:urgency/Value:1+' => '',
	'Class:Incident/Attribute:urgency/Value:2' => 'Hoch',
	'Class:Incident/Attribute:urgency/Value:2+' => '',
	'Class:Incident/Attribute:urgency/Value:3' => 'Mittel',
	'Class:Incident/Attribute:urgency/Value:3+' => '',
	'Class:Incident/Attribute:urgency/Value:4' => 'Niedrig',
	'Class:Incident/Attribute:urgency/Value:4+' => '',
	'Class:Incident/Attribute:origin' => 'Herkunft',
	'Class:Incident/Attribute:origin+' => '',
	'Class:Incident/Attribute:origin/Value:mail' => 'Mail',
	'Class:Incident/Attribute:origin/Value:mail+' => '',
	'Class:Incident/Attribute:origin/Value:monitoring' => 'Monitoring',
	'Class:Incident/Attribute:origin/Value:monitoring+' => '',
	'Class:Incident/Attribute:origin/Value:phone' => 'Telefon',
	'Class:Incident/Attribute:origin/Value:phone+' => '',
	'Class:Incident/Attribute:origin/Value:portal' => 'Portal',
	'Class:Incident/Attribute:origin/Value:portal+' => '',
	'Class:Incident/Attribute:service_id' => 'Service',
	'Class:Incident/Attribute:service_id+' => '',
	'Class:Incident/Attribute:service_name' => 'Service-Name',
	'Class:Incident/Attribute:service_name+' => '',
	'Class:Incident/Attribute:servicesubcategory_id' => 'Service-Unterkategorie',
	'Class:Incident/Attribute:servicesubcategory_id+' => '',
	'Class:Incident/Attribute:servicesubcategory_name' => 'Service-Unterkategorie-Name',
	'Class:Incident/Attribute:servicesubcategory_name+' => '',
	'Class:Incident/Attribute:escalation_flag' => 'Eskalations-Flag',
	'Class:Incident/Attribute:escalation_flag+' => '',
	'Class:Incident/Attribute:escalation_flag/Value:no' => 'Nein',
	'Class:Incident/Attribute:escalation_flag/Value:no+' => '',
	'Class:Incident/Attribute:escalation_flag/Value:yes' => 'Ja',
	'Class:Incident/Attribute:escalation_flag/Value:yes+' => '',
	'Class:Incident/Attribute:escalation_reason' => 'Eskalationsgrund',
	'Class:Incident/Attribute:escalation_reason+' => '',
	'Class:Incident/Attribute:assignment_date' => 'Zuweisungsdatum',
	'Class:Incident/Attribute:assignment_date+' => '',
	'Class:Incident/Attribute:resolution_date' => 'Lösungsdatum',
	'Class:Incident/Attribute:resolution_date+' => '',
	'Class:Incident/Attribute:last_pending_date' => 'Letztes Auszeit-Datum',
	'Class:Incident/Attribute:last_pending_date+' => '',
	'Class:Incident/Attribute:cumulatedpending' => 'Kumulierte Auszeit',
	'Class:Incident/Attribute:cumulatedpending+' => '',
	'Class:Incident/Attribute:tto' => 'TTO (Time To Own)',
	'Class:Incident/Attribute:tto+' => '',
	'Class:Incident/Attribute:ttr' => 'TTR (Time To Resolve)',
	'Class:Incident/Attribute:ttr+' => '',
	'Class:Incident/Attribute:tto_escalation_deadline' => 'TTO-Deadline',
	'Class:Incident/Attribute:tto_escalation_deadline+' => '',
	'Class:Incident/Attribute:sla_tto_passed' => 'SLA TTO verletzt',
	'Class:Incident/Attribute:sla_tto_passed+' => '',
	'Class:Incident/Attribute:sla_tto_over' => 'Überschreitung SLA TTO',
	'Class:Incident/Attribute:sla_tto_over+' => '',
	'Class:Incident/Attribute:ttr_escalation_deadline' => 'TTR-Deadline',
	'Class:Incident/Attribute:ttr_escalation_deadline+' => '',
	'Class:Incident/Attribute:sla_ttr_passed' => 'SLA TTR überschritten',
	'Class:Incident/Attribute:sla_ttr_passed+' => '',
	'Class:Incident/Attribute:sla_ttr_over' => 'Überschreitung SLA TTR',
	'Class:Incident/Attribute:sla_ttr_over+' => '',
	'Class:Incident/Attribute:time_spent' => 'Lösungsdauer',
	'Class:Incident/Attribute:time_spent+' => '',
	'Class:Incident/Attribute:resolution_code' => 'Lösungs-Code',
	'Class:Incident/Attribute:resolution_code+' => '',
	'Class:Incident/Attribute:resolution_code/Value:assistance' => 'Unterstützung',
	'Class:Incident/Attribute:resolution_code/Value:assistance+' => '',
	'Class:Incident/Attribute:resolution_code/Value:bug fixed' => 'Bugfix',
	'Class:Incident/Attribute:resolution_code/Value:bug fixed+' => '',
	'Class:Incident/Attribute:resolution_code/Value:hardware repair' => 'Hardware-Reparatur',
	'Class:Incident/Attribute:resolution_code/Value:hardware repair+' => '',
	'Class:Incident/Attribute:resolution_code/Value:other' => 'Andere',
	'Class:Incident/Attribute:resolution_code/Value:other+' => '',
	'Class:Incident/Attribute:resolution_code/Value:software patch' => 'Software-Patch',
	'Class:Incident/Attribute:resolution_code/Value:software patch+' => '',
	'Class:Incident/Attribute:resolution_code/Value:system update' => 'System-Update',
	'Class:Incident/Attribute:resolution_code/Value:system update+' => '',
	'Class:Incident/Attribute:resolution_code/Value:training' => 'Schulung',
	'Class:Incident/Attribute:resolution_code/Value:training+' => '',
	'Class:Incident/Attribute:solution' => 'Lösung',
	'Class:Incident/Attribute:solution+' => '',
	'Class:Incident/Attribute:pending_reason' => 'Grund für Auszeit',
	'Class:Incident/Attribute:pending_reason+' => '',
	'Class:Incident/Attribute:parent_incident_id' => 'Parent-Incident',
	'Class:Incident/Attribute:parent_incident_id+' => '',
	'Class:Incident/Attribute:parent_incident_ref' => 'Parent-Incident-Referenz',
	'Class:Incident/Attribute:parent_incident_ref+' => '',
	'Class:Incident/Attribute:parent_change_id' => 'Parent-Change',
	'Class:Incident/Attribute:parent_change_id+' => '',
	'Class:Incident/Attribute:parent_change_ref' => 'Parent-Change-Referenz',
	'Class:Incident/Attribute:parent_change_ref+' => '',
	'Class:Incident/Attribute:parent_problem_id' => 'Parent-Problem',
	'Class:Incident/Attribute:parent_problem_id+' => '',
	'Class:Incident/Attribute:parent_problem_ref' => 'Parent-Problem-Referenz',
	'Class:Incident/Attribute:parent_problem_ref+' => '',
	'Class:Incident/Attribute:related_request_list' => 'Kind-Requests',
	'Class:Incident/Attribute:related_request_list+' => '',
	'Class:Incident/Attribute:child_incidents_list' => 'Abgeleitete Incidents',
	'Class:Incident/Attribute:child_incidents_list+' => 'All the child incidents related to this incident~~',
	'Class:Incident/Attribute:public_log' => 'Öffentliches Log',
	'Class:Incident/Attribute:public_log+' => '',
	'Class:Incident/Attribute:user_satisfaction' => 'Benutzerzufriedenheit',
	'Class:Incident/Attribute:user_satisfaction+' => '',
	'Class:Incident/Attribute:user_satisfaction/Value:1' => 'Sehr zufrieden',
	'Class:Incident/Attribute:user_satisfaction/Value:1+' => '',
	'Class:Incident/Attribute:user_satisfaction/Value:2' => 'Ziemlich zufrieden',
	'Class:Incident/Attribute:user_satisfaction/Value:2+' => '',
	'Class:Incident/Attribute:user_satisfaction/Value:3' => 'Eher unzufrieden',
	'Class:Incident/Attribute:user_satisfaction/Value:3+' => '',
	'Class:Incident/Attribute:user_satisfaction/Value:4' => 'Sehr unzufrieden',
	'Class:Incident/Attribute:user_satisfaction/Value:4+' => '',
	'Class:Incident/Attribute:user_comment' => 'Benutzer-Kommentar',
	'Class:Incident/Attribute:user_comment+' => '',
	'Class:Incident/Attribute:parent_incident_id_friendlyname' => 'Parent-Incident-Friendly Name',
	'Class:Incident/Attribute:parent_incident_id_friendlyname+' => '',
	'Class:Incident/Stimulus:ev_assign' => 'Zuweisen',
	'Class:Incident/Stimulus:ev_assign+' => '',
	'Class:Incident/Stimulus:ev_reassign' => 'Erneut zuweisen',
	'Class:Incident/Stimulus:ev_reassign+' => '',
	'Class:Incident/Stimulus:ev_pending' => 'Auszeit',
	'Class:Incident/Stimulus:ev_pending+' => '',
	'Class:Incident/Stimulus:ev_timeout' => 'Timeout',
	'Class:Incident/Stimulus:ev_timeout+' => '',
	'Class:Incident/Stimulus:ev_autoresolve' => 'Automatisch gelöst',
	'Class:Incident/Stimulus:ev_autoresolve+' => '',
	'Class:Incident/Stimulus:ev_autoclose' => 'Automatisch geschlossen',
	'Class:Incident/Stimulus:ev_autoclose+' => '',
	'Class:Incident/Stimulus:ev_resolve' => 'Als gelöst markieren',
	'Class:Incident/Stimulus:ev_resolve+' => '',
	'Class:Incident/Stimulus:ev_close' => 'Diesen Request schließen',
	'Class:Incident/Stimulus:ev_close+' => '',
	'Class:Incident/Stimulus:ev_reopen' => 'Wiedereröffnen',
	'Class:Incident/Stimulus:ev_reopen+' => '',
	'Class:Incident/Error:CannotAssignParentIncidentIdToSelf' => 'Kann Incident-Ticket nicht als eigenes Parent-Ticket verwenden',

	'Class:Incident/Method:ResolveChildTickets' => 'Kind-Tickets lösen',
	'Class:Incident/Method:ResolveChildTickets+' => 'Lösung auf Kind-Tickets übertragen (ev_autoresolve), und folgende Ticket-Eigenschaften angleichen: Service, Team, Agent, Lösungsinformationen',
	'Tickets:Related:OpenIncidents' => 'Offene Incidents',
));
