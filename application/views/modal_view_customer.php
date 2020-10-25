<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Field</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $count = 1;
            $customer_info = $this->db->get_where('customer', array('customer_id' => $param2))->result_array();
            foreach ($customer_info as $row):
        ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Name</td>
                <td><?php echo $row['name']; ?></td>
            </tr>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Mobile</td>
                <td><?php echo $row['mobile']; ?></td>
            </tr>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Email</td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Address</td>
                <td><?php echo $row['address']; ?></td>
            </tr>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Package</td>
                <td>
                    <?php echo $this->db->get_where('package', array('package_id' => $row['package_id']))->row()->name; ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Status</td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Extra Note</td>
                <td><?php echo $row['extra_note']; ?></td>
            </tr>
            <tr>
                <td><?php echo $count++ ?></td>
                <td>Registered On</td>
                <td><?php echo date('d M, Y', $row['timestamp']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>