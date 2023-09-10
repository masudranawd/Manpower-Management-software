<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                        <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                        
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Cash Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/CashReport');?>" method="post" novalidate target="_blank">
                                  
                                          <div class="field item form-group">
                                                <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">Today
                                                </label>
                                                  <div class="col-md-6 ">
                                                      <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" name="payment_date" aria-describedby="inputSuccess2Status4">
                                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                      <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Boss Receive Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/BossReceiveReport');?>" method="post" target="_blank">
                                  
                                          <div class="field item form-group">
                                               <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">From Date</label>
                                                <div class="col-md-3 ">
                                                    <input type="date" class="form-control"  name="fromdate" required="">
                                                </div>
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">
                                                To Date</label>
                                            <div class="col-md-3 ">
                                                 <input type="date" class="form-control"  name="todate" required="">
                                              </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12 offset-md-3">
                                                    <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Summary Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/SummaryReport');?>" method="post" target="_blank">
                                  
                                          <div class="field item form-group">
                                               <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">From Date</label>
                                                <div class="col-md-3 ">
                                                    <input type="date" class="form-control"  name="fromdate" required="">
                                                </div>
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">
                                                To Date</label>
                                            <div class="col-md-3 ">
                                                 <input type="date" class="form-control"  name="todate" required="">
                                              </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12 offset-md-3">
                                                    <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Weekly  Monthly Cash Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/weeklymonthcashReport');?>" method="post" target="_blank">
                                  
                                          <div class="field item form-group">
                                               <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">From Date</label>
                                                <div class="col-md-3 ">
                                                    <input type="date" class="form-control"  name="fromdate" required="">
                                                </div>
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">
                                                To Date</label>
                                            <div class="col-md-3 ">
                                                 <input type="date" class="form-control"  name="todate" required="">
                                              </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12 offset-md-3">
                                                    <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title" style="color:#fff;">
                                    <h2>Payment Method <small>Report</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/PaymentMethodReport');?>" method="post"  target="_blank">
                                      <div class="col-md-3">
                                           <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6"> 
                                                <select class="form-control"  name="payment_method_id" required="">
                                                    <option value="">Select Payment Method</option>

                                                  <?php 
                                                    foreach ($AllPayMethod as $PaymentData) {
                                                  ?>
                                                    <option value="<?php echo $PaymentData->id;?>"><?php echo $PaymentData->bank_name;?> / <?php echo $PaymentData->account_number;?></option>
                                                  <?php } ?>
                                                  </select>
                                                </div>
                                          </div>
                                      </div>
                                      <!-- end-->
                                      <div class="col-md-4">
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align" style="color:#fff;">From Date</label>
                                          <div class="col-md-9 ">
                                              <input type="date" class="form-control "  name="fromdate">
                                          </div>
                                        </div>
                                       </div>

                                      <div class="col-md-4">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align" style="color:#fff;">To Date</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control " name="todate">
                                            </div>
                                        </div>
                                     </div>

                                     <div class="col-md-1 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-md-2 ">
                                                <button type='submit' class="btn btn-secondary sourc" >Submit</button>
                                            </div>
                                        </div>
                                      </div>

                                          </div>
                                        </div>
                                    </form>
                                </div>

                      <!---end---->
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title" style="color:#fff;">
                                    <h2>Payment Receive Category<small>Report</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/PaymentReceiveCategoryReport');?>" method="post"  target="_blank">
                                      <div class="col-md-4">
                                           <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6"> 
                                                <select class="form-control"  name="cat_id" required="">
                                                    <option value="">Select Receive Category</option>
                                      <?php 
                                          foreach($AllCashInCatData as $CashInCatData){
                                      ?>
                                      <option value="<?php echo $CashInCatData->id;?>"><?php echo $CashInCatData->name;?></option>
                                      <?php
                                          }
                                      ?>
                                                  </select>
                                                </div>
                                          </div>
                                      </div>
                                      <!-- end-->
                                      <div class="col-md-3">
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">From </label>
                                          <div class="col-md-12 ">
                                              <input type="date" class="form-control "  name="fromdate">
                                          </div>
                                        </div>
                                       </div>

                                      <div class="col-md-4">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align" style="color:#fff;">To Date</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control " name="todate">
                                            </div>
                                        </div>
                                     </div>

                                     <div class="col-md-1 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-md-2 ">
                                                <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                            </div>
                                        </div>
                                      </div>

                                          </div>
                                        </div>
                                    </form>
                                </div>
                      <!---end---->
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title" style="color:#fff;">
                                    <h2>Expense Category<small>Report</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/PaymentExpenseCategoryReport');?>" method="post"  target="_blank">
                                      <div class="col-md-4">
                                           <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6"> 
                                                <select class="form-control"  name="expense_id" required="">
                                                    <option value="">Select Expense Category</option>
                                                  <?php 
                                                      foreach($AllExpensesCat as $ExpenseData){
                                                  ?>
                                                  <option value="<?php echo $ExpenseData->id;?>"><?php echo $ExpenseData->expenses_cat_name;?></option>
                                                  <?php
                                                      }
                                                  ?>
                                                  </select>
                                                </div>
                                          </div>
                                      </div>
                                      <!-- end-->
                                      <div class="col-md-3">
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">From</label>
                                          <div class="col-md-12 ">
                                              <input type="date" class="form-control "  name="fromdate">
                                          </div>
                                        </div>
                                       </div>

                                      <div class="col-md-4">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align" style="color:#fff;">To Date</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control " name="todate">
                                            </div>
                                        </div>
                                     </div>

                                     <div class="col-md-1 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-md-2 ">
                                                <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                            </div>
                                        </div>
                                      </div>

                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                      <!---end---->
<!----->

                    </div>
                </div>
            </div>
            <!-- /page content -->
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