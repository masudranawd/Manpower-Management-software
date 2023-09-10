    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel"  style="background:#;">
                  <div class="x_title">
                    <h2 style="color:#000;">Status Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="">
                        <div class="card-box table-responsive"  id="printMe">

                        <table id="datatable-buttons"  class="tablewhite table table-striped table-bordered" style="margin-top: 30px;">
                            
                        <div class="" style="color:#FFF;font-weight: bold;margin-top: 30px;">
                            <div class="col-md-8" style="display:flex;">
                                <div class="">
                                  <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:100px;width:100px;">
                                </div>
                                  <div class="" style="padding-left:20px;">
                                      
                                    <h3 style="color:#FFF;"><?php echo $SiteData->name;?></h3>
                                    <h4 style="color:#FFF;"><?php echo $SiteData->address;?></h4>
                                    <h4 style="color:#FFF;">E-mail: <?php echo $SiteData->email;?></h4>
                                    <h4 style="color:#FFF;">Phone: <?php echo $SiteData->phone;?></h4>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                 <p style="font-size:22px;padding:0px; margin:0px;">Status Report </p>
                                <p style="font-size:16px;padding:0px; margin:0px;">                                    </p>
                              <?php if($fromdate){echo  'From date :'.date('dS M Y', strtotime($fromdate)); }else{ echo '';} ?> <br> <?php if($todate){echo  'To date :'.date('dS M Y', strtotime($todate)); }else{ echo '';} ?>
                            </div>
                        </div>
                        
                           <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Date</th> 
                              <th>Customer Name</th>
                              <th>Agent Name</th>
                              <th>Customer Status</th>
                              <th>Remark</th>
                            </tr>
                          </thead>


                          <tbody>
                          <?php
                              $sl=0;
                            foreach ($AllStatusList as $StatusData) {
                              $sl++;
                          ?>
                            <tr>
                              <td><?php echo $sl;?></td>
                              <td><?php echo date('dS M Y', strtotime($StatusData->date));?></td>
                              <td>

                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($StatusData->customer_id);
                                  echo $CustomerInfo->fullname;echo '<b> __ </b>'; echo $CustomerInfo->serial_no; echo '<b> __ </b>'; echo $CustomerInfo->passport_no; 
                                  echo '<b> <br>phone:</b>'.$CustomerInfo->mobile_no;
                            ?>
                              </td>
                              <td>
                                  
                               <?php 
                                 if($CustomerInfo->agent_name){ $AgentName = $this->Customer_model->AgentNameById($CustomerInfo->agent_name);
                                 echo $AgentName->agent_name; echo '('.$AgentName->agent_id.')';
                                 echo '<b> <br>phone:</b>'.$AgentName->mobile_no; 
                                 }else{ echo '';}
                               ?>
                                
                              </td>
                              <td>
                                
                              <?php if($StatusData->customer_status){
                                $statusData = $this->Customer_model->CustomerStatusbyID($StatusData->customer_status);
                                echo $statusData->status_name;
                              }else{ echo '';}
                              ?>

                              </td>
                              <td><?php echo $StatusData->remark;?></td>
                            </tr>
                          <?php
                            }
                          ?>


                      </tbody>
                    </table>
                  </div>
                </div>
                
              <div class=" no-print">
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