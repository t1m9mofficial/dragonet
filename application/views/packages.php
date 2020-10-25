<div class="content-wrapper">
    <h3>Packages
        <small>Showing All The Packages</small>
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
                                <th>Speed</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Created On</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            $package_info = $this->db->get('package')->result_array();
                            foreach ($package_info as $row):
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['speed']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo date('d M, Y', $row['timestamp']); ?></td>
                                <td>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_package/<?php echo $row['package_id']; ?>');" class="btn btn-labeled btn-primary btn-xs">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Edit
                                    </a>
                                    <a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>packages/delete/<?php echo $row['package_id']; ?>');" class="btn btn-labeled btn-danger btn-xs">
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
