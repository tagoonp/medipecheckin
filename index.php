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
              <div class="card mb-5" style="border: none; background: rgb(236, 236, 236);">
                <div class="card-body">
                  <h3 style="font-weight: 400 !important;">Epidemiology Unit Check-in</h3>
                  <h4 class="text-left tsdn">Registration for first check-in</h4>
                  <form class="regform" onsubmit="return false;">
                    <div class="form-group">
                      <label for="" class="tsdn">Personnal ID / Student ID / Phone number : <span class="text-danger">*</span> </label>
                      <input type="text" name="txtPid" id="txtPid" class="form-control" data-role="none">
                    </div>
                    <div class="form-group">
                      <label for="" class="tsdn">Full name : <span class="text-danger">*</span> </label>
                      <input type="text" name="txtFullname" id="txtFullname" class="form-control" data-role="none">
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-12 text-center">
                      <button type="button" name="button" class="btn btn-outline-primary" data-role="none" id="btnCreateSession">Submit</button>
                    </div>
                  </div>
                  <input type="hidden" name="txtSession" id="txtSession" value="<?php echo $current_session; ?>">
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
            window.location = 'checkin'
            return ;
          }
        })

        $(function(){
          $('#btnCreateSession').click(function(){
            $check = 0
            $('.form-control').removeClass('is-invalid')
            if($('#txtPid').val() == ''){ $check++; $('#txtPid').addClass('is-invalid'); }
            if($('#txtFullname').val() == ''){ $check++; $('#txtFullname').addClass('is-invalid'); }
            if($check != 0){ return ; }
            preload.show();
            var param = {
              pid: $('#txtPid').val(),
              fullname: $('#txtFullname').val()
            }
            var jxr = $.post(conf.api + 'set-stage?stage=innew', param, function(){}, 'json')
                       .always(function(snap){
                         if((snap != '') && (snap.length > 0)){
                           snap.forEach(i=>{
                             if(i.status == 'success'){
                               current_user = i.uid
                               current_role = i.role
                               window.localStorage.setItem(conf.prefix + 'uid', current_user)
                               window.localStorage.setItem(conf.prefix + 'role', current_role)
                               window.location = 'checkin-success'
                             }else{
                               preload.hide()
                               window.location = 'checkin-error'
                             }
                           })
                         }else{
                           preload.hide()
                           window.location = 'checkin-error'
                         }
                       })
          })
        })
    </script>
</html>
