<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Embassy<small>Report</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Customer/EmbassyReportpdf');?>" method="post"  target="_blank">
                                      <div class="row">
                                         <label class="col-form-label col-md-1 col-sm-3  label-align" style="color:#fff;">Arabic Date</label>
                                        <div class="col-md-3">
                                          <div class="field item form-group">
                                               <input type="text" class="form-control" id="" name="arabic_date" required>
                                            </div>
                                        </div>      

                                        <label class="col-form-label col-md-1 col-sm-3  label-align" style="color: #fff;">From Date</label>
                                        <div class="col-md-3 ">
                                            <input type="date" class="form-control" id="" name="fromdate">
                                        </div>


                                        <label class="col-form-label col-md-1 col-sm-3  label-align" style="color: #fff;">To Date</label>
                                        <div class="col-md-3 ">
                                            <input type="date" class="form-control"  name="todate">
                                        </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-10"></div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-md-2">
                                              <button type='submit' class="btn btn-info btn-round btn-lg" >Search</button>
                                            </div>
                                         </div>     
                                    </div>
                                </div>
                              </form>
                          </div>
                      </div>
                   </div><!-- end row---->
                   </div>
    <!--- end --------->
    
  <?php echo $this->session->flashdata('sms');?>
<br>
<br>
<br>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel"  style="background: #2A3F54;">
                  <div class="x_title">
                    <h2 style="color:#fff;">Ready Embassy List</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="tablewhite table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th style="color: #fff;">Sl</th>
                          <th style="color: #fff;">Entry Date</th>
                          <th style="color: #fff;">Customer Name</th>
                          <th style="color: #fff;">Passport No</th>
                          <th style="color: #fff;">Visa No</th>
                          <th style="color: #fff;">sponser Name</th>
                          <th style="color: #fff;">Agent Name</th>
                          <th style="color: #fff;">Action</th>
                        </tr>
                      </thead>


                      <tbody>

                        <?php 
                            $Sl =0;
                          foreach ($AllEmbassyReadyList as $EmbassyReady) {
                			$ReportData = $EmbassyReady->customer_id;
                			$EmbassyFileCData = $this->Customer_model->CustomerDataByID($ReportData);
                            $Sl++;
                            
                        ?>

                        <tr>
                          <td style="color:#fff;"><?php echo $Sl;?></td>
                          <td style="color:#fff;"><?php echo $EmbassyReady->created_at;?></td>
                          <td style="color:#fff;">  <?php echo $EmbassyFileCData->fullname;?>  </td>
                          <td style="color:#fff;">  <?php echo $EmbassyFileCData->passport_no;?>  </td>
                          <td style="color:#fff;">  <?php echo $EmbassyFileCData->visa_no;?>  </td>
                          <td style="color:#fff;"> <?php echo $EmbassyFileCData->kofil_name_ar;?></td>
                          <td style="color:#fff;"> 
                          
                               <?php 
                                 if($EmbassyFileCData->agent_name){ $AgentName = $this->Customer_model->AgentNameById($EmbassyFileCData->agent_name);
                                 echo $AgentName->agent_name; echo '('.$AgentName->agent_id.')';
                                 echo '<b> <br>phone:</b>'.$AgentName->mobile_no; 
                                 }else{ echo '';}
                              ?>
                                
                          </td>
                            <td class="" style="text-align: center;">
                              <a href="<?php echo base_url('Customer/EmbassyFilePDF/');?><?php echo $EmbassyFileCData->id;?>" class="btn btn-round btn-info" target="_blank">print</a>
                              <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#Return<?php echo $EmbassyReady->id;?>">Return</a>
                              <a href=""  data-toggle="modal" data-target="#Remove<?php echo $EmbassyReady->id;?>"class="btn btn-round btn-danger">D</a>
                            </td>
                        </tr>


          <!-- Modal -->
          <div class="modal fade" id="Return<?php echo $EmbassyReady->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="color:#000;">Return Date  ##<?php echo $EmbassyFileCData->fullname;?> </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                 <form class="" action="<?php echo base_url('Customer/ReturnEmabassyDate');?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $EmbassyReady->id;?>">
                     <div class="field item form-group">
                          <label class="col-form-label col-md-10 col-sm-3  label-align"  style="color:green;font-weight:800;"><?php echo "Are You Sure ? Return It."?></label>
                          <div class="col-md-10 col-sm-6">
                            <input  type="hidden" class="form-control" name="customer_id" value="<?php echo $EmbassyReady->customer_id;?>" />
                          </div>
                    </div>
                    <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                 </form>                  
                </div>
              </div>
            </div>
          </div>
          <!-- Remove model---->
              <!-- Modal -->
          <div class="modal fade" id="Remove<?php echo $EmbassyReady->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                 <form class="" action="<?php echo base_url('Customer/ReturnEmabassyDateRemove/');?><?php echo $EmbassyReady->id;?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $EmbassyReady->id;?>">
                     <div class="field item form-group">
                          <h2 style="color:red;">
                              Are you Sure ? Remove IT
                          </h2>
                          
                    </div>
                    <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                 </form>                  
                </div>
              </div>
            </div>
          </div>
          <!-- visa category model---->

                        <?php
                            }
                         
                        ?>

                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
         </div><!-- end row---->
    <!-- start -------->

            </div><!--end row-->
          </div>
        </div>
        <!-- /page content -->
