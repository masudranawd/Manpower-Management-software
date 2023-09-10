<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                          <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Embassy File Generator</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                  <form class="" action="<?php echo base_url('Customer/EmbassyFile');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#fff;"><?php echo "Customer"?></label>
                                             
                                                <div class="col-md-7 col-sm-6" style="margin-top: -10px;">
                                                 <select class="chosent form-control" name="serial_no" >
                                                    <option value="" >Select Customer</option> 
                                                  <?php 
                                                    foreach ($AllCustomerList as $CustomerData) {
                                                  ?>
                                      <option value="<?php echo $CustomerData->serial_no;?>">
                                        <?php echo $CustomerData->fullname;?> / <?php echo $CustomerData->serial_no;?> / <?php echo $CustomerData->passport_no;?> / <?php echo $CustomerData->visa_no;?> /  <?php echo $CustomerData->id_no;?> /  <?php echo $CustomerData->mofa_number;?> / <?php echo $CustomerData->mobile_no;?> / 
                                      </option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                              
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type='submit' class="btn btn-info btn-block btn-round">Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
</div>
                     

  <?php 
   if($CustomerDataInfo == !null){
  ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Embassy File Print<small><?php echo $this->session->flashdata('sms');?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                      <form action="<?php echo base_url('Customer/CustomerEmbassyFileEdit');?>" method="POST" target=_blank>
                                      <div class="row">
                                      <input type="hidden" name="id" value="<?php echo $CustomerDataInfo->id;?>"/>
                                        <!-- left--->
                                      <div class="col-md-6"  style="padding:10px;">
                                        

                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Passenger Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="fullname" value="<?php echo $CustomerDataInfo->fullname;?>" />
                                              </div>
                                          </div>

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Father / Name  <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="father_name"  type="text" value="<?php echo $CustomerDataInfo->father_name;?>"/>
                                                </div>
                                          </div>
                                       <!--end--->

                                   <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Mother/ Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mother_name"  type="text" value="<?php echo $CustomerDataInfo->mother_name;?>"/>
                                                </div>
                                          </div>
                                       <!--end--->


                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Date of birth<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">

                                              <input type="text" class="form-control"  value="<?php echo $CustomerDataInfo->date_of_birth;?>"  name="date_of_birth">
                                                </div>
                                          </div>
                                   <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Place Of Birth<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" type="text" name="place_of_birth" value="<?php echo $CustomerDataInfo->place_of_birth;?>">
                                                </div>
                                          </div>
                                    <!--end---> 

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">PlaceOf Issue<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                <input type="text" class="form-control" name="place_issue"  value="<?php if($CustomerDataInfo->place_issue == !null){  echo $CustomerDataInfo->place_issue;}else{ echo 'DHAKA';}?>"
                                                >
                                                </div>
                                          </div><!--end--->

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Gender<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control"  name="gender" required>
                                                     
                                                    <option value=""> Select Gender</option>
                                                  <?php if ($CustomerDataInfo->gender == 'MALE') {

                                                  ?>
                                                  <option value="MALE" selected=""> MALE</option>
                                                  <option value="FEMALE"> FEMALE</option>
                                                 <?php
                                                  }elseif($CustomerDataInfo->gender == 'FEMALE'){
                                                  ?>

                                                  <option value="MALE"> MALE</option>
                                                  <option value="FEMALE" selected=""> FEMALE</option>
                                                 <?php
                                                  }else{
                                                  ?>

                                                  <option value="MALE"> MALE</option>
                                                  <option value="FEMALE" selected=""> FEMALE</option>
                                                <?php } ?>
                                                  </select>
                                                </div>
                                          </div>
                                     <!--end---> 

                                  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Marital Status<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control " name="marital_status" >
                                                     
                                                    <option value=""> Select Marital Status</option>
                                                <?php if ($CustomerDataInfo->marital_status == 'MARRIED') {
                                                  ?>
                                                    <option value="MARRIED" selected=""> MARRIED</option>
                                                    <option value="SINGLE" >SINGLE</option>
                                                  <?php
                                                  }elseif($CustomerDataInfo->marital_status == 'SINGLE'){
                                                  ?>

                                                    <option value="MARRIED"> MARRIED</option>
                                                    <option value="SINGLE" selected="">SINGLE</option>
                                                  
                                                  <?php
                                                  }else{
                                                  ?>

                                                    <option value="MARRIED"> MARRIED</option>
                                                    <option value="SINGLE">SINGLE</option>
                                                    <?php } ?>
                                                  </select>
                                                </div>
                                          </div>
                                  <!--end--->

                                  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Religion<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control " name="religion">

                                                <?php if ($CustomerDataInfo->religion == 'MUSLIM') {
                                                  ?>
                                                     <option value="" selected="">Select Religion</option>
                                                    <option value="MUSLIM" selected="">MUSLIM</option>
                                                    <option value="NON MUSLIM">NON MUSLIM</option>
                                                <?php
                                                  }elseif($CustomerDataInfo->religion == 'NON MUSLIM'){
                                                  ?>
                                                    <option value="" selected="">Select Religion</option>
                                                    <option value="MUSLIM">MUSLIM</option>
                                                    <option value="NON MUSLIM" selected="">NON MUSLIM</option>
                                               <?php }else{?>
                                               
                                                     <option value="" selected="">Select Religion</option>
                                                    <option value="MUSLIM">MUSLIM</option>
                                                    <option value="NON MUSLIM">NON MUSLIM</option>
                                              <?php } ?>
                                                  </select>
                                                </div>
                                          </div>
                                   <!--end--->

                                          <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Previous/ N<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="previous_nationality"  type="text"  type="text" value="<?php if($CustomerDataInfo->previous_nationality == !null){  echo $CustomerDataInfo->previous_nationality;}else{ echo 'BANGLADESHI';}?>"/>
                                                </div>
                                          </div>
                                        <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Present/ N<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="pesent_nationality"  type="text"  type="text" value="<?php if($CustomerDataInfo->pesent_nationality == !null){  echo $CustomerDataInfo->pesent_nationality;}else{ echo 'BANGLADESHI';}?>"/>
                                                </div>
                                          </div>
                                        <!--end--->

                                  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Mobile No <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mobile_no"  type="text" value="<?php echo $CustomerDataInfo->mobile_no;?>" />
                                              </div>
                                          </div>
                                   <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Qulafication<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="qulafication"  type="text"    type="text" value="<?php echo $CustomerDataInfo->qulafication;?>" />
                                                </div>
                                          </div>
                                        <!--end--->


                                        </div>

            <!------------------------end left------------------------------------->

                                        <!-- center--->
                                        <div class="col-md-6"  style="padding:10px;color:#fff;" >

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profession Eng<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="profession"  type="text"   type="text" value="<?php echo $CustomerDataInfo->profession;?>"/>
                                                </div>
                                          </div>
                                     <!--end--->  

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profession Arabic<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="profession_arabic"  type="text"     type="text" value="<?php echo $CustomerDataInfo->profession_arabic;?>"/>
                                                </div>
                                          </div>
                                     <!--end---> 

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
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">P Issue Date<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                              <input type="text" class="form-control" value="<?php echo $CustomerDataInfo->D_of_passport_issue;?>"  name="D_of_passport_issue">
                                                </div>
                                          </div>
                                   <!--end--->


                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">P Expiry Date<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">

                                              <input type="text" class="form-control" value="<?php echo $CustomerDataInfo->D_passport_expiry;?>" name="D_passport_expiry">
                                                </div>
                                          </div>
                                   <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Visa NO <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="visa_no"  type="text"   value="<?php echo $CustomerDataInfo->visa_no;?>"/>
                                                </div>
                                          </div>
                                       <!--end--->

                                       <!--start--->
                                          <div class="field item form-group" style="color:red">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">ID NO <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="id_no"  type="text"    value="<?php echo $CustomerDataInfo->id_no;?>" />
                                                </div>
                                          </div>
                                      <!--end--->

                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">kofil No <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="kapil_no"  type="text"     value="<?php echo $CustomerDataInfo->kapil_no;?>" />
                                                </div>
                                          </div>
                                     <!--end--->

                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Mofa No <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mofa_number"  type="text"      value="<?php echo $CustomerDataInfo->mofa_number;?>"/>
                                                </div>
                                          </div>
                                     <!--end--->

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Company Name Eng<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="Kofile_name_eng"  type="text"   value="<?php echo $CustomerDataInfo->Kofile_name_eng;?>"  />
                                                </div>
                                          </div>
                                     <!--end--->  

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Company Name Arabic<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                          <input class="form-control" class='optional' name="kofil_name_ar"  type="text"    value="<?php echo $CustomerDataInfo->kofil_name_ar;?>"/>
                                                </div>
                                          </div>
                                          
                                     <!--end---> 
                                        <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Visa Date Arabic <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="visa_date_arabic"  type="text" value="<?php echo $CustomerDataInfo->visa_date_arabic;?>"  />
                                              </div>
                                          </div>
                                     <!-- start-->
 <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Musaneed<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control " name="musaneed" required>

                                                
                                                    <option value="">Select</option>
                                                    <option value="N/A" <?php if ($CustomerDataInfo->musaneed == 'N/A'){ echo 'selected';}else{ echo '';}?> >N/A</option>
                                                    <option value="YES"  <?php if ($CustomerDataInfo->musaneed == 'YES'){ echo 'selected';}else{ echo '';}?> >YES</option>
                                                  </select>
                                                </div>
                                          </div>
                                   <!--end--->
                                            <div class="form-group">
                                                    <button type='submit' class="btn btn-primary btn-block">Confirm</button>
                                            </div>
                                      <!-- end-->
                                        </div>
<!-----------------------------------end center------------------------>

                            
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
      <?php
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



