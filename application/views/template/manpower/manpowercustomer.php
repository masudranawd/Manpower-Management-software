
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
  <?php echo $this->session->flashdata('sms');?>
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                         <div class="x_panel">
                                <div class="x_title">
                                    <h2> ManPower Serial No ## _____ <?php echo $manpower_sl;?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                  <form class="" action="<?php echo base_url('Dashboard/ManPowerCustomerSame');?>/<?php echo $manpower_sl;?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "Customer"?><span class="required">*</span></label>
                                             
                                                <div class="col-md-8 col-sm-6" style="margin-top: -10px;">
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
                                              
                                           <div class="col-md-2 col-sm-6">
                                              <div class="form-group">
                                                  <div class="col-md-4 offset-md-3">
                                                      <button type='submit' class="btn btn-info sourc">Search</button>
                                                  </div>
                                              </div>
                                          </div>
                                       </div>
                                  </form>
<?php if($CustomerDataInfo == !null){
?>

                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Dashboard/CustomerManpowerEdit');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                            <div class="col-md-6 col-sm-6">
                                              <input class="form-control" type="hidden" name="manpower_sl" value="<?php echo $manpower_sl;?>">
                                              <input class="form-control" type="hidden" name="id" value="<?php echo $CustomerDataInfo->id;?>">
                                            </div>
                                          </div>
                                          <div class="row">

                                    <div class="col-md-6"  style="background-color: #111;padding:10px;color:#fff;" >

                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Passenger Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="fullname" value="<?php echo $CustomerDataInfo->fullname;?>" />
                                              </div>
                                          </div>
                                 
                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Passport No.<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="passport_no" type="text"    value="<?php echo $CustomerDataInfo->passport_no;?>"/>
                                              </div>
                                          </div>
                                      <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Visa NO <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="visa_no"  type="text"  value="<?php echo $CustomerDataInfo->visa_no;?>" />
                                                </div>
                                          </div>
                                       <!--end--->

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Name Eng<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="Kofile_name_eng"  type="text"  value="<?php echo $CustomerDataInfo->Kofile_name_eng;?>"  />
                                                </div>
                                          </div>
                                     <!--end--->  


                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profession Eng<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="profession"  type="text"   value="<?php echo $CustomerDataInfo->profession;?>" />
                                                </div>
                                          </div>
                                     <!--end--->  

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profession Arabic<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="profession_arabic"  type="text" value="<?php echo $CustomerDataInfo->profession_arabic;?>"   />
                                                </div>
                                          </div>
                                     <!--end---> 
                                   <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Date Of Birth<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="date_of_birth"  type="date" value="<?php echo $CustomerDataInfo->date_of_birth;?>"/>
                                                </div>
                                          </div>
                                        <!--end--->
                                

                                        </div>
<!-----------------------------------end center------------------------>

                                        <!-- Right--->
                                        <div class="col-md-6" style="background-color: #eee;padding:10px;">
      
        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Present/ N<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="pesent_nationality"  type="text" value="<?php echo $CustomerDataInfo->pesent_nationality;?>"/>
                                                </div>
                                          </div>
                                        <!--end--->
                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Certificate No<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="certificate_no"  type="text"   value="<?php echo $CustomerDataInfo->certificate_no;?>" />
                                                </div>
                                          </div>
                                     <!--end--->  

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Batch No<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="batch_no"  type="text" value="<?php echo $CustomerDataInfo->batch_no;?>"   />
                                                </div>
                                          </div>
                                     <!--end---> 

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Batch Serial <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="batch_sl"  type="text" value="<?php echo $CustomerDataInfo->batch_sl;?>"/>
                                                </div>
                                          </div>
                                        <!--end--->
                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">TTC Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="ttc_name"  type="text" value="<?php echo $CustomerDataInfo->ttc_name;?>"/>
                                                </div>
                                          </div>
                                        <!--end--->


                                        </div>
<!----------------------------end Right--------------------------------------->

                                      </div><!---ROW END-->
                            
                     
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            <?php } ?>
                            </div>

                                    <!--- end--->
                                  <div class="x_panel">
                  <div class="x_title">
                    <h2>  Customer List </h2>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                <thead>
                        <tr>
                          <th> Id</th>
                          <th> Customer Details</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllManpowerCustomerList as $CustomerData) {
                          $sl++;
                          if($CustomerData->manpower_sl == $manpower_sl){
                      ?>

                        <tr>
                          <td><?php echo $CustomerData->manpower_sl;?></td>
                          <td>
                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($CustomerData->customer_id);
                                  echo $CustomerInfo->fullname; echo '<b> Passport No: </b>'; echo $CustomerInfo->passport_no; echo '<b> Visa No: </b>'; echo $CustomerInfo->visa_no; echo '<b> profession: </b>'; echo $CustomerInfo->profession; echo '<b> Kofil Name: </b>'; echo $CustomerInfo->Kofile_name_eng; echo '<b> TTC Name: </b>'; echo $CustomerInfo->ttc_name; echo '<b> Certificate No: </b>'; echo $CustomerInfo->certificate_no; 
                            ?>

                            </td>

                          <td>
                            <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $CustomerData->id;?>">Remove</a>
                          

                          </td>
                        </tr> 

<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $CustomerData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Customer Name:##___<?php echo $CustomerInfo->fullname;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Dashboard/RemoveManPowerCustomer/')?><?php echo $CustomerData->id;?>" method="post">
  <input type="hidden" name="manpower_sl" value="<?php echo $manpower_sl;?>">
          <div class="field item form-group">
            <label class="col-form-label col-md-12 col-sm-3  label-align" style="color:red;font-size: 1.3rem;font-weight: 900;text-align: center;">  Are You Sure ? Remove It. </label>
         </div>     

          <div class="ln_solid">
            <div class="form-group">
               <div class="col-md-6 offset-md-3">
                   <button type='submit' class="btn btn-primary">Yes</button>
                    <button type='reset' class="btn btn-success">No</button>
                 </div>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>
                      <?php
                        }
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end row---->
    </div>
  </div>
            <!-- /page content -->



