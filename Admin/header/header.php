<?php
session_start();
include('../config.php');
include('functions.php');
if(!isset($_SESSION['id']))
{
  // header()
  header('Location:logout.php');
  // echo "<script>";
  // echo 'window.location.href="Dashboard.php";'; 
  // echo "</script>";
}

$userrole=$_SESSION['usertype'];
?>

<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Online Restorent</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/prism/prism.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
  <!-- search in select tag code  -->
  <link rel="stylesheet" href="chosen.css" />
  
  <!-- ends searching code  -->


  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> 
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="Dashboard.php" class="mt-5"> <p>Admin</p> 
            </a>
          </div>
          <?php


if($userrole=="admin")
{?>
<!-- Admin menu goes here  -->
<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="Dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="check-circle"></i><span>Manage Menu card</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="categorymaster.php">Manage Category</a></li>
                  <li><a class="nav-link" href="managemenu.php">Manage Menu</a></li>
                </ul>
              </li>

              <a href="customers.php" class="nav-link"><i data-feather="shopping-cart"></i><span> Manage Orders</span></a></li>
             

              <!-- <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="truck"></i><span>Manage Transport</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="transporter.php">Manage Transporter</a></li>
                  <li><a class="nav-link" href="trucks.php">Manage Trucks</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Manage Challan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="newchallan.php">Create New challan</a></li>
                  <li><a class="nav-link" href="manageallchallanrecord.php">Manage challan</a></li>
                  <li><a class="nav-link" href="viewallchallanrecord.php">View All</a></li>
                </ul>
              </li>

            

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span>Manage Transaction</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="createrecipt.php">create new Recipt</a></li>
                  <li><a class="nav-link" href="trucks.php">View All</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="folder-plus"></i><span>Manage Expences</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="createexpence.php">Create Expence Record</a></li>
                  <li><a class="nav-link" href="viewallexpences.php">View All</a></li>
                </ul>
              </li>
              <li class="dropdown">
              <a href="services.php" class="nav-link"><i data-feather="repeat"></i><span>Manage Service</span></a>
            </li>
             <li class="dropdown">
              <a href="ledgerreport.php" class="nav-link"><i data-feather="file-text"></i><span>Ledger Report</span></a>
            </li> -->

            <!-- <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Reports</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="ledgerreport.php">Ledger Report</a></li>
                  <li><a class="nav-link" href="monthledgerreport.php">Month Wise Report</a></li>
                </ul>
              </li> --> 

            <li class="dropdown">
              <a href="managecomapany.php" class="nav-link"><i data-feather="home"></i><span>Manage Restorent</span></a>
            </li>

            
          </ul>
<?php
}
if($userrole=="manager")
{?>
<!-- Manager Menu Goes Here -->
<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="Dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              <a href="customers.php" class="nav-link"><i data-feather="user"></i><span>Manage Party</span></a></li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Manage Goods</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="Goods.php">Goods Manager</a></li>
                  <li><a class="nav-link" href="range.php">Range Manager</a></li>
                </ul>
              </li>

              <!-- <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="truck"></i><span>Manage Transport</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="transporter.php">Manage Transporter</a></li>
                  <li><a class="nav-link" href="trucks.php">Manage Trucks</a></li>
                </ul>
              </li> -->

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Manage Challan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="newchallan.php">Create New challan</a></li>
                  <li><a class="nav-link" href="manageallchallanrecord.php">Manage challan</a></li>
                  <li><a class="nav-link" href="viewallchallanrecord.php">View All</a></li>
                </ul>
              </li>

            

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span>Manage Transaction</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="createrecipt.php">create new Recipt</a></li>
                  <li><a class="nav-link" href="trucks.php">View All</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="folder-plus"></i><span>Manage Expences</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="createexpence.php">Create Expence Record</a></li>
                  <li><a class="nav-link" href="viewallexpences.php">View All</a></li>
                </ul>
              </li>
              <!-- <li class="dropdown">
              <a href="services.php" class="nav-link"><i data-feather="repeat"></i><span>Manage Service</span></a>
            </li> -->
            <!-- <li class="dropdown">
              <a href="ledgerreport.php" class="nav-link"><i data-feather="file-text"></i><span>Ledger Report</span></a>
            </li> -->

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Reports</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="ledgerreport.php">Ledger Report</a></li>
                  <li><a class="nav-link" href="monthledgerreport.php">Month Wise Report</a></li>
                </ul>
              </li>

            <!-- <li class="dropdown">
              <a href="managecomapany.php" class="nav-link"><i data-feather="home"></i><span>Manage Company</span></a>
            </li> -->

            
          </ul>
<?php 
}

?>
        </aside>
      </div>