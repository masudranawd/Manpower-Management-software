<?php 
        if ($pData->types == 'Admin') {
    ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-6">
            <table class="data table table-striped no-margin">
              <thead>
                <tr class="btn-success">

                
                  <th><a href="<?php echo base_url('Status');?>" style="color:#fff;font-size: 18px;display: block;">New Customer </a></th>
                  <th style="font-size: 18px;">:&nbsp;&nbsp;<?php if($TotalNewCustomer){echo $TotalNewCustomer;}else{echo '0';}?></th>
                </tr>
               <?php 
                 foreach ($AllStatus as $statusData) {
                ?>
                <tr class="btn-secondary">
                  <th><a href="<?php echo base_url('Status/CustomerStatusList');?>/<?php echo $statusData->id;?>" style="color:#fff !important;font-size: 18px;display: block;"><?php echo $statusData->status_name;?> </a> </th>
                  <?php $statusData = $this->Setting_model->CustomerStatusTotal($statusData->id);?>
                  <th style="font-size: 18px;">:&nbsp;&nbsp;<?php if($statusData){echo $statusData;}else{echo '0';}?></th>
                </tr>

              <?php } ?>
              </thead>
            </table>
          </div>

          <div class="col-md-6">

         <!--  top tiles -->
            <div class="row">
                <div class="col-md-4 col-sm-4  tile_stats_count" style="padding:30px; text-align:center;font-size: 20px;background-color: #214707;color:#fff;" >
                  <span class="count_top"><i class="fa fa-user"></i> Total Customer</span>
                  <div class="count"><?php

                   if($TotalCustomer){echo $TotalCustomer;}else{echo '0';}?></div>
                </div>

                <div class="col-md-4 col-sm-4  tile_stats_count btn-success" style="padding:30px; text-align:center;font-size: 20px;background-color: #160a04;" >
                  <span class="count_top"><i class="fa fa-user"></i> Total Agent </span>
                  <div class="count"><?php if($TotalAgent){echo $TotalAgent;}else{echo '0';}?></div>
                </div>
                
                <div class="col-md-4 col-sm-4  tile_stats_count" style="padding:30px; text-align:center;font-size: 20px;background-color: #000080;color:#fff;">
                  <span class="count_top"><i class="fa fa-user"></i> Total User</span>
                  <div class="count "><?php if($TotalUser){echo $TotalUser;}else{echo '0';}?></div>
                </div>
            </div><!--end-->

            <?php
               if(empty($MonyRecpit->id)){
                   $cashtota = '00';
                   $pcashtota = '00';
               }else{
                  $todaypaymentdate = date("m/d/Y");
                 $lastdatelist = $this->Account_model->lastdateAccountlist($todaypaymentdate);
              

                 //lastday payment
                  $cashtota = 0; 
                  $totalreceive = 0;
                  $totalexpense = 0; 
                  foreach ($lastdatelist as $lastdate) {
                  $totalreceive = (int)$totalreceive + (int)$lastdate->pay_amount;
                  $totalexpense = (int)$totalexpense + (int)$lastdate->cost_amount;

                  $cashtota = (int)$totalreceive - (int)$totalexpense;
                 }
                 
                 
                 $bosslastdatelist = $this->Account_model->lastdateBossAccountlist($todaypaymentdate);
              

                 //lastday payment
                  $bossTotalReceive = 0;
                  $totalexpense = 0; 
                  foreach ($bosslastdatelist as $bosslastdateReceive) {
                  $bossTotalReceive = (int)$bossTotalReceive + (int)$bosslastdateReceive->amount;
                 }

                 




                // previous payment 
            //$paymentdate = date($MonyRecpit->payment_date, strtotime ('-1 day' , strtotime ($MonyRecpit->payment_date)));
                $paymentdate = date("m/d/Y",strtotime ('-1 day' , strtotime ($MonyRecpit->payment_date)));

                 $previousdatelist = $this->Account_model->lastdateAccountlist($paymentdate);

                  $pcashtota =0;
                  $totalpreceive = 0;
                  $totalpexpense = 0; 
                 foreach ($previousdatelist as $previousdate) {
                  $totalpreceive = (int)$totalpreceive + (int)$previousdate->pay_amount;
                  $totalpexpense = (int)$totalpexpense + (int)$previousdate->cost_amount;

                  $pcashtota = (int)$totalpreceive - (int)$totalpexpense;
                 }
                 
                 
                 $bosslastdatelist = $this->Account_model->lastdateBossAccountlist($paymentdate);
              
                 //Previousday payment
                  $PrevbossTotalReceive = 0;
                  foreach ($bosslastdatelist as $bosslastdateReceive) {
                  $PrevbossTotalReceive = (int)$PrevbossTotalReceive + (int)$bosslastdateReceive->amount;
                 }

                 

                 
                 
               }

            ?>
         <!--  top tiles -->
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-6 col-sm-4  tile_stats_count btn-success" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" >
                  <span class="count_top"><i class="fa fa-user"></i> Today Balance</span>
                  <div class="count"><?php 
               
                 $balanceTotal = (int)$cashtota - (int)$bossTotalReceive;
                  if ($balanceTotal){ echo $balanceTotal;}else{echo '00';
                  
                  }?></div>
                </div>

                <div class="col-md-6 col-sm-4  tile_stats_count btn-secondary" style="padding:30px; text-align:center;font-size: 20px;" >
                  <span class="count_top"><i class="fa fa-user"></i> Previous Balance</span>
                  <div class="count"><?php
                  
                  $prevTotalBalance = (int)$pcashtota - (int)$PrevbossTotalReceive; 
                 // if ($prevTotalBalance){ echo $prevTotalBalance;}else{echo '00';}
                  
                  ?></div>
                </div>
                
            </div><!--end-->


          </div>
        </div>

    </div>
<!-- /top tiles -->
  </div>
</div>
</div>
</div>
        <!-- /page content -->
 <!-- /page content -->
  <?php } elseif($pData->types == 'Ticket') {?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row" style="text-align:center;padding-top: 200px;">
           <div class="col-md-12"> <center><h1 style="color:black;">City Neon Ticket</h1></center></div>
        </div>

    </div>
<!-- /top tiles -->
  </div>
</div>
</div>
</div>
  <?php }?>