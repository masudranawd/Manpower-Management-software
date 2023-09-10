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

   
        <script src='<?php echo base_url();?>Asset/jquery-3.2.1.min.js' type='text/javascript'></script>
        <script src='<?php echo base_url();?>Asset/select2/dist/js/select2.min.js' type='text/javascript'></script>

        <link href='<?php echo base_url();?>Asset/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>



   
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
      
    @media print{ @page { margin-top: 0px; margin-left: 20px;margin-right: 20px;}}
  .table_border th, td {
      border: 1px solid #000;
      border-collapse: collapse;
      padding: 10px;color:#000;
  }
  
  .table_border th{
      border: 1px solid #000;
      border-collapse: collapse;
      padding: 10px;color:#000;
  }
  div.box{overflow: visible;}

    </style>

  </head>

  <body style="background-color: #fff;">

    <!---<div class="container body">
      <div class="main_container">
        <div class="col-md-1 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>Dashboard/Homepage" class="site_title"><i class="fa fa-paw"></i> <span><?php echo $SiteData->title;?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info --
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $pData->fullname;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info 
  
          </div>
        </div>
-->