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
                      <form class="" action="<?php echo base_url('Account/AddNewPayDolar');?>" method="post">

                        <!--start--->
                          <div class="col-md-6"><!--start--->
                            <div class="field item form-group">
                                <div class="col-md-12 col-sm-6"  style="margin-top: -5px;">
                                   <select class="chosent form-control" name="agent_id" >
                                      <option value="" >Select Agent </option> 
                                    <?php 
                                      foreach ($AllAgentList as $AgentList) {
                                    ?>
                                      <option value="<?php echo $AgentList->id;?>"><?php echo $AgentList->agent_name;?> / <?php echo $AgentList->agent_id;?> </option>
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
                                    <option value="<?php echo $CustomerData->id;?>">
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
                                  <input class="form-control" class='optional' name="amount"  type="number" id="Amount"  onkeyup='check();'  required="required" />
                                </div>
                          </div>
                        </div><!--end--->

                        <div class="col-md-6"><!--start--->

                          <label style="color:#fff">Confirm .<span class="required">*</span></label>
                          <div class="field item form-group">
                             <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="payment_amount_c"  type="number"   id="confirm_Amount"  onkeyup='check();' required="required" />
                                  <span id='message'></span>
                                </div>
                          </div>
                        </div><!--end--->
                         <div class="col-md-6"style="margin-top: 10px;">
                          <div class="field item form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="d/m/y" name="pay_date" >
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
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
                                   <button type='submit' class=" form-control  btn btn-info btn-lg" id="submit" disabled >Save</button>
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