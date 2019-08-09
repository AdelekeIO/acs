<?php
// echo("Login here");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dataprocessing
 *   all processes is done 
 * @author adeleke
 */
class dataprocessing {
    // $con = new Model();
// $model->$dbh)
 function __construct()
    {
     $db=new Model();
    }

    function myid() {
        session::init();
        $state = $_SESSION["MapProjectAccessGranted"];
        $id = session::get("id");
//        $type = session::get("type");
//        echo $state;
        return $id;
//        here will check if am  a login user or not 
    }

    function logout() {
        session::init();
        session::destroy();
//        header("Location: " . URL);
        echo 'logged out';
    }

    function confirmDebe(){
        echo("Nice Debe!!!");
    }
//......................................................................................................................
//push the contact us page
    function push_contact_us(){
        //THE CONTACT FORM PROCESSES FOR ALL CONTACT TYPE STARTS HERE...
        $contact_type = stripcslashes($_POST['subject']);
        $from = stripcslashes(trim($_POST['email']));
        $full_name = stripcslashes($_POST['full_name']);
        $msg_body = stripcslashes($_POST['message']);
        $mail_header = "From: ".$full_name."[".$from."]"."\r\n";
        $mail_header .="Reply-To: ".$from."\r\n";
        $mail_header .="Content-type: text/html; charset=iso-8859-1\r\n";
        $to = "connect@mentorafricaproject.com";//the company's email here
        
        $send_mail_now = mail($to, $contact_type, $msg_body, $mail_header);
        if($send_mail_now){
            echo 'Email sent successfully';
        }else{
            echo 'Email sending failed';
        }
    }
//......................................................................................................................
    function send_email_mentor() {
        //hold the Mentee's name in a session.
        $mentor_name= $_POST['full_name'];
        $mentor_email = $_POST['subscriber_email'];
        $email_content = '';

        //Send the Mail
        $contact_type = 'Application Successful!';
        $from = 'no_reply@mentorafricaproject.com';
        $sender = 'connect@mentorafricaproject.com';
        $to = $mentor_email;
        $msg_body = $email_content;
        $mail_header = "From: ".$sender."[".$from."]"."\r\n";
        $mail_header .="Reply-To: ".$sender."\r\n";
        $mail_header .="Content-type: text/html; charset=iso-8859-1\r\n";
        $mail_header .= 'Cc: Aneta.felix@mentorafricaproject.com' . "\r\n";
        $send_mail_now = mail($to, $contact_type, $msg_body, $mail_header);
        if($send_mail_now){
            echo 'Email sent successfully';
        }else{
            echo 'Email sending failed';
        }
//        echo $mentor_email . '' . $mentor_name;
    }
//......................................................................................................................
    function emailsend() {
//        require('PHPMailerAutoload.php');
        //hold the Mentee's name in a session.
        $mentee_name= $_POST['full_name'];
        $mentee_email = $_POST['subscriber_email'];
        $email_content ='';
//        Send the Mail
        $contact_type = 'Application Successful!';
        $from = 'no_reply@mentorafricaproject.com';
        $sender = 'connect@mentorafricaproject.com';
        $to = $mentee_email;
        $msg_body = $email_content;
        $mail_header = "From: ".$sender."[".$from."]"."\r\n";
        $mail_header .="Reply-To: ".$sender."\r\n";
        $mail_header .="Content-type: text/html; charset=iso-8859-1\r\n";
        $mail_header .= 'Cc: Aneta.felix@mentorafricaproject.com' . "\r\n";
        $send_mail_now = mail($to, $contact_type, $msg_body, $mail_header);
        if($send_mail_now){
            echo 'Email sent successfully';
        }else{
            echo 'Email sending failed';
        }
//        echo $mentee_name." ".$mentee_email;
    }

    //put your code here
    function register() {
        session::init();
        // print_r($_REQUEST);
        
        /**
 [first_name] => Ola
    [last_name] => Maintain
    [user_type] => olu@m.com
    [user_email] => olu@m.com
    [user_password] => segun
    [postRegister] => 1 editRegister
        */
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_type = $_POST['user_type'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
 
        $first_name=validiator($_REQUEST['first_name'])?$_REQUEST['first_name']:die(output(false,"Kindly Supply the first name"));
        $last_name=validiator($_REQUEST['last_name'])?$_REQUEST['last_name']:die(output(false,"Kindly Supply the last name"));
        $user_type=validiator($_REQUEST['user_type'])?$_REQUEST['user_type']:die(output(false,"Kindly Select a valid User type"));
        $user_email=validiator($_REQUEST['user_email'])?$_REQUEST['user_email']:die(output(false,"Kindly Supply the email"));
        $user_password=validiator($_REQUEST['user_password'])?$_REQUEST['user_password']:die(output(false,"Kindly Supply the password"));

        $data=array(
        "first_name"=>$first_name,
        "last_name"=>$last_name,
        "user_type"=>$user_type,
        "user_email"=>$user_email,
        "user_password"=>$user_password,
        "dateAdded"=> date_and_time(),
        "status"=>1
);

        $db=new Model();
        // $res=$db->register($username,$password);
        $res = $db->searchSelect("user_email",$user_email,"login");
        // print_r($res);
        if (!empty($res) && isset($res[0]['user_email'])) {
            # code...
            output(false,"The email '$user_email' has already been used on this platform, Kindly Supply a valid email.");
                die();
        }
        $res=$db->insert($data,"login");
        
        if (!empty($res)) {
            dataOutput(true,"Registration Is Successful",$res);
        }else{
            dataOutput(false,"Registration Not Successful",$res);
        }        
    }

   
    function checkmystatus() {
        session::init();
//        $state = $_SESSION["MapProjectAccessGranted"];
        $state = session::get("MapProjectAccessGranted");
//        echo $state;
        return $state;
//        here will check if am  a login user or not 
    }


       function login() {
        
        $username = $_POST['user_email'];
        $password = $_POST['user_password'];
        $username=validiator($_REQUEST['user_email'])?$_REQUEST['user_email']:die(output(false,"Kindly Supply the Username"));
        $user_name=validiator($_REQUEST['user_password'])?$_REQUEST['user_password']:die(output(false,"Kindly Supply the password"));
        $db=new Model();
        $res=$db->login($username,$password);
    
        if(isset($res) && !empty($res) && $res!=false){
            Session::init();
            $_SESSION["MapProjectAccessGranted"] = TRUE;
            $_SESSION["user_id"] = $res[0]['id'];
            $_SESSION["User_type"] = $res[0]['user_type'];
            $_SESSION["email"] = $res[0]['user_email'];
            $_SESSION["firstname"] = $res[0]['first_name'];
            output(true,"Login Successfull");
        }else{
            output(false,"Invaled Username Or Password.");
        }
//      
}

     function assignUserToGroup() {
        // print_r($_REQUEST);
        $user_id=validiator($_REQUEST['user_id'])?$_REQUEST['user_id']:die(output(false,"Kindly Supply the UserID"));
        $user_name=validiator($_REQUEST['user_name'])?$_REQUEST['user_name']:die(output(false,"Kindly Supply the user_name"));
        $group_id=validiator($_REQUEST['group_id'])?$_REQUEST['group_id']:die(output(false,"Kindly Supply the group_id"));
               
        $db=new Model();

        $member_id=explode("_", $user_id)[1];
        $member_full_name=explode("-", $user_name)[0];
        $group_id=explode("_", $group_id)[1];
       
        $items=array("group_name");
        $tbl="groups";
        $group_name = $db->singleSelect($group_id,$items,$tbl)[0][0];
        $date_added = date_and_time();

         $data=array(
        "group_id"=>$group_id,
        "member_id"=>$member_id,
        "member_full_name"=>$member_full_name,
        "group_name"=> $group_name,
        "date_added"=> $date_added,
        "status"=>0
);
         $tbl="grooup_members";
         
         $res = $db->checkIfMemberAlreadyExistInGroup($group_id,$member_id);
     
         if (!empty($res)) {
            output(false,"User '$member_full_name' already exist in group '$group_name'");
            die();
         }
        $res=$db->insert($data,$tbl);
        if (!empty($res)) {
            dataOutput(true,"User '$member_full_name' has been successfully added to group '$group_name'",$res);
        }else{
            dataOutput(false,"ohps!! User '$member_full_name' has not been successfully added to group '$group_name'",$res);
        }   
//      
}



    function createGroup() {
        session::init();
        // print_r($_REQUEST);
        // die();
        $groupName = $_POST['groupName'];
        $groupCategory = $_POST['groupCategory'];
        $groupDetails = $_POST['groupDetails'];
 
        $groupName=validiator($_REQUEST['groupName'])?$_REQUEST['groupName']:die(output(false,"Kindly Supply the group name"));
        $groupCategory=validiator($_REQUEST['groupCategory'])?$_REQUEST['groupCategory']:die(output(false,"Kindly Supply the grou[p category"));
        $groupDetails=validiator($_REQUEST['groupDetails'])?$_REQUEST['groupDetails']:die(output(false,"Kindly Select a valid droup details"));

        $data=array(
        "group_name"=>$groupName,
        "group_category"=>$groupCategory,
        "group_details"=>$groupDetails,
        "dateAdded"=> date_and_time(),
        "status"=>0
);

        $db=new Model();
        // $res=$db->register($username,$password);
        $res = $db->searchSelect("group_name",$groupName,"groups");

        if (!empty($res) && isset($res[0]['group_name'])) {
            # code...
            output(false,"The email '$groupName' has already been used on this platform, Kindly Supply a valid email.");
                die();
        }
        $res=$db->insert($data,"groups");
        
        if (!empty($res)) {
            dataOutput(true,"The device has been updated Successful",$res);
        }else{
            dataOutput(false,"device Creation Not Successful, Kindly try again",$res);
        }        
        

    }


function createDevice() {
        session::init();
 
        $deviceName=validiator($_REQUEST['deviceName'])?$_REQUEST['deviceName']:die(output(false,"Kindly Supply the device name"));
        $deviceURL=validiator($_REQUEST['deviceURL'])?$_REQUEST['deviceURL']:die(output(false,"Kindly Supply the device URL"));
        
        $deviceOnURL=validiator($_REQUEST['deviceOnURL'])?$_REQUEST['deviceOnURL']:die(output(false,"Kindly Supply the device on URL"));
        
        $deviceOffURL=validiator($_REQUEST['deviceOffURL'])?$_REQUEST['deviceOffURL']:die(output(false,"Kindly Supply the device off URL"));
        
        $deviceDetails=validiator($_REQUEST['deviceDetails'])?$_REQUEST['deviceDetails']:die(output(false,"Kindly Supply the device details"));
        $deviceCategory=validiator($_REQUEST['deviceCategory'])?$_REQUEST['deviceCategory']:die(output(false,"Kindly Select a valid device category"));

        $data=array(
        "device_name"=>$deviceName,
        "device_details"=>$deviceDetails,
        "dateAdded"=> date_and_time(),
        "status"=>0,
        "categories"=>$deviceCategory,
        "power_on_url"=>$deviceOnURL,
        "power_off_url"=>$deviceOffURL,
        "device_url"=>$deviceURL
);

        $db=new Model();
        // $res=$db->register($username,$password);
        $res = $db->searchSelect("device_name",$deviceName,"devices");
        if (!empty($res) && isset($res[0]['device_name'])) {
            # code...
            output(false,"The name '$deviceName' has already been used on this platform, Kindly Supply a valid email.");
                die();
        }
        $res=$db->insert($data,"devices");
        
        if (!empty($res)) {
            dataOutput(true,"The device has been Created Successful",$res);
        }else{
            dataOutput(false,"device Creation Not Successful, Kindly try again",$res);
        }        
        

    }

    function editDevice() {
        session::init();
        
        $deviceName=validiator($_REQUEST['deviceName'])?$_REQUEST['deviceName']:die(output(false,"Kindly Supply the device name"));
        $deviceURL=validiator($_REQUEST['deviceURL'])?$_REQUEST['deviceURL']:die(output(false,"Kindly Supply the device URL"));
        
        $deviceOnURL=validiator($_REQUEST['deviceOnURL'])?$_REQUEST['deviceOnURL']:die(output(false,"Kindly Supply the device on URL"));
        
        $deviceOffURL=validiator($_REQUEST['deviceOffURL'])?$_REQUEST['deviceOffURL']:die(output(false,"Kindly Supply the device off URL"));
        
        $deviceDetails=validiator($_REQUEST['deviceDetails'])?$_REQUEST['deviceDetails']:die(output(false,"Kindly Supply the device details"));
        $deviceCategory=validiator($_REQUEST['deviceCategory'])?$_REQUEST['deviceCategory']:die(output(false,"Kindly Select a valid device category"));

        $data=array(
        "device_name"=>$deviceName,
        "device_details"=>$deviceDetails,
        "dateAdded"=> date_and_time(),
        "status"=>0,
        "categories"=>$deviceCategory,
        "power_on_url"=>$deviceOnURL,
        "power_off_url"=>$deviceOffURL,
        "device_url"=>$deviceURL
);
        $id = $_REQUEST['id'];

        $db=new Model();
        // $res=$db->register($username,$password);
        // update($data,$where,$table)
        $res = $db->searchSelect("id",$id,"devices");
        if (empty($res) && !isset($res[0]['device_name'])) {
            # code...
            output(false,"The device '$deviceName' does not exist on this platform.");
                die();
        }
        $res=$db->update($data,$id,"devices");
        
        if (!empty($res)) {
            dataOutput(true,"The device has been updated Successful",$res);
        }else{
            dataOutput(false,"device update Not Successful, Kindly try again",$res);
        }        
        

    }

function getAllUsers(){
    session::init();
    $db=new Model();//getUsersList  
    $sql='login';
    $items = array("id","first_name", "last_name", "user_email","user_type");
    $res = $db->selectList($sql,$items);
    if (!empty($res)) {
        dataOutput(true,"All users",$res);
    }else{
        output(false,"No user in the system");
    }
    
}

function getDashBoardDetails(){
    session::init();
    $db=new Model();  
    $resps=array();
    $table='login';
    $key='user_type';
    $value='Admin';
    $res = $db->counts($table,$key,$value);
    array_push($resps,$res[0]);
    // print_r($res);

    $table='login';
    $key='user_type';
    $value='users';

    $res = $db->counts($table,$key,$value);
    array_push($resps,$res[0]);

    // print_r($res);

    $table='devices';
    $res = $db->counts($table);
    array_push($resps,$res[0]); 

    // print_r($res);


    $table='groups';
    $res = $db->counts($table);
    array_push($resps,$res[0]);

    // print_r($resps);
    dataOutput(true,"All Counts",$resps);
    
}

function getUsersDashBoardDetails(){
    session::init();
    $db=new Model();  
    $resps=array();
    $table='users_devices';
    $key='user_id';
    $value=myid();
    $res = $db->usersCounts($table,$key,$value);
    array_push($resps,$res[0]);

    $table='grooup_members';
    $key='member_id';
    $value=myid();
    $res = $db->usersCounts($table,$key,$value);
    array_push($resps,$res[0]);


    dataOutput(true,"All Counts",$resps);
    
}

function getUsersInGroup(){
    session::init();
    $db=new Model();  

    $sql='grooup_members';
    $items = array("id","member_full_name", "group_name", "date_added");
    $res = $db->selectList($sql,$items);
    if (!empty($res)) {
        dataOutput(true,"All Group Members",$res);
    }else{
        output(false,"No Member In any group");
    }
    
}

function device2UserBody(){
    session::init();
    $db=new Model();  
// 
    $sql='users_devices';
    $items = array("id","user_fullname", "device_name", "date_added");
    $res = $db->selectList($sql,$items);
    if (!empty($res)) {
        dataOutput(true,"All Group Members",$res);
    }else{
        output(false,"No Member In any group");
    }
    
}

function getd2ggrouplistBody(){
    session::init();
    $db=new Model();  
// 
    $sql='groups_devices';
    $items = array("id","device_name", "group_name", "date_added");
    $res = $db->selectList($sql,$items);
    if (!empty($res)) {
        dataOutput(true,"All Group Devices",$res);
    }else{
        output(false,"No Device In any group");
    }
    
}


function getUsersList(){
    session::init();
    $db=new Model();
    $sql='login';
    $items = array("id","first_name", "last_name", "user_type");
    $res = $db->selectList($sql,$items);
    if (!empty($res)) {
        dataOutput(true,"All users",$res);
    }else{
        output(false,"No user in the system");
    }
    
}

function deleteDevicesReq(){
    session::init();
    $db=new Model();//getUsersList
    $tbl='devices';
    $dID = explode("_", $_POST['dID'])[1];
    
    $res = $db->deleteByTid($dID,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Device is successfully deleted",$res);
    }else{
        output(false,"Device not successfully deleted");
    }
    
}

function deleteUserReq(){
    session::init();
    $db=new Model();//deleteGroupReqt
    $tbl='login';
    $dID = explode("_", $_POST['dID'])[1];
    
    $res = $db->deleteByTid($dID,$tbl);
    if (!empty($res)) {
        dataOutput(true,"User is successfully deleted",$res);
    }else{
        output(false,"User not successfully deleted");
    }
    
}

function deleteGroupReq(){
    session::init();
    $db=new Model();
    $tbl='groups';
    $dID = explode("_", $_POST['dID'])[1];
    
    $res = $db->deleteByTid($dID,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Group is successfully deleted",$res);
    }else{
        output(false,"Group not successfully deleted");
    }
    
}

function deleteD2GReq(){
    session::init();
    $db=new Model();//deleteD2UReq
    $tbl='groups_devices';
    $dID = explode("_", $_POST['dID'])[1];
    
    $res = $db->deleteByTid($dID,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Device assigned to group is successfully removed",$res);
    }else{
        output(false,"Device assigned to group is not successfully removed");
    }
    
}

function deleteD2UReq(){
    session::init();
    $db=new Model();//
    $tbl='users_devices';
    $dID = explode("_", $_POST['dID'])[1];
    
    $res = $db->deleteByTid($dID,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Device assigned to group is successfully removed",$res);
    }else{
        output(false,"Device assigned to group is not successfully removed");
    }
    
}

function deleteU2GReq(){
    session::init();
    $db=new Model();//
    $tbl='grooup_members';
    $dID = explode("_", $_POST['dID'])[1];
    
    $res = $db->deleteByTid($dID,$tbl);
    if (!empty($res)) {
        dataOutput(true,"User assigned to group is successfully removed",$res);
    }else{
        output(false,"User assigned to group is not successfully removed");
    }
    
}

function singleUserDetails(){
    session::init();
    $db=new Model();//
    $tbl='login';
    $tid=$_REQUEST['tid'];
    $items = array("*");
    $res = $db->singleSelect($tid,$items,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Single user details",$res);
    }else{
        output(false,"user not found in the system");
    }
    
}

function getSingleGroupDetails(){
    session::init();
    $db=new Model();//
    $tbl='groups';
    $tid=$_REQUEST['tid'];
    $items = array("*");
    $res = $db->singleSelect($tid,$items,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Single Group details",$res);
    }else{
        output(false,"Group not found in the system");
    }
    
}

function editGroupDetails(){
    session::init();
    $groupName = $_POST['groupName'];
        $groupCategory = $_POST['groupCategory'];
        $groupDetails = $_POST['groupDetails'];
 
        $groupName=validiator($_REQUEST['groupName'])?$_REQUEST['groupName']:die(output(false,"Kindly Supply the group name"));
        $groupCategory=validiator($_REQUEST['groupCategory'])?$_REQUEST['groupCategory']:die(output(false,"Kindly Supply the grou[p category"));
        $groupDetails=validiator($_REQUEST['groupDetails'])?$_REQUEST['groupDetails']:die(output(false,"Kindly Select a valid droup details"));

        $data=array(
        "group_name"=>$groupName,
        "group_category"=>$groupCategory,
        "group_details"=>$groupDetails,
        "dateAdded"=> date_and_time(),
        "status"=>0
);

        $db=new Model();
        // $res=$db->register($username,$password);
        // searchSelect($key,$value,$table)
        $id = $_REQUEST['id'];
        $vals = array("*");
        $res = $db->singleSelect($id,$vals,"groups");
      
        if (empty($res) && !isset($res[0]['user_email'])) {
            # code...
            output(false,"The group '$groupName' does not exist on this platform, Kindly verify and resend.");
                die();
        }
        // ($data,$where,$table)
        $res=$db->update($data,$id,"groups");
        
        
        if (!empty($res)) {
            dataOutput(true,"The device has been updated Successful",$res);
        }else{
            dataOutput(false,"device Creation Not Successful, Kindly try again",$res);
        }        
        
    
}


function editDeviceDetails(){
    session::init();
    $db=new Model();
    $tbl='devices';
    $tid=$_REQUEST['tid'];
    $items = array("*");
    $res = $db->singleSelect($tid,$items,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Device details",$res);
    }else{
        output(false,"Device not found in the system");
    }
    
}

function editRegister(){
    session::init();
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_type = $_POST['user_type'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $first_name=validiator($_REQUEST['first_name'])?$_REQUEST['first_name']:die(output(false,"Kindly Supply the first name"));
    $last_name=validiator($_REQUEST['last_name'])?$_REQUEST['last_name']:die(output(false,"Kindly Supply the last name"));
    $user_type=validiator($_REQUEST['user_type'])?$_REQUEST['user_type']:die(output(false,"Kindly Select a valid User type"));
    $user_email=validiator($_REQUEST['user_email'])?$_REQUEST['user_email']:die(output(false,"Kindly Supply the email"));
    $user_password=validiator($_REQUEST['user_password'])?$_REQUEST['user_password']:die(output(false,"Kindly Supply the password"));

    $data=array(
    "first_name"=>$first_name,
    "last_name"=>$last_name,
    "user_type"=>$user_type,
    "user_email"=>$user_email,
    "user_password"=>$user_password,
    "dateAdded"=> date_and_time(),
    "status"=>1
);

    $db=new Model();
    // $res=$db->register($username,$password);
    // searchSelect($key,$value,$table)
    $id = $_REQUEST['id'];
    $vals = array("*");
    $res = $db->singleSelect($id,$vals,"login");
  
    if (empty($res) && !isset($res[0]['user_email'])) {
        # code...
        output(false,"The email '$user_email' does not exist on this platform, Kindly Supply a valid email.");
            die();
    }
    // ($data,$where,$table)
    $res=$db->update($data,$id,"login");
    
    if (!empty($res)) {
        dataOutput(true,"Details update Is Successful",$res);
    }else{
        dataOutput(false,"Details update is Not Successful",$res);
    }
}


function singleDeviceDetails(){
    session::init();
    $db=new Model();//
    $tbl='devices';
    $tid=$_REQUEST['tid'];
    $items = array("id","device_name", "device_url", "device_details","categories");
    $res = $db->singleSelect($tid,$items,$tbl);
    if (!empty($res)) {
        dataOutput(true,"Single device details",$res);
    }else{
        output(false,"device not found in the system");
    }
    
}



function getGroupsReq(){
    session::init();
    $db=new Model();
    $sql='groups';
    $items = array("first_name", "last_name", "user_email","user_type");
    $res = $db->select($sql);
    if (!empty($res)) {
        dataOutput(true,"All Groups",$res);
    }else{
        output(false,"No group in the system");
    }
    
}

function getDevicesReq(){
    session::init();
    $db=new Model();
    $sql='devices';//
    $items = array("first_name", "last_name", "user_email","user_type");
    $res = $db->select($sql);
    if (!empty($res)) {
        dataOutput(true,"All Devices",$res);
    }else{
        output(false,"No device in the system");
    }
    
}

function geUserstDevicesReq(){
    session::init();
    $db=new Model();
    $items = array("device_id");
    $tbl1="devices";
    $tbl2="users_devices";
    $tbl2Field="device_id";
    $id = array("user_id"=>myid());
    $res = $db->selectListByIDWithCond($tbl1,$tbl2,$tbl2Field,$id);
    if (!empty($res)) {
        dataOutput(true,"All Assigned Devices",$res);
    }else{
        output(false,"No device Assigned to this user : ".session::get('email')."");
    }
}

function getUSersGroupsReq(){
    session::init();
    $db=new Model();
    $tbl1="groups";
    $tbl2="grooup_members";
    $tbl2Field="group_id";
    $id = array("member_id"=>myid());
    $res = $db->selectListByIDWithCond($tbl1,$tbl2,$tbl2Field,$id);
    if (!empty($res)) {
        dataOutput(true,"All Assigned Devices",$res);
    }else{
        output(false,"No device Assigned to this user : ".session::get('email')."");
    }
}


function getALLGroups(){
    session::init();
    $db=new Model();
    $sql='groups';//getALLDevicess()
    $items = array("first_name", "last_name", "user_email","user_type");
    $res = $db->select($sql);
    if (!empty($res)) {
        dataOutput(true,"All Groups",$res);
    }else{
        output(false,"No device in the system");
    }
    
}

function assignDeviceToUser(){


        $selectedDevice=validiator($_REQUEST['selectedDevice'])?$_REQUEST['selectedDevice']:die(output(false,"Kindly Supply the selectedDevice"));
        $selectedUser=validiator($_REQUEST['selectedUser'])?$_REQUEST['selectedUser']:die(output(false,"Kindly Supply the selectedUser"));
        // $group_id=validiator($_REQUEST['group_id'])?$_REQUEST['group_id']:die(output(false,"Kindly Supply the group_id"));
               
        $db=new Model();
          
        $selectedDevice_details=explode("_", $selectedDevice);
        $selectedUser_details=explode("_", $selectedUser);
        // print_r($selectedDevice_details);
        // print_r($selectedUser_details);

        $device_id=$selectedDevice_details[1];
        $device_name=explode("-", $selectedDevice_details[2])[0];
        $user_id=$selectedUser_details[1];
        $user_name=explode("-", $selectedUser_details[2])[0];

        // echo($device_id);
        // echo($user_device);
        $data =array(
            "user_id"   =>$user_id,
            "device_id" =>$device_id,
            "user_fullname" =>$user_name,
            "device_name"   =>$device_name,
            "date_added"    =>  date_and_time()
        );
        // print_r($data);
        // die();
       
        // $items=array("group_name");
        // $tbl="groups";assignDeviceToGroup
        // $group_name = $db->singleSelect($group_id,$items,$tbl)[0][0];
        // $date_added = date_and_time();

         $tbl="users_devices";
         
         $res = $db->checkIfDeviceAlreadyAssignedToUser($user_id,$device_id,$tbl);
     
         if (!empty($res)) {
            output(false,"Device '$device_name' already assigned to user '$user_name'");
            die();
         }
        $res=$db->insert($data,$tbl);
        if (!empty($res)) {
            dataOutput(true,"Device '$device_name' has been successfully assigned to user '$user_name'",$res);
        }else{
            dataOutput(false,"ohps!! Device '$device_name' has not been successfully added to group '$group_name'",$res);
        }   
    }

    function assignDeviceToGroup(){
        // print_r($_REQUEST);

        $selectedDevice=validiator($_REQUEST['selectedDevice'])?$_REQUEST['selectedDevice']:die(output(false,"Kindly Supply the selectedDevice"));
        $selectedGroup=validiator($_REQUEST['selectedGroup'])?$_REQUEST['selectedGroup']:die(output(false,"Kindly Supply the selectedGroup"));
        // $group_id=validiator($_REQUEST['group_id'])?$_REQUEST['group_id']:die(output(false,"Kindly Supply the group_id"));
               
        $db=new Model();
          
        $selectedDevice_details=explode("_", $selectedDevice);
        $selectedGroup_details=explode("_", $selectedGroup);
        // print_r($selectedDevice_details);
        // print_r($selectedUser_details);

        $device_id=$selectedDevice_details[1];
        $device_name=explode("-", $selectedDevice_details[2])[0];
        $group_id=$selectedGroup_details[1];
       
        $items=array("group_name");
        $tbl="groups";
        $group_name = $db->singleSelect($group_id,$items,$tbl)[0][0];
        // $date_added = date_and_time();

         $tbl="users_devices";
         
           $data =array(
            "group_id"   =>$group_id,
            "device_id" =>$device_id,
            "group_name" =>$group_name,
            "device_name"   =>$device_name,
            "date_added"    =>  date_and_time()
        );

         $res = $db->checkIfDeviceAlreadyExistInGroup($device_id,$group_id);
            // print_r($res);
            // die();
         if (!empty($res)) {
            output(false,"Device '$device_name' already assigned to user '$group_name'");
            die();
         }
        $tbl="groups_devices";
        $res=$db->insert($data,$tbl);
        if (!empty($res)) {
            dataOutput(true,"Device '$device_name' has been successfully assigned to user '$group_name'",$res);
        }else{
            dataOutput(false,"ohps!! Device '$device_name' has not been successfully added to group '$group_name'",$res);
        }   
    }
// suspected
function getAssociatedGroups(){
    session::init();
    $db=new Model();
    $sql='devices';//assignDeviceToUser()
    $items = array("first_name", "last_name", "user_email","user_type");
    $res = $db->select($sql);
    if (!empty($res)) {
        dataOutput(true,"All Devices",$res);
    }else{
        output(false,"No device in the system");
    }
    
}


    function gettoken() {
        $token = "123";
        return $token;
    }
 
  
  
}

function Usertype() {
    session::init();
//        $state = $_SESSION["MapProjectAccessGranted"];
    $id = session::get("User_type");
//        echo $state;
    return $id;
//        here will check if am  a login user or not 
}

function myid() {
    session::init();
//        $state = $_SESSION["MapProjectAccessGranted"];
    $id = session::get("user_id");
//        echo $state;
    return $id;
//        here will check if am  a login user or not 
}
function username() {
    session::init();
//        $state = $_SESSION["MapProjectAccessGranted"];
    $username = session::get("username");
//        echo $state;
    return $username;
//        here will check if am  a login user or not
}

function gettoken() {
    $token = "123";
    return $token;
}

function postdatasold($url, $data) {
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) {


        print_r('error');
    }

    var_dump($result);
}

function loadurl($service_url) {
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
     die('error occured during curl exec. Additioanl info: ' . var_export($info));
       die('<div class="alert alert-danger outPopUp" style="font-size: 17px;color: red;position: absolute;height: 200px;z-index: 15;top: 60%;left: 50%;margin: -100px 0 0 -150px;">An error occure please \n check your network connection and try again</div>');
        
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);
//    print_r($decoded);
//print_r($decoded['response'][0]['name']);
//    echo $decoded->response->status == 'ERROR';
    $t = objectToArray($decoded);
// print_r($t);
//    print_r($t['status']);

    if (isset($t['status']) && $t['status'] === 'ERROR') {
//        die('error occured: ' . $t['status']);
        return'[]';
    }
    if (isset($t['status']) && $t['status'] === TRUE) {
        return $t['data'];
    }
    if (isset($t['status']) && $t['status'] === FALSE) {
        return $t['data'];
    }
  


//    print_r(count($t));
//    print_r( count( $t['response']));
//    print_r($t['data']);
  
}

function loadLocation($service_url) {
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
//        die('error occured during curl exec. Additioanl info: ' . var_export($info));
        die('<div class="alert alert-danger outPopUp" style="font-size: 17px;color: red;position: absolute;height: 200px;z-index: 15;top: 60%;left: 50%;margin: -100px 0 0 -150px;">An error occure please \n check your network connection and try again</div>');
        
    }
    curl_close($curl);
    
    $decoded = json_decode($curl_response);
 $t = objectToArray($decoded);
    return $t;

}

function postdata($service_url, $curl_post_data) {
    //next example will insert new conversation

    $curl = curl_init($service_url);
//$curl_post_data = array(
//        'message' => 'test message',
//        'useridentifier' => 'agent@example.com',
//        'department' => 'departmentId001',
//        'subject' => 'My first conversation',
//        'recipient' => 'recipient@example.com',
//        'apikey' => 'key001'
//);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
//    curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($curl_post_data));
    $curl_response = curl_exec($curl);
//    print_r($curl_response);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);
//print_r($decoded);
    $t = objectToArray($decoded);
// print_r($t);
//    print_r($t['status']);

//    if (isset($t['status']) && $t['status'] == 'ERROR') {
//        die('error occured: ' . $t['status']);
//    }
//echo $t['response']  [0]['id'] ;
//   return  $t['response'];
    return $t;
}

function objectToArray($d) {
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
         * Return array converted to object
         * Using __FUNCTION__ (Magic constant)
         * for recursive call
         */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}

function imageurl($filename) {
//        $filename=$rs['picture_name'];
    $file = UPLOAD_DIR . $filename;
    if (file_exists($file)) {
        $image_url = filedire . $filename;
//        echo $image_url;
    } else {
        $image_url = URL . 'libs/assets/images/user.jpg';
        //plugins_url( 'assets/images/user.jpg', __FILE__ );
    }
    return $image_url;
}
function get_timeago( $ptime ){
    
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
 
//    future functions
//function to convert multi dimention array to object stdclass	// Create new stdClass Object
function multi2coject($param) {
    $init = new stdClass;

    // Add some test data
    $init->foo = "Test data";
    $init->bar = new stdClass;
    $init->bar->baaz = "Testing";
    $init->bar->fooz = new stdClass;
    $init->bar->fooz->baz = "Testing again";
    $init->foox = "Just test";

    // Convert array to object and then object back to array
    $array = objectToArray($init);
    $object = arrayToObject($array);

    // Print objects and array
    print_r($init);
    echo "\n";
    print_r($array);
    echo "\n";
    print_r($object);
}

//https://support.ladesk.com/061754-How-to-make-REST-calls-in-PHP