
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Status</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Customer/StatusSearchByID');?>" method="post" >

                                     <div class="col-md-8"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6" style="margin-top: -10px;">
                                                 <select class="chosent form-control" name="status_id" >
                                                   <option> Select Customer Status </option>
                                                      <?php 

                                                        foreach ($AllStatus as $statusData) {
                                                      ?>
                                                        <option value="<?php echo $statusData->id;?>"> <?php echo $statusData->status_name;?></option>
                                                      <?php
                                                       }
                                                      ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                        </div><!--end---> 

                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type='submit' class="btn btn-info btn-round btn-block" >Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                            
                            
                          <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Status Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Status/StatusReport');?>" method="post"  target="_blank">
                                  
                                        <div class="col-md-4"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6" style="margin-top: -10px;"><select class="chosent form-control" name="status_id" >
                                                   <option> Select Customer Status </option>
                                                      <?php 

                                                        foreach ($AllStatus as $statusData) {
                                                      ?>
                                                        <option value="<?php echo $statusData->id;?>"> <?php echo $statusData->status_name;?></option>
                                                      <?php
                                                       }
                                                      ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                        </div><!--end---> 

                                              <div class="col-md-3 ">
                                                <input type="date" class="form-control has-feedback-left" id="" name="fromdate">
                                              </div>

                                              <div class="col-md-3 ">
                                                <input type="date" class="form-control has-feedback-left"  name="todate">
                                                </div>

                                                <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type='submit' class="btn btn-info btn-round btn-block" >Search</button>
                                                    </div>
                                                </div>
                                            </div>     
                                          </form>
                                        </div>
                                     </div>
                                   </div>
                                   <!--- end --->
                                   
                <div class="col-md-12">   
                  <div class="x_panel">            
                 <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table tablewhite table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th> Id</th>
                          <th> Date</th>
                          <th> C-Sl</th>
                          <th>Customer Name</th>
                          <th>Agent Name</th>
                          <th>Passport No</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllCustomerStatusList as $CustomerData) {
                          $sl++;
                          if($sl < 100){
                      ?>

                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo date("d/m/Y", strtotime($CustomerData->date));?> </td>
                          <td>
                          <?php
                           if($CustomerData->customer_id){ $Customerinfo = $this->Customer_model->customernamebyid($CustomerData->customer_id);
                           echo $Customerinfo->serial_no;
                           }else{ echo '';}
                        ?>
                        </td>
                          <td>
                          <?php
                           if($CustomerData->customer_id){ $Customerinfo = $this->Customer_model->customernamebyid($CustomerData->customer_id);
                           echo $Customerinfo->fullname;
                           }else{ echo '';}
                        ?>
                        </td>
                        
                         <td>
                               <?php 
                                 if($Customerinfo->agent_name){ $AgentName = $this->Customer_model->AgentNameById($Customerinfo->agent_name);
                                 echo $AgentName->agent_name; echo '('.$AgentName->agent_id.')';
                                 echo '<b> <br>phone:</b>'.$AgentName->mobile_no; 
                                 }else{ echo '';}
                              ?>
                                
                        </td>
                          <td>
                          <?php
                           if($CustomerData->customer_id){ $Customerinfo = $this->Customer_model->customernamebyid($CustomerData->customer_id);
                           echo $Customerinfo->passport_no;
                           }else{ echo '';}
                        ?></td>
                          <td style="width:20%;">
                              
                              <?php if($CustomerData->customer_status){
                                $statusData = $this->Customer_model->CustomerStatusbyID($CustomerData->customer_status);
                                echo $statusData->status_name;
                              }else{ echo '';}
                              ?>
                           </td>
                          <td style="width:10%;">
                            <a href="#" class="btn btn-round btn-warning btn-xs" data-toggle="modal" data-target="#Remove<?php echo $CustomerData->id;?>">Edit</a>
                          </td>
                        </tr>


                        <!--- remove model  ---->
                        <div class="modal fade" id="Remove<?php echo $CustomerData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title" id="myModalLabel" style="color:#000;">  Name:##<?php
                           if($CustomerData->customer_id){ $Customerinfo = $this->Customer_model->customernamebyid($CustomerData->customer_id);
                           echo $Customerinfo->fullname;
                           }else{ echo '';}
                        ?></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                <div class="modal-body">
                        <form class="" action="<?php echo base_url('Customer/StatusUpdateCustomer');?>/<?php echo $CustomerData->id;?>" method="post" novalidate>
                        <input type="hidden" name="id" value="<?php echo $CustomerData->id;?>">
                        <input type="hidden" name="customer_id" value="<?php echo $CustomerData->customer_id;?>">
                            <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;"><?php echo "Status"?>   </label>
                              <div class="col-md-10">
                                    <select class="form-control" name="customer_status">

                                    <option> Select Customer Status </option>
                                  <?php 
                                    foreach ($AllStatus as $statusData) {
                                  ?>
                                    <option value="<?php echo $statusData->id;?>" <?php if($statusData->id == $CustomerData->customer_status){ echo 'selected';}else{ echo '';}?>> <?php echo $statusData->status_name;?></option>
                                  <?php
                                   }
                                  ?>
                                  </select>
                              </div>
                              </div>
                         <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"  style="color:#000;">
                                <?php echo "Date"?>
                              </label>
                              <div class="col-md-10 col-sm-6">
                                <input class="form-control" name="date" type="date" value="<?php echo $CustomerData->date;?>"/>
                              </div>
                          </div>


                       <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"  style="color:#000;">
                                <?php echo "Remark"?>
                              </label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="remark"  value="<?php echo $CustomerData->remark;?>" >
                          </div>
                       </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-12 col-sm-3  label-align" style="color:green;font-size: 1.3rem;font-weight: 900;text-align: center;">  Are You Sure ?</label>
                         </div>  
                               


                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Yes</button>
                  <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                </div>
                    </form>                  
                </div>
                            </div>
                          </div>
                        </div>
                        <!--- model end ----->

                      <?php
                        }
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
                <!--- end --->                   
                                   
                                </div>
                             </div>
                           </div>
                        </div>
                      </div>
            <!-- /page content -->



