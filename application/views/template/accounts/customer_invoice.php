
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
 <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Invoice Print</h2>
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

                    <section class="content invoice" id="printMe">
                      <!-- title row -->
                        <div class="" style="text-align: center;">
                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:60px;width:60px;">
                          <h1 style="color:green;"><?php echo $SiteData->name;?></h1>
                          <h4 style="color:green;"><?php echo $SiteData->address;?></h4>
                          <h4 style="color:green;">E-mail: <?php echo $SiteData->email;?></h4>
                          <h4 style="color:green;">Phone: <?php echo $SiteData->phone;?></h4>
                        </div>
                        <hr>
                        <!-- /.col -->
                      <!-- info row -->
                      <div class="row invoice-info" >
                        <div class="col-sm-2 invoice-col"></div>

                        <div class="col-sm-3 invoice-col">
                          To
                          <address>
                                          
                                         
                                          <strong>Name:
                                          <?php 
                                          $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($InvoiceData->customer_id);
                       
                                          if($CustomerInfo->fullname){ echo $CustomerInfo->fullname;}else{'';} 

                                          ?>
                                            
                                          </strong><br>
                                          <b>SL:</b>
                                          <?php 
                                          $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($InvoiceData->customer_id);
                                          if($CustomerInfo->serial_no){ echo $CustomerInfo->serial_no;}else{'';} 
                                          ?>

                                          <br>
                                          <b>Passport No:</b>
                                          <?php 
                                          $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($InvoiceData->customer_id);
                                          if($CustomerInfo->passport_no){ echo $CustomerInfo->passport_no;}else{'';} 
                                          ?>

                                          <br>
                                          <b>Phone:</b>
                                          <?php 
                                          $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($InvoiceData->customer_id);
                                          if($CustomerInfo->mobile_no){ echo $CustomerInfo->mobile_no;}else{'';} 
                                          ?>
                                      </address>
                        </div>
                        <div class="col-sm-3 invoice-col"></div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                           Invoice Info<br/>
                          <b>Invoice: ##<?php echo  $InvoiceData->voucher_no;?></b><br/>
                          <b>Date:<?php echo  $InvoiceData->payment_date;?></b>
                          <br>
                          <b>Payment Amount:</b> <?php echo  $InvoiceData->payment;?>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="  table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>sl</th>
                                <th>For Payment</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td><?php echo  $InvoiceData->for_payment;?></td>
                                <td><?php echo  $InvoiceData->method;?></td>
                                <td><?php echo  $InvoiceData->payment;?></td>
                              </tr>

                              <tr>
                                <td colspan="3" style="text-align: right;"><b>Total= </b></td>
                                <td><?php echo  $InvoiceData->payment;?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                    </section>


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
        </div>

        <script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }   
  </script>