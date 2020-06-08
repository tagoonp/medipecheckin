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

if($stage == 'login'){
  if(
      (!isset($_POST['username'])) ||
      (!isset($_POST['password']))
  ){
    $return[0]['status'] = 'error-1';
    echo json_encode($return);
    mysqli_close($conn);
    die();
  }

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = base64_encode(mysqli_real_escape_string($conn, $_POST['password']));

  $strSQL = "SELECT * FROM rs19_user WHERE username = '$username' AND password = '$password' AND login = 'Y' LIMIT 1";
  $result = mysqli_query($conn, $strSQL);
  if(($result) && (mysqli_num_rows($result) > 0)){
    $data = mysqli_fetch_assoc($result);

    $_SESSION['id'] = session_id();

    $return[0]['status'] = 'success';
    $return[0]['uid'] = $data['UID'];
    $return[0]['role'] = $data['role'];
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

  $strSQL = "UPDATE rs19_checkin_info SET coutdatetime = '$sysdatetime', cstage = 'complete' WHERE cuid = '$uid' AND cstage = 'in-complete'";
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
