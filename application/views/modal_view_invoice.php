<div class="panel">
    <div class="panel-body">
        <h3 class="mt0">INVOICE NO <?php echo $this->db->get_where('bill', array('bill_id' => $param2))->row()->invoice_num; ?></h3>
        <hr>
        <div class="row mb-lg">
            <div class="col-lg-4 col-xs-6 br pv">
                <div class="row">
                    <div class="col-md-10">
                        <h4><?php echo $this->db->get_where('setting', array('name' => 'title'))->row()->content; ?></h4>
                        <!-- <address>
                            Nowhere 1024
                            <br>Happy St., 50487
                            <br>Neverland
                        </address> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6 br pv">
                <div class="row">
                    <div class="col-md-10">
                        <?php
                            $customer_id = $this->db->get_where('bill', array('bill_id' => $param2))->row()->customer_id;
                        ?>
                        <h4><?php echo $this->db->get_where('customer', array('customer_id' => $customer_id))->row()->name; ?></h4>
                        <address>
                            <?php echo $this->db->get_where('customer', array('customer_id' => $customer_id))->row()->address; ?>
                        </address>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md hidden-lg">
                <hr>
                <hr>
            </div>
            <div class="col-lg-4 col-xs-12 pv">
                <!-- <div class="clearfix">
                    <p class="pull-left">INVOICE NO.</p>
                    <p class="pull-right mr"><?php // echo $this->db->get_where('bill', array('bill_id' => $param2))->row()->invoice_num; ?></p>
                </div> -->
                <div class="clearfix" style="padding-top: 10px">
                    <p class="pull-left">Month</p>
                    <p class="pull-right mr">
                        <?php echo $this->db->get_where('bill', array('bill_id' => $param2))->row()->month; ?>
                    </p>
                </div>
                <div class="clearfix">
                    <p class="pull-left">Year</p>
                    <p class="pull-right mr">
                        <?php echo $this->db->get_where('bill', array('bill_id' => $param2))->row()->year; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="table-responsive table-bordered mb-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Spped</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $package_id = $this->db->get_where('customer', array('customer_id' => $customer_id))->row()->package_id;
                    $package_info = $this->db->get_where('package', array('package_id' => $package_id))->result_array();
                    foreach ($package_info as $row):
                ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['speed']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td class="text-right"><?php echo $this->db->get_where('bill', array('bill_id' => $param2))->row()->amount; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-offset-8 col-sm-4 pv">
                <div class="clearfix">
                    <p class="pull-left h3">GRAND TOTAL</p>
                    <p class="pull-right mr h3">
                        BDT <?php echo $this->db->get_where('bill', array('bill_id' => $param2))->row()->amount; ?>
                    </p>
                </div>
            </div>
        </div>
        <hr class="hidden-print">
        <div class="clearfix">
            <button type="button" class="btn btn-info pull-left mr">Download PDF</button>
            <button type="button" onclick="window.print();" class="btn btn-default pull-left">Print</button>
        </div>
    </div>
</div>