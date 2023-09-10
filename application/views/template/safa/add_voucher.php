<!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="clearfix"></div>
            <?php echo $this->session->flashdata('sms');?>



            <div class="col-md-12 col-sm-12">
                <div class="x_panel" style="background: #2A3F54;">
                    <div class="x_title">
                        <h2 style="color:#fff;"> Add Voucher </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <form class="" action="<?php echo base_url('Setting/AddNewVoucher');?>" method="post" target="_blank">

                        <div class="col-md-6">
                          <div class="field item form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="d/m/y" name="vou_date" >
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                          </div>
                        </div>
<?php  
  if(empty($Voucher->id)){
    $mr_no = '##000001';
  }else{
    $mr_no = '##'.sprintf("%06d",$Voucher->id+1);
  }
?>
                        <div class="col-md-6"><!--start--->
                          <div class="field item form-group">
                              <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="vou_no"  type="text"  value="<?php echo $mr_no;?>" radonly/>
                              </div>
                          </div>
                        </div><!--end--->
                         
                        <!--start--->
                          <div class="col-md-6"><!--start--->
                          <label style="color:#fff">SELECT TYPE</label>
                            <div class="field item form-group">
                                <div class="col-md-12 col-sm-6">
                                   <select class="form-control" name="type" >
                                      <option value="" >Select Type </option> 
                                      <option value="DEBIT VOUCHER">DEBIT VOUCHER</option>
                                      <option value="CREDIT VOUCHER">CREDIT VOUCHER</option>
                                    </select>
                                </div>
                            </div>
                          </div> <!--end---> 

                        <div class="col-md-6"><!--start--->
                              <label style="color:#fff">AMOUNT</label>
                          <div class="field item form-group">
                              <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="amount"  type="number"    required="required" />
                                </div>
                          </div>
                        </div><!--end--->

                        <div class="col-md-6"><!--start--->

                          <label style="color:#fff">HEAD OF ACCOUNT</label>
                          <div class="field item form-group">
                             <div class="col-md-12 col-sm-6">
                                  <textarea  class="form-control" name="account"></textarea> 
                                </div>
                          </div>
                        </div><!--end--->

                        <div class="col-md-6"><!--start--->

                          <label style="color:#fff">AMOUNT RECEIVED FROM</label>
                          <div class="field item form-group">
                             <div class="col-md-12 col-sm-6">
                                  <textarea  class="form-control" name="received" required=""></textarea> 
                                </div>
                          </div>
                        </div><!--end--->

                        <div class="col-md-6"><!--start--->

                          <label style="color:#fff">ON ACCOUNT OF</label>
                          <div class="field item form-group">
                             <div class="col-md-12 col-sm-6">
                                  <textarea  class="form-control" name="on_account" ></textarea> 
                                </div>
                          </div>
                        </div><!--end--->
                  

                        <div class="col-md-6" style="margin-top: 30px;"><!--start--->
                            <div class="form-group">
                                <div class="col-md-6 ">
                                   <button type='submit' class=" form-control  btn btn-info btn-lg" id="submit" >Save</button>
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