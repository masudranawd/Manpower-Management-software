    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" style="background:#fff;">
                  <div class="x_title">
                    <h2 style="color:#000;">Cash Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive"  id="printMe">
                              <div class="" style="color:#000;font-weight: bold;display: flex;align-items: center; ">
                                    <div class="" style="float:left;width:70%;padding:40px;">
                                     <div class="">
                                        <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:120px;width:120px;">
                                     </div>
                                      <p style="color:#000;font-size:22px;font-weight:600;line-height:30px;margin:0px;"><?php echo $SiteData->name;?></p>
                                      <p style="color:#000;font-size:14px;font-weight:600;margin: 0px;line-height:25px;">   We provide a quality service to the people by Hajj, Umrah and all kind of visa processing and all Airlines Ticket all over the world.</p>
                                      <p style="color:#000;font-size: 12px;font-weight: 400;margin: 0px;line-height:25px;"><?php echo $SiteData->address;?></p>
                                      <p style="color:#000;font-size: 12px;font-weight: 400;margin: 0px;line-height:25px;"><b>E-mail:</b> <?php echo $SiteData->email;?></p>
                                      <p style="color:#000;font-size: 12px;font-weight: 400;margin: 0px;line-height:25px;"><b>Phone:</b> <?php echo $SiteData->phone;?></p>
                                    </div>
                                <div class="report-account" style="float:left;width:30%;">
                                    <p style="font-size:22px;padding:0px; margin:0px;">Daily Cash Report</p>
                                    <p style="font-size:16px;padding:0px; margin:0px;">
                                        <?php if($payment_date){echo  'Date: '.date('dS M Y', strtotime($payment_date)); }else{ echo '';} ?>
                                    </p>
                                </div>
                            </div>
                            
                                
                    <table id="table_border" class="table_border" style="width:100%" >
                      <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Payment Date</th>
                          <th>Description</th>
                          <th>For Payment</th>
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
                        foreach ($daycashData as $DailyCash) {
                          $sl++;
                          $dtotal =(int)$dtotal+(int)$DailyCash->pay_amount;
                          $ctotal =(int)$ctotal+(int)$DailyCash->cost_amount;
                      ?>
                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo date('dS M Y', strtotime($DailyCash->payment_date));?></td>    
                          <td>
                           <!-- dectiption -->
                          <?php
                            if ($DailyCash->customer_id == !null) {
                          ?>
                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($DailyCash->customer_id);
                                  if($CustomerInfo){ echo $CustomerInfo->fullname;echo '___'; echo $CustomerInfo->serial_no; }else{ echo '';}
                            ?>
                          <?php
                            }elseif($DailyCash->agent_id){
                          ?>

                            <?php  
                                $AgentInfo = $this->Accounts_model->Agent_info_for_invoice($DailyCash->agent_id);
                                 if($AgentInfo){echo $AgentInfo->agent_name; echo '___'; echo $AgentInfo->agent_id;}else{ echo '';} 
                            ?>

                          <?php
                            }else{
                            ?>
                            <?php echo 'ofice Expense';?>
                            <?php
                            }
                          ?>


                            
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
                                <?php echo $DailyCash->remark;?>
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
                       <!--- prervious Balance ---------->

                        <?php
                            $prevtotalcash =0;
                            $prevtotalexpense =0 ;
                            $prevbalance = 0;
                            //var_dump($PrevCashBalance);die();
                             foreach($PrevCashBalance as $prevcashData){

                              $prevtotalcash = (int)$prevtotalcash + (int)$prevcashData->pay_amount;
                              $prevtotalexpense = (int)$prevtotalexpense + (int)$prevcashData->cost_amount;
                              $prevbalance = (int)$prevtotalcash - $prevtotalexpense;
                             }

                            $prevbossbalance = 0;
                             foreach($PrevBossBalance as $prevbossData){
                              $prevbossbalance = (int)$prevbossbalance + (int)$prevbossData->amount;
                             }

                             
?>
                          <tr>
                              <td colspan="5" style="text-align:right;font-size:16px;font-weight:600;">Previous  Balance</td>
                              <td colspan="8" style="text-align:right;font-size:16px;font-weight:600;"><?php echo $prevbalance - $prevbossbalance;?></td>
                          </tr>  

                           <tr>
                              <td colspan="5" style="text-align:right;font-size:16px;font-weight:600;">Today  Balance</td>
                              <td colspan="8" style="text-align:right;font-size:16px;font-weight:600;">
                                <?php  $totalcash =  (int)$dtotal - (int)$ctotal; 
                                $DateCashTotal = (int)$totalcash - (int)$bossreceiveTotal;
                                echo $DateCashTotal;?></td>
                          </tr>
                        <!---------->
                        <tr>
                          <td colspan="5" style="text-align:right;font-size:16px;font-weight:600;">Total Balance</td>
                          <td colspan="8" style="text-align: right;font-size:16px;font-weight:600;">
                          <?php $totalcash =  (int)$dtotal - (int)$ctotal; 
                                $DateCashTotal = (int)$totalcash - (int)$bossreceiveTotal;
                                $totalprev = $prevbalance - $prevbossbalance ;
                                echo $DateCashTotal + $totalprev;
                          ?>
                          </td>
                        </tr>
                        <!---------->
                        <!---------->
                         
                      </tbody>
                    </table>


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
          </div>
        </div><!--end row-->
      </div>
    </div>
 </div>
<!-- /page content -->

