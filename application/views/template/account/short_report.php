    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel"  style="background:#fff;">
                  <div class="x_title">
                    <h2 style="color:#000;">Summary Report</h2>
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
                                     <p style="font-size:22px;padding:0px; margin:0px;">Summary Report</p>
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
                                   Total Boss Receive: <?php echo $bossreceiveTotal;?>  <br/>
                                </p>
                                </div>
                            </div>
                            
                    <div style="height: 280px;"></div>
                    <table class="table table-striped table-bordered" style="width:100% margin-top:60px;" >
                      
                       <thead>
                        <tr style="text-align:center;font-size:18px;">
                          <th>Total Receive</th>
                          <th>Total Expense</th>
                          <th>Total Boss Receive </th>
                        </tr>
                      </thead>


                      <tbody>
                          
                        <tr style="text-align:center;font-size:18px;" >
                          <td><?php echo $receivetotal;?></td>
                          <td><?php echo $expensetotal;?></td>  
                          <td><?php echo $bossreceiveTotal;?></td>   
                        <tr>
                            
                      </tbody>
                    </table>
                    
                    
                    <table class="table table-striped table-bordered" style="width:100% margin-top:60px;" >
                        
                      <thead>
                        <tr>
                          <th colspan="3" style="text-align: center; color: #000;font-size:24px;">Bank Status</th>
                        </tr>
                        
                        <tr>
                          <th style="text-align: center; color: #000;font-size:20px;">Bank Name</th>
                          <th style="text-align: center; color: #000;font-size:20px;">Receive</th>
                          <th style="text-align: center; color: #000;font-size:20px;">Expense</th>
                        </tr>
                        
                      </thead>
                      
                       <thead>
                         <?php foreach($AllPayMethod as $PayData){ ?>
                                
                        <tr style="font-size:16px;">
                          <th><?php echo $PayData->bank_name;?> | <?php echo $PayData->account_number;?></th>
                          <th>
                               <?php
                                  $sl= 0;
                                  $breceivetotal = 0;
                                  $bexpensetotal = 0;
                                foreach ($WeeklymonthlyReportlist as $wmreportdata) {
                                    if($wmreportdata->payment_method_id == $PayData->id){
                                      $sl++;
                                      $breceivetotal =(int)$breceivetotal+(int)$wmreportdata->pay_amount;
                                      $bexpensetotal =(int)$bexpensetotal+(int)$wmreportdata->cost_amount;
                                    }
                                }
                                echo  $breceivetotal;
                              ?>
                              
                          </th>
                          <th>
                               <?php
                                  $sl= 0;
                                  $breceivetotal = 0;
                                  $bexpensetotal = 0;
                                foreach ($WeeklymonthlyReportlist as $wmreportdata) {
                                    if($wmreportdata->payment_method_id == $PayData->id){
                                      $sl++;
                                      $breceivetotal =(int)$breceivetotal+(int)$wmreportdata->pay_amount;
                                      $bexpensetotal =(int)$bexpensetotal+(int)$wmreportdata->cost_amount;
                                    }
                                }
                                echo  $bexpensetotal;
                              ?>
                          </th>
                        </tr>
                          <?php  } ?>
                      </thead>

                    </table>
                    
                  </div>
                </div>
              <div class="row no-print">
                <div class=" ">
                  <button class="btn btn-default" onclick="printDiv('printMe')" style="color:#fff;"><i class="fa fa-print"  style="color:#000;"></i> Print</button>
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