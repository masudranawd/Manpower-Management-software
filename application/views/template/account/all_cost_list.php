    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
    <h2><?php echo $this->session->flashdata('smgdu');?></h2>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>  All Expense List </h2>
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
                  <div class="card-box table-responsive">
                    <table id="datatable" class="table tablewhite table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Serial No</th>
                          <th>Date</th>
                          <th>Details</th>
                          <th>Method</th>
                          <th>Pay Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($allpaylist as $paylist) {
                          $sl++;
                          if($paylist->pay_amount == null) {                      
                      ?>

                        <tr>

                          <td><?php echo $paylist->serial_no;?></td>
                          <td><?php echo date("d/m/Y", strtotime($paylist->payment_date));?></td>
                          <td style="width:40%;">                        <?php 
                           if($paylist->agent_id){
                               
                            $AgentName = $this->Customer_model->AgentNameById($paylist->agent_id);
                          if($AgentName){
                          echo '<b> Agent: </b>'.$AgentName->agent_name; echo '('.$AgentName->agent_id.')';}else{ echo '';}
                           
                           }else{ echo '';}
                        ?>
                        <br/>
                        <!--- customer--->
                        <?php
                           if($paylist->customer_id){ $Customerinfo = $this->Customer_model->customernamebyid($paylist->customer_id);
                           if($Customerinfo){
                           echo '<b> Customer: </b>'.$Customerinfo->fullname; echo '('.$Customerinfo->passport_no.')';}else{ echo '';}
                           }else{ echo '';}
                        ?>
                            <br/>
                            
                               <?php 
                                    $Expensecatgory = $this->Account_model->GetDataByExpenseCatMethod( $paylist->expense_id);
                                    if ($Expensecatgory  == !null) {
                                        echo $Expensecatgory->expenses_cat_name;  
                                    }else{
                                      echo '';
                                    }
                                    echo '<b><br/> Remark: </b>'.$paylist->remark; 
                                ?>   
                           </td>


                          <td style="width:30%;">
                                <?php 
                                    $pay_method_data = $this->Account_model->GetDataByPayMethod( $paylist->payment_method_id);
                                    if ($pay_method_data  == !null) {
                                        echo '<b>Bank Name: </b>.' .$pay_method_data->bank_name; echo '&nbsp;&nbsp;' ;echo '<b>Account No: </b>'.$pay_method_data->account_number; 
                                    }else{
                                      echo '';
                                    }
                                ?>   
                           </td>


                          <td><?php echo $paylist->cost_amount;?></td>

                          <td style="width:30%;">
                            <a href="<?php echo base_url('Account/Invoice/');?><?php echo $paylist->id;?>" class="btn btn-round btn-primary btn-xs" target="_blank">Print</a>
                            <a href="<?php echo base_url('Account/ExpenseEdit/');?><?php echo $paylist->id;?>" class="btn btn-round btn-warning btn-xs">Edit</a>
                            <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $paylist->id;?>">Remove</a>
                          
                          </td>
                        </tr>
<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $paylist->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" style="color:#000;">Serial No:##<?php echo $paylist->serial_no;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Account/CostRemove/')?><?php echo $paylist->id;?>" method="post">
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
                      ?>
                      </tbody>
                    </table>
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