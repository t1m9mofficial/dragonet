<?php
    $package_info = $this->db->get_where('package', array('package_id' => $param2))->result_array();
    foreach ($package_info as $row):
?>
<form action="<?php echo base_url(); ?>packages/edit/<?php echo $row['package_id']; ?>/" role="form" method="post">
    <div class="form-group">
        <label>Name</label>
        <input value="<?php echo $row['name']; ?>" type="text" name="name" placeholder="Enter name" class="form-control">
    </div>
    <div class="form-group">
        <label>Speed</label>
        <input value="<?php echo $row['speed']; ?>" type="text" name="speed" placeholder="Enter speed" class="form-control">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input value="<?php echo $row['price']; ?>" type="email" name="price" placeholder="Enter price" class="form-control">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea type="text" name="description" placeholder="Enter description" class="form-control"><?php echo $row['description']; ?></textarea>
    </div>
    
    <button type="submit" class="mb-sm btn btn-primary">Update</button>
</form>
<?php endforeach; ?>
