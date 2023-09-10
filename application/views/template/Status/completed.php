    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Weekly & Monthly Report</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          <form class="" action="<?php echo base_url('Status/weeklymonthCompletedSearch');?>" method="post" novalidate target="_blank">
                        
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3  label-align">From Date<span class="required">*</span></label>
                                        <div class="col-md-3 ">
                                            <input type="date" class="form-control has-feedback-left" name="fromdate">
                                          </div>
                                    <label class="col-form-label col-md-2 col-sm-3  label-align">
                                      To Date<span class="required">*</span></label>
                                        <div class="col-md-3 ">
                                            <input type="date" class="form-control has-feedback-left"  name="todate">
                                          </div>

                              <div class="col-md-2 col-sm-6">
                                  <div class="form-group">
                                      <div class="col-md-12 offset-md-3">
                                          <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                      </div>
                                  </div>
                                 
                              </div>
                                </div>

                          </form>
                      </div>
                  </div>
              </div>



              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Completed<?php echo $this->session->flashdata('smgdu');?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align:center;">Id</th>
                          <th style="text-align:center;">C-Sl</th>
                          <th style="text-align:center;">Visa No</th>   
                          <th style="text-align:center;">Passport No</th>
                          <th style="text-align:center;">Customer Name</th> 
                          <th style="text-align:center;">Agent Name</th>   
                          <th style="text-align:center;">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllCustomerList as $CustomerData) {
                          $sl++;
                          if($CustomerData->permission == '7'){
                      ?>

                        <tr>
                          <td style="width:2%;text-align:center;"><?php echo $sl;?></td>
                          <td style="width:8%;text-align:center;"><?php echo $CustomerData->serial_no;?></td>
                          <td style="width:8%;text-align:center;"><?php echo $CustomerData->visa_no;?></td>
                          <td style="text-align:center;"><?php echo $CustomerData->passport_no;?></td>
                          <td><?php echo $CustomerData->fullname;?></td>
                          <td>
                            
                        <?php 
                           if($CustomerData->agent_name){ $AgentName = $this->Customer_model->AgentNameById($CustomerData->agent_name);
                           echo $AgentName->agent_name; echo '('.$AgentName->agent_id.')';
                           }else{ echo '';}
                        ?>
                          </td>

                          <td  style="text-align:center;">
                          <a href="<?php echo base_url('Customer/Customer_profile/')?><?php echo $CustomerData->id;?>" class="btn btn-round btn-primary btn-xs">View</a>

                            <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $CustomerData->id;?>">Remove</a>
                          
                          </td>
                        </tr>
                      <?php
                      }
                    }
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div><!--end row-->
        </div>
        <!-- /page content -->