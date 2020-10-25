<div class="content-wrapper">
    <h3>Settings
        <small>Update General Settings</small>
    </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Update General Settings Form</div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>general_settings/update_details/" role="form" method="post">
                        <div class="form-group">
                            <label>Title</label>
                            <input value="<?php echo $this->db->get_where('setting', array('name' => 'title'))->row()->content; ?>" type="text" name="title" placeholder="Enter system title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Connection Fee</label>
                            <input value="<?php echo $this->db->get_where('setting', array('name' => 'connection_fee'))->row()->content; ?>" type="text" name="connection_fee" placeholder="Enter connection fee" class="form-control">
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
