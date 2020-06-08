<?php
session_start();
require_once('../config.inc.php');

$return = array();

if(!isset($_GET['stage'])){
  $return[0]['status'] = 'error-1';
  echo json_encode($return);
  mysqli_close($conn);
  die();
}

$stage = mysqli_real_escape_string($conn, $_GET['stage']);

if($stage == 'innew'){
  if(
      (!isset($_POST['pid'])) ||
      (!isset($_POST['fullname']))
  ){
    $return[0]['status'] = 'error-1';
    echo json_encode($return);
    mysqli_close($conn);
    die();
  }

  $pid = mysqli_real_escape_string($conn, $_POST['pid']);
  $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);

  $uid = base64_encode($sysdateu);
  $strSQL = "INSERT INTO rs19_user (UID, PID, Fullname, Regdatetime) VALUES ('$uid', '$pid', '$fullname', '$sysdatetime')";
  $resultInsert = mysqli_query($conn, $strSQL);
  if($resultInsert){
    // $strSQL = "INSERT INTO rs19_checkin_info (cindatetime, cip, cuid) VALUES ('$sysdatetime', '$ip', '$uid')";
    // $resultInsert2 = mysqli_query($conn, $strSQL);
    // if($resultInsert2){
    //   $return[0]['status'] = 'success';
    //   $return[0]['uid'] = $uid;
    //   $return[0]['role'] = 'common';
    // }else{
    //   $return[0]['status'] = 'error-3';
    // }

    $return[0]['status'] = 'success';
    $return[0]['uid'] = $uid;
    $return[0]['role'] = 'common';

  }else{
    $return[0]['status'] = 'error-2';
  }

  echo json_encode($return);
  mysqli_close($conn);
  die();
}

if($stage == 'in'){
  if(
      (!isset($_POST['uid']))
  ){
    $return[0]['status'] = 'error-1';
    echo json_encode($return);
    mysqli_close($conn);
    die();
  }

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);

  $strSQL = "INSERT INTO rs19_checkin_info (cindatetime, cip, cuid) VALUES ('$sysdatetime', '$ip', '$uid')";
  $resultInsert = mysqli_query($conn, $strSQL);
  if($resultInsert){
    $return[0]['status'] = 'success';
    $return[0]['uid'] = $uid;
  }else{
    $return[0]['status'] = 'error-2';
  }
  echo json_encode($return);
  mysqli_close($conn);
  die();
}

if($stage == 'out'){
  if(
      (!isset($_POST['uid']))
  ){
    $return[0]['status'] = 'error-1';
    echo json_encode($return);
    mysqli_close($conn);
    die();
  }

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);

  $strSQL = "UPDATE rs19_checkin_info SET coutdatetime = '$sysdatetime', cstage = 'complete' WHERE cuid = '$uid' AND cstage = 'in-complete' AND DATE(cindatetime) = '$sysdate'";
  $resultUpdate = mysqli_query($conn, $strSQL);
  if($resultUpdate){
    $return[0]['status'] = 'success';
    $return[0]['uid'] = $uid;
  }else{
    $return[0]['status'] = 'error-2';
  }
  echo json_encode($return);
  mysqli_close($conn);
  die();
}





?>
