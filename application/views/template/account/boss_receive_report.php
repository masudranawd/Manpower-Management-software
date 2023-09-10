    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            
                <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel"  style="background:#fff;">
                  <div class="x_title">
                    <h2 style="color:#000;">Boss Money Receive Report</h2>
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
                                     <p style="font-size:22px;padding:0px; margin:0px;">Cash Report</p>
                                    <p style="font-size:16px;padding:0px; margin:0px;">
                                    
                                
                                  <?php if($fromdate){echo  'From date : '.date("d/m/Y", strtotime($fromdate)); }else{ echo '';} ?> <br> <?php if($todate){echo  'To date : '.date("d/m/Y", strtotime($todate)); }else{ echo '';} ?>
                                 
                                    <?php 
                                         $bossreceiveTotal = 0;
                                        foreach($dayBossReceiveData as $BossReceiveData){
                                            $bossreceiveTotal = (int)$bossreceiveTotal + $BossReceiveData->amount;
                                        }
                                    ?>

                                  <br/>Total Receive: <?php echo $bossreceiveTotal;?> 
                                </p>
                                </div>
                            </div>
                    <div style="height: 180px;"></div>
                    <table class="table table-striped table-bordered" style="width:100% margin-top:40px;" >
                       <thead>
                         <tr>
                          <th style="text-align:center;">Sl</th>
                          <th style="text-align:center;">Recive Date</th>
                          <th style="text-align:center;width:40%;">Description</th>
                          <th style="text-align:center;">Amount</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                    $sl=0;
                         $bossreceiveTotal = 0;
                        foreach($dayBossReceiveData as $BossReceiveData){
                            $sl++;
                            $bossreceiveTotal = (int)$bossreceiveTotal + $BossReceiveData->amount;
                    ?>
                        <tr>
                          <td  style="text-align:center;"><?php echo $sl;?></td>
                          <td  style="text-align:center;"><?php echo $BossReceiveData->payment_date; ?> </td>
                        
                          <td  style="text-align:center;"><?php echo $BossReceiveData->remark; ?></td>
                          <td  style="text-align: center;"><?php echo $BossReceiveData->amount; ?></td>
                        </tr>
                    <?php
                        }
                    ?>


                        <tr>
                          <td colspan="3" style="text-align:right;font-size:16px;font-weight:600;">Total Boss Receive</td>
                          <td colspan="" style="text-align: center;font-size:16px;font-weight:600;">
                          <?php echo $bossreceiveTotal;?>
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