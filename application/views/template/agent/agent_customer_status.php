    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" style="backround:#fff;">
                  <div class="x_title">
                    <h2> All<b style="color:green;">
                              <?php if($StatusDataID){
                                $statusData = $this->Customer_model->CustomerStatusbyID($StatusDataID);
                                echo $statusData->status_name;
                              }else{ echo '';}
                              ?> </b>List <?php echo $this->session->flashdata('smg');?></h2>
                    <ul class="??nav navbar-right panel_toolbox">
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
                    <table id="datatable-buttons" class="table tablewhite table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align:center;">Id</th>
                          <th style="text-align:center;">C-Sl</th>
                          <th style="text-align:center;">Visa No</th>   
                          <th style="text-align:center;">Passport No</th>                         
                          <th style="text-align:center;">Customer Name</th>   
                          <th style="text-align:center;">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($ALlCustomerStatusList as $CustomerData) {
                          $sl++;
                      ?>

                        <tr>
                          <td style="width:2%;text-align:center;"><?php echo $sl;?></td>
                          <td style="width:8%;text-align:center;"><?php echo $CustomerData->serial_no;?></td>
                          <td style="width:8%;text-align:center;"><?php echo $CustomerData->visa_no;?></td>
                          <td style="text-align:center;"><?php echo $CustomerData->passport_no;?></td>
                          <td><?php echo $CustomerData->fullname;?></td>

                          <td  style="text-align:center;">
                            <a href="#" class="btn btn-round btn-info btn-xs"  data-toggle="modal" data-target="#medicalFit<?php echo $CustomerData->id;?>" >Add Status </a>
                          

                          </td>
                        </tr>

          <!-- Modal -->
          <div class="modal fade" id="medicalFit<?php echo $CustomerData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="color:#000;"><b>Name:</b><?php echo $CustomerData->fullname;?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        <form class="" action="<?php echo base_url('Status/CustomerStatusUpdateByPage');?>/<?php echo $CustomerData->id;?>" method="post" novalidate>
                        <input type="hidden" name="customer_id" value="<?php echo $CustomerData->id;?>">
                        <input type="hidden" name="Status_c_id" value="<?php echo $StatusDataID;?>">
                            <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;"><?php echo "Status"?>   </label>
                              <div class="col-md-10">
                                    <select class="form-control" name="customer_status">

                                    <option> Select Customer Status </option>
                                  <?php 

                                    foreach ($AllStatus as $statusData) {
                                  ?>
                                    <option value="<?php echo $statusData->id;?>" <?php if($statusData->id == $StatusDataID){ echo 'selected';}else{ echo '';}?>> <?php echo $statusData->status_name;?></option>
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
                                <input class="form-control" name="date" type="date" />
                              </div>
                          </div>


                       <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"  style="color:#000;">
                                <?php echo "Remark"?>
                              </label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="remark" placeholder="Remark" >
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
          <!--  model---->

                      <?php
                      
                    }
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div><!--end row-->
        </div>
        <!-- /page content -->