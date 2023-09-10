    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
    <h2><?php echo $this->session->flashdata('smgdu');?></h2>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" style="background-color: #fff;">
                  <div class="x_title">
                    <h2 style="color:#000;">Ticket Booking Report</h2>
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
                            <div class="card-box table-responsive"  id="printMe" >
                                
                             <table style="width:80%;height:100%;margin:0px auto;margin-top: 20px;">
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
                                    <h6 style="color:#000;font-weight: bold;"> Ticket Booking Report</h6>
                                  <address style="color:#000;">
                                       <strong>
                                    <h4 style="color:#000;"><?php if ($created_at){ echo 'Date:'.$created_at;}else{echo '';}?></h4>
                                    <h4 style="color:#000;"><?php if ($fromdate){ echo '<b>From Date: </b>'.date('d/m/Y', strtotime($fromdate));}else{echo '';}?> <br> <?php if ($todate){ echo '<b>To Date: </b>'.date('d/m/Y', strtotime($todate));}else{echo '';}?> </h4>

                                      </address>
                                  </th>
                                    </tr>
                              </table>

                    <table  class="table_border" style="width:90%;height:100%;margin:0px auto;">
                   
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Date</th>
                          <th>Type</th>
                          <th>Agent </th>
                          <th>Descriptions </th>
                          <th>Sale Amount </th>
                          <th>Gross Fare</th>
                          <th>Base Fare</th>
                          <th>Tax</th>
                          <th>Net Price</th>
                        </tr>
                      </thead>


                      <tbody>
                      <!--- start --->
                      <?php
                          $sl=0;
                          $total_net_price = 0;
                        foreach ($AllTicketReport as $ticketdata) { 
                          $sl++;

                          $Gross_price = $ticketdata->gross_price;
                             $Base_price = $ticketdata->base_fare;
                             $tax = $ticketdata->tax;
                             $comision = $ticketdata->comision;
                             $ait = '.3';
                             $totalcomission = ($Base_price * $comision)/100;
                             $totalait = ($Gross_price * $ait)/100;
                             $totalBase = $Base_price - $totalcomission;
                             $totalnet = (int)$totalBase + (int)$totalait + (int)$tax ;
                             $total_net_price = (int)$totalnet + (int)$total_net_price;
                      ?>

                        <tr>
                          <td style="color: #000;"><?php echo $sl;?></td>
                          <td style="color: #000;"><?php echo date('d/m/y', strtotime($ticketdata->created_at));?></td>
                          <td style="color: #000;font-weight: bold;width:10%;"><?php echo $ticketdata->issue_reissue;?> </td>
                          <td style="color: #000;width:10%;">
                            <?php 
                              $AgentName = $this->Ticket_model->Agent_info_for_invoice($ticketdata->agent_id);
                                if($AgentName){echo $AgentName->agent_name;}else{echo '';}
                             ?>
                          </td>
                        
                          <td style="width: 35%;color: #000;">  <?php 
                              $CustomerData = $this->Customer_model->customernamebyid($ticketdata->customer_id);
                              if ($CustomerData == !null) {
                              ?>
                             <b>Passenger Name :</b> <?php echo  $CustomerData->fullname; ?> <b>pp no  :</b><?php echo $CustomerData->passport_no;?> <?php }else{?>
                             <b>Passenger Name :</b> <?php echo  $ticketdata->p_name; ?> <b>pp no  :</b><?php echo $ticketdata->passport;?> 
                             <?php }?><b> Ticket N.</b> <?php echo $ticketdata->ticket_number;?> <b>Air Lince :</b><?php echo $ticketdata->air_lince;?> <b>PNR Code :</b><?php echo $ticketdata->pnr_code;?>,  <b>Issue Date : </b><?php echo date('dS M Y', strtotime($ticketdata->issue_date));?>, <b>Flight Date :</b><?php echo  date('dS M Y', strtotime($ticketdata->flight_date));?>,<b>Sector :</b> <?php echo $ticketdata->sector?>
                            <?php   if ($ticketdata->remark) {echo '<b>Remark:</b>'.$ticketdata->remark;}else{ echo '';} ?>
                          </td>
                          <td style="color:#000;font-weight: bold;text-align: center;">

                            <?php echo $ticketdata->carrier;?>
                            </td>
                          <td style="color:#000;font-weight: bold;text-align: center;">

                            <?php echo $ticketdata->gross_price;?>
                            </td>

                          <td style="font-weight: bold;color:#000;text-align: center;">
                            <?php echo $ticketdata->base_fare;?>

                          </td>
                          <td style="font-weight: bold;color:#000;text-align: center;">
                            <?php echo $ticketdata->tax;?>
                          </td>
                          <td style="font-weight: bold;color:#000;text-align: center;">
                            <?php 

                             $Gross_price = $ticketdata->gross_price;
                             $Base_price = $ticketdata->base_fare;
                             $tax = $ticketdata->tax;
                             $comision = $ticketdata->comision;
                             $ait = '.3';
                             $totalcomission = ($Base_price * $comision)/100;
                             $totalait = ($Gross_price * $ait)/100;
                             $totalBase = $Base_price - $totalcomission;
                             $totalnet = (int)$totalBase + (int)$totalait + (int)$tax ;


                             if ($ticketdata->issue_reissue == 'Refund') {
                              echo '<del>'.$totalnet.'</del> <br/>';
                              echo '<b>Charge='.((int)$totalnet - (int)$ticketdata->refund);
                            }elseif($ticketdata->issue_reissue == 'Void'){
                               echo '<del>'.$totalnet.'</del> <br/>';
                              echo '<b>Charge='.(int)$ticketdata->void;
                            }elseif($ticketdata->issue_reissue == 'Reissue'){
                              echo '<del>'.$totalnet.'</del> <br/>';
                              echo '<b>Charge='.$ticketdata->reissue.'<br/>';
                              echo '<b>Total='.((int)$totalnet + (int)$ticketdata->reissue);
                            }else{ echo $totalnet;}

                            ?>
                          </td>
                        </tr>
                      <?php } ?>
                      <!--- end ----->

                        <?php
                          $Nettotal = 0;
                          $otherNettotal = 0;    
                          $reissueNettotal = 0;  
                          $refundNettotal = 0;  
                          $voidNettotal = 0; 
                        foreach ($AllTicketReport as $ticketdata) { 

                             $Gross_price = $ticketdata->gross_price;
                             $Base_price = $ticketdata->base_fare;
                             $tax = $ticketdata->tax;
                             $comision = $ticketdata->comision;
                             $ait = '.3';
                             $totalcomission = ($Base_price * $comision)/100;
                             $totalait = ($Gross_price * $ait)/100;
                             $totalBase = $Base_price - $totalcomission;
                             $totalnet = (int)$totalBase + (int)$totalait + (int)$tax ;




                            if ($ticketdata->issue_reissue == 'Refund') {
                              $refundTotal = ((int)$totalnet - (int)$ticketdata->refund);
                              $refundNettotal = $refundNettotal + $refundTotal ;
                            }elseif($ticketdata->issue_reissue == 'Void'){
                             $voidNettotal = (int)$voidNettotal + (int)$ticketdata->void;
                            }elseif($ticketdata->issue_reissue == 'Reissue'){
                              $totalreissue = ((int)$totalnet + (int)$ticketdata->reissue);
                              $reissueNettotal = $reissueNettotal + (int)$totalreissue;
                            }else{ $otherNettotal = $otherNettotal + $totalnet;}
                          }
                      ?>

                      <tr>
                        
                          <th colspan="9" style="text-align: right;color:#000">Total</th>
                    <th  style="text-align: center;color:#000; font-weight: bold;">
                            <?php   
                             $totalnet = $Nettotal + $otherNettotal + $reissueNettotal + $refundNettotal + $voidNettotal;  
                          if($totalnet){ echo  $totalnet;}else{ echo '0';}?>
                        </th> 

                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                  <div class="row no-print">
                      <div class=" ">
                        <button class="btn btn-default" onclick="printDiv('printMe')" style="background-color: #000;"><i class="fa fa-print"></i> Print</button>
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