    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:#000;">Agent Customer Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card-box table-responsive"  id="printMe">

                      <table id="datatable-buttons" class="tablewhite table table-striped table-bordered " style="width:100%">
                             <div class="" style="color:#000;font-weight: bold; margin-bottom: 40px;">
                                <div class="col-md-8 "  style="display:flex;">
                                    <div class="">
                                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:100px;width:100px;">
                                    </div>
                                <div class="">
                                    
                                  <h3 style="color:#FFF;"><?php echo $SiteData->name;?></h3>
                                  <h4 style="color:#FFF;"><?php echo $SiteData->address;?></h4>
                                  <h4 style="color:#FFF;">E-mail: <?php echo $SiteData->email;?></h4>
                                  <h4 style="color:#FFF;">Phone: <?php echo $SiteData->phone;?></h4>
                                </div>
                                </div>
                                <div class="col-md-4">
                                     <p style="font-size:22px;padding:0px; margin:0px;color:#FFF;">Agent Info</p>
                                    <p style="font-size:16px;padding:0px; margin:0px;color:#FFF;">
                                    <?php 
                                     $AgentName = $this->Customer_model->AgentNameById($match_by);
                                     
                                     echo 'Agent Name:'. $AgentName->agent_name.'<br>';
                                     echo 'Serial No: AG'.$AgentName->agent_id.'<br>';
                                     echo 'Phone:'. $AgentName->mobile_no;
                                    ?>
                                    </p>
                                </div>
                            </div>
                            
                       <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Entry Date</th>
                          <th width="20%">Customer</th>
                          <th width="12%">Status</th>
                          <th>Rate</th>
                          <th>Ticket Price</th>
                          <th>Payment</th>
                          <th>Due</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                          $totalRate = 0;
                          $TotalPay = 0;
                        foreach ($AgentALlCustomerList as $AgentCustomerData) {
                        
                          $sl++;$totalRate =(int)$totalRate+(int)$AgentCustomerData->rate;
                          //$ctotal =(int)$ctotal+(int)$AgentCustomerData->cost_amount;
                      ?>
                        <tr>
                          <td style="width: 5%;"><?php echo $sl;?></td>
                          <td style="width:10%;"><?php echo $AgentCustomerData->entry_date;?></td>    
                          <td style="width: 35%;">
                          <?php echo '<b>Name: </b>'.$AgentCustomerData->fullname; echo '<b> PP-No: </b>'.$AgentCustomerData->passport_no; 
                          echo '<b> SL: </b>'; echo $AgentCustomerData->serial_no; echo '<b> Phone: </b>'.$AgentCustomerData->mobile_no;?>
                            <?php echo $AgentCustomerData->note;?>
                          </td>    
                          <td style="width: 15%;">

                            <?php if($AgentCustomerData->permission == 0){
                              echo "New Customer";
                            }else{
                                    $StatusName = $this->Agent_model->GetDataByStatusMethod( $AgentCustomerData->permission);
                                    if ($StatusName  == !null) {
                                        echo $StatusName->status_name;  
                                    }else{
                                      echo '';
                                    }
                                  }
                                ?>   
 
                          </td>      
                          <td style="width: 8%;text-align: center;font-size: 14px;font-weight: 600;"> 
                            <?php if($AgentCustomerData->rate){ echo $AgentCustomerData->rate;}else{
                              echo "0.0";}?>
                          </td> 
                          <td style="width: 10%;text-align: center;font-size: 14px;font-weight: 600;"> 
                            <?php if($AgentCustomerData->ticket_price){echo $AgentCustomerData->ticket_price;}else{
                              echo "0.0";
                            }?>
                          </td>
                          <td style="width:8%;text-align: right;font-size: 14px;font-weight: 600;">
                            <?php
                               $customerpaylist = $this->Agent_model->GetDataByCustomerPaymentMethod($AgentCustomerData->id);
                                $CustomerPaytotal = 0;
                                foreach ($customerpaylist as $customerpay) {
                                  $CustomerPaytotal = (int)$CustomerPaytotal + (int)$customerpay->pay_amount;

                                }
                                
                                  echo $CustomerPaytotal;
                            ?>

                          </td>
                          <td style="width:8%;text-align: right;font-size: 14px;font-weight: 600;">
                            <?php 
                              $total = (int)$AgentCustomerData->rate + (int)$AgentCustomerData->ticket_price;
                              $totaldue = (int)$total - (int)$CustomerPaytotal;
                                echo $totaldue;
                            ?>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>


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