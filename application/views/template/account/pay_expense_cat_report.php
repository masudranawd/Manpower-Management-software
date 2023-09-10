    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel"  style="background:#fff;">
                  <div class="x_title">
                    <h2 style="color:#000;">Expense Category Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card-box table-responsive"  id="printMe" style="margin-top: 30px;">

                            <div class="" style="color:#000;font-weight: bold; ">
                                <div class="col-md-8">
                                    <div class="" style="float:left;">
                                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:100px;width:100px;">
                                    </div>
                                <div class="" style="float:left;padding-left:20px;">
                                    
                                  <h3 style="color:#000;"><?php echo $SiteData->name;?></h3>
                                  <h4 style="color:#000;"><?php echo $SiteData->address;?></h4>
                                  <h4 style="color:#000;"><b>E-mail:</b> <?php echo $SiteData->email;?></h4>
                                  <h4 style="color:#000;"><b>Phone:</b> <?php echo $SiteData->phone;?></h4>
                                </div>
                                </div>
                                <div class="col-md-4">
                                     <p style="font-size:22px;padding:0px; margin:0px;">Expense Category Report</p>
                                      

                                     <p style="padding:0px; margin:0px;"><?php 
                                      $cat_data = $this->Account_model->GetDataByExpenseCatMethod($expense_id);
                                      if ($cat_data  == !null) {
                                          echo '<b>Name: </b>.' .$cat_data->expenses_cat_name; 
                                      }else{
                                        echo '';
                                      }
                                     ?>   

                                       
                                     </p>

                                    <p style="font-size:16px;padding:0px; margin:0px;">
                                
                                  <?php if($fromdate){echo  'Date : '.date("d/m/Y", strtotime($fromdate)); }else{ echo '';} ?> - <?php if($todate){echo date("d/m/Y", strtotime($todate)); }else{ echo '';} ?>
                              
                                  <?php
                                      $sl=0;
                                      $expensetotal = 0;
                                    foreach ($PaymentExpenseCatReportlist as $PayExpenseCatReportData) {
                                    
                                      $sl++;
                                      $expensetotal =(int)$expensetotal+(int)$PayExpenseCatReportData->cost_amount;
                                    }
                                  ?>

                                  <br/>Total Receive: <?php echo $expensetotal;?> <br/>
                                </p>
                                </div>
                            </div>
                    <div style="height: 190px;"></div>
                    <table class="table table-striped table-bordered" style="width:100% margin-top:40px;" >
                       <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Pay Date</th>
                          <th width="20%">Description</th>
                          <th  width="12%">For Payment</th>
                          <th>Method</th>
                          <th>Expense</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                          $expensetotal = 0;
                        foreach ($PaymentExpenseCatReportlist as $PayExpenseCatReportData) {
                        
                          $sl++;
                          $expensetotal =(int)$expensetotal+(int)$PayExpenseCatReportData->cost_amount;
                      ?>
                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo date("d/m/Y", strtotime($PayExpenseCatReportData->payment_date));?></td>    
                          <td>
                           <!-- dectiption -->

                            <?php  
                                $AgentInfo = $this->Accounts_model->Agent_info_for_invoice($PayExpenseCatReportData->agent_id);
                                   if ($AgentInfo == !null) {
                                  echo '<b>Agent-  </b>'.$AgentInfo->agent_name;echo '('.$AgentInfo->agent_id .')';
                                  }else{
                                    echo '';
                                  } 
                            ?> 
                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($PayExpenseCatReportData->customer_id);

                              if ($CustomerInfo == !null) {
                                  echo '<b>P-</b>'.$CustomerInfo->fullname; echo '('.$CustomerInfo->serial_no.')'; 
                              }else{ echo '';}
                            ?>


                            <?php echo $PayExpenseCatReportData->remark;?>
                            
                          </td>    
                          <td>

                                <?php 
                                    $receivecatgory = $this->Account_model->GetDataBycatMethod( $PayExpenseCatReportData->cat_id);
                                    if ($receivecatgory  == !null) {
                                        echo $receivecatgory->name;  
                                    }else{
                                      echo '';
                                    }
                                ?>  

                                <?php 
                                    $Expensecatgory = $this->Account_model->GetDataByExpenseCatMethod( $PayExpenseCatReportData->expense_id);
                                    if ($Expensecatgory  == !null) {
                                        echo $Expensecatgory->expenses_cat_name;  
                                    }else{
                                      echo '';
                                    }
                                ?>   

                          </td>      
                          <td>
                            
                                <?php 
                                    $pay_method_data = $this->Account_model->GetDataByPayMethod( $PayExpenseCatReportData->payment_method_id);
                                    if ($pay_method_data  == !null) {
                                        echo '<b>Bank Name: </b>.' .$pay_method_data->bank_name; echo '&nbsp;&nbsp;' ;echo '<b>Account No: </b>'.$pay_method_data->account_number; 
                                    }else{
                                      echo '';
                                    }
                                ?>   
                          </td>
                          <td style="width:13%;text-align: right;"><?php echo $PayExpenseCatReportData->cost_amount;?></td>
                        </tr>
                      <?php
                        }
                      ?>


                        <tr>
                          <td colspan="5" style="text-align: right;"></td>
                          <td colspan="" style="text-align: right;">Total  = <?php echo $expensetotal; ?></td>
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