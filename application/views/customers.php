<div class="content-wrapper">
    <h3>Customers
        <small>Showing All The Customers</small>
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Package</th>
                                <th>Status</th>
                                <th>Registered On</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            $customer_info = $this->db->get('customer')->result_array();
                            foreach ($customer_info as $row):
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <?php echo $this->db->get_where('package', array('package_id' => $row['package_id']))->row()->name; ?>
                                </td>
                                <td>
                                <?php if ($row['status'] == 'Active'): ?>
                                    <button type="button" class="btn btn-oval btn-success btn-xs">
                                        <?php echo $row['status']; ?>
                                    </button>
                                <?php endif; ?>
                                <?php if ($row['status'] == 'Inactive'): ?>
                                    <button type="button" class="btn btn-oval btn-warning btn-xs">
                                        <?php echo $row['status']; ?>
                                    </button>
                                <?php endif; ?>
                                </td>
                                <td><?php echo date('d M, Y', $row['timestamp']); ?></td>
                                <td>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_view_customer/<?php echo $row['customer_id']; ?>');" class="btn btn-labeled btn-info btn-xs">
                                        <span class="btn-label">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        Info
                                    </a>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_customer/<?php echo $row['customer_id']; ?>');" class="btn btn-labeled btn-primary btn-xs">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Edit
                                    </a>
                                    <a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>customers/delete/<?php echo $row['customer_id']; ?>');" class="btn btn-labeled btn-danger btn-xs">
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
