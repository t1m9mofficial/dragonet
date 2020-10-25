<div class="content-wrapper">
    <h3>Settings
        <small>Update Admin Settings</small>
    </h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Update Admin Settings Form</div>
                <div class="panel-body">
                <?php
                    $admin_info = $this->db->get('admin')->result_array();
                    foreach ($admin_info as $row1):
                ?>
                    <form action="<?php echo base_url(); ?>admin_settings/update_admin/" role="form" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input value="<?php echo $row1['email']; ?>" type="email" name="email" placeholder="Enter email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input value="<?php echo $row1['password']; ?>" type="text" name="password" placeholder="Enter password" class="form-control">
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Update</button>
                    </form>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Upload Company Logo Settings Form</div>
                <div class="panel-body">
                    <div class="col-sm-4">
                        <img src="<?php echo base_url(); ?>assets/app/img/<?php echo $this->db->get_where('setting', array('name' => 'logo'))->row()->content; ?>" alt="Avatar" width="150" height="150" class="img-thumbnail">
                    </div>
                    <div class="col-sm-8">
                        <form action="<?php echo base_url(); ?>admin_settings/update_logo/" role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>File Upload</label>
                                <div>
                                    <input name="logo" type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control">
                                    <span class="help-block">Please choose a square image</span>
                                </div>
                            </div>
                            
                            <button type="submit" class="mb-sm btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
