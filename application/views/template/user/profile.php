    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel"  style="border:2px solid #000;">
                  <div class="x_title">
                    <h2>Profile  Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<?php //echo var_dump($Customerview);die();?>
                    <div class="col-md-12 col-sm-9 ">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>User Name</th>
                                  <th>:<?php echo $pData->user_id;?></th>
                                </tr>
                                <tr>
                                  <th>Full Name</th>
                                  <th>:<?php echo $pData->fullname;?></th>
                                </tr>

                                <tr>
                                  <th>Type</th>
                                  <th>:<?php echo $pData->types;?></th>
                                </tr>

                                <tr>
                                  <th>E-mail</th>
                                  <th>:<?php echo $pData->email;?></th>
                                </tr>

                                <tr>
                                  <th>Phone Number </th>
                                  <th>:<?php echo $pData->phone;?></th>
                                </tr>

                                <tr>
                                  <th style="width: 20%;">Address</th>
                                  <th>:<?php echo $pData->address;?></th>
                                </tr>

                              </thead>
                            </table>
                            <!-- end user projects -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->