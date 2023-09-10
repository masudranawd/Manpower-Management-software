    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
    <h2><?php echo $this->session->flashdata('smgdu');?></h2>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <br>
                    <h2>All Traing Finger List</h2>
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
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered tablewhite" style="width:100%">
                      <thead>
                        <tr>
                          <th> Id</th>
                          <th> C-Sl</th>
                          <th>Visa No</th>
                          <th>Passport No</th>
                          <th>Customer Name</th>
                          <th>Agent name</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllCustomerList as $CustomerData) {
                          $sl++;
                      ?>

                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo $CustomerData->serial_no;?></td>
                          <td><?php echo $CustomerData->visa_no;?></td>
                          <td><?php echo $CustomerData->passport_no;?></td>
                          <td><?php echo $CustomerData->fullname;?></td>
                          <td>
                        <?php 
                           if($CustomerData->agent_name){ $AgentName = $this->Customer_model->AgentNameById($CustomerData->agent_name);
                         	 echo $AgentName->agent_name; echo '('.$AgentName->agent_id.')';
                           }else{ echo '';}
                        ?>
                           </td>
                          <td>
                            <a href="<?php echo base_url('Customer/TrainingFingerEdit/')?><?php echo $CustomerData->id;?>" class="btn btn-round btn-warning btn-xs">print</a>

                          </td>
                        </tr>
                    <?php
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>

            </div><!--end row-->
          </div>
        </div>
        <!-- /page content -->