    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daily Report</h2>
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
                            <div class="card-box table-responsive"  id="printMe">
                                <div class="text-center">
                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:60px;width:60px;">
                          <h1 style="color:green;"><?php echo $SiteData->name;?></h1>
                          <h4 style="color:green;"><?php echo $SiteData->address;?></h4>
                          <h4 style="color:green;">E-mail: <?php echo $SiteData->email;?></h4>
                          <h4 style="color:green;">Phone: <?php echo $SiteData->phone;?></h4>
                     
                                <h2 style="color:red;">Office Expense</h2>
                                <?php if($fromdate){echo  'From Date:'.$fromdate; }else{ echo '';} ?> 
                                <?php if($todate){echo  'To Date Date:'.$todate; }else{ echo '';} ?> 
                                </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%" >
                      <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Expense Date</th>
                          <th>For Expenses</th>
                          <th>Details</th>
                          <th>Amount</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                          $total = 0;
                        foreach ($DayWeekExpenseData as $DailyExpense) {
                          $sl++;
                          $total = $total+$DailyExpense->amount;
                      ?>

                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo $DailyExpense->expense_date;?></td>       <td>
                            <?php
                             $expenseCatName = $this->Expenses_model->GetExpensesCatById($DailyExpense->expense_cat_id);
                              echo $expenseCatName->expenses_cat_name;
                            ?>
                          </td>
                          <td><?php echo $DailyExpense->details;?></td>
                          <td><?php echo $DailyExpense->amount;?></td>
                        </tr>
                      <?php
                        }
                      ?>


                        <tr>
                          <td colspan="4" style="text-align: right;">Total</td>
                          <td><?php echo $total;?></td>
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