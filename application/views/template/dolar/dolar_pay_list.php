    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
    <h2><?php echo $this->session->flashdata('smgdu');?></h2>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>  All Dolar Payment List </h2>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Agent</th>
                          <th>Customer</th>
                          <th>Remark</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AlldolarPayList as $dolarpayData) {
                          $sl++;                  
                      ?>

                        <tr>
                          <td><?php echo $dolarpayData->pay_date;?></td>
                          <td style="width:20%;">
                        <?php 
                           if($dolarpayData->agent_id){ $AgentName = $this->Customer_model->AgentNameById($dolarpayData->agent_id);
                           echo $AgentName->agent_name; echo '('.$AgentName->agent_id.')';
                           }else{ echo '';}
                        ?>
                           </td>
                          <td style="width:20%;">

                        <?php
                           if($dolarpayData->customer_id){ $Customerinfo = $this->Customer_model->customernamebyid($dolarpayData->customer_id);
                           echo $Customerinfo->fullname; echo '('.$Customerinfo->passport_no.')';
                           }else{ echo '';}
                        ?>
                           </td>

                          <td style="width:20%;"><?php echo $dolarpayData->remark;?>
                           </td>


                          <td><?php echo $dolarpayData->amount;?></td>

                          <td style="width:30%;">
                            <a href="<?php echo base_url('Account/DolarPayEdit/');?><?php echo $dolarpayData->id;?>" class="btn btn-round btn-warning btn-xs">Edit</a>
                            <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $dolarpayData->id;?>">Remove</a>
                          
                          </td>
                        </tr>

<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $dolarpayData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Date:##<?php echo $dolarpayData->pay_date;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Account/DolarPayRemove/')?><?php echo $dolarpayData->id;?>" method="post">
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