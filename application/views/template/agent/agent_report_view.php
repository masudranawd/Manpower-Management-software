    <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>


  <?php 
  //var_dump($AgentAccount); die();
   if($AgentData == !null){
  ?>
            <div class="row">
  <div class="col-md-12 col-sm-12">
                          <!---table----->
                <div class="x_panel" style="background: #2A3F54;">
                  <div class="x_title">
                    <h2 style="color:#fff;"> Agent information </h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">SL </th>
                            <th class="column-title" style="display: table-cell;">Name</th>
                            <th class="column-title" style="display: table-cell;">Serail No</th>
                            <th class="column-title" style="display: table-cell;">Mobile No</th>
                          </tr>
                        </thead>

                        <tbody>

                          <tr class="even pointer">
                            <td class="a-center ">
                            <?php 
                              if($AgentData->agent_image ==null){
                              ?>
                              <img src="<?php echo base_url();?>images/user.png" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }elseif($AgentData->agent_image){
                            ?>
                              <img src="<?php echo base_url();?>images/agent/<?php echo $AgentData->agent_image;?>" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }
                            ?>
                              </td>
                            <td class=" "style="color:#fff;"><?php echo $AgentData->agent_name;?></td>
                            <td class=" "style="color:#fff;"><?php echo 'AG'.$AgentData->agent_id;?></td>
                            <td class=" "style="color:#fff;"><?php echo $AgentData->mobile_no;?></td>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>






        <div class="row">
          <div class="col-md-6">
            <table class="data table table-striped no-margin">
              <thead>
                  <tr class="btn-success">
                  <th><a href="<?php echo base_url('Agent/AgentAllCustomerList/');?><?php echo $AgentData->id;?>" style="color:#fff;font-size: 18px;">Total Customer </a></th>
                  <th style="font-size: 18px;">:&nbsp;&nbsp;
                  <?php $TotalAgentCustomer = $this->Setting_model->AgentTotalCustomer($AgentData->id);
                    if($TotalAgentCustomer){echo $TotalAgentCustomer;}else{echo '0';}?></th>
                </tr>
                  <tr class="btn-success">
                  <th><a href="<?php echo base_url('Agent/agentNewCustomerList/');?><?php echo $AgentData->id;?>" style="color:#fff;font-size: 18px;">New Customer </a></th>
                  <th style="font-size: 18px;">:&nbsp;&nbsp;
                  <?php $TotalAgentCustomer = $this->Setting_model->AgentTotalNewCustomer($AgentData->id);
                    if($TotalAgentCustomer){echo $TotalAgentCustomer;}else{echo '0';}?></th>
                </tr>
                

               <?php 
                 foreach ($AllStatus as $statusData) {
                ?>
                <tr class="btn-secondary">
                  <th><a href="<?php echo base_url('Agent/AgentCustomerStatusList');?>/<?php echo $statusData->id;?>/<?php echo $AgentData->id;?>" style="color:#fff !important;font-size: 18px;" target="_blank"><?php echo $statusData->status_name;?> </a> </th>
                  <?php $statusData = $this->Setting_model->AgentCustomerStatusTotal($statusData->id, $AgentData->id);?>
                  <th style="font-size: 18px;">:&nbsp;&nbsp;<?php if($statusData){echo $statusData;}else{echo '0';}?></th>
                </tr>

              <?php } ?>
              </thead>
            </table>
          </div>



          <div class="col-md-6">
            <div class="row">
                          
                <!--start--->
                <div class="col-md-6 col-sm-3  tile_stats_count btn-secondary" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" > 
                    <span class="count_top">
                      <i class="fa fa-money" aria-hidden="true"></i> 
                      Total Processing 
                    </span>
                 
                    <div class="count">
                      <?php 
                          $agentAllCustomerList = $this->Account_model->agentcustomerlist($AgentData->id);
                         // var_dump($agentAllaccountList);
                          $totalrate = 0; 
                          $totalticketrate = 0; 
                          foreach ($agentAllCustomerList as $agentcustomerData) {
                              $totalrate = (int)$totalrate + (int) $agentcustomerData->rate;
                              $totalticketrate = (int)$totalticketrate + (int) $agentcustomerData->ticket_price;
                          }
                          echo $totalrate;
                      ?>
                    </div>
                </div>
                <!-- end-->    


            <!--start--->
            <div class="col-md-6 col-sm-3  tile_stats_count btn-secondary" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" > 
                <span class="count_top">
                  <i class="fa fa-money" aria-hidden="true"></i> 
                  Total Ticket 
                </span>
             
                <div class="count">
                  <?php 
                      echo $totalticketrate;
                  ?>
                </div>
            </div>
            <!-- end--> 

            <!--start--->
            <div class="col-md-6 col-sm-3  tile_stats_count btn-success" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" > 
                <span class="count_top">
                  <i class="fa fa-money" aria-hidden="true"></i> 
                  Total Rate 
                </span>
             
                <div class="count">
                  <?php 
                      $totalRate =  (int)$totalticketrate + (int)$totalrate;
        
                      echo $totalRate;
                  ?>
                </div>
            </div>
            <!-- end--> 

         <!--start--->
            <div class="col-md-6 col-sm-3  tile_stats_count btn-success" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" > 
                <span class="count_top">
                  <i class="fa fa-money" aria-hidden="true"></i> 
                  Total Payment
                </span>
             
                <div class="count">
                  <?php 
                      $agentAllaccountList = $this->Account_model->agentaccountlist($AgentData->id);
                     // var_dump($agentAllaccountList);
                      $totalpay = 0; 
                      foreach ($agentAllaccountList as $agentaccountData) {
                          $totalpay = (int)$totalpay + (int) $agentaccountData->pay_amount + (int)$AgentData->balance;
                      }
                      echo $totalpay;
                  ?>
                </div>
            </div>
            <!-- end--> 

         <!--start--->
            <div class="col-md-6 col-sm-3  tile_stats_count btn-secondary" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" > 
                <span class="count_top">
                  <i class="fa fa-money" aria-hidden="true"></i> 
                  Total Cash / Due
                </span>
             
                <div class="count">
                  <?php 
                      echo (int)$totalpay - (int)$totalRate;
                  ?>
                </div>
            </div>
            <!-- end-->

         <!--start--->
            <div class="col-md-6 col-sm-3  tile_stats_count btn-secondary" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" > 
                <span class="count_top">
                  <i class="fa fa-money" aria-hidden="true"></i> 
                  Total Expense
                </span>
             
                <div class="count">
                  <?php 
                      $agentAllaccountList = $this->Account_model->agentaccountlist($AgentData->id);
                     // var_dump($agentAllaccountList);
                      $totalexpense = 0; 
                      foreach ($agentAllaccountList as $agentaccountData) {
                          $totalexpense = (int)$totalexpense + (int) $agentaccountData->cost_amount;
                      }
                      echo $totalexpense;
                  ?>
                </div>
            </div>
            <!-- end--> 



         <!--start--->
            <div class="col-md-12 col-sm-3  tile_stats_count btn-success" style="padding:30px; text-align:center;font-size: 20px;color:#fff;" > 
                <span class="count_top">
                  <i class="fa fa-money" aria-hidden="true"></i> 
                  Total Profit
                </span>
             
                <div class="count">
                  <?php 
                      $agentAllaccountList = $this->Account_model->agentaccountlist($AgentData->id);
                     // var_dump($agentAllaccountList);
                      $totalpay = 0; 
                      $totalexpense = 0;
                      foreach ($agentAllaccountList as $agentaccountData) {
                          $totalexpense = (int)$totalexpense + (int) $agentaccountData->cost_amount;
        
                          $totalpay = (int)$totalpay + (int) $agentaccountData->pay_amount;
                      }
                      echo (int)$totalpay - (int)$totalexpense ;
                  ?>
                </div>
            </div>
            <!-- end--> 

            </div>
          </div> 

            <!-- start --->
   </div><!-- end row---->
      

  <?php echo $this->session->flashdata('smg');?>
                          <!---table----->
      <?php
          }else{
              
          }
      ?>
                                       
            
                </div>
            </div>
         </div>
     </div>
            <!-- /page content -->



