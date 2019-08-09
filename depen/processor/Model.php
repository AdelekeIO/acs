<?php
// require "https://yourthoughts.com.ng/eh/forestry/processor/config.php";
// require "./eh/forestry/processor/config.php";
// require "config.php";
// require "funcs.php";
/**
 * 
 */
/**
 * 
 */
$dbh=new PDO("mysql:host=".HOST.";dbname=".DB,UNAME,PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
class Model 
{
  
  function insert($data,$tbl){
    global $dbh;
    ksort($data);
    $keys=array_keys($data);
    $bd="`".implode($keys,"`,`")."`";
    $vals="'".implode($data,"','")."'";
    $stmt=$dbh->prepare("INSERT INTO `$tbl` (".$bd.") VALUES (".$vals.")");
    $stmt->execute();
    $resId= $dbh->lastInsertId();
    // print_r($resId);
    return $resId;
}

function update($data,$where,$table)
{
    global $dbh;
    global $updateVals;
    ksort($data);
    // print_r($data);
    $keys=array_keys($data);
    $bd="`".implode($keys,"`=.`")."`=";
    $pki=":".implode($keys,",:");
    $pkey=explode(",",$pki);
    // Makers
    $vals=implode($data,",");
    $valsArr=explode(",",$vals);
    $keyArr=explode(".",$bd);
    foreach ($keyArr as $key => $value) {
        // $updateVals= $value.$pkey[$key].",";
        // echo $updateVals;
        $updateVals.= $value."'".$valsArr[$key]."',";
        
    }
   $updateVals= rtrim($updateVals,",");
//    track_id
    $sql="UPDATE `$table` SET $updateVals WHERE `id` = '$where'";
    
    $stmt=$dbh->prepare($sql);
    if($stmt->execute()){
        // echo "Updated";
        return true;
    }else{
        return false;
    }

    // $resId= $dbh->lastInsertId();
    // print_r($resId);
    // return $resId;
   
        // print_r($bd);
        // print_r($vals);
        // print_r($keyArr);
        // print_r($valsArr);
    // print_r($data);


    
}
function delete()
{
    # code...
}

function select($sql,$dbh=null)
{
    global $dbh;
    $stmt=$dbh->prepare("SELECT * FROM `$sql`");
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}

function selectList($table,$fields){
    global $dbh;
    $vals=implode($fields,",");
    // SELECT first_name,last_name from login
    
    $stmt=$dbh->prepare("SELECT $vals FROM `$table`");
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}
/**
SELECT column_name(s)
FROM table_name
WHERE column_name IN (value1, value2, ...);
***/
function selectListByIDWithCond($tbl1,$tbl2,$tbl2Field,$id){
    global $dbh;
    $field=array_keys($id)[0];
    $id=$id[$field];
    $stmt=$dbh->prepare("
        SELECT *
FROM $tbl1
WHERE id IN (SELECT $tbl2Field FROM $tbl2 WHERE `$field`='$id')
");
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}

function login($username=null,$password=null,$dbh=null)
{
    global $dbh;
    $sql="SELECT * FROM `login` WHERE `user_email` = '$username' AND `user_password` = '$password' LIMIT 1";
    // var_dump($dbh);
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $count=$stmt->rowCount();
    if($count>0){
        $rs=$stmt->fetchAll();
        return $rs;
    }else{
        return false;
    }
}

function singleSelect($tid,$items,$table)
{
    
    global $dbh;
    $vals=implode($items,",");
    $sql="SELECT $vals FROM `$table` WHERE `id` = '$tid' ";
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $count=$stmt->rowCount();
    if($count>0){
        $rs=$stmt->fetchAll();
        return $rs;
    }else{
        return false;
    }
}

function searchSelect($key,$value,$table)
{
    global $dbh;
    $key=strtolower($key);
    $sql="SELECT * FROM `$table` WHERE `$key`LIKE'%$value%'";
    $stmt=$dbh->prepare($sql);
    if($stmt->execute()){
        $count=$stmt->rowCount();
        if($count>0){
            $rs=$stmt->fetchAll();
            return $rs;    
        }else{
            return false;
        }
        
    }else{
        return false;
    }
}
function deleteByTid($tid,$tbl){
    global $dbh;

    $sql="DELETE FROM `$tbl` WHERE `$tbl`.`id` = '$tid'";
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    if(isset($count) && !empty($count)){
        return true;
    }else{
        return false;
    }
}  
// Peculiar functions
 
 function selectAssociatedGroupsByID($sql,$dbh=null)
{
    global $dbh;
    $stmt=$dbh->prepare("SELECT * FROM `$sql`");
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}

function checkIfMemberAlreadyExistInGroup($group_id,$member_id)
{
    global $dbh;//groups_devices
    $stmt=$dbh->prepare("SELECT * FROM grooup_members WHERE group_id = '$group_id' AND member_id ='$member_id'");
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}

function checkIfDeviceAlreadyExistInGroup($device_id,$group_id)
{
    global $dbh;//groups_devices
    $stmt=$dbh->prepare("SELECT * FROM groups_devices WHERE device_id = '$device_id' AND group_id ='$group_id'");
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}

function checkIfDeviceAlreadyAssignedToUser($user_id,$device_id,$tbl){
    global $dbh;
    $stmt=$dbh->prepare("SELECT * FROM $tbl WHERE user_id = '$user_id' AND device_id ='$device_id'");
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}
 
function counts($tbl,$key=null,$val=null){
    global $dbh;
    $suffix="_count";
    if(isset($val) && !empty($val) && $val!=null){
        $sql="SELECT count(*) as '$val' FROM $tbl WHERE $key = '$val'";
    }else{
        $sql="SELECT count(*) as '$tbl$suffix' FROM $tbl";
    }
    
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}


function usersCounts($tbl,$key=null,$val=null){
    global $dbh;
    $suffix="_count";
    if($key=="member_id"){
        $suffix="group_count";
    }else{
        $suffix=$tbl.$suffix;
    }
        $sql="SELECT count(*) as '$suffix' FROM $tbl WHERE $key = '$val'";
    
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $rs=$stmt->fetchAll();
    return $rs;
}

}

?>