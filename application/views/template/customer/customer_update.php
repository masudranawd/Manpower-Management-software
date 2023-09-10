
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Customer Update <small><?php echo $this->session->flashdata('sms');?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                      <?php echo form_open_multipart('Customer/UpdateCustomerprofile');?>
                                      <div class="row">
                                        <input type="hidden" name="id" value="<?php echo $CustomerDataInfo->id;?>"/>
                                        <input type="hidden" name="old_image" value="<?php echo $CustomerDataInfo->customer_image;?>"/>
                                         <div class="row">

                                        <!-- left--->
                                      <div class="col-md-4"  style="padding:10px;">
                                            <!--start--->
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align" >Entry Date</label>
                                              <div class="col-md-10 ">
                                                <input type="text" class="form-control has-feedback-left" id="single_cal4" value="<?php echo $CustomerDataInfo->entry_date;?>" name="entry_date" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                              </div>
                                          </div>
                                            <!-- end --->

                                         <!--start -->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >Serial no</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" name="serial_no" value="<?php echo $CustomerDataInfo->serial_no;?>"  />
                                              </div>
                                          </div>
                                          <!-- end--->

                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >FullName</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="fullname" value="<?php echo $CustomerDataInfo->fullname;?>" />
                                              </div>
                                          </div>    
                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Father Name</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="father_name"  type="text" value="<?php echo $CustomerDataInfo->father_name;?>"/>
                                                </div>
                                          </div>
                                       <!--end--->

                                   <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Mother Name</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mother_name"  type="text" value="<?php echo $CustomerDataInfo->mother_name;?>"/>
                                                </div>
                                          </div>
                                       <!--end--->


                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Date of birth</label>
                                              <div class="col-md-10 col-sm-6">

                                              <input type="text" class="form-control "  value="<?php echo $CustomerDataInfo->date_of_birth;?>" name="date_of_birth">
                                         
                                                </div>
                                          </div>
                                   <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Place Of Birth</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" type="text" name="place_of_birth" value="<?php echo $CustomerDataInfo->place_of_birth;?>">
                                                </div>
                                          </div>
                                    <!--end---> 


                         
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
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Mobile No </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mobile_no"  type="text" value="<?php echo $CustomerDataInfo->mobile_no;?>" />
                                              </div>
                                          </div>
                                   <!--end--->

                                        </div>

            <!------------------------end left------------------------------------->

                                        <!-- center--->
                                        <div class="col-md-4"  style="background-color: #111;padding:10px;color:#fff;" >

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Passport No.</label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="passport_no" type="text"    value="<?php echo $CustomerDataInfo->passport_no;?>"/>
                                              </div>
                                          </div>
                                      <!--end--->


                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">P Issue Date</label>
                                              <div class="col-md-10 col-sm-6">

                                            <input type="text" class="form-control"  value="<?php echo $CustomerDataInfo->D_of_passport_issue;?>" name="D_of_passport_issue">
                                              
                                                </div>
                                          </div>
                                   <!--end--->


                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">P Expiry Date</label>
                                              <div class="col-md-10 col-sm-6">

                                              <input type="text" class="form-control"   value="<?php echo $CustomerDataInfo->D_passport_expiry;?>" name="D_passport_expiry">
                                       
                                                </div>
                                          </div>
                                   <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Visa No </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="visa_no"  type="text"   value="<?php echo $CustomerDataInfo->visa_no;?>"/>
                                                </div>
                                          </div>
                                       <!--end--->

                                       <!--start--->
                                          <div class="field item form-group" >
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">ID No</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="id_no"  type="text" value="<?php echo $CustomerDataInfo->id_no;?>" />
                                                </div>
                                          </div>
                                      <!--end--->

                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">kofil No</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="kapil_no"  type="text"     value="<?php echo $CustomerDataInfo->kapil_no;?>" />
                                                </div>
                                          </div>
                                     <!--end--->

                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Mofa No</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mofa_number"  type="text"      value="<?php echo $CustomerDataInfo->mofa_number;?>"/>
                                                </div>
                                          </div>
                                     <!--end--->


                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">PlaceOf Issue</label>
                                              <div class="col-md-10 col-sm-6">
                                                <input type="text" class="form-control" name="place_issue"  value="<?php if($CustomerDataInfo->place_issue == !null){  echo $CustomerDataInfo->place_issue;}else{ echo 'DHAKA';}?>">
                                                </div>
                                          </div><!--end--->

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Company Eng</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="Kofile_name_eng"  type="text"   value="<?php echo $CustomerDataInfo->Kofile_name_eng;?>"  />
                                                </div>
                                          </div>
                                     <!--end--->  

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Company Arabic</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="kofil_name_ar"  type="text"    value="<?php echo $CustomerDataInfo->kofil_name_ar;?>"/>
                                                </div>
                                          </div>
                                     <!--end---> 
                                 

                                        <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Visa Date Arabic</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="visa_date_arabic"  type="text" value="<?php echo $CustomerDataInfo->visa_date_arabic;?>"  />
                                              </div>
                                          </div>
                                          
                                        <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Note</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="note"  type="text" value="<?php echo $CustomerDataInfo->note;?>"  />
                                              </div>
                                          </div>
                                          
                                        </div>
<!-----------------------------------end center------------------------>

                                        <!-- Right--->
                                        <div class="col-md-4" style="padding:10px;">
      

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profession Eng</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="profession"  type="text"   type="text" value="<?php echo $CustomerDataInfo->profession;?>"/>
                                                </div>
                                          </div>
                                     <!--end--->  

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profession Arabic</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="profession_arabic"  type="text"     type="text" value="<?php echo $CustomerDataInfo->profession_arabic;?>"/>
                                                </div>
                                          </div>
                                     <!--end---> 

                                          <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Previous/ N</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="previous_nationality"  type="text"  type="text" value="<?php if($CustomerDataInfo->previous_nationality == !null){  echo $CustomerDataInfo->previous_nationality;}else{ echo 'BANGLADESHI';}?>"/>
                                                </div>
                                          </div>
                                        <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Present/ N</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="pesent_nationality"  type="text"  type="text" value="<?php if($CustomerDataInfo->pesent_nationality == !null){  echo $CustomerDataInfo->pesent_nationality;}else{ echo 'BANGLADESHI';}?>"/>
                                                </div>
                                          </div>
                                        <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Qulafication</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="qulafication"  type="text"    type="text" value="<?php echo $CustomerDataInfo->qulafication;?>" />
                                                </div>
                                          </div>
                                        <!--end--->

                                       <!--start--->
                                          <div class="field item form-group"> 
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >V Category</label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control chosen"  name="visa_category"  style="color:red">
                                                    <option value="" >Select Visa Category</option>
                                                <?php 
                                                    foreach ($AllvisaCategory as $visaCategory) {
                                                  ?>
                                                    <option value="<?php echo $visaCategory->id;?>"  <?php if($visaCategory->id == $CustomerDataInfo->visa_category){ echo 'selected';}?> ><?php echo $visaCategory->cat_name;?></option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                              </div>
                          <script type="text/javascript">$(".chosen").chosen(); </script>
                                          </div>
                          <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >Visa Type</label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="chosent form-control" name="visa_type" >
                                                    <option value="" >Select Visa Type</option>
                                                  <?php 
                                                    foreach ($Allvisatypes as $visaType) {
                                                  ?>
                                                    <option value="<?php echo $visaType->id;?>" 
                                                     <?php  if ($visaType->id == $CustomerDataInfo->visa_type) {
                                                        echo 'selected'; } ?> >

                                                        <?php echo $visaType->visa_type;?>
                                                          
                                                        </option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                          <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                   <!--end--->

                                   <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >
                                              Agent Name
                                              </label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="chosent form-control" name="agent_name" >
                                                    <option value="" >Select Agent Name</option> 
                                               <?php 
                                                    foreach ($AllAgentList as $AgentList) {
                                                  ?>
                                                    <option value="<?php echo $AgentList->id;?>"   
                                                     <?php  if ($AgentList->id == $CustomerDataInfo->agent_name) {
                                                        echo 'selected'; } ?>>

                                                      <?php echo $AgentList->agent_name;?>
                                                        
                                                      </option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                      <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                      <!--end--->  

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">
                                                R N </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="reference_name"  type="text"  value="<?php echo $CustomerDataInfo->reference_name;?>"/>
                                                </div>
                                          </div>
                                      <!--end--->
                                        
                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">R Mobile </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="reference_no"  type="text"  value="<?php echo $CustomerDataInfo->reference_no;?>" />
                                                </div>
                                          </div>
                                      <!--end--->


                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Rate</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="rate"  type="number" value="<?php echo $CustomerDataInfo->rate;?>" />
                                              </div>
                                          </div>
                                          
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Ticket Rate</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="ticket_price"  type="number" value="<?php echo $CustomerDataInfo->ticket_price;?>" />
                                              </div>
                                          </div>
                                          
                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profile</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="customer_image"  type="file"  />
                                                <?php 
                                                 if ($CustomerDataInfo->customer_image  ==!null) {
                                                  ?>

                                                  <img src="<?php echo base_url();?>images/customer/<?php echo $CustomerDataInfo->customer_image;?>" style="width:100px; height: 100px;">
                                                 <?php }else{ ?>
                                                  <img src="<?php echo base_url();?>images/user.png" style="width:100px; height: 100px;">
                                                <?php } ?>
                                              </div>
                                          </div>
                                          <!--end--->


                                        </div>
<!----------------------------end Right--------------------------------------->
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-warning">Update</button>
                                                </div>
                                            </div>
                                      </div><!---ROW END-->
                          
                            
                     
                                           
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->