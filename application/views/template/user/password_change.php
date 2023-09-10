    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            
        <div class="row">
            <div class="col-md-12 col-sm-12">
              <!---table----->
            <div class="x_panel">
              <div class="x_title">
                <h2> Password Change <small></small></h2>
                <?php echo $this->session->flashdata('msg'); ?>
                    <div class="clearfix"></div>
              </div>

              <div class="x_content">
                <div class="">
                     
                    <form action="<?php echo base_url('User/Chanage_Password/');?>" method="post">
                        <div class="">
                            <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="old_pass" value="<?= set_value('old_pass') ?>" class="form-control" placeholder="Enter Old Password">
                                    <small><?= form_error('old_pass') ?></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="new_pass" value="<?= set_value('new_pass') ?>" class="form-control" placeholder="Enter New Password">
                                    <small><?= form_error('new_pass') ?></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Repeat New Password</label>
                                    <input type="password" name="rep_new_pass" value="<?= set_value('rep_new_pass') ?>" class="form-control" placeholder="Repeat New Password">
                                    <small><?= form_error('rep_new_pass') ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-key"></i> Chanage Password</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
          </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->