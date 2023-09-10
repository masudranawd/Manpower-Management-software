

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add New Customer<small><?php echo $this->session->flashdata('sms');?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

<?php  
  if(empty($SerialNo->serial_no)){
    $serial_no = '1';
  }else{
    $serial_no = $SerialNo->serial_no+1;
  }
?>
                                <div class="x_content">
                                      <?php echo form_open_multipart('Customer/AddNewCustomer');?>
                                      <div class="row">

                                        <!-- left--->
                                      <div class="col-md-4"  style="padding:10px;">
                                            <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Entry Date</label>
                                              <div class="col-md-10 ">
                                                <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status" name="entry_date">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                              </div>
                                          </div>
                                            <!-- end --->

                                         <!--start -->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Serial Number</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" name="serial_no" value="<?php echo $serial_no;?>" Readonly/>
                                              </div>
                                          </div>
                                          <!-- end--->

                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Passenger Name</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="fullname" required="required" />
                                              </div>
                                          </div>
                                    
                         
                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Gender</label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control"  name="gender" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="MALE"> MALE</option>
                                                    <option value="FEMALE"> FEMALE</option>
                                                  </select>
                                                </div>
                                          </div>
                                     <!--end---> 

                                  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Marital Status</label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control " name="marital_status" required>
                                                    <option value="">Select Marital Status</option>
                                                    <option value="MARRIED"> MARRIED</option>
                                                    <option value="SINGLE">SINGLE</option>
                                                  </select>
                                                </div>
                                          </div>
                                  <!--end--->

                                  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Religion</label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="form-control " name="religion" required>
                                                    <option value="">Select Religion</option>
                                                    <option value="MUSLIM">MUSLIM</option>
                                                    <option value="NON MUSLIM">NON MUSLIM</option>
                                                  </select>
                                                </div>
                                          </div>
                                   <!--end--->

 <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Remark</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="note"  type="text"     />
                                                </div>
                                          </div>

                                        </div>

            <!------------------------end left------------------------------------->

                                        <!-- center--->
                                        <div class="col-md-4"  style="background-color: #111;padding:10px;color:#fff;" >

                                  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Mobile No.</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mobile_no"  type="text" />
                                              </div>
                                          </div>
                                   <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Passport No.</label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="passport_no" type="text"   />
                                              </div>
                                          </div>
                                      <!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Visa NO </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="visa_no"  type="text"  />
                                                </div>
                                          </div>
                                       <!--end--->

                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">ID NO </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="id_no"  type="text"    />
                                                </div>
                                          </div>
                                      <!--end--->

                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">kofil No </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="kapil_no"  type="text"     />
                                                </div>
                                          </div>
                                     <!--end--->


                                        <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Rate </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="rate"  type="number"  />
                                              </div>
                                          </div>

                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Ticket rate</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="ticket_price"  type="number"     />
                                                </div>
                                          </div>

                                     <!--end--->
                                        </div>
<!-----------------------------------end center------------------------>

                                        <!-- Right--->
                                        <div class="col-md-4" style="padding:10px;">
      
  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">PlaceOf Birth</label>
                                              <div class="col-md-10 col-sm-6">
                                        <select class="form-control chosent"  name="place_of_birth" required>
                                            <option >Select Place Of Birth </option>
                                            <option value="DHAKA">DHAKA</option>
                                            <option value="BAGERHAT">BAGERHAT</option>
                                            <option value="BANDARBAN">BANDARBAN</option>
                                            <option value="BARGUNA">BARGUNA</option>
                                            <option value="BARISAL">BARISAL</option>
                                            <option value="BHOLA">BHOLA</option>
                                            <option value="BOGRA">BOGRA</option>
                                            <option value="BRAHMANBARIA">BRAHMANBARIA</option>
                                            <option value="CHANDPUR">CHANDPUR</option>
                                            <option value="CHATTOGRAM">CHATTOGRAM</option>
                                            <option value="CHUADANGA">CHUADANGA</option>
                                            <option value="CUMILLA">CUMILLA</option>
                                            <option value="COX'S BAZAR">COX'S BAZAR</option>
                                            <option value="DINAJPUR">DINAJPUR</option>
                                            <option value="FARIDPUR">FARIDPUR</option>
                                            <option value="FANI">FANI</option>
                                            <option value="GAIBANDHA">GAIBANDHA</option>
                                            <option value="GAZIPUR">GAZIPUR</option>
                                            <option value="GOPALGANJ">GOPALGANJ</option>
                                            <option value="HABIGANJ">HABIGANJ</option>
                                            <option value="JAMALPUR">JAMALPUR</option>
                                            <option value="JESSORE">JESSORE</option>
                                            <option value="JHALOKATHI">JHALOKATHI</option>
                                            <option value="JHENAIDAH">JHENAIDAH</option>
                                            <option value="JOYPURHAT">JOYPURHAT</option>
                                            <option value="KHAGRACHHARI">KHAGRACHHARI</option>
                                            <option value="KHULNA">KHULNA</option>
                                            <option value="KISHOREGANJ">KISHOREGANJ</option>
                                            <option value="KURIGRAM">KURIGRAM</option>
                                            <option value="KUSHTIA">KUSHTIA</option>
                                            <option value="LAKSHMIPUR">LAKSHMIPUR</option>
                                            <option value="LALMONIRHAT">LALMONIRHAT</option>
                                            <option value="MADARIPUR">MADARIPUR</option>
                                            <option value="MAGURA">MAGURA</option>
                                            <option value="MANIKGANJ">MANIKGANJ</option>
                                            <option value="MEHERPUR">MEHERPUR</option>
                                            <option value="MOULVIBAZAR">MOULVIBAZAR</option>
                                            <option value="MUNSHIGANJ">MUNSHIGANJ</option>
                                            <option value="MYMENSINGH">MYMENSINGH</option>
                                            <option value="NAOGAON">NAOGAON</option>
                                            <option value="NARAIL">NARAIL</option>
                                            <option value="NARAYANGANJ">NARAYANGANJ</option>
                                            <option value="NATORE">NATORE</option>
                                            <option value="NAWABGANJ">NAWABGANJ</option>
                                            <option value="NETROKONA">NETROKONA</option>
                                            <option value="NILPHAMARI">NILPHAMARI</option>
                                            <option value="NOAKHALI">NOAKHALI</option>
                                            <option value="NARSINGDI">NARSINGDI</option>
                                            <option value="PABNA">PABNA</option>
                                            <option value="PANCHAGARH">PANCHAGARH</option>
                                            <option value="PATUAKHALI">PATUAKHALI</option>
                                            <option value="PIROJPUR">PIROJPUR</option>
                                            <option value="RAJBARI">RAJBARI</option>
                                            <option value="RAJSHAHI">RAJSHAHI</option>
                                            <option value="RANGAMATI">RANGAMATI</option>
                                            <option value="RANGPUR">RANGPUR</option>
                                            <option value="SATKHIRA">SATKHIRA</option>
                                            <option value="SHARIATPUR">SHARIATPUR</option>
                                            <option value="SHERPUR">SHERPUR</option>
                                            <option value="SIRAJGANJ">SIRAJGANJ</option>
                                            <option value="SUNAMGANJ">SUNAMGANJ</option>
                                            <option value="SYLHET">SYLHET</option>
                                            <option value="TANGAIL">TANGAIL</option>
                                            <option value="THAKURGAON">THAKURGAON</option>
                        </select>
                        
                          <script type="text/javascript">$(".chosent").chosen(); </script>
                                                </div>
                                          </div>
                                    <!--end---> 

                                       <!--start--->
                                          <div class="field item form-group"> 
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">VISA </label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="chosen form-control"  name="visa_category" >
                                                    <option value="" >Select Visa Category</option>
                                                  <?php 
                                                    foreach ($AllvisaCategory as $visaCategory) {
                                                  ?>
                                                    <option value="<?php echo $visaCategory->id;?>"><?php echo $visaCategory->cat_name;?></option>
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
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >Visa Type </label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="chosent form-control" name="visa_type" >
                                                    <option value="" >Select Visa Type</option>
                                                  <?php 
                                                    foreach ($Allvisatypes as $visaType) {
                                                  ?>
                                                    <option value="<?php echo $visaType->id;?>"><?php echo $visaType->visa_type;?></option>
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
                                                    <option value="<?php echo $AgentList->id;?>"><?php echo $AgentList->agent_name;?></option>
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
                                                  <input class="form-control" class='optional' name="reference_name"  type="text" placeholder="Reference Name" />
                                                </div>
                                          </div>
                                      <!--end--->
                                        
                                       <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">R M No </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="reference_no"  type="text" placeholder="Reference Mobile NO" />
                                                </div>
                                          </div>
                                   
                                      <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">profile Image </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="customer_image"  type="file"  />
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
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                                </div>
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