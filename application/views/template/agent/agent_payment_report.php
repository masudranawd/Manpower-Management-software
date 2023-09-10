    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" style="background:#fff;">
                  <div class="x_title">
                    <h2 style="color:#000;">Weekly and Monthly  Cash Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card-box table-responsive"  id="printMe" style="margin-top: 50px!important;">

                            <div class="" style="color:#000;font-weight: bold; margin-bottom: 40px;">
                                <div class="col-md-8">
                                    <div class="" style="float:left;">
                                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:100px;width:100px;">
                                    </div>
                                <div class="" style="float:left;padding-left:20px;">
                                    
                                  <h3 style="color:#000;"><?php echo $SiteData->name;?></h3>
                                  <h4 style="color:#000;"><?php echo $SiteData->address;?></h4>
                                  <h4 style="color:#000;">E-mail: <?php echo $SiteData->email;?></h4>
                                  <h4 style="color:#000;">Phone: <?php echo $SiteData->phone;?></h4>
                                </div>
                                </div>
                                <div class="col-md-4">
                                     <p style="font-size:22px;padding:0px; margin:0px;">Agent Info</p>
                                    <p style="font-size:16px;padding:0px; margin:0px;">
                                    <?php 
                                     $AgentName = $this->Customer_model->AgentNameById($agent_id);
                                     
                                     echo 'Agent Name:'. $AgentName->agent_name.'<br>';
                                     echo 'Serial No: AG'. $AgentName->agent_id.'<br>';
                                     echo 'Phone:'. $AgentName->mobile_no;
                                    ?>
                                    </p>
                                  <?php if($fromdate){echo  'From date : '.date("d/m/Y", strtotime($fromdate)); }else{ echo '';} ?> <br> <?php if($todate){echo  'To date : '.date("d/m/Y", strtotime($todate)); }else{ echo '';} ?>
                                </div>
                            </div>

                    <div style="height: 180px;"></div>
                    <table class="table table-striped table-bordered" style="width:100%;" >
                       <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Pay Date</th>
                          <th width="20%">Description</th>
                          <th width="12%">For Payment</th>
                          <th>Method</th>
                          <th>Receive</th>
                          <th>Expense</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                          $dtotal = 0;
                          $ctotal = 0;
                        foreach ($AgentAccountList as $DailyCash) {
                        
                          $sl++;$dtotal =(int)$dtotal+(int)$DailyCash->pay_amount;
                          $ctotal =(int)$ctotal+(int)$DailyCash->cost_amount;
                      ?>
                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo $DailyCash->payment_date;?></td>    
                          <td>
                           <!-- dectiption -->

                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($DailyCash->customer_id);
                                  if ($CustomerInfo == !null) {

                                  echo $CustomerInfo->fullname;echo '___'; echo $CustomerInfo->serial_no; 
                                  }else{ echo '';}
                            ?>
                            <?php echo $DailyCash->remark;?>
                          </td>    
                          <td>

                                <?php 
                                    $catgory = $this->Account_model->GetDataBycatMethod( $DailyCash->cat_id);
                                    if ($catgory  == !null) {
                                        echo $catgory->name;  
                                    }else{
                                      echo '';
                                    }
                                ?>   

                                <?php 
                                    $Expensecatgory = $this->Account_model->GetDataByExpenseCatMethod( $DailyCash->expense_id);
                                    if ($Expensecatgory  == !null) {
                                        echo $Expensecatgory->expenses_cat_name;  
                                    }else{
                                      echo '';
                                    }
                                ?>   
                          </td>      
                          <td>
                            
                                <?php 
                                    $pay_method_data = $this->Account_model->GetDataByPayMethod( $DailyCash->payment_method_id);
                                    if ($pay_method_data  == !null) {
                                        echo '<b>Bank Name: </b>.' .$pay_method_data->bank_name; echo '&nbsp;&nbsp;' ;echo '<b>Account No: </b>'.$pay_method_data->account_number; 
                                    }else{
                                      echo '';
                                    }
                                ?>   
                          </td>
                          <td style="width:13%;text-align: right;"><?php echo $DailyCash->pay_amount;?></td>
                          <td style="width:13%;text-align: right;"><?php echo $DailyCash->cost_amount;?></td>
                        </tr>
                      <?php
                        }
                      ?>


                        <tr>
                          <td colspan="5" style="text-align: right;"></td>
                          <td colspan="" style="text-align: right;">Total  = <?php echo $dtotal; ?></td>
                          <td colspan="" style="text-align: right;">Total  = <?php echo $ctotal; ?></td>
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