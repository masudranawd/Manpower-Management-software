<!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="clearfix"></div>
            <?php echo $this->session->flashdata('sms');?>



            <div class="col-md-12 col-sm-12">
                <div class="x_panel" style="background: #2A3F54;">
                    <div class="x_title">
                        <h2 style="color:#fff;"> Add Dolar Pay </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <form class="" action="<?php echo base_url('Account/EditPayDolar');?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $dolarData->id;?>">
                        <!--start--->
                          <div class="col-md-6"><!--start--->
                            <div class="field item form-group">
                                <div class="col-md-12 col-sm-6"  style="margin-top: -5px;">
                                     <select class="chosent form-control" name="agent_id" >
                                      <option value="" >Select Agent </option> 
                                    <?php 
                                      foreach ($AllAgentList as $AgentList) {
                                    ?>
                                      <option value="<?php echo $AgentList->id;?>" <?php if($AgentList->id == $dolarData->agent_id){ echo 'selected';}else{ echo '';}?> ><?php echo $AgentList->agent_name;?> / <?php echo $AgentList->agent_id;?> </option>
                                    <?php
                                        }  
                                    ?>
                                    </select>
                            <script type="text/javascript">$(".chosent").chosen(); </script>
                                </div>
                            </div>
                          </div> <!--end---> 

                        <div class="col-md-6">
                          <div class="field item form-group">
                                <div class="col-md-12 col-sm-6" style="margin-top: -5px;">
                                  <select class="chosent form-control" name="customer_id" >
                                    <option value="" >Select Customer</option> 
                                  <?php 
                                    foreach ($AllCustomerList as $CustomerData) {
                                  ?>
                                    <option value="<?php echo $CustomerData->id;?>" <?php if($CustomerData->id == $dolarData->customer_id){ echo 'selected';}else{ echo '';}?>>
                                      <?php echo $CustomerData->fullname;?> / <?php echo $CustomerData->serial_no;?> / <?php echo $CustomerData->passport_no;?> /  <?php echo $CustomerData->id_no;?> 
                                    </option>
                                  <?php
                                      }  
                                  ?>
                                  </select>
                              <script type="text/javascript">$(".chosent").chosen(); </script>
                              </div>
                          </div>
                        </div>
                        <!--end-->
<script type="text/javascript">
var check = function() {
  if (document.getElementById('Amount').value ==
    document.getElementById('confirm_Amount').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
    document.getElementById('submit').disabled = true;
  }
}
</script>

                        <div class="col-md-6"><!--start--->
                              <label style="color:#fff">Amount.<span class="required">*</span></label>
                          <div class="field item form-group">
                              <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="amount"  type="number" id="Amount"  onkeyup='check();'  value="<?php echo $dolarData->amount;?>" />
                                </div>
                          </div>
                        </div><!--end--->

                        <div class="col-md-6"><!--start--->

                          <label style="color:#fff">Confirm .<span class="required">*</span></label>
                          <div class="field item form-group">
                             <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="payment_amount_c"  type="number"   id="confirm_Amount"  onkeyup='check();' required="required" value="<?php echo $dolarData->amount;?>" />
                                  <span id='message'></span>
                                </div>
                          </div>
                        </div><!--end--->
                         <div class="col-md-6"style="margin-top: 10px;">
                          <div class="field item form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pay_date" value="<?php echo $dolarData->pay_date;?>" >
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6"  style="margin-top: 10px;"><!--start--->
                          <div class="field item form-group">
                              <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="remark"  type="text" placeholder="Enter Remark !" />
                                </div>
                          </div>
                        </div><!--end--->


                        <div class="col-md-6" style="margin-top: 10px;"><!--start--->
                            <div class="form-group">
                                <div class="col-md-6 ">
                                   <button type='submit' class=" form-control  btn btn-warning btn-lg" id="submit"  >Update</button>
                                </div>
                            </div>
                        </div><!--end--->
                            
                        </form>
                    </div>
                </div>
  <?php echo $this->session->flashdata('smg');?>
                          <!---table----->
            
                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->
                          




 <script type="text/javascript">$(".chosen").chosen(); </script>
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