<div class="content-wrapper">
    <h3>Bills
        <small>Showing Bills of <?php echo date('F') . ', ' . date('Y'); ?></small>
    </h3>
    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            $this->db->order_by('timestamp', 'desc');
                            $bill_info = $this->db->get_where('bill', array('month' => date('F'), 'year' => date('Y')))->result_array();
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
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Select Year and Month to Show Bills</div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>single_month_bill/" role="form" method="post">
                        <div class="form-group">
                            <label>Year</label>
                            <div>
                                <select class="chosen-select input-md" name="year">
                                    <option value="<?php echo date('Y') - 4; ?>"><?php echo date('Y') - 4; ?></option>
                                    <option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
                                    <option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
                                    <option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
                                    <option value="<?php echo date('Y'); ?>" selected><?php echo date('Y'); ?></option>
                                    <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                                    <option value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
                                    <option value="<?php echo date('Y') + 3; ?>"><?php echo date('Y') + 3; ?></option>
                                    <option value="<?php echo date('Y') + 4; ?>"><?php echo date('Y') + 4; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Month</label>
                            <div>
                                <select class="chosen-select input-md" name="month">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-block btn-primary">Show</button>
                    </form>
                </div>
            </div>
            <div class="panel widget">
                <div class="panel-body bg-warning">
                    <div class="row row-table row-flush">
                        <div class="col-xs-8">
                            <p class="mb0">
                                Due of <?php echo date('F') . ', ' . date('Y'); ?>
                            </p>
                            <h3 class="m0">
                                BDT 
                                <?php
                                    $this->db->select_sum('amount');
                                    $this->db->from('bill');
                                    $this->db->where('status', 'Due');
                                    $this->db->where('month', date('F'));
                                    $this->db->where('year', date('Y'));
                                    $query = $this->db->get();
                                    echo $query->row()->amount;
                                ?>
                            </h3>
                        </div>
                        <div class="col-xs-4 text-right">
                            <em class="fa fa-money fa-2x"></em>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel widget">
                <div class="panel-body bg-primary">
                    <div class="row row-table row-flush">
                        <div class="col-xs-8">
                            <p class="mb0">
                                Bill of <?php echo date('F') . ', ' . date('Y'); ?>
                            </p>
                            <h3 class="m0">
                                BDT 
                                <?php
                                    $this->db->select_sum('amount');
                                    $this->db->from('bill');
                                    $this->db->where('month', date('F'));
                                    $this->db->where('year', date('Y'));
                                    $query = $this->db->get();
                                    echo $query->row()->amount;
                                ?>
                            </h3>
                        </div>
                        <div class="col-xs-4 text-right">
                            <em class="fa fa-credit-card fa-2x"></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
