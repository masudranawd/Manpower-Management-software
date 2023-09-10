<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Flight<small>Report</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Ticket/FlightReport');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">From Date<span class="required">*</span></label>
                                                  <div class="col-md-3 ">
                                                      <input type="date" class="form-control"  name="fromdate">
                                                    </div>
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">To Date<span class="required">*</span></label>
                                                  <div class="col-md-3 ">
                                                      <input type="date" class="form-control" name="todate">
                                                    </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-2 offset-md-3">
                                                    <button type='submit' class="btn btn-secondary sourc" >Submit</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>
<?php 
//var_dump($AllFlightReport);die();
    if ($AllFlightReport ) {
?>

                  <div class="x_content" style="background-color: #fff;">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive"  id="printMe" >
                              <table style="width:90%;height:100%;margin:0px auto;">
                                <tr><br><br>
                                   <th style="text-align: center;width:10%;">
                                       <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:100px;width:100px;">
                                    </th>
                                    <th style="width:40%;text-align: left;">
                                    <h6 style="color:#000;font-weight: bold;"><?php echo $SiteData->name;?></h6>
                                    <h6 style="color:#000;font-weight: bold;"><?php echo $SiteData->address;?></h6>
                                    <h6 style="color:#000;font-weight: bold;">E-mail:<?php echo $SiteData->email;?></h6>
                                    <h6 style="color:#000;font-weight: bold;">Phone: <?php echo $SiteData->phone;?></h6>
                               </th>
                               <th style="width: 25%"></th>
                               <th style="width:25%;text-align: left;">

                                    <h2 style="color:#000;font-weight: bold;">Flight Report</h2>
                                    <h6 style="color:#000;font-weight: bold;"><?php if ($fromdate){ echo 'From Date:'.date('dS M Y', strtotime($fromdate));}else{echo '';}?> 
                                    <br>
                                     <?php if ($todate){ echo 'To Date:'.date('dS M Y', strtotime($todate));}else{echo '';}?> </h6>
                                  </th>
                                    </tr>
                              </table>

                    <table  class="table_border " style="width:90%;height:100%;margin:0px auto;">
                   
                      <thead>
                        <tr>
                          <th > Id</th>
                          <th style="text-align:center;">Name</th>
                          <th style="text-align:center;">Phone</th>
                          <th style="text-align:center;">AGENT</th>
                          <th style="text-align:center;">ISSUE DATE</th>
                          <th style="text-align:center;">FLIGHT DATE</th>
                          <th style="text-align:center;">SECTOR AIR</th>
                         <th style="text-align:center;">Carrier</th>
                         
                        <!--  <th >Customer Name</th>
                          <th >Descriptions </th>
                          <th >Bill Amount</th>-->
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                          $billtotal = 0; 
                          $paymenttotal = 0; 
                        foreach ($AllFlightReport as $ticketdata) {  
                             $billtotal = (int)$billtotal+(int)$ticketdata->bill_amount;
                             $sl++;
                      ?>
                        <tr>
                          <td style="width:3%;text-align:center;color:#000;"><?php echo $sl;?></td>
                          <td style="width:10%;text-align:center;color:#000;">
                            <?php 
                              $CustomerData = $this->Customer_model->customer_info_for_ticket($ticketdata->customer_id);?>
                             <b></b> <?php echo  $CustomerData->fullname; ?> 
                           </td>
                          <td style="width:10%;text-align:center;color:#000;">
                            <?php 
                              $CustomerData = $this->Customer_model->customer_info_for_ticket($ticketdata->customer_id);?>
                             <b></b> <?php echo  $CustomerData->mobile_no; ?> 
                           </td>
                            <td style="width:10%;text-align:center;color:#000;">
                           
                             <?php 
                              $AgentName = $this->Payment_model->Agent_info_for_invoice($ticketdata->agent_id);

                                echo $AgentName->agent_name;
                             ?>
                          </td>
                          <td style="width:10%;text-align:center;color:#000;"><?php echo date('dS M Y', strtotime($ticketdata->issue_date));?></td>
                          <td style="width:10%;text-align:center;color:#000;"><?php echo date('dS M Y', strtotime($ticketdata->flight_date));?></td>
                          <td style="width:10%;text-align:center;color:#000;"><?php echo $ticketdata->sector;?></td>
                          <td style="width:10%;text-align:center;color:#000;"><?php echo $ticketdata->carrier;?></td>
                        
                        </tr><?php } ?>
                    </table>
                  </div>
                </div>
                  <div class="row no-print">
                      <div class=" "><br>
                        <button class="btn btn-default" onclick="printDiv('printMe')" style="background-color: #000;"><i class="fa fa-print"></i> Print</button>
                      </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

            
<?php
    }else{
  ?>
     <div class="x_panel">
                  <div class="x_title">
                    <h2>All Flight Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>   
                        <th > Id</th>
                          <th style="text-align:center;">Name</th>
                          <th style="text-align:center;">Phone</th>
                          <th style="text-align:center;">ISSUE DATE</th>
                          <th style="text-align:center;">FLIGHT DATE</th>
                          <th style="text-align:center;">SECTOR AIR</th>
                          <th style="text-align:center;">AIRLINES/PRS OFFICE</th>
                          <th style="text-align:center;">AGENT</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllTicketData as $ticketdata) {
                              if ($ticketdata->type == 'Ticket Booking') {
                                    $sl++;

                      ?>

                        <tr>
                          <td style="width:3%;text-align:center;color:#fff;"><?php echo $sl;?></td>
                          <td style="width:10%;text-align:center;color:#fff;">
                            <?php 
                              $CustomerData = $this->Customer_model->customer_info_for_ticket($ticketdata->customer_id);?>
                             <b></b> <?php echo  $CustomerData->fullname; ?> 
                           </td>
                          <td style="width:10%;text-align:center;color:#fff;">
                            <?php 
                              $CustomerData = $this->Customer_model->customer_info_for_ticket($ticketdata->customer_id);?>
                             <b></b> <?php echo  $CustomerData->mobile_no; ?> 
                           </td>
                          <td style="width:10%;text-align:center;color:#fff;"><?php echo $ticketdata->issue_date;?></td>
                          <td style="width:10%;text-align:center;color:#fff;"><?php echo $ticketdata->flight_date;?></td>
                          <td style="width:10%;text-align:center;color:#fff;"><?php echo $ticketdata->sector;?></td>
                          <td style="width:10%;text-align:center;color:#fff;"><?php echo $ticketdata->air_lince;?></td>
                          <td style="width:10%;text-align:center;color:#fff;">
                            <?php 
                              $vendorname = $this->Payment_model->vendor_info_for_invoice($ticketdata->vendor_id);
                                echo $vendorname->vendor_name;
                             ?>
                          </td>
                          
                        </tr>
                      
                      <?php
                        }
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


<?php 
    }
?>
   
   </div><!--end row-->
          </div>
        </div>
        <!-- /page content -->
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



