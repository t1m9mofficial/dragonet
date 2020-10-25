<style type="text/css">
    .chosen-container, .chosen-container-single
    {
        width: 100% !important;
    }
</style>

<?php
    $customer_info = $this->db->get_where('customer', array('customer_id' => $param2))->result_array();
    foreach ($customer_info as $row1):
?>
<form action="<?php echo base_url(); ?>customers/edit/<?php echo $row1['customer_id']; ?>" role="form" method="post">
    <div class="form-group">
        <label>Name</label>
        <input value="<?php echo $row1['name']; ?>" type="text" name="name" placeholder="Enter name" class="form-control">
    </div>
    <div class="form-group">
        <label>Mobile number</label>
        <input value="<?php echo $row1['mobile']; ?>" type="text" name="mobile" placeholder="Enter mobile number" class="form-control">
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input value="<?php echo $row1['email']; ?>" type="email" name="email" placeholder="Enter email" class="form-control">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea type="text" name="address" placeholder="Enter address" class="form-control"><?php echo $row1['address']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Package</label>
        <div>
            <select class="chosen-select input-md" name="package_id">
            <?php
                $package_info = $this->db->get('package')->result_array();
                foreach ($package_info as $row):
            ?>
                <option <?php if ($row1['package_id'] == $row['package_id']) echo 'selected'; ?> value="<?php echo $row['package_id']; ?>">
                    <?php echo $row['name']; ?>
                </option>
            <?php endforeach; ?>
            </select>
        </div>
    </div> 
    <div class="form-group">
        <label>Status</label>
        <div>
            <select class="chosen-select input-md" name="status">
                <option <?php if ($row1['status'] == 'Active') echo 'selected'; ?> value="Active">Active</option>
                <option <?php if ($row1['status'] == 'Inactive') echo 'selected'; ?> value="Inactive">Inactive</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Extra Note</label>
        <textarea type="text" name="extra_note" placeholder="Enter extra note" class="form-control"><?php echo $row1['extra_note']; ?></textarea>
    </div>

    <button type="submit" class="mb-sm btn btn-primary">Update</button>
</form>
<?php endforeach; ?>
