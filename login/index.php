<?php
session_start();
require_once('../config.inc.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>แบบประเมินการตอบสนองและการรู้จำต่อผลิตภัณฑ์ที่เกี่ยวข้องกับธุรกิจเครื่องดื่มแอลกอฮอล์</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <link rel="stylesheet" href="../node_modules/jquery.mobile-1.4.5/jquery.mobile-1.4.5.css">
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">
        <link rel="stylesheet" href="../node_modules/sweetalert/dist/sweetalert.css">
        <link rel="stylesheet" href="../node_modules/preload.js/dist/css/preload.css">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../assets/custom/1.0.1/css/style.css">
    </head>
    <body>
      <div data-role="page" id="app" style="background: #ffffff;">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center pt-5">
              <img src="../img/logo-epidemiology-unit.png" alt="" style="width: 300px;">

            </div>
            <div class="col-12 col-sm-6 offset-sm-3 pt-4">
              <div class="card mb-5" style="border: none; background-: rgb(236, 236, 236);">
                <div class="card-body">
                  <h3 style="font-weight: 400 !important;">Epidemiology Unit Check-in</h3>
                  <h4 class="text-left tsdn">Core system login</h4>
                  <form class="loginform" onsubmit="return false;">
                    <div class="form-group">
                      <label for="" class="tsdn">E-mail address : <span class="text-danger">*</span> </label>
                      <input type="email" name="txtEmail" id="txtEmail" class="form-control" data-role="none">
                    </div>
                    <div class="form-group">
                      <label for="" class="tsdn">Password : <span class="text-danger">*</span> </label>
                      <input type="password" name="txtPassword" id="txtPassword" class="form-control" data-role="none">
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <button type="submit" name="button" class="btn btn-primary btn-block" data-role="none" id="btnlogin">Log in</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    <script type="text/javascript" src="../node_modules/jquery.mobile-1.4.5/js/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/jquery.mobile-1.4.5/js/jquery.mobile-1.4.5.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="../node_modules/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="../node_modules/preload.js/dist/js/preload.js"></script>

    <script type="text/javascript" src="../assets/custom/1.0.1/js/config.js" ></script>
    <script>

        $(document).ready(function(){
          console.log('asd');
          preload.hide()
          window.localStorage.removeItem(conf.prefix + 'uid')
          window.localStorage.removeItem(conf.prefix + 'role')
        })

        $(function(){
          $('.loginform').submit(function(){
            $check = 0
            $('.form-control').removeClass('is-invalid')
            if($('#txtEmail').val() == ''){ $check++; $('#txtEmail').addClass('is-invalid'); }
            if($('#txtPassword').val() == ''){ $check++; $('#txtPassword').addClass('is-invalid'); }
            if($check != 0){ console.log('error'); return ; }
            preload.show();
            var param = {
              username: $('#txtEmail').val(),
              password: $('#txtPassword').val()
            }
            var jxr = $.post(conf.api + 'authen?stage=login', param, function(){}, 'json')
                       .always(function(snap){
                         console.log(snap);
                         if((snap != '') && (snap.length > 0)){
                           snap.forEach(i=>{
                             if(i.status == 'success'){
                               current_user = i.uid
                               current_role = i.role
                               window.localStorage.setItem(conf.prefix + 'uid', current_user)
                               window.localStorage.setItem(conf.prefix + 'role', current_role)
                               window.location = '../' + current_role + '/?uid=' + current_user + '&role=' + current_role
                             }else{
                               preload.hide()
                               alert('Login error')
                             }
                           })
                         }else{
                           preload.hide()
                           alert('Login error')
                         }
                       })
          })
        })
    </script>
</html>
