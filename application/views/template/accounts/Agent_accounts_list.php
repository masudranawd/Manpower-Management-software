
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('sms');?>
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Agent Search</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Accounts/AgentSearch');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <div class="col-md-6 col-sm-6" style="margin-top: -10px;">
                                                 <select class="chosent form-control" name="agent_id" >
                                                    <option value="" >Agent Select </option> 
                                                  <?php 
                                                    foreach ($AllAgentList as $AgentList) {
                                                  ?>
                                                    <option value="<?php echo $AgentList->agent_id;?>"><?php echo $AgentList->agent_name;?> / <?php echo $AgentList->agent_id;?> / <?php echo $AgentList->mobile_no;?></option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>

                                              <div class="col-md-4">
                                                <select class="form-control" name="payment_type" required>
                                                  <option>Select Deposit Or Expenses </option>
                                                  <option value="Deposit">Deposit</option>
                                                  <option value="Expense">Expenses</option>
                                                </select>
                                              </div>

                                              <div class="col-md-2 col-sm-6">
                                                    <button type='submit' class="btn btn-info sourc">Search</button>
                                             </div>
                                           
                                          </div>
                                        </div><!--end---> 
                                    </form>
                                </div>
                            </div>
</div>

  <?php 
   if($AllPaymentData == !null){
  ?>
  <div class="col-md-12 col-sm-12">
        <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Recent Payment List <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="datatable"  class="table table-striped jambo_table ">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Date</th>
                            <th class="column-title" style="display: table-cell;">Voucher No </th>
                            <th class="column-title" style="display: table-cell;">Type</th>
                            <th class="column-title" style="display: table-cell;">Payment type</th>
                            <th class="column-title" style="display: table-cell;">Method</th>
                            <th class="column-title" style="display: table-cell;">Debit</th>
                            <th class="column-title" style="display: table-cell;">Cradit</th>
                            <th class="column-title" style="display: table-cell;">Action</th>
                          </tr>
                        </thead>

                        <tbody>

                      <?php 
                          // var_dump($AllvisaCategory);
                          $sl = 0;
                            foreach ($AllPaymentData as $PaymentData) {
                              if($PaymentData->type =='agent'){
                              $sl++;
                              if ($sl<=10) {
                          ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $PaymentData->payment_date;?></td>
                            <td class=" "><?php echo $PaymentData->voucher_no;?></td>
                            <td class=" "><?php echo $PaymentData->type;?></td>
                            <td class=" "><?php echo $PaymentData->payment_type;?></td>
                            <td class=" "><?php echo $PaymentData->method;?></td>
                            <td class=" "><?php echo $PaymentData->payment;?></td>
                            <td class=" "><?php echo $PaymentData->expense_payment;?></td>

                            <td class=" ">
                            <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#AgentPaymentUpdate<?php echo $PaymentData->id;?>">E</a>

                              <a href="" class="btn btn-round btn-danger" data-toggle="modal" data-target="#Remove<?php echo $PaymentData->id;?>">R</a>
                            </td>
                            </td>
                          </tr>


<!-- Modal Profile Edit-->
<div class="modal fade" id="AgentPaymentUpdate<?php echo $PaymentData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Edit Voucher No:##<?php echo $PaymentData->voucher_no;?> 
      </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Accounts/AgentPaymentEdit');?>" method="post">
        <input type="hidden" name="id" value="<?php echo $PaymentData->id;?>">
        <input class="form-control" type="hidden" name="payment_date" value="<?php echo $PaymentData->payment_date;?>" />
                                         
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Deposit/Expense <span class="required">*</span></label>
                                                  <div class="col-md-10">
                                                    <select class="form-control" name="payment_type" >
                                                        <?php 
                                                          if ($PaymentData->payment_type =='Deposit') {
                                                        ?>
                                                        <option value="Deposit" selected="">Deposit</option>
                                                        <option value="Expense">Expenses</option>
                                                        <?php 
                                                          }else{
                                                        ?>

                                                        <option value="Deposit">Deposit</option>
                                                        <option value="Expense" selected="">Expenses</option>
                                                        <?php
                                                          }
                                                        ?>
                                                    </select>
                                                    </div>
                                          </div>

                                      
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Category<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6" >
                                                 <select class="form-control" name="for_payment" >
                                                   <?php 
                                                      if ($PaymentData->for_payment =='Mofa Bill') {
                                                    ?>
                                                    <option value="Mofa Bill" selected="">Mofa Bill</option>
                                                    <option value="Man Power">Man Power</option>
                                                    <option value="Okala">Okala</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Others">Others</option>
                                                    <?php 
                                                          }elseif($PaymentData->for_payment =='Man Power'){
                                                    ?>

                                                    <option value="Mofa Bill">Mofa Bill</option>
                                                    <option value="Man Power" selected="">Man Power</option>
                                                    <option value="Okala">Okala</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Others">Others</option>
                                                    <?php 
                                                          }elseif($PaymentData->for_payment =='Okala'){
                                                    ?>

                                                    <option value="Mofa Bill">Mofa Bill</option>
                                                    <option value="Man Power">Man Power</option>
                                                    <option value="Okala" selected="">Okala</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Others">Others</option>
                                                    <?php 
                                                          }elseif($PaymentData->for_payment =='Medical'){
                                                    ?>

                                                    <option value="Mofa Bill">Mofa Bill</option>
                                                    <option value="Man Power">Man Power</option>
                                                    <option value="Okala">Okala</option>
                                                    <option value="Medical" selected="">Medical</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Others">Others</option>
                                                    <?php 
                                                          }elseif($PaymentData->for_payment =='Training'){
                                                    ?>

                                                    <option value="Mofa Bill">Mofa Bill</option>
                                                    <option value="Man Power">Man Power</option>
                                                    <option value="Okala">Okala</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Training" selected="">Training</option>
                                                    <option value="Others">Others</option>
                                                    <?php 
                                                          }elseif($PaymentData->for_payment =='Others'){
                                                    ?>

                                                    <option value="Mofa Bill">Mofa Bill</option>
                                                    <option value="Man Power">Man Power</option>
                                                    <option value="Okala">Okala</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Others" selected="">Others</option>
                                                    <?php
                                                        }else{
                                                      ?>

                                                    <option> select category</option>
                                                    <option value="Mofa Bill">Mofa Bill</option>
                                                    <option value="Man Power">Man Power</option>
                                                    <option value="Okala">Okala</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Others">Others</option>
                                                    <?php
                                                        }
                                                    ?>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Payment Method<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6" >
                                                 <select class=" form-control" name="method" >
                                                    <?php 
                                                      if ($PaymentData->method =='Cash In') {
                                                    ?>

                                                    <option >Select Payment method</option>
                                                    <option value="Cash In"  selected="">Cash In</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bank Check">Bank check</option>
                                                    <?php 
                                                          }elseif($PaymentData->method =='Rocket'){
                                                    ?>
                                                    <option value="Cash In">Cash In</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket" selected="">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bank Check">Bank check</option>
                                                    <?php 
                                                          }elseif($PaymentData->method =='Bkash'){
                                                    ?>
                                                    <option value="Cash In">Cash In</option>
                                                    <option value="Bkash"  selected="">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bank Check">Bank check</option>
                                                    <?php 
                                                          }elseif($PaymentData->method =='Nogod'){
                                                    ?>
                                                    <option value="Cash In">Cash In</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod" selected="">Nogod</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bank Check">Bank check</option>
                                                    <?php 
                                                          }elseif($PaymentData->method =='Bank'){
                                                    ?>

                                                    <option value="Cash In">Cash In</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                    <option value="Bank" selected="">Bank</option>
                                                    <option value="Bank Check">Bank check</option>
                                                    <?php 
                                                          }elseif($PaymentData->method =='Bank Check'){
                                                    ?>

                                                    <option value="Cash In">Cash In</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bank Check" selected="">Bank check</option>

                                                  <?php } else{
                                                  ?>
                                                    <option >Select Payment method</option>
                                                    <option value="Cash In">Cash In</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nogod">Nogod</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Bank Check">Bank check</option>
                                                  <?php
                                                  }?>
                                                  </select>
                                              </div>
                                          </div>

<?php 
    if ($PaymentData->payment == !null) {
?>

                                        <!--start--->
                                          <div class="field item form-group" >
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Payment Amount<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6" >
                                                  <input class="form-control" class='optional' name="payment"  type="number"    value="<?php echo $PaymentData->payment;?>" />
                                                </div>
                                          </div>
                                        <!--end--->
<?php
    }else{
?>

                                        <!--start--->
                                          <div class="field item form-group" >
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Expense Amount<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6" >
                                                  <input class="form-control" class='optional' name="expense_payment"  type="number"    value="<?php echo $PaymentData->expense_payment;?>" />
                                                </div>
                                          </div>
                                        <!--end--->
<?php
    }
?>

                                       <!--start--->
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Bank Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bank_name"  type="text"  value="<?php echo $PaymentData->bank_name;?>" />
                                                </div>
                                        </div><!--end--->

                                      <!--start--->
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Bank Recepit<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bank_recepit_n"  type="text"  value="<?php echo $PaymentData->bank_recepit_n;?>"/>
                                              </div>
                                        </div><!--end--->
                                        <!--start--->
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Bkash N<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="bkash_n"  type="text"   value="<?php echo $PaymentData->bkash_n;?>" />
                                                </div>
                                        </div><!--end--->
                                       <!--start--->
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Rocket N<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="rocket_n"  type="text"  value="<?php echo $PaymentData->rocket_n;?>" />
                                                </div>
                                        </div><!--end--->

                                    <!--start--->
                                          <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align">Details<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="details"  type="text"   value="<?php echo $PaymentData->details;?>" />
                                                </div>
                                         
                                        </div><!--end--->
          <div class="ln_solid">
            <div class="form-group">
               <div class="col-md-6 offset-md-3">
                   <button type='submit' class="btn btn-primary">Save</button>
                    <button type='reset' class="btn btn-success">Cancel</button>
                 </div>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!--- model end ----->
<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $PaymentData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Voucher  No:##<?php echo $PaymentData->voucher_no;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Accounts/RemoveAgentpayment/');?><?php  echo $PaymentData->id;?>" method="post">
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

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div><!-- end col-md-6-->

      <?php
          }else{
      ?>
        <?php echo "Not"; ?>
      <?php
          }
      ?>
                                       
            
                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->



