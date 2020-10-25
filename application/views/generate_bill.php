<div class="content-wrapper">
    <h3>Bills
        <small>Generate Bill</small>
    </h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Generate Single Customer Bill</div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>generate_bill/single/" role="form" method="post">
                        <div class="form-group">
                            <label>Customer</label>
                            <div>
                                <select class="chosen-select input-md" name="customer_id">
                                <?php
                                    $customer_info = $this->db->get('customer')->result_array();
                                    foreach ($customer_info as $row):
                                ?>
                                    <option value="<?php echo $row['customer_id']; ?>">
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
                                    <option value="Due">Due</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Months</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="January" name="months[]">
                                           <span class="fa fa-check"></span>January
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="May" name="months[]">
                                           <span class="fa fa-check"></span>May
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="September" name="months[]">
                                           <span class="fa fa-check"></span>September
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="February" name="months[]">
                                           <span class="fa fa-check"></span>February
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="June" name="months[]">
                                           <span class="fa fa-check"></span>June
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="October" name="months[]">
                                           <span class="fa fa-check"></span>October
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="March" name="months[]">
                                           <span class="fa fa-check"></span>March
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="July" name="months[]">
                                           <span class="fa fa-check"></span>July
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="November" name="months[]">
                                           <span class="fa fa-check"></span>November
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="April" name="months[]">
                                           <span class="fa fa-check"></span>April
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="August" name="months[]">
                                           <span class="fa fa-check"></span>August
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="December" name="months[]">
                                           <span class="fa fa-check"></span>December
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <div>
                                <select class="chosen-select input-md" name="year">
                                    <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                    <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                                    <option value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
                                    <option value="<?php echo date('Y') + 3; ?>"><?php echo date('Y') + 3; ?></option>
                                    <option value="<?php echo date('Y') + 5; ?>"><?php echo date('Y') + 5; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Connection Fee</label>
                            <div>
                                <select class="chosen-select input-md" name="connection_fee">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Generate</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Generate Monthly Bill for All Active Customers</div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>generate_bill/monthly/" role="form" method="post">
                        <div class="form-group">
                            <label>Year</label>
                            <div>
                                <select class="chosen-select input-md" name="year">
                                    <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                    <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                                    <option value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
                                    <option value="<?php echo date('Y') + 3; ?>"><?php echo date('Y') + 3; ?></option>
                                    <option value="<?php echo date('Y') + 5; ?>"><?php echo date('Y') + 5; ?></option>
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
                        
                        <button type="submit" class="mb-sm btn btn-primary">Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
