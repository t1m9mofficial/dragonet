<div class="content-wrapper">
    <h3>Account
        <small>Showing Account Status Overall</small>
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Total (BDT)</th>
                                <th>Paid (BDT)</th>
                                <th>Due (BDT)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            $this->db->order_by('year', 'desc');
                            $this->db->select('month');
                            $this->db->select('year');
                            $this->db->distinct();
                            $bill_info = $this->db->get('bill')->result_array();
                            foreach ($bill_info as $row):
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['year']; ?></td>
                                <td><?php echo $row['month']; ?></td>
                                <td>
                                    <?php
                                        $this->db->select_sum('amount');
                                        $this->db->from('bill');
                                        $this->db->where('month', $row['month']);
                                        $this->db->where('year', $row['year']);
                                        echo $total = $this->db->get()->row()->amount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $this->db->select_sum('amount');
                                        $this->db->from('bill');
                                        $this->db->where('status', 'Paid');
                                        $this->db->where('month', $row['month']);
                                        $this->db->where('year', $row['year']);
                                        echo $paid  = $this->db->get()->row()->amount;
                                    ?>
                                </td>
                                <td><?php echo $total - $paid; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>