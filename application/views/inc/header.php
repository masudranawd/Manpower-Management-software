 


 <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo base_url('User/userProfile');?>"> Profile</a>
                    <a class="dropdown-item"  href="<?php echo base_url('User/ChangePassword');?>"> Change Password</a>
<?php 
    if ($pData->types =='Admin') {
?>
                    <a class="dropdown-item"  href="<?php echo base_url('');?>Activity">Activity Log</a>
<?php } ?>
                    <a class="dropdown-item"  href="<?php echo base_url('User/Logout/'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
<?php 
    if ($pData->types =='Admin') {
?>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="<?php echo base_url('')?>customerPanel" type="button" class="btn btn-round btn-secondary">Customer Panel</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>AgentReport" type="button" class="btn btn-round btn-primary">Agent Panel</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>Report" type="button" class="btn btn-round btn-success">Cash Report </a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>CustomerTrainingFinger" type="button" class="btn btn-round btn-info">Traning Finger Print</a>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>EmbassyFile" type="button" class="btn btn-round btn-warning">Embassy File</a>
                </li>
<?php
    }elseif ($pData->types =='Manager') {
?>

                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>CustomerTrainingFinger" type="button" class="btn btn-round btn-info">Traning Finger Print</a>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>EmbassyFile" type="button" class="btn btn-round btn-warning">Embassy File</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a href="<?php echo base_url('')?>customerPanel" type="button" class="btn btn-round btn-secondary"> Customer Panel</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>AgentReport" type="button" class="btn btn-round btn-primary">Agent Panel</a>
                </li>
<?php
    }elseif ($pData->types =='Operator') {
?>

                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>CustomerTrainingFinger" type="button" class="btn btn-round btn-info">Traning Finger Print</a>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>EmbassyFile" type="button" class="btn btn-round btn-warning">Embassy File</a>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="<?php echo base_url('')?>customerPanel" type="button" class="btn btn-round btn-secondary"> Customer Panel</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>AgentReport" type="button" class="btn btn-round btn-primary">Agent Panel</a>
                </li>
<?php
    }elseif ($pData->types =='Accounts') {
?>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="<?php echo base_url('')?>customerPanel" type="button" class="btn btn-round btn-secondary"> Customer Panel</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>AgentReport" type="button" class="btn btn-round btn-primary">Agent Panel</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>CashReport" type="button" class="btn btn-round btn-success">Cash Report</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>CustomerPayment" type="button" class="btn btn-round btn-info">Customer Payment</a>
                </li>
<?php
    }elseif ($pData->types =='Editor') {
?>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="<?php echo base_url('')?>customerPanel" type="button" class="btn btn-round btn-secondary"> Customer Panel</a>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>AgentReport" type="button" class="btn btn-round btn-primary">Agent Panel</a>

                </li>
                
                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>CustomerTrainingFinger" type="button" class="btn btn-round btn-info">Traning Finger Print</a>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a  href="<?php echo base_url('')?>EmbassyFile" type="button" class="btn btn-round btn-warning">Embassy File</a>
                </li>
<?php 
    }
?>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
