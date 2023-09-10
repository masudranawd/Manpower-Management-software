
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $SiteData->title;?></title>

	 <link rel="icon" href="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" type="image/ico" />

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>Asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>Asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>Asset/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>Asset/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>Asset/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form" style="margin-top: 100px;">
          <section class="login_content">
                <div>
                  &nbsp; <?php echo $this->session->flashdata('msg'); ?>
                  <h2><i class="fa fa-paw"></i>MP Software</h2>
                </div>
            <form action="<?php echo base_url('User/Login_From/');?>" method="post">
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="user_id" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>

                    <div class="control-group">
                      <div class="controls">
                        <button type="submit" class="btn btn-primary">Login</button>  
                        
                      </div>
                    </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
