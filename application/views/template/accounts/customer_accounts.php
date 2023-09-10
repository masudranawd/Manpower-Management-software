
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">

  <div class="col-md-12 col-sm-12">
         <a href="<?php echo base_url();?>CustomerPayment" class="btn btn-info sourc">
       New Customer Payment Add </a>
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer Information<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">SL </th>
                            <th class="column-title" style="display: table-cell;">Name</th>
                            <th class="column-title" style="display: table-cell;">Visa No</th>
                            <th class="column-title" style="display: table-cell;">Passport No</th>
                            <th class="column-title" style="display: table-cell;">ID No </th>
                            <th class="column-title" style="display: table-cell;">Kapil No </th>
                          </tr>
                        </thead>

                        <tbody>

                      <?php 
                          // var_dump($AllvisaCategory);
                          $sl = 0;
                            foreach ($CustomerAccounts as $CustomerInfo) {
                              $sl++;
                             // var_dump($CustomerAccounts);die();
                          ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                            <?php 
                              if($CustomerInfo->customer_image ==null){
                              ?>
                              <img src="<?php echo base_url();?>images/img.jpg" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }elseif($CustomerInfo->customer_image){
                            ?>
                              <img src="<?php echo base_url();?>images/customer/<?php echo $CustomerInfo->customer_image ;?>" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }
                            ?>
                              </td>
                            <td class=" "><?php echo $CustomerInfo->fullname;?></td>
                            <td class=" "><?php echo $CustomerInfo->visa_no;?></td>
                            <td class=" "><?php echo $CustomerInfo->passport_no;?></td>
                            <td class=" "><?php echo $CustomerInfo->id_no;?></td>
                            <td class=" "><?php echo $CustomerInfo->kapil_no;?></td>
                            </td>
                          </tr>
                          <?php
                            }
                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div><!-- end col-md-6-->
<?php  
  if(empty($Voucherdata->id)){
    $voucher_no = 'INV000001';
  }else{
    $voucher_no = 'INV'.sprintf("%06d",$Voucherdata->id+1);
  }
?>

<?php 
  if ($payment_type == 'Deposit') {
?>

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Customer Payment Add &nbsp;&nbsp;<b>##<?php echo $voucher_no;?></b></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Accounts/AddNewPayment');?>" method="post" novalidate target="-blank">
                                  <input type="hidden" name="customer_id" value="<?php echo $CustomerInfo->id;?>">
                                  <input type="hidden" name="payment_type" value="<?php echo $payment_type;?>">
                                  <input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
                                  <input type="hidden" name="serial_no" value="<?php echo $CustomerInfo->serial_no;?>">
                                        
                                         <div class="col-md-4">
                                          <div class="field item form-group">
                                              <div class="col-md-12">
                                                <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" name="payment_date" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                              </div>
                                          </div>
                                        </div>
                            
                                      <div class="col-md-4"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6" style="margin-top: -8px;">
                                                 <select class="chosen form-control" name="for_payment" required>
                                                    <option>Select CashIn Category</option> 
                                                    <?php 
                                                        foreach($AllCashInCatData as $CashInCatData){
                                                    ?>
                                                    <option value="<?php echo $CashInCatData->name;?>"><?php echo $CashInCatData->name;?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                  </select>
                                              </div>
                          <script type="text/javascript">$(".chosen").chosen(); </script>
                                          </div>
                                        </div><!--end--->

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

                                        <div class="col-md-4"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <select class="form-control"  name="method" required>
                                                    <option value="">Select Payment Method</option>
                                                    <option value="CashIn">CashIn</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                  </select>
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group" >
                                              <div class="col-md-12 col-sm-6" >
                                                  <input class="form-control" class='optional' name="payment"  type="number"    required="required" placeholder="Enter Amount" style="background-color: #000;color:#fff;"/>
                                                </div>
                                          </div>
                                        </div><!--end--->
                                        

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <input class="form-control" class='optional' name="details"  type="text"   placeholder="Remark" />
                                                </div>
                                          </div>
                                        </div>
                                        <!--end--->
                                      </div>

                                        <div class="col-md-6 Bank box" ><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Bank <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bank_name"  type="text" placeholder="Name"/>
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6 Bank box"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Account N <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bank_recepit_n"  type="text" placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6  Bkash box" ><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Bkash <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bkash_n"  type="text"   placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6  Rocket box"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Rocket <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="rocket_n"  type="text"   placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6 Nogod box"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Nogod <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="nogod_n"  type="text" placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->


                               
                                         <div class="col-md-2" style="margin-top: 10px;"><!--start--->
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-info btn-lg">সংরক্ষণ</button>
                                                </div>
                                            </div>
                                        </div><!--end--->
                                    </form>
                                </div>
                            </div>
  <?php echo $this->session->flashdata('smg');?>
                          <!---table----->
<?php
  }else{
?>
<div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Customer Expense Add &nbsp;&nbsp;<b>##<?php echo $voucher_no;?></b></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Accounts/AddNewExpensePayment');?>" method="post" novalidate target="-blank">
                                  <input type="hidden" name="customer_id" value="<?php echo $CustomerInfo->id;?>">
                                   <input type="hidden" name="payment_type" value="<?php echo $payment_type;?>">
                                  <input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
                                  <input type="hidden" name="serial_no" value="<?php echo $CustomerInfo->serial_no;?>">
                                        
                                         <div class="col-md-4">
                                          <div class="field item form-group">
                                                  <div class="col-md-12">
                                                      <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" name="payment_date" aria-describedby="inputSuccess2Status4">
                                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                      <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    </div>
                                          </div>
                                        </div>
                                      <div class="col-md-4"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6" style="margin-top: -8px;">
                                                 <select class="chosen form-control" name="for_payment" required>
                                                    <option>Select CashIn Category</option> 
                                                    <?php 
                                                        foreach($AllCashInCatData as $CashInCatData){
                                                    ?>
                                                    <option value="<?php echo $CashInCatData->name;?>"><?php echo $CashInCatData->name;?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                  </select>
                                              </div>
                          <script type="text/javascript">$(".chosen").chosen(); </script>
                                          </div>
                                        </div><!--end--->

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

                                        <div class="col-md-4"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <select class="form-control"  name="method" required>
                                                    <option value="">Select Payment Method</option>
                                                    <option value="CashIn">CashIn</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                  </select>
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group" >
                                              <div class="col-md-12 col-sm-6" >
                                                  <input class="form-control" class='optional' name="expense_payment"  type="number"     placeholder="Enter Amount" style="background-color: #000;color:#fff;" required/>
                                                </div>
                                          </div>
                                        </div><!--end--->
                                        

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <input class="form-control" class='optional' name="details"  type="text"   placeholder="Remark" />
                                                </div>
                                          </div>
                                        </div>
                                        <!--end--->
                                      </div>

                                        <div class="col-md-6 Bank box" ><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Bank <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bank_name"  type="text" placeholder="Name"/>
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6 Bank box"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Account N <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bank_recepit_n"  type="text" placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6  Bkash box" ><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Bkash <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bkash_n"  type="text"   placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6  Rocket box"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Rocket <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="rocket_n"  type="text"   placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6 Nogod box"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Nogod <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="nogod_n"  type="text" placeholder="Number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-2" style="margin-top: 10px;"><!--start--->
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-info btn-lg">Save</button>
                                                </div>
                                            </div>
                                        </div><!--end--->
                                    </form>
                                </div>
                            </div>
  <?php echo $this->session->flashdata('smg');?>
                          <!---table----->
      <?php
          }
      ?>
                                       
            
                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->



