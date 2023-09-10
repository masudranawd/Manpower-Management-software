    <!-- page content -->
        <div class="">


  <div class="col-md-12 col-sm-12">
    <div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right" style="text-align: center;">
                  <a  href="<?php echo base_url('')?>DateWais" type="button" class="btn btn-round btn-secondary">Go Back </a>
                  <a  href="<?php echo base_url('Accounts/CashInayment/')?><?php echo $PayDate->id;?>" type="button" class="btn btn-round btn-success">Cash In </a>
                  <a  href="<?php echo base_url('Accounts/CashOutayment/')?><?php echo $PayDate->id;?>" type="button" class="btn btn-round btn-info">Cash Out </a>
              </ul>
            </nav>
            </div>
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color: #fff;"> &nbsp;&nbsp; &nbsp;&nbsp;Daily Ladger Book<small>Date:<?php echo $PayDate->pay_date;?> <?php echo $this->session->flashdata('sms');?> </small></h2>
                    <center> 
                      <botton type="button" class="btn btn-round btn-success btn-block" style="font-size: 22px;">Cash in </botton>
                    </center>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" style="width: 100%;">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align: center;">Sl</th>
                            <th class="column-title" style="text-align: center;">C_ID</th>
                            <th class="column-title" style="text-align: center;">A_ID</th>
                            <th class="column-title" style="text-align: center;">Name</th>
                            <th class="column-title" style="text-align: center;">PP No</th>
                            <th class="column-title" style="text-align: center;">Type</th>
                            <th class="column-title" style="text-align: center;">For</th>
                            <th class="column-title" style="text-align: center;">M Recipt</th>
                            <th class="column-title" style="text-align: center;">Method</th>
                            <th class="column-title" style="text-align: center;">Amount</th>
                            <th class="column-title" style="text-align: center;">Remark</th>
                            <th class="column-title" style="text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                      <?php 
                          // var_dump($AllvisaCategory);
                          $sl = 0;
                          $totalpay = 0;
                          $totalEx = 0;
                            foreach ($AllPaymentData as $PaymentData) {
                              if($PaymentData->pay_id == $id){
                              if($PaymentData->payment_type == 'Deposit'){
                              $sl++;
                              $totalpay = (int)$totalpay + (int)$PaymentData->payment;
                              $totalEx = (int)$totalEx + (int)$PaymentData->expense_payment;
                          ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $sl;?></td>


                            <td class=" "> 
                              <?php 
                                  if ($PaymentData->customer_id == !null ) {
                               ?>                             
                                <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($PaymentData->customer_id);echo ' <b> Sl. </b>'; echo $CustomerInfo->serial_no;
                              ?>
                            <?php }else{
                                echo '';} ?>

                            </td>

                            <td class=" ">

                              <?php 
                                  if ($PaymentData->agent_id == !null ) {
                               ?>   
                              <?php  
                                  $AgentInfo = $this->Accounts_model->Agent_info_for_invoice($PaymentData->agent_id);echo '<b>Sl.</b>';
                                    echo $AgentInfo->agent_id; 
                              ?>

                            <?php }else{
                                echo '';} ?>
                            </td>


                            <td class="" style="width: 12%;"> 
                              <?php 
                                  if ($PaymentData->customer_id == !null ) {
                               ?>                             
                                <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($PaymentData->customer_id);
                                   echo $CustomerInfo->fullname;
                              ?>
                            <?php }elseif($PaymentData->agent_id == !null){
                              ?>
                                <?php  
                                  $AgentInfo = $this->Accounts_model->Agent_info_for_invoice($PaymentData->agent_id);
                                    echo $AgentInfo->agent_name;
                              ?>

                              <?php }else{ echo $PaymentData->other_c_details;} ?>

                            </td>

                            <td class=" "> 
                              <?php 
                                  if ($PaymentData->customer_id == !null ) {
                               ?>                             
                                <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($PaymentData->customer_id); echo $CustomerInfo->passport_no;
                              ?>
                            <?php }else{
                                echo '';} ?>
                            </td>



                            <td style="text-align: center;"><?php if( $PaymentData->type == !null){echo $PaymentData->type;}else{echo '';}?></td> 

                            <td style="text-align: center;">
                                 <?php echo $PaymentData->for_payment; ?> 
                            </td>
                            <td style="text-align: center;"><?php echo $PaymentData->money_recipt;?></td>
                            <td style="text-align: left;">
                                
                                <?php  if($PaymentData->method == 'CashIn'){
                                ?>
                                
                                   <b><?php echo $PaymentData->method; ?> </b> 
                                    
                                    
                                <?php
                                    }elseif($PaymentData->method == 'Bank'){
                                ?>
                                    <?php echo '<b>Bank Name: </b>'; echo $PaymentData->bank_name; ?> 
                                    <?php echo '<b> Recipt No: </b>'; echo $PaymentData->bank_recepit_n; ?> 
                                    <?php echo ''; echo $PaymentData->method_details; ?> 
                                    
                                <?php
                                    }elseif($PaymentData->method == 'Bkash'){
                                ?>
                                    <b><?php echo $PaymentData->method; ?> </b> 
                                    <?php echo $PaymentData->bkash_n; ?> 
                                    
                                <?php
                                    }elseif($PaymentData->method == 'Rocket'){
                                ?>
                                    <b><?php echo $PaymentData->method; ?> </b> 
                                    <?php echo $PaymentData->rocket_n; ?> 
                                    
                                <?php
                                    }elseif($PaymentData->method == 'Nogod'){
                                ?>
                                   <b><?php echo  $PaymentData->method; ?> </b> 
                                    <?php echo $PaymentData->nogod_n; ?> 
                                    
                                <?php 
                                    }
                                ?>
                        
                            </td>
                            <td style="text-align: center;"><?php if($PaymentData->payment== null){ echo $PaymentData->expense_payment;}else{ echo $PaymentData->payment;}?></td>
                            <td class=" "><?php echo $PaymentData->remark;?></td>
                            <td class=" ">
                              <a href="" class="btn btn-round btn-danger" data-toggle="modal" data-target="#Remove<?php echo $PaymentData->id;?>">X</a>
                            </td>
                          </tr>

<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $PaymentData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Voucher  No:##<?php echo $PaymentData->voucher_no;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Accounts/RemoveCashInpayment/');?><?php  echo $PaymentData->id;?>/<?php  echo $PaymentData->pay_id;?>" method="post">
          <div class="field item form-group">
            <label class="col-form-label col-md-12 col-sm-3  label-align" style="color:red;font-size: 1.3rem;font-weight: 900;text-align: center;">  Are You Sure ? Remove It. </label>
         </div>     

          <div class="ln_solid">
            <div class="form-group">
               <div class="col-md-6 offset-md-3">
                   <button type='submit' class="btn btn-primary">Yes</button>
                    <button type='reset' class="btn btn-success">No</button>
                 </div>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!--- model end ----->
                            <?php
                            }
                          }
                         }
                        ?>
                        
        <!-- start -->
        <tr style="height: 400px;">
          <form action="<?php echo base_url('Accounts/AddNewCashInPaymentData');?>" method="post" >
           <input type="hidden" name="payment_date" value="<?php echo $PayDate->pay_date;?>">
           <input type="hidden" name="pay_id" value="<?php echo $PayDate->id;?>">
             <td style="width: 4%;">  <?php echo $sl+1;?>
               </td>
               
            <td colspan="2" style="width: 14%;">

                  <div class="field item form-group  Agent Booth" style="margin-top: -8px;">
                   <select class="chosent form-control pay" name="agent_id" style="height: 300px;" >
                      <option value="" >Select Agent</option> 
                        <?php  foreach ($AllAgentList as $AgentData) { ?>
                          <option value="<?php echo $AgentData->id;?>"> <?php echo $AgentData->agent_id;?> / <?php echo $AgentData->agent_name;?> 
                          </option>
                     <?php  }  ?>
                    </select>
                 <script type="text/javascript">$(".chosent").chosen(); </script>
               </div>
               </td>

               <td colspan="2" style="width: 8%;">
                <div class="field item form-group  customer Booth" style="margin-top: -8px;">
                 <select style="border-radius: 10px;" class="chosent form-control pay" name="customer_id"  >
                       <option  value="">Select Customer</option> 
                        <?php 
                          foreach ($AllCustomerList as $CustomerData) {
                        ?>
                        <option value="<?php echo $CustomerData->id;?>"> <?php echo $CustomerData->serial_no;?> / <?php echo $CustomerData->fullname;?> / <?php echo $CustomerData->passport_no;?>  
                        </option>
                        <?php
                          }  
                       ?>
                  </select>
                <script type="text/javascript">$(".chosent").chosen(); </script>
              </div>
              
                <div  class="field item form-group  customer Booth" >
                    
                    <textarea  class="form-control " type="text" name="other_c_details" placeholder="enter Remark" rows="3">
                 </textarea>
                    </div>
               </td><!--end-->

             
   

               <td style="width: 10%;">
                   <div class="field item form-group ">
                      <div class="col-md-12">
                      <select class="form-control " name="type" required>
                        <option value=""></option>
                        <option value="customer">Customer</option>
                        <option value="Agent">Agent</option>
                        <option value="Others">Others</option>
                     </select>
                      </div>
                    </div>
               </td>

               <td style="width: 9%;">
                  <div class="field item form-group" style="margin-top: -8px;">
                          <select class="chosen form-control pay" name="for_payment" required>
                            <option>For Payment</option> 
                            <?php 
                                foreach($AllCashInCatData as $CashInCatData){
                                    if($CashInCatData->status == 1){
                            ?>
                            <option value="<?php echo $CashInCatData->name;?>"><?php echo $CashInCatData->name;?></option>
                            <?php
                                }
                                }
                            ?>
                          </select>
                      <script type="text/javascript">$(".chosen").chosen(); </script>
                    </div>                 
               </td>
               <td style="width: 13%;">
                   <div class="field item form-group">
                      <div class="col-md-12">
                        <input  class="form-control pay" type="text" name="money_recipt" placeholder="M Recipt" >
                      </div>
                    </div>
               </td>
               

               <td style="width: 15%;">
                     
              <script>
              $(document).ready(function(){
                  $("select").change(function(){
                      $(this).find("option:selected").each(function(){
                          var optionValue = $(this).attr("value");
                          if(optionValue){
                              $(".box").not("." + optionValue).hide();
                              $("." + optionValue).show();
                          } else{
                              $(".box").hide();
                          }
                      });
                  }).change();
              });
              </script>

                                  <!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <select class="form-control"  name="method" required>
                                                    <option value="">Select Payment Method</option>
                                                    <option value="CashIn">CashIn</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                  </select>
                                                </div>
                                        </div><!--end--->
                                      <!--start--->
                                          <div class="field item form-group Bank box box1">
                                            <input type="hidden" name="bank_name" value="">
                                            <input type="checkbox" name="bank_name" value="IBBL"><b>IBBL </b>
                                            <input type="checkbox" name="bank_name" value="SEBL"><b>SEBL  </b> 
                                            <input type="checkbox" name="bank_name" value="Others"><b>Others  </b>
                                        </div><!--end--->
                                        

  
                                        <!--start--->
                                          <div class="field item form-group Bank box">
                                                  <input class="form-control" class='optional' name="branch_name"  type="text" placeholder="Branch Name" />
                                        </div><!--end--->

                                        <!--start--->
                                          <div class="field item form-group Bank box  ">
                                                  <input class="form-control" class='optional' name="bank_recepit_n"  type="text" placeholder="Recepit No" />
                                        </div><!--end--->



                                    <!--start--->
                                          <div class="field item form-group  Bank box">
                                                  <input class="form-control" class='optional' name="method_details"  type="text"   placeholder="Details" />
                                        </div><!--end--->

<!--start--->
                                    <!--start--->
                                          <div class="field item form-group  Bkash box">
                                                  <input class="form-control" class='optional' name="bkash_n"  type="text"   placeholder="Number" />
                                        </div><!--end--->
<!--start--->
                                          <div class="field item form-group   Rocket box">
                                            <input class="form-control" class='optional' name="rocket_n"  type="text"   placeholder="Number" />
                                          </div><!--end--->

                                       <!--start--->
                                          <div class="field item form-group Nogod box">
                                            <input class="form-control" class='optional' name="nogod_n"  type="text" placeholder="Number" />
                                        </div><!--end--->
                 
               </td>

               <td style="width: 10%;">
                   <div class="field item form-group">
                        <input  class="form-control pay" type="text" name="payment" placeholder="enter Amount">
                   </div>
               </td>
               <td style="width: 10%;">
                  <div class="field item form-group">
                      <div class="col-md-12">
                        <textarea  class="form-control " type="text" name="remark" placeholder="enter Remark" rows="1">
                          </textarea>
                      </div>
                   </div>
               </td>
               <td>
                     <button type='submit' class="btn btn-warning sourc">+Add </button>
               </td>
          </form>
        </tr>
        <!-- end -->

<tr>
  <td colspan="10" style="text-align: right;">Total Cash IN = <?php echo   $totalpay;?></td>
  <td colspan="2" ></td>
</tr>


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div><!-- end col-md-6-->

         <div class="col-md-2 col-sm-6">
               <div class="col-md-12 offset-md-3">
                    <button type='submit' class="btn btn-warning sourc"  data-toggle="modal" data-target="#ConfirmData" >Confirm </button>
                 </div>
        </div>
            

<!--- remove model  ---->
<div class="modal fade" id="ConfirmData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Date:##<?php echo $PayDate->pay_date;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('DateWais');?>" method="post">
          <div class="field item form-group">
            <label class="col-form-label col-md-12 col-sm-3  label-align" style="color:green;font-size: 1.3rem;font-weight: 900;text-align: center;">  Are You Sure ? Your Ladger Completed . </label>
         </div>        

          <div class="ln_solid">
            <div class="form-group">
               <div class="col-md-6 offset-md-3">
                   <button type='submit' class="btn btn-primary">Yes</button>
                    <button type='reset' class="btn btn-success">No</button>
                 </div>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!--- model end ----->
                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->



