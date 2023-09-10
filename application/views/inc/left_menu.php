<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="icon" href="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" type="image/ico" />

    <title><?php echo $SiteData->title;?></title></title>

   
    <link href="<?php echo base_url();?>Asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>Asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>Asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url();?>Asset/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>Asset/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    
    <link href="<?php echo base_url();?>Asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>Asset/build/css/custom.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="<?php echo base_url();?>Asset/js/choosen.js"></script>
    <link href="<?php echo base_url();?>Asset/css/style.css" rel="stylesheet">
    <style type="text/css">
      
    @media print{ @page { margin-top:30px; margin-bottom: 30px; margin-left: 20px;margin-right: 20px; page-break-before: always;}}
    
 
    .no-print button{
        margin-top:20px;
        background:#000 !important;
        color:#FFF;
    }
    
   .btn {
      color:#fff;
    }
    
    .tablewhite th{
        color:#fff;
    }
    .tablewhite td{
        color:#fff;
    }
    
    .table_border th, td {
      border: 1px solid #000;
      border-collapse: collapse;
      padding: 5px;color:#000;
  }

    </style>
  
  </head>

  <body class="nav-md">

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>Dashboard/Homepage" class="site_title"><i class="fa fa-paw"></i> <span><?php echo $SiteData->title;?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $pData->fullname;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

    <?php 
        if ($pData->types == 'Admin') {
    ?>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="<?php echo base_url();?>Dashboard/Homepage"><i class="fa fa-home"></i>Home</a>
                  </li>

                  <li><a><span class="glyphicon glyphicon-user"></span> Customer Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Customer">Add New Customer</a></li>
                      <li><a href="<?php echo base_url();?>AllCustomer">All Customer</a></li>
                      <li><a href="<?php echo base_url();?>CustomerStatus"> Customer Status</a></li>
                      <li><a href="<?php echo base_url();?>CustomerAttachFile">Customer File Attach </a></li>
                      <li>
                        <a  href="<?php echo base_url('')?>EmbassyReport">Embassy Report</a>
                      </li>
                    </ul>
                  </li> 

                  <li><a><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Agent Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Agent">Add New Agent</a></li>
                      <li><a href="<?php echo base_url();?>AllAgent">All Agent</a></li>
                      <li><a href="<?php echo base_url();?>AgentReport">Agent Report </a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Account <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>deposit">Add Receive</a></li>
                      <li><a href="<?php echo base_url();?>Cost">Add Expense</a></li>
                      <li><a href="<?php echo base_url();?>BossReceive">Boss Receive</a></li>
                      <li><a href="<?php echo base_url();?>paylist">All Receive List</a></li>
                      <li><a href="<?php echo base_url();?>AllCost">All Expense List</a></li>
                      <li><a href="<?php echo base_url();?>Report">Report</a></li>
                    </ul>
                  </li>
   
                 <li><a><span class=" glyphicon glyphicon-plane" aria-hidden="true"></span> Ticket Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> <li>
                    <a href="<?php echo base_url();?>Ticket"> <span class=" glyphicon glyphicon-plane" aria-hidden="true"></span> Ticket Booking</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>AllTicket"> <span class=" glyphicon glyphicon-plane" aria-hidden="true"></span> All  Booking Ticket</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>TicketReport"> <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Report</a>
                      
                  </li>
                    </ul>
                  </li>
                  
             
                  
                   <li><a><i class="fa fa-edit"></i>  Voucher Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Addvoucher">Add Voucher</a></li>
                      <li><a href="<?php echo base_url();?>Allvoucher">All Voucher</a></li>
                    </ul>
                  </li>
                  
                <li><a><i class="fa fa-edit"></i> Dolar Payment <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>DolarPayment">Dolar Payment </a></li>
                      <li><a href="<?php echo base_url();?>DolarPayList">All List </a></li>
                      <li><a href="<?php echo base_url();?>DolarPayReport">Report</a></li>

                    </ul>
                  </li>
                  
                  <!-- 
                   <li><a><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Employee Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>AddEmployee">Add New Employee</a></li>
                      <li><a href="<?php echo base_url();?>AllEmployee">All Employee</a></li>
                      <li><a href="<?php echo base_url();?>AgentReport">Employee Report </a></li>
                    </ul>
                  </li> -->
<!-- 
                <li><a><i class="fa fa-edit"></i>ManPower<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>ManPower">Add ManPower</a></li>
                      <li><a href="<?php echo base_url();?>ManPowerView">View</a></li>

                    </ul>
                  </li> -->

                  <li><a><i class="fa fa-edit"></i>System Administration <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>AddUser">Add New User</a></li>
                      <li><a href="<?php echo base_url();?>AllUser">All User </a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-cog" style="font-size: 17px;"></i>&nbsp;Setting<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Genarel">Genarel Setting</a></li>
                       <li><a href="<?php echo base_url();?>PayMethod">Payment Method</a></li>
                      <li><a href="<?php echo base_url();?>Category">Category And Type</a></li>
                      <li><a href="<?php echo base_url();?>ExpensesCatgory">Expenses Catygory</a></li>
                      <li><a href="<?php echo base_url();?>ReceiveCategory">Receive  Category</a></li>
                    </ul>
                  </li>


              </div>


            </div>
            <!-- /sidebar menu -->

    <?php
        }if ($pData->types == 'Ticket') {
    ?>
     
  <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="<?php echo base_url();?>Dashboard/Homepage"><i class="fa fa-home"></i>Home</a>
                  </li>
                   <li>
                    <a href="<?php echo base_url();?>Ticket"> <span class=" glyphicon glyphicon-plane" aria-hidden="true"></span> Ticket Booking</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>AllTicket"> <span class=" glyphicon glyphicon-plane" aria-hidden="true"></span> All  Booking Ticket</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>TicketReport"> <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Report</a>
                      
                  </li>

                  
              
                   

              </div>


            </div>
            <!-- /sidebar menu -->


    <?php
        }if ($pData->types == 'Manager') {
    ?>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-edit"></i> Customer Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>AllCustomer">All Customer</a></li>
                      <li><a href="<?php echo base_url();?>CustomerStatus"> Customer Status</a></li>
                      <li><a href="<?php echo base_url();?>CustomerAttachFile">Customer File Attach </a></li>
                    </ul>
                  </li> 


                  <li><a><i class="fa fa-table"></i>Report<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>ExpensesReport">Expense Report</a></li>

                    </ul>
                  </li>
           <li><a><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Employee Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>AddEmployee">Add New Employee</a></li>
                      <li><a href="<?php echo base_url();?>AllEmployee">All Employee</a></li>
                      <li><a href="<?php echo base_url();?>AgentReport">Employee Report </a></li>
                    </ul>
                  </li>

              </div>


            </div>
            <!-- /sidebar menu -->


    <?php
        }if ($pData->types == 'Operator') {
    ?>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-edit"></i> Customer Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Customer">Add New Customer</a></li>
                      <li><a href="<?php echo base_url();?>AllCustomer">All Customer</a></li>
                      <li><a href="<?php echo base_url();?>CustomerStatus"> Customer Status</a></li>
                      <li><a href="<?php echo base_url();?>CustomerAttachFile">Customer File Attach </a></li>
                    </ul>
                  </li> 

                <li><a><i class="fa fa-edit"></i>ManPower<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>ManPower">Add ManPower</a></li>
                      <li><a href="<?php echo base_url();?>ManPowerView">View</a></li>

                    </ul>
                  </li>



              </div>


            </div>
            <!-- /sidebar menu -->

    <?php
        }if ($pData->types == 'Editor') {
    ?>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Customer Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Customer">Add New Customer</a></li>
                      <li><a href="<?php echo base_url();?>AllCustomer">All Customer</a></li>
                      <li><a href="<?php echo base_url();?>CustomerStatus"> Customer Status</a></li>
                      <li><a href="<?php echo base_url();?>CustomerAttachFile">Customer File Attach </a></li>
                    </ul>
                  </li> 

                  <li><a><i class="fa fa-edit"></i> Agent Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Agent">Add New Agent</a></li>
                      <li><a href="<?php echo base_url();?>AllAgent">All Agent</a></li>
                      <li><a href="<?php echo base_url();?>AgentReport">Agent Report </a></li>
                    </ul>
                  </li>


                  <li><a><i class="glyphicon glyphicon-cog" style="font-size: 17px;"></i>&nbsp;Setting<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>Genarel">Ganeral  Setting </a></li>
                      <li><a href="<?php echo base_url();?>Category">Category And Type </a></li>
                      <li><a href="<?php echo base_url();?>ExpensesCatgory">Expense Type</a></li>
                      <li><a href="<?php echo base_url();?>CashINOutCategory">CashIn And Out Type</a></li>
                    </ul>
                  </li>

           <li><a><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Employee Panel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>AddEmployee">Add New Employee</a></li>
                      <li><a href="<?php echo base_url();?>AllEmployee">All Employee</a></li>
                      <li><a href="<?php echo base_url();?>AgentReport">Employee Report </a></li>
                    </ul>
                  </li>


              </div>


            </div>
            <!-- /sidebar menu -->

     <?php
        }if ($pData->types == 'Accounts') {
    ?>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <li>
                    <a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Account Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>DateWais">Add Ladger</a></li>
                      <li><a href="<?php echo base_url();?>CashReport">Cash Report</a></li>
                      <li><a href="<?php echo base_url();?>CustomerPaymentReport">Customer Payment Report</a></li>
                    </ul>
                  </li>

              </div>
            </div>
            <!-- /sidebar menu -->
    <?php    
        }
        
    ?>


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('User/Logout/'); ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
