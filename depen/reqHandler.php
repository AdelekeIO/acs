<?php 
// echo("her");
require "./../depen/processor/config.php";
require "./../depen/processor/funcs.php";
require './Session.php';
require './dataprocessing.php';
require "./../depen/processor/Model.php";

$pro= new dataprocessing();
// $pro->confirmDebe();
// echo("Testing");
// // echo(implode($_POST,","));
// print_r($_POST);
// die();

if(isset($_REQUEST['postLogin']) && !empty($_REQUEST['postLogin'])){
	// print_r($_REQUEST);
	$pro->login();
}

if(isset($_REQUEST['postRegister']) && !empty($_REQUEST['postRegister'])){
	// print_r($_REQUEST);
	$pro->register();
}

if(isset($_REQUEST['getUsersReq']) && !empty($_REQUEST['getUsersReq'])){
	// print_r($_REQUEST);createGroup
	$pro->getAllUsers();
}

if(isset($_REQUEST['getUsersList']) && !empty($_REQUEST['getUsersList'])){
	// print_r($_REQUEST);createGroup
	$pro->getUsersList();
}
if(isset($_REQUEST['getGroupsReq']) && !empty($_REQUEST['getGroupsReq'])){
	
	$pro->getGroupsReq();
}
if(isset($_REQUEST['createGroup']) && !empty($_REQUEST['createGroup'])){
	// print_r($_REQUEST);
	$pro->createGroup();
}
if(isset($_REQUEST['createDevice']) && !empty($_REQUEST['createDevice'])){
	// print_r($_REQUEST);
	$pro->createDevice();
}
if(isset($_REQUEST['getDevicesReq']) && !empty($_REQUEST['getDevicesReq'])){
	// print_r($_REQUEST);singleUserDetails
	$pro->getDevicesReq();
}
if(isset($_REQUEST['singleUserDetails']) && !empty($_REQUEST['singleUserDetails'])){
	// print_r($_REQUEST);
	$pro->singleUserDetails();
}
// Not done yet
if(isset($_REQUEST['getAssociatedGroups']) && !empty($_REQUEST['getAssociatedGroups'])){
	// print_r($_REQUEST);
	$pro->getAssociatedGroups();
}
if(isset($_REQUEST['getALLGroups']) && !empty($_REQUEST['getALLGroups'])){
	// print_r($_REQUEST);assignUserToGroup
	$pro->getALLGroups();
}
if(isset($_REQUEST['assignUserToGroup']) && !empty($_REQUEST['assignUserToGroup'])){
	// print_r($_REQUEST);getALLDevicess
	$pro->assignUserToGroup();
}
if(isset($_REQUEST['assignDeviceToUser']) && !empty($_REQUEST['assignDeviceToUser'])){
	// print_r($_REQUEST);
	$pro->assignDeviceToUser();
}
if(isset($_REQUEST['assignDeviceToGroup']) && !empty($_REQUEST['assignDeviceToGroup'])){
	// print_r($_REQUEST);
	$pro->assignDeviceToGroup();
}

if(isset($_REQUEST['deleteDevicesReq']) && !empty($_REQUEST['deleteDevicesReq'])){
	// print_r($_REQUEST);
	$pro->deleteDevicesReq();
}

if(isset($_REQUEST['deleteUserReq']) && !empty($_REQUEST['deleteUserReq'])){
	$pro->deleteUserReq();
}
if(isset($_REQUEST['deleteGroupReq']) && !empty($_REQUEST['deleteGroupReq'])){
	$pro->deleteGroupReq();
}

// User Requests handling

if(isset($_REQUEST['geUserstDevicesReq']) && !empty($_REQUEST['geUserstDevicesReq'])){
	// print_r($_REQUEST);getUSersGroupsReq
	$pro->geUserstDevicesReq();
}

if(isset($_REQUEST['getUSersGroupsReq']) && !empty($_REQUEST['getUSersGroupsReq'])){
	// print_r($_REQUEST);singleDeviceDetails
	$pro->getUSersGroupsReq();
}

if(isset($_REQUEST['singleDeviceDetails']) && !empty($_REQUEST['singleDeviceDetails'])){
	// print_r($_REQUEST);singleDeviceDetails
	$pro->singleDeviceDetails();
}

if(isset($_REQUEST['editDeviceDetails']) && !empty($_REQUEST['editDeviceDetails'])){
	$pro->editDeviceDetails();
}

if(isset($_REQUEST['editDevice']) && !empty($_REQUEST['editDevice'])){
	$pro->editDevice();
}


if(isset($_REQUEST['getSingleUserDetails']) && !empty($_REQUEST['getSingleUserDetails'])){
	$pro->singleUserDetails();//
}

if(isset($_REQUEST['editRegister']) && !empty($_REQUEST['editRegister'])){
	$pro->editRegister();//
}

if(isset($_REQUEST['getSingleGroupDetails']) && !empty($_REQUEST['getSingleGroupDetails'])){
	$pro->getSingleGroupDetails();//
}

if(isset($_REQUEST['editGroupDetails']) && !empty($_REQUEST['editGroupDetails'])){
	$pro->editGroupDetails();//
}

if(isset($_REQUEST['singleGroupDetails']) && !empty($_REQUEST['singleGroupDetails'])){
	$pro->getSingleGroupDetails();//getDashBoardDetails
}

if(isset($_REQUEST['getDashBoardDetails']) && !empty($_REQUEST['getDashBoardDetails'])){
	$pro->getDashBoardDetails();//
}

if(isset($_REQUEST['getUsersDashBoardDetails']) && !empty($_REQUEST['getUsersDashBoardDetails'])){
	$pro->getUsersDashBoardDetails();
}

if(isset($_REQUEST['getUsersInGroup']) && !empty($_REQUEST['getUsersInGroup'])){
	$pro->getUsersInGroup();//device2UserBody
}

if(isset($_REQUEST['device2UserBody']) && !empty($_REQUEST['device2UserBody'])){
	$pro->device2UserBody();//getd2ggrouplistBody
}

if(isset($_REQUEST['getd2ggrouplistBody']) && !empty($_REQUEST['getd2ggrouplistBody'])){
	$pro->getd2ggrouplistBody();//
}

if(isset($_REQUEST['deleteD2GReq']) && !empty($_REQUEST['deleteD2GReq'])){
	$pro->deleteD2GReq();//deleteD2UReq
}

if(isset($_REQUEST['deleteD2UReq']) && !empty($_REQUEST['deleteD2UReq'])){
	$pro->deleteD2UReq();//deleteU2GReq
}

if(isset($_REQUEST['deleteU2GReq']) && !empty($_REQUEST['deleteU2GReq'])){
	$pro->deleteU2GReq();//
}
?>