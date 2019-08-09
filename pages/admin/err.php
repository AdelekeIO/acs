<?php 

$subpart='';
function getFeeds($param,$myid,$usertype) {
    $parm= strtolower($param);
    $options=array('feeds','course','funds','mentors','improvefeeds-following');
        switch ($parm) {
            case $options[0]:
             $subpart="mentordashboard/";   
                break;
            case $options[1]:
            $subpart="courses/";   
            break;
            case $options[2]:
            $subpart="funds/";   
            break;
            case $options[3]:
            $subpart="mentors/";   
            break;
            default:
            case $options[4]:
            $subpart="/improvefeeds-following/";   
            break;
            default:
                $subpart="/mentordashboard/";
                $subpart="mentordashboard/";
                break;
        }
    $content= getJsonContent($subpart,$myid,$usertype);
    return $content;
}
    
        
function getJsonContent($param,$myid,$usertype) {
    try {

        
//        $APIURL='https://trubeautyng.com/subdomins/mapport/';
//        $res_json= file_get_contents(APIURL.$param.$myid."/".$usertype."");
        $res_json= loadurl(APIURL.$param.$myid."/".$usertype."");
//        $feeds= json_decode($res_json,TRUE);
//        print_r($res_array);
        return $res_json;
        } catch (Exception $e) {
//            echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo '<div class="alert alert-danger outPopUp" style="font-size: 17px;color: red;position: absolute;height: 200px;z-index: 15;top: 60%;left: 50%;margin: -100px 0 0 -150px;">An error occure please . check your network connection and try again</div>';
 
        }
        
}
// function FunctionName($value='')
// {
//     # code...
// }
?>    
