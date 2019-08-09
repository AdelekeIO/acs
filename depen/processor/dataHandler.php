<?php
ob_start();
session_start();
require "../forestry/processor/Model.php";
// require "../forestry/processor/funcs.php";
// echo "processing";

// if($_SERVER['REQUEST_METHOD']==='POST'){
//     print_r($_REQUEST);
    
// }
if(isset($_REQUEST['mfobPostReq']) && !empty($_REQUEST['mfobPostReq'])){
    // print_r ("after post");
    if(isset($_FILES['file'])){
   
    $path="uploads/";
    $extension=['jpg','jpeg','png','gif'];
    $pixname=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $pixtype=$_FILES['file']['type'];
    $pixsize=$_FILES['file']['size'];
    $r=explode('.',$pixname);
    $size=sizeof($r);
    $file_ext=strtolower($r[$size-1]);
    $file=$path.time()."-".$pixname;
    if(!in_array($file_ext,$extension)){
        output(false,"Kindly Upload an Image File Type");
        die();
    }else{
        
        move_uploaded_file($tmp_name,$file);
    }
}else{
    output(false,"Image Is Required");
    die();
} // print_r($_REQUEST);
    // die();
    $title=$_REQUEST['title'];
    if(!validiator($title)){
        output(false,"Title Is Required");
        die();
    }
    $surname=$_REQUEST['surname'];
    if(!validiator($surname)){
        output(false,"Surname Is Required");
        die();
    }
    $firstName=$_REQUEST['firstName'];
    if(!validiator($firstName)){
        output(false,"First Name Is Required");
        die();
    }
    $middleName=$_REQUEST['middleName'];
    if(!validiator($middleName)){
        output(false,"Middle Name Is Required");
        die();
    }
    $psn=$_REQUEST['psn'];
    if(!validiator($psn)){
        output(false,"PSN Is Required");
        die();
    }
    $dob=$_REQUEST['dob'];
    if(!validiator($dob)){
        output(false,"DOB Is Required");
        die();
    }
    $phone=$_REQUEST['phone'];
    if(!validiator($phone)){
        output(false,"Phone Is Required");
        die();
    }
    $dateOfPresApp=$_REQUEST['dateOfPresApp'];
    if(!validiator($dateOfPresApp)){
        output(false,"Date Of Present Application Is Required");
        die();
    }
    $cadre=$_REQUEST['cadre'];
    if(!validiator($cadre)){
        output(false,"Cadre Is Required");
        die();
    }
    $presentPosInFull=$_REQUEST['presentPosInFull'];
    if(!validiator($presentPosInFull)){
        output(false,"Present Position In Full Is Required");
        die();
    }
    $typeOfAppointmnt=$_REQUEST['typeOfAppointmnt'];
    if(!validiator($typeOfAppointmnt)){
        output(false,"Type Of Appointmnt Is Required");
        die();
    }
   
    $gl=$_REQUEST['gl'];
    if(!validiator($gl)){
        output(false,"GL Is Required");
        die();
    }
    $step=$_REQUEST['step'];
    if(!validiator($step)){
        output(false,"Step Is Required");
        die();
    }
    $highestQual=$_REQUEST['highestQual'];
    if(!validiator($highestQual)){
        output(false,"Highest Qualification Is Required");
        die();
    }
    $mainMotherMda=$_REQUEST['mainMotherMda'];
    if(!validiator($mainMotherMda)){
        output(false,"Main Mother Mda Is Required");
        die();
    }
    $bankName=$_REQUEST['bankName'];
    if(!validiator($bankName)){
        output(false,"Bank Name Is Required");
        die();
    }
    $accNum=$_REQUEST['accNum'];
    if(!validiator($accNum)){
        output(false,"Account Number Is Required");
        die();
    }
    $bvn=$_REQUEST['bvn'];
    if(!validiator($bvn)){
        output(false,"BVN Is Required");
        die();
    }
    
    // print_r ($_REQUEST);
    // echo("datA");
    $data=array(
        "track_id"=>md5(time()),
        "tittle"=>$title,
        "surname"=>$surname,
        "firstName"=>$firstName,
        "middleName"=>$middleName,
        "psn"=>$psn,
        "dob"=>$dob,
        "phone"=>$phone,
        "dateOfPresentAppointmnt"=>$dateOfPresApp,
        "cadre"=>$cadre,
        "presentPositonInFull"=>$presentPosInFull,
        "typeOfAppointment"=>$typeOfAppointmnt,
        "gl"=>$gl,
        "step"=>$step,
        "highestQualification"=>$highestQual,
        "main_motherMDA"=>$mainMotherMda,
        "bankName"=>$bankName,
        "accNum"=>$accNum,
        "bvn"=>$bvn,
        "pix"=>$file,
        "status"=>0
);
$res=insert($data,"staff_data_tbl",$dbh);
dataOutput(true,"Successfully Submitted",$res);
   
}
// Get Request
if(isset($_REQUEST['mfobGetReq']) && !empty($_REQUEST['mfobGetReq'])){
    // echo "get!!";
    $sql="staff_data_tbl";
    $rs=select($sql,$dbh);
    dataOutput(true,"Fetched Successfully",$rs);
}

if(isset($_REQUEST['loginReq']) && !empty($_REQUEST['loginReq'])){
    $username=validiator($_REQUEST['username'])?$_REQUEST['username']:die(output(false,"Kindly Supply the Username"));
    $password=validiator($_REQUEST['password'])?$_REQUEST['password']:die(output(false,"Kindly Supply the password"));
    $res=login($username,$password,$dbh);
    // print_r($res);
    // die();
    if(isset($res) && !empty($res) && $res!=false){
        $_SESSION['uname']=$res[0]['username'];
        output(true,"Login Successfull");
        // echo $_SESSION['uname'];
    }else{
        output(false,"Invaled Username Or Password.");
    }

}
if(isset($_REQUEST['viewUserReq']) && !empty($_REQUEST['tid'])){
    $tid=$_REQUEST['tid'];
    $res=singleSelect($tid,$dbh); 
    if(isset($res) && (!empty($res) || $res!=false)){
        dataOutput(true,"Selected User Details",$res);
    }else{
        output(false,"Invalid Tracking ID");
    }
}
if(isset($_REQUEST['deleteUserReq']) && !empty($_REQUEST['tid'])){
    $tid=$_REQUEST['tid'];
    $res=deleteByTid($tid,$dbh);
    if((!empty($res) || $res!=false)){
        output(true,"Details deleted Successfully");
    }else{
        output(false,"An Error Occured While deleting the details");
    }
}
if(isset($_REQUEST['updateUserReq']) && !empty($_REQUEST['tid'])){
    
    $title=$_REQUEST['title'];
    if(!validiator($title)){
        output(false,"Title Is Required");
        die();
    }
    $surname=$_REQUEST['surname'];
    if(!validiator($surname)){
        output(false,"Surname Is Required");
        die();
    }
    $firstName=$_REQUEST['firstName'];
    if(!validiator($firstName)){
        output(false,"First Name Is Required");
        die();
    }
    $middleName=$_REQUEST['middleName'];
    if(!validiator($middleName)){
        output(false,"Middle Name Is Required");
        die();
    }
    $psn=$_REQUEST['psn'];
    if(!validiator($psn)){
        output(false,"PSN Is Required");
        die();
    }
    $dob=$_REQUEST['dob'];
    if(!validiator($dob)){
        output(false,"DOB Is Required");
        die();
    }
    $phone=$_REQUEST['phone'];
    if(!validiator($phone)){
        output(false,"Phone Is Required");
        die();
    }
    $dateOfPresApp=$_REQUEST['dateOfPresApp'];
    if(!validiator($dateOfPresApp)){
        output(false,"Date Of Present Application Is Required");
        die();
    }
    $cadre=$_REQUEST['cadre'];
    if(!validiator($cadre)){
        output(false,"Cadre Is Required");
        die();
    }
    $presentPosInFull=$_REQUEST['presentPosInFull'];
    if(!validiator($presentPosInFull)){
        output(false,"Present Position In Full Is Required");
        die();
    }
    $typeOfAppointmnt=$_REQUEST['typeOfAppointmnt'];
    if(!validiator($typeOfAppointmnt)){
        output(false,"Type Of Appointmnt Is Required");
        die();
    }
   
    $gl=$_REQUEST['gl'];
    if(!validiator($gl)){
        output(false,"GL Is Required");
        die();
    }
    $step=$_REQUEST['step'];
    if(!validiator($step)){
        output(false,"Step Is Required");
        die();
    }
    $highestQual=$_REQUEST['highestQual'];
    if(!validiator($highestQual)){
        output(false,"Highest Qualification Is Required");
        die();
    }
    $mainMotherMda=$_REQUEST['mainMotherMda'];
    if(!validiator($mainMotherMda)){
        output(false,"Main Mother Mda Is Required");
        die();
    }
    $bankName=$_REQUEST['bankName'];
    if(!validiator($bankName)){
        output(false,"Bank Name Is Required");
        die();
    }
    $accNum=$_REQUEST['accNum'];
    if(!validiator($accNum)){
        output(false,"Account Number Is Required");
        die();
    }
    $bvn=$_REQUEST['bvn'];
    if(!validiator($bvn)){
        output(false,"BVN Is Required");
        die();
    }
    // print_r($_REQUEST);
    if(isset($_FILES['file'])){
   
        $path="uploads/";
        $extension=['jpg','jpeg','png','gif'];
        $pixname=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $pixtype=$_FILES['file']['type'];
        $pixsize=$_FILES['file']['size'];
        $r=explode('.',$pixname);
        $size=sizeof($r);
        $file_ext=strtolower($r[$size-1]);
        $file=$path.time()."-".$pixname;
        if(!in_array($file_ext,$extension)){
            output(false,"Kindly Upload an Image File Type");
            die();
        }else{
            
            move_uploaded_file($tmp_name,$file);
        }
    }else{
        // output(false,"Image Is Required");
        // die();
        $file=$_REQUEST['dpix'];
    }   

    $data=array(
        "title"=>$title,
        "surname"=>$surname,
        "firstName"=>$firstName,
        "middleName"=>$middleName,
        "psn"=>$psn,
        "dob"=>$dob,
        "phone"=>$phone,
        "dateOfPresentAppointmnt"=>$dateOfPresApp,
        "cadre"=>$cadre,
        "presentPositonInFull"=>$presentPosInFull,
        "typeOfAppointment"=>$typeOfAppointmnt,
        "gl"=>$gl,
        "step"=>$step,
        "highestQualification"=>$highestQual,
        "main_motherMDA"=>$mainMotherMda,
        "bankName"=>$bankName,
        "accNum"=>$accNum,
        "bvn"=>$bvn,
        "pix"=>$file,
);
// echo "Before Update";
$where=$_REQUEST['tid'];
$res=update($data,$where,$dbh);
// print_r($data);
if($res){
    output(true,"Record updated Successfully");
}else{
    output(false,'An error occured while updating the records');
}
}
if(isset($_REQUEST['searchByKey']) && !empty($_REQUEST['searchByKey'])){
    // echo "Perfect";
    // print_r($_REQUEST);
    $serchBy=$_REQUEST['key'];
    $serchValue=strtolower($_REQUEST['value']);
    // ;
    // if(!validiator($serchValue)){
    //     output(false,"Kindly Supply a Search Value");
    //     die();
    // }
    
    $res=searchSelect($serchBy,$serchValue,$dbh);
    if(!empty($res)){
        dataOutput(true,"Search Result",$res);
    }else{
        output(false,'No Matching Search Result');
    }

}
if(isset($_REQUEST['searchEherReq']) && !empty($_REQUEST['searchEherReq'])){
    // echo "Perfect";
    // print_r($_REQUEST);
    
    $serchBy=$_REQUEST['key'];
    $serchValue=strtolower($_REQUEST['value']);


    // die();
    // ;
    // if(!validiator($serchValue)){
    //     output(false,"Kindly Supply a Search Value");
    //     die();
    // }
    
    $res=searchSelect($serchBy,$serchValue,$dbh);
    if(!empty($res)){
        dataOutput(true,"Search Result",$res);
    }else{
        output(false,'No Matching Search Result');
    }

}

if(isset($_REQUEST['loguot'])){
    unset($_SESSION);
    session_destroy();
    // echo "done";
    output(true,'Logged Out Successfully');
}
if(isset($_REQUEST['isLoggedIn'])){
    // print_r($_REQUEST); 
    if(!isset($_SESSION['uname'])){
        // print_r($_SESSION);
        output(false,'Not Loggeded In');
    }else{
        output(true,'Loggeded In');
    }
    // echo "yeh";
}