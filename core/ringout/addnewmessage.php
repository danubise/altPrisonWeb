#!/usr/bin/php -q
<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 26.09.18
 * Time: 20:44
 */

include("config.php");
include("mysqli.php");
include("log.php");
include("phpagi.php");

$config['log_write'] = "file"; //file
$db = new db($config['mysql']);
$log = new Log($config);
$log->SetGlobalIndex("ADDMESSAGE");
$recordedFileName = $config['soundepath'].$config['newmessagepath'].$config['newmessagename'].$config['newmessageext'];
$log->debug("Checking for new recorded file ".$recordedFileName);

if(file_exists($recordedFileName)){
    $log->debug("File exists ".$recordedFileName);
    $newFileName = date('d-m-y-H-i-s',time());
    $newFileShortName = $config['newmessagepath'].$newFileName;
    $newFilePath = $config['soundepath'].$newFileShortName.$config['newmessageext'];

    $log->debug("New name of the file ".$newFilePath);
    copy( $recordedFileName , $newFilePath);
    $db->insert("voicerecords",array(
        "filename" => $newFileShortName,
        "filepath" => $newFilePath,
        "description" => $newFileName));
    $log->debug($db->query->last);
}else{
    $log->error("File does not exists. Check file name in the dialplan");
}