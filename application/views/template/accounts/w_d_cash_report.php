    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Weekly and Monthly  Cash Report</h2>
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
                         
                            <div class="card-box table-responsive"  id="printMe">
                        <div class="" style="text-align: center;">
                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:60px;width:60px;">
                          <h1 style="color:#000;"><?php echo $SiteData->name;?></h1>
                          <h4 style="color:#000;"><?php echo $SiteData->address;?></h4>
                          <h4 style="color:#000;">E-mail: <?php echo $SiteData->email;?></h4>
                          <h4 style="color:#000;">Phone: <?php echo $SiteData->phone;?></h4>
                             <p style="color:#000;font-weight: bold;"><?php if($fromdate){echo  'From Date:'.$fromdate; }else{ echo '';} ?> -
                                <?php if($todate){echo  'To Date:'.$todate; }else{ echo '';} ?>
                              </p>
                                </div>

                <div class="col-sm-6">
                    <table id="table_border" class="table_border" style="width:100%" >
                      <thead>
                        <tr style="border-color:1px solid #000;">
                          <th>Sl</th>
                          <th style="width:30%;text-align: center;">Category Name</th>
                          <th style="width: 20%;text-align: center;">Total Cash In</th>
                          <th style="width: 20%;text-align: center;">Total Cash Out</th>
                          <th style="width: 20%;text-align: center;">Profit</th>
                        </tr>
                      </thead>


                      <tbody>
<?php
  $Sl =0;
   foreach ($AllCashInCatData as $catData) {
  $Sl++;
?>

                        <tr>
                          <td><?php echo $Sl;?></td>
                          <td style="width: 15%;">
                            <?php echo $catData->name;?>

                          </td>
                          <td style="text-align: center;">
                      <?php
                          $sl=0;
                          $dtotal = 0;
                          $ctotal = 0;
                        foreach ($MonthWeekCasheData as $DailyCash) {
                          $sl++;
                            if($DailyCash->for_payment == $catData->name){

                          $dtotal =(int)$dtotal+(int)$DailyCash->payment;
                          $ctotal =(int)$ctotal+(int)$DailyCash->expense_payment;
                      ?>
                    <?php } } ?>

                        <?php echo $dtotal;?>
                          </td>
                          <td style="text-align: center;"><?php echo $ctotal;?></td>

                          <td style="text-align: center;">
                            <?php echo (int)$dtotal - (int)$ctotal;?>
                            </td>

                        </tr>
<?php }?>


</tbody>
</table>

                  </div> 
                <div class="col-sm-6">

                    <table id="table_border" class="table_border" style="width:100%" >
                      <thead>
                        <tr style="border-color:1px solid #000;">
                          <th colspan="10" style="text-align: center;">Payment Method</th>
                        </tr>
                      </thead>

<?php foreach ($AllCashInCatData as $catData) {
?>

                      <?php
                          $sl=0;
                          $bntotal = 0;
                          $bnototal = 0;
                        foreach ($MonthWeekCasheData as $DailyCash) {
                          $sl++;
                          if ($DailyCash->method == 'Bank') {
                          $bntotal =(int)$bntotal+(int)$DailyCash->payment;
                          $bnototal =(int)$bnototal+(int)$DailyCash->expense_payment;
                      ?>
                    <?php }  }?>

                    <?php
                          $sl=0;
                          $bktotal = 0;
                          $bkototal = 0;
                        foreach ($MonthWeekCasheData as $DailyCash) {
                          $sl++;
                          if ($DailyCash->method == 'Bkash') {
                          $bktotal =(int)$bktotal+(int)$DailyCash->payment;
                          $bkototal =(int)$bkototal+(int)$DailyCash->expense_payment;
                      ?>
                    <?php }  }?>

                    <?php
                          $sl=0;
                          $nototal = 0;
                          $noototal = 0;
                        foreach ($MonthWeekCasheData as $DailyCash) {
                          $sl++;
                          if ($DailyCash->method == 'Nogod') {
                          $nototal =(int)$nototal+(int)$DailyCash->payment;
                          $noototal =(int)$noototal+(int)$DailyCash->expense_payment;
                      ?>
                    <?php }  }?>

                     <?php
                          $sl=0;
                          $rototal = 0;
                          $roototal = 0;
                        foreach ($MonthWeekCasheData as $DailyCash) {
                          $sl++;
                          if ($DailyCash->method == 'Rocket') {
                          $rototal =(int)$rototal+(int)$DailyCash->payment;
                          $roototal =(int)$roototal+(int)$DailyCash->expense_payment;
                      ?>
                    <?php }  }?>

                     <?php
                          $sl=0;
                          $catotal = 0;
                          $caototal = 0;
                        foreach ($MonthWeekCasheData as $DailyCash) {
                          $sl++;
                          if ($DailyCash->method == 'Cash') {
                          $catotal =(int)$catotal+(int)$DailyCash->payment;
                          $caototal =(int)$caototal+(int)$DailyCash->expense_payment;
                      ?>
                    <?php }  }?>


<?php }?>



                      <tbody>
                      <tr>
                        <td colspan="2" style="text-align: center;">Cash</td>
                        <td colspan="2" style="text-align: center;">Bank</td>
                        <td colspan="2" style="text-align: center;">Bkash</td>
                        <td colspan="2" style="text-align: center;">Nogod</td>
                        <td colspan="2" style="text-align: center;">Rocket</td>
                      </tr>
                      <tr>
                        <td> In</td>
                        <td> Out</td>
                        <td> In</td>
                        <td> Out</td>
                        <td> In</td>
                        <td> Out</td>
                        <td> In</td>
                        <td> Out</td>
                        <td> In</td>
                        <td> Out</td>
                      </tr>

                      <tr>
                        <td> <?php echo $catotal;?></td>
                        <td> <?php echo $caototal;?></td>
                        <td> <?php echo $bntotal;?></td>
                        <td> <?php echo $bnototal;?></td>
                        <td> <?php echo $bktotal;?></td>
                        <td> <?php echo $bkototal;?></td>
                        <td> <?php echo $nototal;?></td>
                        <td> <?php echo $noototal;?></td>
                        <td> <?php echo $rototal;?></td>
                        <td> <?php echo $roototal;?></td>
                      </tr>


                      </tbody>
                </table>
<!---- end ---->
<br><br><br>

                    <table id="table_border" class="table_border" style="width:100%" >
                      <thead>
                        <tr style="border-color:1px solid #000;">
                          <th colspan="10" style="text-align: center;">Total Summary</th>
                        </tr>
                      </thead>

<?php foreach ($AllCashInCatData as $catData) {
?>

                      <?php
                          $sl=0;
                          $totalCashIn = 0;
                          $totalCashOut = 0;
                        foreach ($MonthWeekCasheData as $DailyCash) {
                          $sl++;
                          $totalCashIn =(int)$totalCashIn+(int)$DailyCash->payment;
                          $totalCashOut =(int)$totalCashOut+(int)$DailyCash->expense_payment;
                      ?>
                    <?php   }?>
                    

<?php }?>



                      <tbody>
                      <tr>
                        <td style="text-align: center;">total Cash In</td>
                        <td style="text-align: center;">total Cash Out</td>
                        <td  style="text-align: center;">Total Profir</td>
                      </tr>
                      <tr>

                      <tr>
                        <td style="text-align: center;"> <?php echo $totalCashIn;?></td>
                        <td style="text-align: center;"> <?php echo $totalCashOut;?></td>
                        <td style="text-align: center;"> <?php echo (int)$totalCashIn - (int)$totalCashOut;?></td>
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