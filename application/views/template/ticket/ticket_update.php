   <!-- page content -->
      <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="">
                            <a  href="<?php echo base_url('')?>Ticket" type="button" class="btn btn-round btn-secondary">Ticket Booking Update </a>
                          </div><br>
                            <div class="x_panel" style="background-color: #2A3F54;">
                                <div class="x_title">
                                    <h2>Ticket Booking Update<small><?php echo $this->session->flashdata('smg');?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                      <form action="<?php echo base_url('Ticket/BookingTicketUpdate');?>" method="post">
                                      <div class="row">
                                        
                                        <div class="col-md-6"><!--start--->

                                        <input type="hidden" name="id" value="<?php echo $TicketData->id ;?>">
                                          <!--start--->

                                     <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Entry Date</label>
                                              <div class="col-md-10 ">
                                                <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status" name="created_at" value="<?php echo $TicketData->created_at;?>">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                              </div>
                                          </div>

                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">
                                              Agent 
                                              </label>
                                              <div class="col-md-10 col-sm-6">
                                                 <select class="chosent form-control" name="agent_id">
                                                    <option value="" style="font-size:16px;text-transform: capitalize;">Select Agent</option> 
                                                  <?php 
                                                    foreach ($AllAgentList as $AgentList) {
                                                  ?>
                                                    <option value="<?php echo $AgentList->id;?>"  <?php if($TicketData->agent_id == $AgentList->id){ echo 'selected';}else{echo '';}?> style="font-size:16px;text-transform: capitalize;"><?php echo $AgentList->agent_name;?>/<?php echo $AgentList->agent_id;?>/<?php echo $AgentList->mobile_no;?></option>
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
                                                 <select class="chosent form-control" name="customer_id">
                                                    <option value="" style="font-size:16px;text-transform: capitalize;">Select Passenger</option> 
                                                  <?php 
                                                    foreach ($AllCustomerList as $CustomerData) {
                                                     
                                                  ?>
                                                    <option value="<?php echo $CustomerData->id;?>"   <?php if($TicketData->customer_id == $CustomerData->id){ echo 'selected';}else{echo '';}?> style="font-size:16px;text-transform: capitalize;"><?php echo $CustomerData->fullname;?>/ <?php echo $CustomerData->passport_no;?>/ <?php echo $CustomerData->mobile_no;?></option>
                                                  <?php
                                                    }
                                                  ?>
                                                  </select>
                                                  <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                          

                                              <div class="field item form-group">
                                                  <label class="col-form-label col-md-2 col-sm-3  label-align">Name</label>
                                                  <div class="col-md-10 col-sm-6">
                                                    <input class="form-control" class='optional' name="p_name"  type="text" value="<?php echo $TicketData->p_name;?>" />
                                                  </div>
                                              </div>
                                           <!--end---> 
                                          <!--start--->
                                              <div class="field item form-group">
                                                  <label class="col-form-label col-md-2 col-sm-3  label-align"> Passport</label>
                                                  <div class="col-md-10 col-sm-6">
                                                    <input class="form-control" class='optional' name="passport"  type="text" value="<?php echo $TicketData->passport;?>" />
                                                  </div>
                                              </div>
                                           <!--end---> 
                                           
                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Gross Fare </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="gross_price"  type="number"  value="<?php echo $TicketData->gross_price;?>" />
                                              </div>
                                          </div>
                                       <!--end--->  

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Base Fare </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="base_fare"  type="number" value="<?php echo $TicketData->base_fare;?>" />
                                              </div>
                                          </div>
                                       <!--end---> 

                                     <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Tax </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="tax"  type="number" value="<?php echo $TicketData->tax;?>"/>
                                              </div>
                                          </div>
                                       <!--end---> 
  <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"> Comission </label>
                                              <div class="col-md-10 col-sm-6">
                                                <input class="form-control" class='optional' name="comision" value="<?php echo $TicketData->comision;?>" />
                                              </div>
                                          </div>
                                       <!--end---> 
                                        
                                          
                                        <!--start--->
                                      <div class="field item form-group">
                                          <label class="col-form-label col-md-2 col-sm-3  label-align">Type</label>
                                          <div class="col-md-10 col-sm-6">
                                              <select class="form-control" name="issue_reissue" required="">
                                                  <option value="">Select Ticket</option>
                                                  <option value="New Ticket" <?php if($TicketData->issue_reissue == 'New Ticket'){ echo 'selected';}else{echo '';}?> >New Ticket</option>
                                                  <option value="Old Ticket" <?php if($TicketData->issue_reissue == 'Old Ticket'){ echo 'selected';}else{echo '';}?> >Old Ticket</option>
                                                  <option value="Issue" <?php if($TicketData->issue_reissue == 'Issue'){ echo 'selected';}else{echo '';}?> >Issue</option>
                                                  <option value="Reissue" <?php if($TicketData->issue_reissue == 'Reissue'){ echo 'selected';}else{echo '';}?> >Reissue</option>
                                                  <option value="Refund" <?php if($TicketData->issue_reissue == 'Refund'){ echo 'selected';}else{echo '';}?> >Refund</option>
                                                  <option value="Void" <?php if($TicketData->issue_reissue == 'Void'){ echo 'selected';}else{echo '';}?> >Void</option>
                                              </select>
                                            </div>
                                      </div>
                                                                                  
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
                                          <div class="field item form-group Refund box" >
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Refund </label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="refund"  type="text"value="<?php echo $TicketData->refund;?>" />
                                                </div>
                                          </div>    
                                          
                                          <!--- ReIssue --------> 
                                          <div class="field item form-group Reissue box" >
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Reissue</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="reissue"  type="text"value="<?php echo $TicketData->reissue;?>" />
                                              </div>
                                          </div>
                                             <!--- void -------->    
                                          <div class="field item form-group Void box">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Void</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="void"  type="text"value="<?php echo $TicketData->void;?>" />
                                                </div>
                                          </div>
                                          <!-- void -------->
                                          
                                        </div><!--end--->



                                        <div class="col-md-6"><!--start--->
                                   
                                           <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Ticket Number</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="ticket_number"   value="<?php echo $TicketData->ticket_number ;?>" />
                                              </div>
                                          </div>
                                          
                                         <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >Air Lince</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" name="air_lince"  value="<?php echo $TicketData->air_lince ;?>"/>
                                              </div>
                                          </div>

                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">PNR Code</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="pnr_code"  type="text"   value="<?php echo $TicketData->pnr_code ;?>" />
                                                </div>
                                          </div>
                                        <!--end--->
                                    
                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" >Sale Amount</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="carrier"  type="text" value="<?php echo $TicketData->carrier ;?>"/>
                                              </div>
                                          </div><!--end--->
                                          
                                         <div class="field item form-group">
                                                <label class="col-form-label col-md-2 col-sm-3  label-align">Issue Date</label>
                                                <div class="col-md-10 ">
                                                  <input type="text" class="form-control " name="issue_date"    value="<?php echo $TicketData->issue_date ;?>">
                                                </div>
                                          </div>
                                          
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Flight Date</label>
                                              <div class="col-md-10 ">
                                                  <input type="text" class="form-control" name="flight_date"   value="<?php echo $TicketData->flight_date ;?>" >
                                              </div>
                                          </div>
                                        <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Sector</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="sector"  type="text"     value="<?php echo $TicketData->sector ;?>" />
                                                </div>
                                          </div>
                                        <!--end--->
                                            <!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Remark</label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="remark"  type="text"    value="<?php echo $TicketData->remark ;?>" />
                                                </div>
                                          </div>

                    
                                    </div><!--end--->
                                  </div>
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