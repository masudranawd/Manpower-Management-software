   <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background-color: #2A3F54;">
                                <div class="x_title">
                                    <h2>Ticket Booking Add<small><?php echo $this->session->flashdata('smg');?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                      <form action="<?php echo base_url('Ticket/AddAgentBookingTicket');?>" method="post">
                                      <div class="row">
                                        
                                        <div class="col-md-6"><!--start--->
                                        
                                     <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Entry Date</label>
                                              <div class="col-md-10 ">
                                                <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status" name="created_at">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                              </div>
                                          </div>
                                            <!-- end --->

                                          <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">
                                              Agent 
                                              </label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class=" form-control chosent" name="agent_id">
                                                    <option value="" style="font-size:16px;text-transform: capitalize;">Select Agent</option> 
                                                  <?php 
                                                    foreach ($AllAgentList as $AgentList) {
                                                  ?>
                                                    <option value="<?php echo $AgentList->id;?>" style="font-size:16px;text-transform: capitalize;"><?php echo $AgentList->agent_name;?>/<?php echo $AgentList->agent_id;?>/<?php echo $AgentList->mobile_no;?></option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                          
                                          <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">
                                              Passenger 
                                              </label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class=" form-control chosent" name="customer_id" >
                                                    <option value="" style="font-size:16px;text-transform: capitalize;">Select Passenger</option> 
                                                  <?php 
                                                    foreach ($AllCustomerList as $CustomerData) {
                                                      if ($CustomerData->status == '0') {
                                                     
                                                  ?>
                                                    <option class="boxp <?php echo $CustomerData->agent_name;?>" value="<?php echo $CustomerData->id;?>" style="font-size:16px;text-transform: capitalize;"><?php echo $CustomerData->fullname;?>/ <?php echo $CustomerData->passport_no;?>/ <?php echo $CustomerData->mobile_no;?></option>
                                                  <?php
                                                      }  
                                                  }
                                                  ?>
                                                  </select>
                                                  <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                              <div class="new_cutomer">
                                            <a href="#" style="color:red;margin-left: 30px;" class="button-1">New Customer</a>
                                          <!--start--->
                                              <div class="field item form-group">
                                                  <label class="col-form-label col-md-2 col-sm-3  label-align">Name</label>
                                                  <div class="col-md-10 col-sm-6">
                                                    <input class="form-control" class='optional' name="p_name"  type="text" />
                                                  </div>
                                              </div>
                                           <!--end---> 
                                          <!--start--->
                                              <div class="field item form-group">
                                                  <label class="col-form-label col-md-2 col-sm-3  label-align"> Passport</label>
                                                  <div class="col-md-10 col-sm-6">
                                                    <input class="form-control" class='optional' name="passport"  type="text" />
                                                  </div>
                                              </div>
                                           <!--end---> 
                                          </div>
                                       

                                       <script type="text/javascript">
                                         $(document).ready(function(){
                                            $('.new_cutomer .item').hide();
                                           $('.new_cutomer .button-1').click(function(){
                                            $('.new_cutomer .item').slideToggle();
                                          });
                                        });
                                       </script>


                                       
                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Gross Fare </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="gross_price"  type="number"    required="required"  />
                                              </div>
                                          </div>
                                       <!--end--->  

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Base Fare </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="base_fare"  type="number" required="required"  />
                                              </div>
                                          </div>
                                       <!--end---> 

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Tax </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="tax"  type="number" required="" />
                                              </div>
                                          </div>
                                       <!--end---> 
  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Comision </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="comision" value="7" required />
                                              </div>
                                          </div>
                                       <!--end---> 

                                        <!--start--->
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Type</label>
                                            <div class="col-md-10 col-sm-6">
                                                <select class="form-control" name="issue_reissue" required="">
                                                    <option value="">Select Ticket</option>
                                                    <option value="New Ticket">New Ticket</option>
                                                    <option value="Old Ticket">Old Ticket</option>
                                                    <option value="Issue">Issue</option>
                                                </select>
                                              </div>
                                        </div>   
                                    </div><!--end--->



                                        <div class="col-md-6"><!--start--->
                                   
                                           <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Ticket Number</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="ticket_number" required="required" />
                                              </div>
                                          </div>
                                          
                                           <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >Air Lince</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" name="air_lince"  />
                                              </div>
                                          </div>

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">PNR Code</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="pnr_code"  type="text"   />
                                                </div>
                                          </div>
                                        <!--end--->
                                    
                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >Sale Amount</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="carrier"  type="text"     />
                                              </div>
                                          </div><!--end--->
                                          
                                         <div class="field item form-group">
                                                <label class="col-form-label col-md-2 col-sm-3  label-align">Issue Date</label>
                                                <div class="col-md-10 ">
                                                  <input type="date" class="form-control" name="issue_date"   >
                                                </div>
                                          </div>
                                          
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Flight Date</label>
                                              <div class="col-md-10 ">
                                                  <input type="date" class="form-control "  name="flight_date"  >
                                              </div>
                                          </div>
                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Sector</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="sector"  type="text"   />
                                                </div>
                                          </div>
                                        <!--end--->
                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Remark</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="remark"  type="text"   />
                                                </div>
                                          </div>  

                                            <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"></label>
                                              <div class="col-md-10 col-sm-6">
                                                    <button type='submit' class="btn btn-info btn-block">Save</button>
                                              </div>
                                          </div>
                                      
                                    </div><!--end--->

                                        
                                      </div><!---ROW END-->
                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /page content -->