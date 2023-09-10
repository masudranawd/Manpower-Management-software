<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                        
                          <div class="col-md-12 col-sm-12">
                            <div class="x_panel"  style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Customer<small>Search</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                  <form class="" action="<?php echo base_url('Customer/customerPanel');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;"><?php echo "Customer"?></span></label>
                                             
                                                <div class="col-md-7 col-sm-6" style="margin-top: -10px;">
                                                 <select class="chosent form-control" name="serial_no" >
                                                    <option value="" >Select Customer</option> 
                                                  <?php 
                                                    foreach ($AllCustomerList as $CustomerData) {
                                                  ?>
                                                    <option value="<?php echo $CustomerData->serial_no;?>"><?php echo $CustomerData->fullname;?> / <?php echo $CustomerData->serial_no;?> / <?php echo $CustomerData->passport_no;?> /  <?php echo $CustomerData->visa_no;?> /   <?php echo $CustomerData->id_no;?> / <?php echo $CustomerData->mobile_no;?> / </option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                              
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type='submit' class="btn btn-round btn-info btn-block">Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
</div>
                     

  <?php 
   if($CustomerAccounts == !null){
  ?>
  <div class="col-md-12 col-sm-12">
      
                  <?php 

                   foreach ($CustomerAccounts as $Customerview) {
                   ?>
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Customer Information<big style="color:red;"> <?php echo $Customerview->serial_no;?></big></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

<?php //echo var_dump($Customerview);die();?>
                    <div class="col-md-6 col-sm-9 ">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr  class="btn-secondary">
                                  <th>Antry Date</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->entry_date;?></th>
                                </tr>
                                <tr  class="btn-secondary">
                                  <th>Serial Number</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->serial_no;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Name</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->fullname;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Father's Name</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->father_name;?></th>
                                </tr>

                                <tr  class="btn-secondary">
                                  <th >Contact No</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->mobile_no;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th >Address</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->address;?></th>
                                </tr>
                                <tr  class="btn-secondary">
                                  <th >Reference Name</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->reference_name;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th >Reference number</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->reference_no;?></th>
                                </tr>
                                <tr  class="btn-secondary">
                                  <th >Agent Name</th>
                                  <th>:&nbsp;&nbsp;

                         <?php 
                           if($Customerview->agent_name){  $AgentName = $this->Customer_model->AgentNameById($Customerview->agent_name);
                           echo $AgentName->agent_name;
                           }else{ echo '';}
                         ?>
                                    
                                  </th>
                                </tr>
                                <tr  class="btn-secondary">
                                  <th >Agent Phone</th>
                                  <th>:&nbsp;&nbsp;

                         <?php 
                           if($Customerview->agent_name){  $AgentName = $this->Customer_model->AgentNameById($Customerview->agent_name);
                           echo $AgentName->mobile_no;
                           }else{ echo '';}
                         ?>
                                    
                                  </th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Place of Birth</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->place_of_birth;?></th>
                                </tr>
                                
                                <tr class="btn-secondary">
                                  <th>Country</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->pesent_nationality;?></th>
                                </tr>
                                
                                <tr class="btn-secondary">
                                  <th>Note</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->note;?></th>
                                </tr>


                              </thead>
                            </table>
                            <!-- end user projects -->
                    </div>


                    <div class="col-md-6 col-sm-9 ">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                             
                                <tr class="btn-secondary">
                                  <th>Nation ID</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->id_no;?></th>
                                </tr>

                                <tr class="btn-secondary">
                                  <th>Passport Number </th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->passport_no;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>P Issue Date  </th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->D_of_passport_issue;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>P Expiry Date</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->D_passport_expiry;?></th>
                                </tr>

                                <tr  class="btn-secondary">
                                  <th>Visa Number </th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->visa_no;?></th>
                                </tr>

                                <tr  class="btn-secondary">
                                  <th>Visa Date </th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->visa_date_arabic;?></th>
                                </tr>

                                <tr  class="btn-secondary">
                                  <th>Mofa Number </th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->mofa_number;?></th>
                                </tr>

                                <tr  class="btn-secondary">
                                  <th>Profession Eng</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->profession;?></th>
                                </tr>

                                <tr  class="btn-secondary">
                                  <th>Profession AR</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->profession_arabic;?></th>
                                </tr>

                                <tr class="btn-secondary">
                                  <th>Company Name Eng</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->Kofile_name_eng;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Company Name AR</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->kofil_name_ar;?></th>
                                </tr>



                              </thead>
                            </table>
                            <!-- end user projects -->
                    </div>

          
                  
<!--end-->
<div class="col-md-12">  <!---table----->
                <div class="x_panel" style="background-color: #000;color:#fff; margin-top:20px;">
                  <div class="x_title">
                    <h2> Customer Status 
                            <a href="#" class="btn btn-round btn-info btn-xs"  data-toggle="modal" data-target="#medicalFit<?php echo $Customerview->id;?>">Add New Step</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table tablewhite jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">sl</th>
                            <th class="column-title" style="display: table-cell;">Date</th>
                            <th class="column-title" style="display: table-cell;">Status</th>
                            <th class="column-title" style="display: table-cell;">Remark</th>

                          </tr>
                        </thead>

                        <tbody>
                         <?php 
                             $CustomerStatusView = $this->Customer_model->GetDataCustomerStatus($Customerview->id);
                               $sl = 0;
                              foreach ($CustomerStatusView as $StatusView) {

                                  //var_dump($total_pay);die();
                                $sl++;
                          ?>
                          <tr class="even pointer" style="background-color: #000;">
                            <td class="a-center "><?php echo $sl;?></td>
                            <td class="a-center "><?php echo date('dS M Y', strtotime($StatusView->date));?></td>
                            <td class="a-center ">
                              <?php if($StatusView->customer_status){
                                $statusData = $this->Customer_model->CustomerStatusbyID($StatusView->customer_status);
                                echo $statusData->status_name;
                              }else{ echo '';}
                              ?>

                              </td>
                            <td class="a-center "><?php echo $StatusView->remark;?></td>
                          </tr>
                          <?php 
                              }
                            ?>
                        </tbody>
                      </table>



          <!-- Modal -->
          <div class="modal fade" id="medicalFit<?php echo $Customerview->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="color:#000;"><b>Name:</b><?php echo $Customerview->fullname;?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        <form class="" action="<?php echo base_url('Status/CustomerStatusUpdate');?>/<?php echo $Customerview->id;?>" method="post" novalidate>
                        <input type="hidden" name="customer_id" value="<?php echo $Customerview->id;?>">

                            <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;"><?php echo "Status"?>   </label>
                              <div class="col-md-10">
                                    <select class="form-control" name="customer_status">

                                    <option> Select Customer Status </option>
                                  <?php 

                                    foreach ($AllStatus as $statusData) {
                                  ?>
                                    <option value="<?php echo $statusData->id;?>"> <?php echo $statusData->status_name;?></option>
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
                    </div>
                </div>
</div>
</div>
<!--end-->

</div>
</div>
<!--end-->
      <?php
                   }
          }else{
      ?>
        <?php echo "Not"; ?>
      <?php
          }
      ?>
                                       
            
                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->



