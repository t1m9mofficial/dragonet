<div class="content-wrapper">
    <h3>Customers
        <small>Add New Customer</small>
    </h3>
    <!-- START row-->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Add New Customer Form</div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>customers/add/" role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input data-parsley-id="as" autofocus type="text" name="name" placeholder="Enter name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile number</label>
                            <input type="text" name="mobile" placeholder="Enter mobile number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" placeholder="Enter email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" name="address" placeholder="Enter address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Package</label>
                            <div>
                                <select class="chosen-select input-md" name="package_id">
                                <?php
                                    $package_info = $this->db->get('package')->result_array();
                                    foreach ($package_info as $row):
                                ?>
                                    <option value="<?php echo $row['package_id']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Status</label>
                            <div>
                                <select class="chosen-select input-md">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label>Extra Note</label>
                            <textarea type="text" name="extra_note" placeholder="Enter extra note" class="form-control"></textarea>
                        </div>
                  
                        <button type="submit" class="mb-sm btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
    <!-- END row-->
</div>
