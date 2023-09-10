    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel"  style="background:#fff;">
                  <div class="x_title">
                    <h2 style="color:#000;">Weekly and Monthly  Cash Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card-box table-responsive"  id="printMe" style="margin-top: 30px;">

                            <div class="" style="color:#000;font-weight: bold; display:flex;align-items:center;">
                                <div class="" style="float:left;width:70%;padding:40px;">
                                    <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:100px;width:100px;">
                                 
                                  <h3 style="color:#000;"><?php echo $SiteData->name;?></h3> 
                                  <p style="color:#000;font-size:14px;font-weight:600;margin: 0px;line-height:25px;">   We provide a quality service to the people by Hajj, Umrah and all kind of visa processing and all Airlines Ticket all over the world.</p>
                                  <h4 style="color:#000;"><?php echo $SiteData->address;?></h4>
                                  <h4 style="color:#000;"><b>E-mail:</b> <?php echo $SiteData->email;?></h4>
                                  <h4 style="color:#000;"><b>Phone:</b> <?php echo $SiteData->phone;?></h4>
                                </div>
                                <div class="report">
                                    <p style="font-size:22px;padding:0px; margin:0px;">Cash Report</p>
                                    <p style="font-size:16px;padding:0px; margin:0px;">
                                    
                                
                                  <?php if($fromdate){echo  'From date : '.date("d/m/Y", strtotime($fromdate)); }else{ echo '';} ?> <br> <?php if($todate){echo  'To date : '.date("d/m/Y", strtotime($todate)); }else{ echo '';} ?>
                                 
                                  <?php
                                      $sl=0;
                                      $receivetotal = 0;
                                      $expensetotal = 0;
                                    foreach ($WeeklymonthlyReportlist as $wmreportdata) {
                                    
                                      $sl++;$receivetotal =(int)$receivetotal+(int)$wmreportdata->pay_amount;
                                      $expensetotal =(int)$expensetotal+(int)$wmreportdata->cost_amount;
                                    }
                                  ?> 
                                  <?php 
                                     $bossreceiveTotal = 0;
                                    foreach($dayBossReceiveData as $BossReceiveData){
                                        $bossreceiveTotal = (int)$bossreceiveTotal + $BossReceiveData->amount;
                                    }
                                ?>

                                  <br/>Total Receive: <?php echo $receivetotal;?> <br/>
                                   Total Expense: <?php echo $expensetotal;?> <br/>
                                   Total Boss Receive: <?php echo $bossreceiveTotal?>  <br/>
                                </p>
                                </div>
                            </div>    
                            
                    <table class="table_border" style="width:100% margin-top:40px;" >
                       <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Pay Date</th>
                          <th width="20%">Description</th>
                          <th  width="12%">For Payment</th>
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
                        foreach ($WeeklymonthlyReportlist as $wmreportdata) {
                        
                          $sl++;$dtotal =(int)$dtotal+(int)$wmreportdata->pay_amount;
                          $ctotal =(int)$ctotal+(int)$wmreportdata->cost_amount;
                      ?>
                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo date("d/m/Y", strtotime($wmreportdata->payment_date));?></td>    
                          <td>
                           <!-- dectiption -->

                            <?php  
                                $AgentInfo = $this->Accounts_model->Agent_info_for_invoice($wmreportdata->agent_id);
                                   if ($AgentInfo == !null) {
                                  echo '<b>Agent-  </b>'.$AgentInfo->agent_name;echo '('.$AgentInfo->agent_id .')';
                                  }else{
                                    echo '';
                                  } 
                            ?> 
                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($wmreportdata->customer_id);

                              if ($CustomerInfo == !null) {
                                  echo '<b>P-</b>'.$CustomerInfo->fullname; echo '('.$CustomerInfo->serial_no.')'; 
                              }else{ echo '';}
                            ?>


                            <?php echo '<b> Remark: </b>'.$wmreportdata->remark;?>
                            
                          </td>    
                          <td>

                                <?php 
                                    $receivecatgory = $this->Account_model->GetDataBycatMethod( $wmreportdata->cat_id);
                                    if ($receivecatgory  == !null) {
                                        echo $receivecatgory->name;  
                                    }else{
                                      echo '';
                                    }
                                ?>  

                                <?php 
                                    $Expensecatgory = $this->Account_model->GetDataByExpenseCatMethod( $wmreportdata->expense_id);
                                    if ($Expensecatgory  == !null) {
                                        echo $Expensecatgory->expenses_cat_name;  
                                    }else{
                                      echo '';
                                    }
                                ?>   

                          </td>      
                          <td>
                            
                                <?php 
                                    $pay_method_data = $this->Account_model->GetDataByPayMethod( $wmreportdata->payment_method_id);
                                    if ($pay_method_data  == !null) {
                                        echo '<b>Bank Name: </b>.' .$pay_method_data->bank_name; echo '&nbsp;&nbsp;' ;echo '<b>Account No: </b>'.$pay_method_data->account_number; 
                                    }else{
                                      echo '';
                                    }
                                ?>   
                          </td>
                          <td style="width:13%;text-align: right;"><?php echo $wmreportdata->pay_amount;?></td>
                          <td style="width:13%;text-align: right;"><?php echo $wmreportdata->cost_amount;?></td>
                        </tr>
                      <?php
                        }
                      ?>
                    
                    <!--------------------------------------------------->
                    <!--------------------------------------------------->
            
                        
                        
                        <!--- boss receive ---->
                        <tr style="height:40px;">
                            <td colspan="7"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="6" style="text-align:center;font-size:16px;font-weight:600;">Boss Receive </td>
                            <td colspan="7" style="text-align:center;font-size:16px;font-weight:600;">Amount</td>
                        </tr>
                        
                    <?php 
                         $bossreceiveTotal = 0;
                        foreach($dayBossReceiveData as $BossReceiveData){
                            $bossreceiveTotal = (int)$bossreceiveTotal + $BossReceiveData->amount;
                    ?>
                        <tr>
                          <td colspan="6" style="text-align:center;font-size:12px;font-weight:600;"><?php echo $BossReceiveData->payment_date; ?> <?php echo $BossReceiveData->remark; ?></td>
                          <td colspan="" style="text-align: right;"><?php echo $BossReceiveData->amount; ?></td>
                        </tr>
                    <?php
                        }
                    ?>


                        <!--- boss receive ---->
                        <tr style="height:40px;">
                            <td colspan="7"></td>
                        </tr>
                        <!--- boss receive ---->
                        
                        
                        <tr>
                          <td colspan="5" style="text-align:right;font-size:16px;font-weight:600;">Total Receive</td>
                          <td colspan="8" style="text-align: right;font-size:16px;font-weight:600;">
                          <?php echo $dtotal;?>
                          </td>
                        </tr>
                        <!---------->
                        
                        <tr>
                          <td colspan="5" style="text-align:right;font-size:16px;font-weight:600;">Total Expense</td>
                          <td colspan="8" style="text-align: right;font-size:16px;font-weight:600;">
                          <?php echo $ctotal;?>
                          </td>
                        </tr>
                        <!---------->
                        
                        <tr>
                          <td colspan="5" style="text-align:right;font-size:16px;font-weight:600;">Total Boss Receive</td>
                          <td colspan="8" style="text-align: right;font-size:16px;font-weight:600;">
                          <?php echo $bossreceiveTotal;?>
                          </td>
                        </tr>
                        <!---------->
                        
                        <tr>
                          <td colspan="5" style="text-align:right;font-size:16px;font-weight:600;">Balance</td>
                          <td colspan="8" style="text-align: right;font-size:16px;font-weight:600;">
                          <?php $totalcash =  (int)$dtotal - (int)$ctotal; 
                                echo (int)$totalcash - (int)$bossreceiveTotal;
                          ?>
                          </td>
                        </tr>
                        <!---------->
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







<script type="text/javascript">
  
</script>
        <script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }   
  </script>