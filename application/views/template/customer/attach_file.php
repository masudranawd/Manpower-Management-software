  <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                      <?php echo $this->session->flashdata('sms');?>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                          <div class="x_panel">
                              <div class="x_title">
                                  <h2>Add customer Attach File</h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                      <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li>
                                      <a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                  </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                  <?php echo form_open_multipart('Customer/AddNewFileAttach')?>
                                    <div class="field item form-group">
                                      <div class="col-md-5 col-sm-6" style="margin-top: -10px;">
                                        <select class="chosent form-control" name="customer_id" >
                                          <option value="" >Customer Select </option> 
                                            <?php 
                                              foreach ($AllCustomerList as $CustomerData) {
                                            ?>
                                         <option value="<?php echo $CustomerData->id;?>"><?php echo $CustomerData->fullname;?> / <?php echo $CustomerData->serial_no;?> / <?php echo $CustomerData->passport_no;?> /  <?php echo $CustomerData->visa_no;?> /   <?php echo $CustomerData->id_no;?> / <?php echo $CustomerData->mobile_no;?> / </option>
                                            <?php
                                              }  
                                            ?>
                                        </select>
                                        <script type="text/javascript">$(".chosent").chosen(); </script>
                                      </div>

                                      <div class="col-md-3 col-sm-6">
                                        <input type="text" class="form-control" name="title" placeholder="Enter image Name">
                                      </div>
                                       <div class="col-md-3 col-sm-6">
                                        <input type="file" class="form-control" name="file_attach" style="border:0px;">
                                      </div>

                                      <div class="col-md-1 col-sm-6">
                                            <button type='submit' class="btn btn-info sourc">Save</button>
                                          
                                      </div>
                                  </div>
                                </form>
                          </div>
                      </div>
                  </div><!---end col-md-12---->

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer Document Save</h2>
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
                    <table id="datatable" class="tablewhite table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th> Id</th>
                          <th> C-Sl</th>
                          <th>Visa No</th>
                          <th>Passport No</th>
                          <th>Customer Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllCustomerList as $CustomerData) {
                          $sl++;
                      ?>

                        <tr>
                          <td><?php echo $sl;?></td>
                          <td><?php echo $CustomerData->serial_no;?></td>
                          <td><?php echo $CustomerData->visa_no;?></td>
                          <td><?php echo $CustomerData->passport_no;?></td>
                          <td><?php echo $CustomerData->fullname;?></td>
                          <td>
                            <a href="<?php echo base_url('Customer/CustomerAttachFileView/')?><?php echo $CustomerData->id;?>" class="btn btn-round btn-primary btn-xs">File View</a>
                          </td>
                        </tr>


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
        </div>
                     