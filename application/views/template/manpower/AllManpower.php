 <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
  <?php echo $this->session->flashdata('sms');?>
                    <div class="row">

                    <!--- end--->
                 <div class="x_panel">
                  <div class="x_title">
                    <h2>  Customer List </h2>
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
                          <th> Id</th>
                          <th> Customer Details</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllManpowerSl as $ManpowerSlData) {
                          $sl++;

                            $manpower_sl = $ManpowerSlData->manpower_sl;
                            $total =    $this->Setting_model->CountSlAll($manpower_sl);
                      ?>

                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo $ManpowerSlData->manpower_sl;?></td>
                          <td>
                            <?php 
                            echo $total;
                            ?>
                          </td>
                          <td>
                            <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $ManpowerSlData->id;?>">Remove</a>
                            <?php if($total<=5){ ?>
                              <a href="<?php echo base_url('Dashboard/ManPowerSheetPrint/');?><?php echo $ManpowerSlData->manpower_sl;?>" class="btn btn-round btn-info btn-xs" >ManPower Sheet print</a>
                           <?php }elseif($total<=10){ ?>

                              <a href="<?php echo base_url('Dashboard/ManPowerSheetPrint/');?><?php echo $ManpowerSlData->manpower_sl;?>" class="btn btn-round btn-info btn-xs" >ManPower Sheet print</a>
                           <?php }else{ ?>

                              <a href="<?php echo base_url('Dashboard/ManPowerSheetPrint/');?><?php echo $ManpowerSlData->manpower_sl;?>" class="btn btn-round btn-info btn-xs" >ManPower Sheet print</a>

                           <?php } ?>

                            <a href="<?php echo base_url('Dashboard/ManPowerCustomerPrint/');?><?php echo $ManpowerSlData->manpower_sl;?>" class="btn btn-round btn-info btn-xs" >ManPower Customer Print print</a>
                          

                          </td>
                        </tr> 

<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $ManpowerSlData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">ManPower Serail:##___<?php echo $ManpowerSlData->manpower_sl;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Dashboard/RemoveManPowerSerial/')?><?php echo $ManpowerSlData->manpower_sl;?>" method="post">
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
        </div><!-- end row---->
    </div>
  </div>
            <!-- /page content -->