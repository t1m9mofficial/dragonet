<style type="text/css">
    .chosen-container, .chosen-container-single
    {
        width: 100% !important;
    }
</style>

<form action="<?php echo base_url(); ?>bills/edit/<?php echo $param2; ?>" role="form" method="post">
    <div class="form-group">
        <label>Status</label>
        <div>
            <select class="chosen-select input-md" name="status">
                <option <?php if ($this->db->get_where('bill', array('bill_id' => $param2))->row()->status == 'Due') echo 'selected'; ?> value="Due">Due</option>
                <option <?php if ($this->db->get_where('bill', array('bill_id' => $param2))->row()->status == 'Paid') echo 'selected'; ?> value="Paid">Paid</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Amount</label>
        <input value="<?php echo $this->db->get_where('bill', array('bill_id' => $param2))->row()->amount; ?>" type="text" name="amount" placeholder="Enter amount" class="form-control">
    </div>
    
    <button type="submit" class="mb-sm btn btn-primary">Update</button>
</form>
