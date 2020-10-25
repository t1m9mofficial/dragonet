<div class="content-wrapper">
    <h3>Bills
        <small>Showing All The Bills</small>
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            $this->db->order_by('timestamp', 'desc');
                            $bill_info = $this->db->get('bill')->result_array();
                            foreach ($bill_info as $row):
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $this->db->get_where('customer', array('customer_id' => $row['customer_id']))->row()->name; ?></td>
                                <td><?php echo $this->db->get_where('customer', array('customer_id' => $row['customer_id']))->row()->mobile; ?></td>
                                <td>
                                <?php if ($row['status'] == 'Paid'): ?>
                                    <button type="button" class="btn btn-oval btn-success btn-xs">
                                        <?php echo $row['status']; ?>
                                    </button>
                                <?php endif; ?>
                                <?php if ($row['status'] == 'Due'): ?>
                                    <button type="button" class="btn btn-oval btn-warning btn-xs">
                                        <?php echo $row['status']; ?>
                                    </button>
                                <?php endif; ?>
                                </td>
                                <td><?php echo $row['month']; ?></td>
                                <td><?php echo $row['year']; ?></td>
                                <td>
                                    <?php
                                        $package_id =  $this->db->get_where('customer', array('customer_id' => $row['customer_id']))->row()->package_id;
                                        echo $this->db->get_where('package', array('package_id' => $package_id))->row()->name; 
                                    ?>
                                </td>
                                <td><?php echo $row['amount']; ?></td>
                                <td>
                                    <!-- <a href="javascript:;" onclick="showAjaxModal('<?php // echo base_url(); ?>index.php?modal/popup/modal_view_invoice/<?php // echo $row['bill_id']; ?>');" class="btn btn-labeled btn-info btn-xs">
                                        <span class="btn-label">
                                            <i class="fa fa-file-text"></i>
                                        </span>
                                        Invoice
                                    </a> -->
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_bill/<?php echo $row['bill_id']; ?>');" class="btn btn-labeled btn-primary btn-xs">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Edit
                                    </a>
                                    <a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>bills/delete/<?php echo $row['bill_id']; ?>');" class="btn btn-labeled btn-danger btn-xs">
                                        <span class="btn-label">
                                            <i class="fa fa-times"></i>
                                        </span>
                                        Remove
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
