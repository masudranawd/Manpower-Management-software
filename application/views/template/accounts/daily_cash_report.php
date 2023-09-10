    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daily Cash Report</h2>
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
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive"  id="printMe">
                              <div class="text-center">
                        <div class="" style="text-align: center;">
                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:60px;width:60px;">
                          <h1 style="color:#000;"><?php echo $SiteData->name;?></h1>
                          <h4 style="color:#000;"><?php echo $SiteData->address;?></h4>
                          <h4 style="color:#000;">E-mail: <?php echo $SiteData->email;?></h4>
                          <h4 style="color:#000;">Phone: <?php echo $SiteData->phone;?></h4>
                            <p style="color:#000;">
                                <?php if($payment_date){echo  'Date:'.$payment_date; }else{ echo '';} ?>
                            </p>
                                </div>
                    <table id="table_border" class="table_border" style="width:100%" >
                      <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Payment Date</th>
                          <th>Description</th>
                          <th>For Payment</th>
                          <th>Method</th>
                          <th>Debit</th>
                          <th>Cradit</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                          $sl=0;
                          $dtotal = 0;
                          $ctotal = 0;
                        foreach ($DailyCashData as $DailyCash) {
                          $sl++;
                          $dtotal =(int)$dtotal+(int)$DailyCash->payment;
                          $ctotal =(int)$ctotal+(int)$DailyCash->expense_payment;
                      ?>
                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo $DailyCash->payment_date;?></td>    
                          <td>
                           <!-- dectiption -->
                          <?php
                            if ($DailyCash->customer_id == !null) {
                          ?>
                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($DailyCash->customer_id);
                                  echo $CustomerInfo->fullname;echo '___'; echo $CustomerInfo->serial_no; 
                            ?>
                          <?php
                            }elseif($DailyCash->agent_id){
                          ?>

                            <?php  
                                $CustomerInfo = $this->Accounts_model->Agent_info_for_invoice($DailyCash->agent_id);
                                  echo $CustomerInfo->agent_name; echo '___'; echo $CustomerInfo->agent_id; 
                            ?>

                          <?php
                            }else{
                            ?>
                            <?php echo 'ofice Expense';?>
                            <?php
                            }
                          ?>


                            
                          </td>    
                          <td><?php echo $DailyCash->for_payment;?></td>      
                          <td><?php echo $DailyCash->method;?></td>
                          <td style="width:13%;text-align: right;"><?php echo $DailyCash->payment;?></td>
                          <td style="width:13%;text-align: right;"><?php echo $DailyCash->expense_payment;?></td>
                        </tr>
                      <?php
                        }
                      ?>


                        <tr>
                          <td colspan="5" style="text-align: right;"></td>
                          <td colspan="" style="text-align: right;">Total Debit = <?php echo $dtotal; ?></td>
                          <td colspan="" style="text-align: right;">Total Cradit = <?php echo $ctotal; ?></td>
                        </tr>
                        <tr>
                          <td colspan="8" style="text-align: right;">Total Cash = <?php echo (int)$dtotal - (int)$ctotal; ?></td>
                          
                        </tr>
                      </tbody>
                    </table>


                  </div>
                </div>

                      <div class="row no-print">
                        <div class=" ">
                          <button class="btn btn-default" onclick="printDiv('printMe')"><i class="fa fa-print"></i> Print</button>
                        </div>
                      </div>
              </div>
            </div>
                </div>
              </div>

            </div><!--end row-->
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