<?php
session_start();
require_once('./config.inc.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>แบบประเมินการตอบสนองและการรู้จำต่อผลิตภัณฑ์ที่เกี่ยวข้องกับธุรกิจเครื่องดื่มแอลกอฮอล์</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <link rel="stylesheet" href="./node_modules/jquery.mobile-1.4.5/jquery.mobile-1.4.5.css">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" >
        <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.css">
        <link rel="stylesheet" href="./node_modules/sweetalert/dist/sweetalert.css">
        <link rel="stylesheet" href="./node_modules/preload.js/dist/css/preload.css">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="./assets/custom/1.0.1/css/style.css">
    </head>
    <body>
      <div data-role="page" id="app" style="background: #ffffff;">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center pt-5">
              <img src="./img/logo-epidemiology-unit.png" alt="" style="width: 300px;">
            </div>
            <div class="col-12 col-sm-6 offset-sm-3 pt-4">
              <div class="card mb-5" style="border: none; background-: rgb(250, 250, 250);">
                <div class="card-body">
                  <div class="text-center pb-3">
                    <img src="./img/success.png" alt="" style="width: 150px;">
                    <h3 class="mt-3" style="font-weight: 400 !important;">Check-in success</h3>
                  </div>

                  <div class="text-center">
                    <div class="pt-3">
                      QR code for check-out
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    <script type="text/javascript" src="./node_modules/jquery.mobile-1.4.5/js/jquery.min.js"></script>
    <script type="text/javascript" src="./node_modules/jquery.mobile-1.4.5/js/jquery.mobile-1.4.5.js"></script>
    <script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="./node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="./node_modules/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="./node_modules/preload.root.js/dist/js/preload.js"></script>

    <script type="text/javascript" src="./assets/custom/1.0.1/js/config.js" ></script>
    <script>

        $(document).ready(function(){
          preload.hide()
          if(current_user != null){
            var param = {
              uid: current_user
            }
            var jxr = $.post(conf.api + 'set-stage?stage=in', param, function(){}, 'json')
          }else{
            window.location = './'
          }
        })
    </script>
</html>
