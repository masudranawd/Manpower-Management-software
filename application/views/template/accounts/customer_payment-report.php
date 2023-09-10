
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!--<div class="page-title">
                        <div class="title_left">
                            <h3>Form Validation</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Customer<small>Search</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Accounts/CustomerPaymentReport');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "Customer"?><span class="required">*</span></label>
                                             
                                                <div class="col-md-8 col-sm-6" style="margin-top: -10px;">
                                                 <select class="chosent form-control" name="serial_no" >
                                                    <option value="" >Select Customer</option> 
                                                  <?php 
                                                    foreach ($AllCustomerList as $CustomerData) {
                                                  ?>
                                                    <option value="<?php echo $CustomerData->serial_no;?>"><?php echo $CustomerData->fullname;?> / <?php echo $CustomerData->serial_no;?> / <?php echo $CustomerData->passport_no;?> /  <?php echo $CustomerData->visa_no;?> /   <?php echo $CustomerData->id_no;?> / <?php echo $CustomerData->mobile_no;?> / </option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                              

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-4 offset-md-3">
                                                    <button type='submit' class="btn btn-info sourc">Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
</div>

  <?php 
   if($CustomerAccounts == !null){
  ?>
  <div class="col-md-12 col-sm-12">
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Customer Information<small></small></h2>
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
                            <th class="column-title" style="display: table-cell;">Serial No</th>
                            <th class="column-title" style="display: table-cell;">Name</th>
                            <th class="column-title" style="display: table-cell;">Visa No</th>
                            <th class="column-title" style="display: table-cell;">Passport No</th>
                            <th class="column-title" style="display: table-cell;">ID No </th>
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
                            <td class=" "><?php echo $CustomerInfo->serial_no;?></td>
                            <td class=" "><?php echo $CustomerInfo->fullname;?></td>
                            <td class=" "><?php echo $CustomerInfo->visa_no;?></td>
                            <td class=" "><?php echo $CustomerInfo->passport_no;?></td>
                            <td class=" "><?php echo $CustomerInfo->id_no;?></td>
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


<div class="col-md-6">  <!---table----->
                <div class="x_panel" style="background-color: #000;color:#fff; margin-top:20px;">
                  <div class="x_title">
                    <h2> Deposit Information <small></small></h2>
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
                            <th class="column-title" style="display: table-cell;">sl</th>
                            <th class="column-title" style="display: table-cell;">Date</th>
                            <th class="column-title" style="display: table-cell;">Details</th>
                            <th class="column-title" style="display: table-cell;">Method</th>
                            <th class="column-title" style="display: table-cell;">Amount</th>
                          </tr>
                        </thead>

                        <tbody>
                         <?php 
                             $CustomnerPaymentView = $this->Customer_model->GetDatapayment($CustomerInfo->id);
                               $sl = 0;
                               $detotal = 0; 
                              foreach ($CustomnerPaymentView as $PaymentView) {
                             
                           if($PaymentView->payment_type == 'Deposit'){
                                 $detotal = (int)$detotal+(int)$PaymentView->payment;
                                 $sl++;
                          ?>
                          <tr class="even pointer" style="background-color: #fff;">
                            <td class="a-center "><?php echo $sl;?></td>
                            <td class="a-center "><?php echo $PaymentView->payment_date;?></td>
                            <td class="a-center "><?php echo $PaymentView->for_payment;?></td>
                            <td class="a-center "><?php echo $PaymentView->method;?>
                            <?php 
                                if ($PaymentView->bank_name){ 
                                  echo '('.$PaymentView->bank_name.')';
                                }elseif ($PaymentView->bank_recepit_n) {
                                  echo '('.$PaymentView->bank_recepit_n.')';
                                }elseif ($PaymentView->bkash_n) {
                                  echo '('.$PaymentView->bkash_n.')';
                                }elseif ($PaymentView->rocket_n) {
                                  echo '('.$PaymentView->rocket_n.')';
                                }else{
                                  echo '';
                                }
                            ?></td>
                            <td class="a-center "><?php echo $PaymentView->payment;?></td>
                            </td>
                          </tr>
                          <?php 
                              }
                            }
                            ?>
                            <tr>
                              <td colspan="4" style="text-align: right;color:#fff;"> Total Deposit  = </td>
                              <td colspan="" style="color:#fff;"><?php echo $detotal;?></td>
                            </tr>

                        </tbody>
                      </table>
                    </div>
                </div>
</div>
</div>
<!--end-->

<div class="col-md-6">  <!---table----->
                <div class="x_panel" style="background-color: #000;color:#fff; margin-top:20px;">
                  <div class="x_title">
                    <h2> Expenses Information <small></small></h2>
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
                            <th class="column-title" style="display: table-cell;">sl</th>
                            <th class="column-title" style="display: table-cell;">Date</th>
                            <th class="column-title" style="display: table-cell;">Details</th>
                            <th class="column-title" style="display: table-cell;">Method</th>
                            <th class="column-title" style="display: table-cell;">Amount</th>
                          </tr>
                        </thead>

                        <tbody>
                         <?php 
                             $CustomnerPaymentView = $this->Customer_model->GetDatapayment($CustomerInfo->id);
                               $sl = 0;
                               $extotal = 0; 
                              foreach ($CustomnerPaymentView as $PaymentView) {
                                if($PaymentView->payment_type == 'Expense'){
                                 $extotal = (int)$extotal+(int)$PaymentView->expense_payment; 
                                  //var_dump($total_pay);die();
                                $sl++;
                          ?>
                          <tr class="even pointer" style="background-color: #fff;">
                            <td class="a-center "><?php echo $sl;?></td>
                            <td class="a-center "><?php echo $PaymentView->payment_date;?></td>
                            <td class="a-center "><?php echo $PaymentView->for_payment;?></td>
                            <td class="a-center "><?php echo $PaymentView->method;?>
                            <?php 
                                if ($PaymentView->bank_name){ 
                                  echo '('.$PaymentView->bank_name.')';
                                }elseif ($PaymentView->bank_recepit_n) {
                                  echo '('.$PaymentView->bank_recepit_n.')';
                                }elseif ($PaymentView->bkash_n) {
                                  echo '('.$PaymentView->bkash_n.')';
                                }elseif ($PaymentView->rocket_n) {
                                  echo '('.$PaymentView->rocket_n.')';
                                }else{
                                  echo '';
                                }
                            ?></td>
                            <td class="a-center "><?php echo $PaymentView->expense_payment;?></td>
                            </td>
                          </tr>
                          <?php 
                              }
                            }
                            ?>
                            <tr>
                              <td colspan="4" style="text-align: right;color:#fff;"> Total Expenses = </td>
                              <td colspan="" style="color:#fff;"><?php echo $extotal;?></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
</div>
</div>
<!--end-->


<div class="col-md-3"> </div>
<div class="col-md-6">  <!---table----->
                <div class="x_panel" style="background-color: #000;color:#fff; margin-top:20px;">
                  <div class="x_title">
                    <h2> Total Deposit And Expenses Information <small></small></h2>
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
                        </thead>

                        <tbody>
                            <tr>
                              <td colspan="4" style="text-align: right;color:#fff;"> Total debit = </td>
                              <td colspan="" style="color:#fff;"><?php echo $extotal-$detotal;?></td>
                            </tr>
                            <tr>
                              <td colspan="4" style="text-align: right;color:#fff;"> Total Credit = </td>
                              <td colspan="" style="color:#fff;"><?php echo $detotal - $extotal;?></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
</div>
</div>
<!--end-->
      <?php
          }else{
      ?>
        <?php echo "Not"; ?>
      <?php
          }
      ?>
                                       
            
                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->



