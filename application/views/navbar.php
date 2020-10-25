<aside class="aside">
    <nav class="sidebar">
        <div class="item user-block">
            <div class="user-block-picture">
                <div class="user-block-status">
                    <img src="<?php echo base_url(); ?>assets/app/img/<?php echo $this->db->get_where('setting', array('name' => 'logo'))->row()->content; ?>" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                </div>
            </div>
            <div class="user-block-info">
                <span class="user-block-name item-text">
                    <?php echo explode(" ", $this->db->get_where('setting', array('name' => 'title'))->row()->content)[0]; ?>
                </span>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-heading">Main navigation</li>
            <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>" title="Dashboard" data-toggle="" class="no-submenu">
                    <em class="fa fa-tachometer"></em>
                    <span class="item-text">Dashboard</span>
                </a>
            </li>

            <li class="<?php if ($page_name == 'add_package' || $page_name == 'packages') echo 'active'; ?>">
                <a href="#" title="Packages" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-th-list"></em>
                    <span class="item-text">Packages</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_package' || $page_name == 'packages') echo 'in'; ?>">
                    <li class="<?php if ($page_name == 'add_package') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_package/" title="New_Package" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Package</span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'packages') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>packages/" title="Packages" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Packages</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php if ($page_name == 'add_customer' || $page_name == 'customers') echo 'active'; ?>">
                <a href="#" title="Customers" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-users"></em>
                    <span class="item-text">Customers</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_customer' || $page_name == 'customers') echo 'in'; ?>">
                    <li class="<?php if ($page_name == 'add_customer') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_customer/" title="New_Customer" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Customer</span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'customers') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>customers/" title="Customers" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Customers</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php if ($page_name == 'generate_bill' || $page_name == 'monthly_bill' || $page_name == 'bills' || $page_name == 'single_month_bill') echo 'active'; ?>">
                <a href="#" title="Bills" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-credit-card"></em>
                    <span class="item-text">Bills</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'generate_bill' || $page_name == 'monthly_bill' || $page_name == 'bills' || $page_name == 'single_month_bill') echo 'in'; ?>">
                    <li class="<?php if ($page_name == 'generate_bill') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>generate_bill/" title="Generate_Bill" data-toggle="" class="no-submenu">
                            <span class="item-text">Generate Bill</span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'monthly_bill' || $page_name == 'single_month_bill') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>monthly_bill/" title="Monthly_Bill" data-toggle="" class="no-submenu">
                            <span class="item-text">View Monthly Bill</span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'bills') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>bills/" title="Bills" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Bills</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php if ($page_name == 'account') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>account/" title="Account" data-toggle="" class="no-submenu">
                    <em class="fa fa-bank"></em>
                    <span class="item-text">Account</span>
                </a>
            </li>

            <li class="<?php if ($page_name == 'general_settings' || $page_name == 'admin_settings') echo 'active'; ?>">
                <a href="#" title="Settings" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-cogs"></em>
                    <span class="item-text">Settings</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'general_settings' || $page_name == 'admin_settings') echo 'in'; ?>">
                    <li class="<?php if ($page_name == 'general_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>general_settings/" title="General Settings" data-toggle="" class="no-submenu">
                            <span class="item-text">General Settings</span>
                        </a>
                    </li>
                    <li class="<?php if ($page_name == 'admin_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin_settings/" title="Admin Settings" data-toggle="" class="no-submenu">
                            <span class="item-text">Admin Settings</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
