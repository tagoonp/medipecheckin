<?php
session_start();
if($_SESSION['id'] != session_id()){
    header('Location: ../');
    die();
}

include "../config.inc.php";
include "../connect.inc.php";
if((!isset($_GET['uid'])) || (!isset($_GET['role']))){
    header('Location: ../');
    die();
}

$uid = mysqli_real_escape_string($conn, $_GET['uid']);
$role = mysqli_real_escape_string($conn, $_GET['role']);

$mn = 2;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>EPI-Online Course Admin</title>
  <!-- Favicon -->
  <link rel="icon" href="../vendor/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../vendor/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../vendor/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../node_modules/preload.js/dist/css/preload.css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../vendor/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../img/logo-1.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <?php require_once("./componants/menu.php"); ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../vendor/assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../vendor/assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../vendor/assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../vendor/assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../vendor/assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../vendor/assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Create new course</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="index?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>">Dashboards</a></li>
                  <li class="breadcrumb-item"><a href="course?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>">Course</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="course?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>" class="btn btn-sm btn-neutral">Course list</a>
              <a href="course-category?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>" class="btn btn-sm btn-neutral">Course category</a>
            </div>
          </div>
          <!-- Card stats -->

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col-12">

          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">

            </div>
            <div class="card-body pt-0">
              <form class="courseForm" onsubmit="return false;">
                <div class="form-group">
                  <label for="">Course full name : <i class="fas fa-exclamation-circle text-danger"></i></label>
                  <input type="text" name="txtTitle" id="txtTitle"  class="form-control text-dark" placeholder="Course full name / title ...">
                </div>
                <div class="form-group">
                  <label for="">Course short description : </label>
                  <textarea class="form-control" id="txtDesc" style="height: 100px;"></textarea>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label for="">Price (USD) : <i class="fas fa-exclamation-circle text-danger"></i></label>
                      <input type="number" name="txtPrice" id="txtPrice" value="0" class="form-control" placeholder="Enter only number ..." min ="0" max="3000">
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label for="">Category : <i class="fas fa-exclamation-circle text-danger"></i></label>
                      <select class="form-control" name="txtCat" id="txtCat">
                        <option value="">-- Choose --</option>
                        <?php
                        $strSQL = "SELECT * FROM rs3x_course_category WHERE 1";
                        $result = mysqli_query($conn, $strSQL);
                        if(($result) && (mysqli_num_rows($result))){
                          while($row = mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $row['ID'];?>"><?php echo $row['cc_name']; ?></option>
                            <?php
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label for="">Start date : <i class="fas fa-exclamation-circle text-danger"></i></label>
                      <div class="row">
                        <div class="col-4">
                          <select class="form-control" name="txtStartDD" id="txtStartDD">
                            <option value="">-- DD --</option>
                            <?php
                            for ($i=1; $i <= 31; $i++) {
                              if($i < 10){
                                ?>
                                <option value="<?php echo "0".$i; ?>"><?php echo $i; ?></option>
                                <?php
                              }else{
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-4">
                          <select class="form-control" name="txtStartMM" id="txtStartMM">
                            <option value="">-- MM --</option>
                            <?php
                            for ($i=0; $i < 12; $i++) {
                              ?>
                              <option value="<?php echo $months_no[$i]; ?>"><?php echo $months[$i]; ?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-4">
                          <select class="form-control" name="txtStartYY" id="txtStartYY">
                            <option value="">-- YYYY --</option>
                            <?php
                            for ($i=date('Y') + 1; $i> (date('Y') - 3); $i--) {
                              ?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label for="">End date : <span class="text-muted">(Leave blank if not enable)</span> </label>
                      <div class="row">
                        <div class="col-4">
                          <select class="form-control"  name="txtEndDD" id="txtEndDD">
                            <option value="">-- DD --</option>
                            <?php
                            $start = $courseData['course_end'];
                            $start_arr = explode("-", $start);
                            for ($i=1; $i <= 31; $i++) {
                              if($i < 10){
                                ?>
                                <option value="<?php echo "0".$i; ?>"><?php echo $i; ?></option>
                                <?php
                              }else{
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }

                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-4">
                          <select class="form-control" name="txtEndMM" id="txtEndMM">
                            <option value="">-- MM --</option>
                            <?php
                            for ($i=0; $i < 12; $i++) {
                              ?>
                              <option value="<?php echo $months_no[$i]; ?>"><?php echo $months[$i]; ?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-4">
                          <select class="form-control" name="txtEndYY" id="txtEndYY">
                            <option value="">-- YYYY --</option>
                            <?php
                            for ($i=date('Y') + 1; $i> (date('Y') - 3); $i--) {
                              ?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="">Course content : </label>
                  <textarea class="form-control" id="txtContent" name="txtContent"></textarea>
                </div>

                <!-- <div class="form-group">
                  <label for="">Course slider image : </label>
                  <textarea class="form-control"></textarea>
                </div> -->

                <div class="form-group text-right">
                  <button type="submit" name="button" class="btn btn-primary">Create</button>
                  <button type="button" name="button" class="btn btn-secondary" onclick="window.location = 'course?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>'">Cancel</button>
                </div>

              </form>
            </div>

          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../vendor/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../vendor/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../vendor/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../vendor/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <!-- Optional JS -->
  <script src="../vendor/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../vendor/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="../node_modules/ckeditor_full/ckeditor.js"></script>
  <script src="../node_modules/preload.js/dist/js/preload.js"></script>
  <!-- Argon JS -->
  <script src="../vendor/assets/js/argon.js?v=1.2.0"></script>

  <script src="../assets/custom/1.0.1/js/config.js"></script>
  <script src="../assets/custom/1.0.1/js/core.js"></script>
  <script src="../assets/custom/1.0.1/js/authen.js"></script>

  <script type="text/javascript">
    var editor_desc = null
    var editor_content = null
    preload.hide()

    $(document).ready(function() {
      if($("#txtDesc").length) {
          editor_desc = CKEDITOR.replace( 'txtDesc', {
              wordcount : {
              showCharCount : false,
              showWordCount : true,
              },
              height: '200px'
          });
      }

      if($("#txtContent").length) {
          editor_content = CKEDITOR.replace( 'txtContent', {
              wordcount : {
              showCharCount : false,
              showWordCount : true,
              },
              height: '250px'
          });
      }
    });

    $(function(){
      $('.courseForm').submit(function(){
        $check = 0;
        $('.form-control').removeClass('is-invalid')
        if($('#txtTitle').val() == ''){$check++; $('#txtTitle').addClass('is-invalid'); }
        if($('#txtPrice').val() == ''){$check++; $('#txtPrice').addClass('is-invalid'); }
        if($('#txtStartDD').val() == ''){$check++; $('#txtStartDD').addClass('is-invalid'); }
        if($('#txtStartMM').val() == ''){$check++; $('#txtStartMM').addClass('is-invalid'); }
        if($('#txtStartYY').val() == ''){$check++; $('#txtStartYY').addClass('is-invalid'); }
        if($('#txtCat').val() == ''){$check++; $('#txtCat').addClass('is-invalid'); }
        if($check != 0){ $('#errorModal').modal(); return ;}

        $end = '';
        if($('#txtEndDD').val() != ''){
          $end = $('#txtEndYY').val() + '-' + $('#txtEndMM').val() + '-' + $('#txtEndDD').val()
        }
        preload.show()
        var param = {
          title: $('#txtTitle').val(),
          price: $('#txtPrice').val(),
          start: $('#txtStartYY').val() + '-' + $('#txtStartMM').val() + '-' + $('#txtStartDD').val(),
          end: $end,
          category: $('#txtCat').val(),
          desc: editor_desc.getData(),
          content: editor_content.getData(),
          uid: current_user,
          token: current_token,
          role: current_role
        }
        var jxr = $.post(conf.api + 'course_manage?stage=create', param, function(){}, 'json')
                   .always(function(snap){
                     console.log(snap);
                     if(fnc.json_exist(snap)){
                       snap.forEach(i=>{
                         if(i.status == 'success'){
                           preload.hide()
                           $('#successModal').modal({backdrop: 'static', keyboard: false})
                         }else{
                           preload.hide()
                           $('#errorModal2').modal()
                         }
                       })
                     }else{
                       $('#errorModal2').modal()
                       preload.hide()
                     }
                   })
        return ;
      })
    })

  </script>
</body>

</html>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999 !important;">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: none;"></div>
      <div class="modal-body pt-0">
        <div class="text-center pb-3">
          <img src="../img/success.png" alt="" style="max-width: 100px;">
          <h2 class="text-center pb-0 pt-3 mb-0">Success</h2>
          <div class="p-3">
            <p>Create success</p>
            <button type="button" name="button" class="btn btn-primary btn-block"  onclick="window.location = 'course?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>'">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999 !important;">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: none;"></div>
      <div class="modal-body pt-0">
        <div class="text-center pb-3">
          <img src="../img/warning.png" alt="" style="max-width: 100px;">
          <h2 class="text-center pb-0 pt-3 mb-0">Error</h2>
          <div class="p-3">
            <p>Please enter all require field with <i class="fas fa-exclamation-circle text-danger"></i> symbol.</p>
            <button type="button" name="button" class="btn btn-primary btn-block" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999 !important;">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: none;"></div>
      <div class="modal-body pt-0">
        <div class="text-center pb-3">
          <img src="../img/warning.png" alt="" style="max-width: 100px;">
          <h2 class="text-center pb-0 pt-3 mb-0">Error</h2>
          <div class="p-3">
            <p>Can not create course.</p>
            <button type="button" name="button" class="btn btn-primary btn-block" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
