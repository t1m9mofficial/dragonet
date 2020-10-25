<div class="content-wrapper">
    <h3>Dashboard
        <small><?php echo date('d F, Y'); ?></small>
    </h3>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-tasks fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
                                <?php echo $this->db->get('package')->num_rows(); ?>
                            </div>
                            <p class="m0">Packages</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>packages/" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-users fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
                                <?php echo $this->db->get_where('customer', array('status' => 'Active'))->num_rows(); ?>
                            </div>
                            <p class="m0">Customers</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>customers/" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-money fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
                                <?php
                                    echo $this->db->get_where('bill', array('month' => date('F'), 'year' => date('Y'), 'status' => 'Due'))->num_rows(); 
                                ?>
                            </div>
                            <p class="m0">Due Bills of <?php echo date('M, Y'); ?></p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>monthly_bill/" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-credit-card fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
                                <?php
                                    echo $this->db->get_where('bill', array('month' => date('F'), 'year' => date('Y')))->num_rows(); 
                                ?>
                            </div>
                            <p class="m0">Total Bills of <?php echo date('M, Y'); ?></p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>monthly_bill/" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <div class="text-right text-muted">
                       <em class="fa fa-money fa-2x"></em>
                    </div>
                    <h3 class="mt0">
                        BDT 
                        <?php
                            $this->db->select_sum('amount');
                            $this->db->from('bill');
                            $this->db->where('status', 'Due');
                            $query = $this->db->get();
                            echo $query->row()->amount;
                        ?>
                    </h3>
                    <p class="text-muted">Total Due Overall</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <div class="text-right text-muted">
                       <em class="fa fa-credit-card fa-2x"></em>
                    </div>
                    <h3 class="mt0">
                        BDT 
                        <?php
                            $this->db->select_sum('amount');
                            $this->db->from('bill');
                            $query = $this->db->get();
                            echo $query->row()->amount;
                        ?>
                    </h3>
                    <p class="text-muted">Total Bill Overall</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <div class="text-right text-muted">
                       <em class="fa fa-money fa-2x"></em>
                    </div>
                    <h3 class="mt0">
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
                    <p class="text-muted">Total Due of <?php echo date('F, Y'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <div class="text-right text-muted">
                       <em class="fa fa-credit-card fa-2x"></em>
                    </div>
                    <h3 class="mt0">
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
                    <p class="text-muted">Total Bill of <?php echo date('F, Y'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>




