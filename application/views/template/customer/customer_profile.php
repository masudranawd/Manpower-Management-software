    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

                      <div class="row no-print">
                        <div class=" ">
                          <button class="btn btn-default" onclick="printDiv('printMe')"><i class="fa fa-print"></i> Print</button>
                        </div>
                      </div>
                      
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                  <a href="<?php echo base_url();?>Customer" class="btn btn-info sourc">
       New Customer  Add </a>
                <div class="x_panel"  style="border:2px solid #000;">
                  <div class="x_title">
                    <h2>Customer  Details<small>Activity And pyement report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"  id="printMe">
<?php //echo var_dump($Customerview);die();?>
                    <div class="col-md-5 col-sm-9 ">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr  class="btn-success">
                                  <th>Antry Date</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->entry_date;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Name</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->fullname;?></th>
                                </tr>
                                <tr  class="btn-success">
                                  <th>Profession</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->profession;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Father's Name</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->father_name;?></th>
                                </tr>
                                <tr  class="btn-success">
                                  <th>Serial Number</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->serial_no;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Nation ID</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->id_no;?></th>
                                </tr>
                                <tr class="btn-success">
                                  <th>Country</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->pesent_nationality;?></th>
                                </tr>
                                <tr class="btn-secondary">
                                  <th>Note</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->note;?></th>
                                </tr>

                              </thead>
                            </table>
                            <!-- end user projects -->
                    </div>


                    <div class="col-md-4 col-sm-9 ">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                             
                                <tr  class="btn-secondary">
                                  <th>Visa Number </th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->visa_no;?></th>
                                </tr>
                                <tr class="btn-success">
                                  <th>Passport Number </th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->passport_no;?></th>
                                </tr>


                                <tr  class="btn-secondary">
                                  <th >Contact No</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->mobile_no;?></th>
                                </tr>
                                <tr class="btn-success">
                                  <th >Address</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->address;?></th>
                                </tr>
                                <tr  class="btn-secondary">
                                  <th >Reference Name</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->reference_name;?></th>
                                </tr>
                                <tr class="btn-success">
                                  <th >Reference number</th>
                                  <th>:&nbsp;&nbsp;<?php echo $Customerview->reference_no;?></th>
                                </tr>
                                <tr  class="btn-secondary">
                                  <th >Agent Name</th>
                                  <th>:&nbsp;&nbsp;

                         <?php 
                           if($Customerview->agent_name){  $AgentName = $this->Customer_model->AgentNameById($Customerview->agent_name);
                           echo $AgentName->agent_name;
                           }else{ echo '';}
                         ?>
                                    
                                  </th>

                                <tr  class="btn-success">
                                  <th >Agent Phone</th>
                                  <th>:&nbsp;&nbsp;

                         <?php 
                           if($Customerview->agent_name){  $AgentName = $this->Customer_model->AgentNameById($Customerview->agent_name);
                           echo $AgentName->mobile_no;
                           }else{ echo '';}
                         ?>
                                    
                                  </th>
                                </tr>

                              </thead>
                            </table>
                            <!-- end user projects -->
                    </div>

                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar" style="text-align:center">
                          <!-- Current avatar -->
                          <?php 
                            if($Customerview->customer_image == null){
                          ?>
                          <img class="img-responsive avatar-view" src="<?php echo base_url();?>images/user.png" alt="Avatar" title="Change the avatar"  style="height: 200px;width:100%;">
                          <?php    
                            }else{
                          ?>
                          <img class="img-responsive avatar-view" src="<?php echo base_url();?>images/customer/<?php echo $Customerview->customer_image;?>" alt="Avatar" title="Change the avatar" style="height: 200px;width:100%;">
                          <?php
                            }
                          ?>


                        </div>
                      </div>
                            <table class="data table table-striped no-margin">
                              <thead>

                               <tr class="btn-warning">
                                  <th style="width: 50%;">Rate</th>
                                  <th>: <?php if($Customerview->rate){echo $Customerview->rate;}else{ echo '0.0';}?></th>
                                </tr>
                               <tr class="btn-success">
                                  <th style="width: 50%;">Ticket Rate</th>
                                  <th>: <?php if($Customerview->ticket_price){echo $Customerview->ticket_price;}else{ echo '0.0';}?></th>
                                </tr>
                               <tr class="btn-info">
                                  <th style="width: 50%;">Total</th>
                                  <th>: <?php echo (int)$Customerview->ticket_price + (int)$Customerview->rate;?></th>
                                </tr>
                              </thead>
                            </table>
                    </div>
                  
<!--end-->
<div class="col-md-12">  <!---table----->
                <div class="x_panel" style="background-color: #000;color:#fff; margin-top:20px;">
                  <div class="x_title">
                    <h2> Customer Status  Information <small></small></h2>
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
                      <table class="table tablewhite jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">sl</th>
                            <th class="column-title" style="display: table-cell;">Date</th>
                            <th class="column-title" style="display: table-cell;">Status</th>
                            <th class="column-title" style="display: table-cell;">Remark</th>

                          </tr>
                        </thead>

                        <tbody>
                         <?php 
                             $CustomerStatusView = $this->Customer_model->GetDataCustomerStatus($Customerview->id);
                               $sl = 0;
                              foreach ($CustomerStatusView as $StatusView) {

                                  //var_dump($total_pay);die();
                                $sl++;
                          ?>
                          <tr class="even pointer" style="background-color: #000;">
                            <td class="a-center "><?php echo $sl;?></td>
                            <td class="a-center "><?php echo $StatusView->date;?></td>
                            <td class="a-center ">
                              <?php if($StatusView->customer_status){
                                $statusData = $this->Customer_model->CustomerStatusbyID($StatusView->customer_status);
                                echo $statusData->status_name;
                              }else{ echo '';}
                              ?>

                              </td>
                            <td class="a-center "><?php echo $StatusView->remark;?></td>
                          </tr>
                          <?php 
                              }
                            ?>
                        </tbody>
                      </table>
                    </div>
                </div>
</div>
</div>
<!--end-->
          
<!--end-->
<div class="col-md-12">  <!---table----->
                <div class="x_panel" style="background-color: #000;color:#fff; margin-top:20px;">
                  <div class="x_title">
                    <h2> Customer Payment Status  <small></small></h2>
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
                            <th class="column-title" style="display: table-cell;">Payment Date</th>
                            <th class="column-title" style="display: table-cell;">Amount</th>
                          </tr>
                        </thead>

                        <tbody>
                         <?php 
                             $CustomerpaymentStatusView = $this->Customer_model->GetDataCustomerPaymentStatus($Customerview->id);
                               $sl = 0;
                               $totalpay =0;
                              foreach ($CustomerpaymentStatusView as $paymentStatusView) {
                                $totalpay = (int)$totalpay + (int)$paymentStatusView->pay_amount;
                                $sl++;
                          ?>
                          <tr class="even pointer" style="background-color: #fff;">
                            <td class="a-center "><?php echo $sl;?></td>
                            <td class="a-center "><?php echo $paymentStatusView->payment_date;?></td>
                            <td class="a-center "><?php echo $paymentStatusView->pay_amount;?></td>
                          </tr>
                          <?php 
                              }
                            ?>

                          <tr class="even pointer" style="background-color: #fff;">
                            <td class="a-center " colspan="2"><?php echo 'Total Pay';?></td>
                            <td class="a-center "><?php echo $totalpay;?></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                </div>
</div>
</div>
<!--end-->

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        
                <script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }   
  </script>