<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'User';

/*Dashboard controller*/
$route['Dashboard']		 	='Dashboard/index';
$route['Activity']		 	='Dashboard/Activity';
$route['ManPower']		 	='Dashboard/ManPower';
$route['ManPowerView']		='Dashboard/ManPowerView';

/*Dashboard controller*/
$route['AddUser']		 	='User/AddUser';
$route['AllUser']		 	='User/AllUser';

/*Customer controller*/
$route['Customer']		 	='Customer/index';
$route['AllCustomer'] 		='Customer/AllCustomer';
$route['Customer-proile']	='Customer/Customer_profile';
$route['CustomerStatus']	='Customer/CustomerStatus';
$route['customerPanel']	='Customer/customerPanel';
$route['EmbassyFile']		='Customer/EmbassyFile';
$route['EmbassyFilePDF']	='Customer/EmbassyFilePDF';
$route['CustomerTrainingFinger'] = 'Customer/CustomerTrainingFinger';
$route['CustomerTrainingFingerprint'] = 'Customer/CustomerTrainingFingerprint';
$route['CustomerAttachFile'] ='Customer/CustomerAttachFile';
$route['EmbassyReport']		= 'Customer/EmbassyReport';

/*Agent controller*/
$route['AddAgent'] 		= 'Agent/index';
$route['AllAgent']		= 'Agent/AllAgent';	
$route['AgentReport'] 	= 'Agent/AgentReport';
$route['AgentReportView'] 	= 'Agent/AgentReportView';

/*Employee controller*/
$route['AddEmployee'] 		= 'Employee/index';
$route['AllEmployee']		= 'Employee/AllEmployee';	

/*Setting controller*/
$route['Genarel'] = 'Setting/Genarel';
$route['Category'] = 'Setting/Category';
$route['ExpensesCatgory'] = 'Setting/ExpensesCatgory';
$route['ReceiveCategory'] = 'Setting/ReceiveCategory';
$route['PayMethod'] = 'Setting/PayMethod';
$route['debitvoucher'] = 'Setting/debitvoucher';
$route['Addvoucher']  = 'Setting/Addvoucher';
$route['Allvoucher']  = 'Setting/Allvoucher';

/*Accounts Controller*/
$route['CustomerPayment'] ='Accounts';
$route['AgentPayment'] 	= 'Accounts/AgentPayment';
$route['CashReport'] 	= 'Accounts/CashReport';
$route['CustomerPaymentReport'] ='Accounts/CustomerPaymentReport';
$route['CAOPayment'] ='Accounts/CAOPayment';
$route['DateWais'] 		= 'Accounts/DateWais';

/*Status for customer*/
$route['Status'] 			= 'Status/index';
$route['MedicalUnfit'] 		= 'Status/MedicalUnfit';
$route['Embassy'] 			= 'Status/Embassy';
$route['VisaStemping'] 		= 'Status/VisaStemping';
$route['Manpower'] 			= 'Status/Manpower';
$route['Flight'] 			= 'Status/Flight';
$route['StatusCompleted'] 	= 'Status/StatusCompleted';
$route['Medicalfit']		='Status/Medicalfit';

/*Expenses Controller*/
$route['Expenses'] = 'Expenses/index';
$route['AllExpenses'] = 'Expenses/AllExpenses';
$route['ExpensesReport'] = 'Expenses/ExpensesReport';


/*
Account Section Controller
*/
$route['deposit'] = 'Account/PaymentDeposit';
$route['paylist'] = 'Account/paylist';
$route['Cost'] = 'Account/Cost';
$route['AllCost'] = 'Account/AllCost';
$route['Report'] = 'Account/Report';
$route['BossReceive'] = 'Account/BossReceive';


/*Dolar Payment*/
$route['DolarPayment'] = 'Account/DolarPayment';
$route['DolarPayList'] = 'Account/DolarPayList';
$route['DolarPayReport'] = 'Account/DolarPayReport';


/*Ticket Controller*/
$route['Ticket'] = 'Ticket/index';
$route['AllTicket'] = 'Ticket/AllTicket';
$route['TicketReport'] = 'Ticket/TicketReport';
$route['FlightReport'] = 'Ticket/FlightReport';


$route['404_override'] = 'Setting/Error';
$route['translate_uri_dashes'] = FALSE;
