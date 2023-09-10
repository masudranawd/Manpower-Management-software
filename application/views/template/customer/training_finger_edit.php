
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Traing Finger Print<small><?php echo $this->session->flashdata('sms');?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                  <form action="<?php echo base_url('Customer/trainingFingerEditC');?>" method="post" target="_blank">
                       <input type="hidden" name="id" value="<?php echo $CustomerDataInfo->id;?>"/>
                                         <div class="row">

                                        <!-- left--->
                                    <div class="col-md-6"  style="background-color: #eee;padding:10px;">

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
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Spouse's Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="spouse_name"  type="text" value="<?php echo $CustomerDataInfo->spouse_name;?>"/>
                                                </div>
                                          </div>
                                       <!--end--->


                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Date of birth<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">

                                              <input type="text" class="form-control has-feedback-left" id="single_cal1" value="<?php echo $CustomerDataInfo->date_of_birth;?>" aria-describedby="inputSuccess2Status" name="date_of_birth">
                                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                </div>
                                          </div>
                                   <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">PlaceOf Birth<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" type="text" name="place_of_birth" value="<?php echo $CustomerDataInfo->place_of_birth;?>">
                                                </div>
                                          </div>
                                    <!--end---> 


                         
                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Sex<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control"  name="gender" required>
                                                  <?php if ($CustomerDataInfo->gender == 'MALE') {

                                                  ?>
                                                  <option value="MALE" selected=""> MALE</option>
                                                  <option value="FEMALE"> FEMALE</option>
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
                                                <?php if ($CustomerDataInfo->marital_status == 'MARRIED') {
                                                  ?>
                                                    <option value="MARRIED" selected=""> MARRIED</option>
                                                    <option value="UNMARRIED"> UNMARRIED</option>
                                                  <?php
                                                  }else{
                                                  ?>

                                                    <option value="MARRIED"> MARRIED</option>
                                                    <option value="UNMARRIED" selected=""> UNMARRIED</option>
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
                                                <?php if ($CustomerDataInfo->marital_status == 'MUSLIM') {
                                                  ?>
                                                    <option value="religion">MUSLIM</option>
                                                    <option value="NON MUSLIM">NON MUSLIM</option>
                                                <?php
                                                  }else{
                                                  ?>
                                                    <option value="MUSLIM">MUSLIM</option>
                                                    <option value="NON MUSLIM">NON MUSLIM</option>
                                               <?php } ?>
                                                  </select>
                                                </div>
                                          </div>
                                   <!--end--->


                                  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Mobile No <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mobile_no"  type="text" value="<?php echo $CustomerDataInfo->mobile_no;?>" />
                                              </div>
                                          </div>
                                   <!--end--->
                              </div>

            <!------------------------end left------------------------------------->

                                        <!-- center--->
                                    <div class="col-md-6"  style="background-color: #111;padding:10px;color:#fff;" >

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

                                            <input type="text" class="form-control has-feedback-left" id="single_cal2"  value="<?php echo $CustomerDataInfo->D_of_passport_issue;?>" aria-describedby="inputSuccess2Status4" name="D_of_passport_issue">
                                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                </div>
                                          </div>
                                   <!--end--->

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
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Kofil Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="Kofile_name_eng"  type="text" value="<?php echo $CustomerDataInfo->Kofile_name_eng;?>"/>
                                                </div>
                                          </div>
                                        <!--end--->

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
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Division<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="division"  type="text"     value="<?php echo $CustomerDataInfo->division;?>" />
                                                </div>
                                          </div>
                                        <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Thana<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="thana"  type="text" value="<?php echo $CustomerDataInfo->thana;?>" />
                                                </div>
                                          </div>
                                        <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Union<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="word_union"  type="text"  value="<?php echo $CustomerDataInfo->word_union;?>" />
                                                </div>
                                          </div>
                                        <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Post Office<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="postoffice"  type="text"     value="<?php echo $CustomerDataInfo->postoffice;?>" />
                                                </div>
                                          </div>
                                        <!--end--->  

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Village<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="village"  type="text"     value="<?php echo $CustomerDataInfo->village;?>" />
                                                </div>
                                          </div>
                                        <!--end--->

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">para<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="para"  type="text"     value="<?php echo $CustomerDataInfo->para;?>" />
                                                </div>
                                          </div>
                                        <!--end--->

                                    </div>
<!----------------------------end Right--------------------------------------->

                                      </div><!---ROW END-->

                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                              <button type="submit" class="btn btn-primary">সংরক্ষণ করুন</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->