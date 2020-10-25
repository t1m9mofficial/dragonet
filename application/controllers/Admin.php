<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		$page_data['page_name']	=	'dashboard';

		$this->load->view('index', $page_data);
	}

	function generate_bill($param = '')
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		if ($param == 'single')
		{
			foreach ($this->input->post('months') as $i => $value)
			{
				$customer_id			=	$this->input->post('customer_id');
				$month 					=	date('F', $this->db->get_where('customer', array('customer_id' => $customer_id))->row()->timestamp);
				$year					=	date('Y', $this->db->get_where('customer', array('customer_id' => $customer_id))->row()->timestamp);
				$connection_fee			=	$this->db->get_where('setting', array('name' => 'connection_fee'))->row()->content;
				$package_id				=	$this->db->get_where('customer', array('customer_id' => $customer_id))->row()->package_id;
				$amount					=	$this->db->get_where('package', array('package_id' => $package_id))->row()->price;
				$year_input				=	$this->input->post('year');

				if ($this->db->get_where('bill', array('month' => $value, 'year' => $year_input, 'customer_id' => $customer_id))->num_rows() > 0)
				{} else if ($this->input->post('connection_fee') == 'Yes' && $i == 0)
				{
					$data['customer_id']	=	$customer_id;
					$data['status']			=	$this->input->post('status');
					$data['month']			=	$value;
					$data['year']			=	$year_input;
					$data['amount']			=	$amount + $connection_fee;
					// $data['invoice_num']	=	'D00' . date('Y') . date('m') . rand(10, 10000) . '11T';
					$data['timestamp']		=	time();

					$this->db->insert('bill', $data);
				} else if ($month == $value && $year == $year_input) {
					$data['customer_id']	=	$customer_id;
					$data['status']			=	$this->input->post('status');
					$data['month']			=	$value;
					$data['year']			=	$this->input->post('year');
					$data['amount']			=	$amount + $connection_fee;
					// $data['invoice_num']	=	'D00' . date('Y') . date('m') . rand(10, 10000) . '11T';
					$data['timestamp']		=	time();

					$this->db->insert('bill', $data);
				} else {
					$data['customer_id']	=	$customer_id;
					$data['status']			=	$this->input->post('status');
					$data['month']			=	$value;
					$data['year']			=	$this->input->post('year');
					$data['amount']			=	$amount;
					// $data['invoice_num']	=	'D00' . date('Y') . date('m') . rand(10, 10000) . '11T';
					$data['timestamp']		=	time();

					$this->db->insert('bill', $data);
				}
			}

			redirect(base_url() . 'bills/', 'refresh');
		}
		else if ($param == 'monthly')
		{
			$month 	= $this->input->post('month');
			$year	= $this->input->post('year');

			$bill_info 		= $this->db->get_where('bill', array('month' => $month))->result_array();
			$customer_info	= $this->db->get_where('customer', array('status' => 'Active'))->result_array();

			$connection_fee			=	$this->db->get_where('setting', array('name' => 'connection_fee'))->row()->content;

			foreach ($customer_info as $row)
			{
				if ($this->db->get_where('bill', array('month' => $month, 'year' => $year, 'customer_id' => $row['customer_id']))->num_rows() > 0)
				{} 
				else if ($month == date('F', $row['timestamp']) && $year == date('Y', $row['timestamp'])) {
					$data['customer_id'] 	= 	$row['customer_id'];
					$data['status']			= 	'Due';
					$data['month']			=	$month;
					$data['year']			=	$year;
					$data['amount']			=	$this->db->get_where('package', array('package_id' => $row['package_id']))->row()->price + $connection_fee;
					// $data['invoice_num']	=	'D00' . date('Y') . date('m') . $row['customer_id'] . '11T';
					$data['timestamp']		=	time();

					$this->db->insert('bill', $data);
				} else {
					$data['customer_id'] 	= 	$row['customer_id'];
					$data['status']			= 	'Due';
					$data['month']			=	$month;
					$data['year']			=	$year;
					$data['amount']			=	$this->db->get_where('package', array('package_id' => $row['package_id']))->row()->price;
					// $data['invoice_num']	=	'D00' . date('Y') . date('m') . $row['customer_id'] . '11T';
					$data['timestamp']		=	time();

					$this->db->insert('bill', $data);
				}
			}

			redirect(base_url() . 'bills/', 'refresh');
		}
		$page_data['page_name']	=	'generate_bill';

		$this->load->view('index', $page_data);
	}

	function monthly_bill()
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		$page_data['month']		=	date('F');
		$page_data['year']		=	date('Y');
		$page_data['page_name']	=	'monthly_bill';

		$this->load->view('index', $page_data);
	}

	function single_month_bill()
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		$page_data['month']		=	$this->input->post('month');
		$page_data['year']		=	$this->input->post('year');
		$page_data['page_name']	=	'single_month_bill';

		$this->load->view('index', $page_data);
	}

	function bills($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		if ($param1 == 'edit')
		{
			$data['status']		=	$this->input->post('status');
			$data['amount']		=	$this->input->post('amount');
			$data['timestamp']	=	time();

			$this->db->where('bill_id', $param2);
			$this->db->update('bill', $data);

			redirect(base_url() . 'bills/', 'refresh'); 
		}
		else if ($param1 == 'delete')
		{
			$this->db->where('bill_id', $param2);
			$this->db->delete('bill');

			redirect(base_url() . 'bills/', 'refresh');
		}
		$page_data['page_name']	=	'bills';

		$this->load->view('index', $page_data);
	}

	function add_customer()
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		$page_data['page_name']	=	'add_customer';

		$this->load->view('index', $page_data);
	}

	function customers($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		if ($param1 == 'add')
		{
			$data['name']		=	$this->input->post('name');
			$data['mobile']		=	$this->input->post('mobile');
			$data['email']		=	$this->input->post('email');
			$data['address']	=	$this->input->post('address');
			$data['package_id']	=	$this->input->post('package_id');
			$data['status']		=	'Active';
			$data['extra_note']	=	$this->input->post('extra_note');
			$data['timestamp']	=	time();

			$this->db->insert('customer', $data);

			redirect(base_url() . 'customers/', 'refresh');
		}
		else if ($param1 == 'edit')
		{
			$data['name']		=	$this->input->post('name');
			$data['mobile']		=	$this->input->post('mobile');
			$data['email']		=	$this->input->post('email');
			$data['address']	=	$this->input->post('address');
			$data['package_id']	=	$this->input->post('package_id');
			$data['status']		=	$this->input->post('status');
			$data['extra_note']	=	$this->input->post('extra_note');

			$this->db->where('customer_id', $param2);
			$this->db->update('customer', $data);

			redirect(base_url() . 'customers/', 'refresh');
		}
		else if ($param1 == 'delete')
		{
			$this->db->where('customer_id', $param2);
			$this->db->delete('customer');

			redirect(base_url() . 'customers/', 'refresh');
		}
		$page_data['page_name']	=	'customers';

		$this->load->view('index', $page_data);
	}

	function add_package()
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		$page_data['page_name']	=	'add_package';

		$this->load->view('index', $page_data);
	}

	function packages($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		if ($param1 == 'add')
		{
			$data['name']		=	$this->input->post('name');
			$data['speed']		=	$this->input->post('speed');
			$data['price']		=	$this->input->post('price');
			$data['description']=	$this->input->post('description');
			$data['timestamp']	=	time();

			$this->db->insert('package', $data);

			redirect(base_url() . 'packages/', 'refresh');
		}
		else if ($param1 == 'edit')
		{
			$data['name']		=	$this->input->post('name');
			$data['speed']		=	$this->input->post('speed');
			$data['price']		=	$this->input->post('price');
			$data['description']=	$this->input->post('description');

			$this->db->where('package_id', $param2);
			$this->db->update('package', $data);

			redirect(base_url() . 'packages/', 'refresh');
		}
		else if ($param1 == 'delete')
		{
			$this->db->where('package_id', $param2);
			$this->db->delete('package');

			redirect(base_url() . 'packages/', 'refresh');
		}
		$page_data['page_name']	=	'packages';

		$this->load->view('index', $page_data);
	}

	function account()
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		$page_data['page_name']	=	'account';

		$this->load->view('index', $page_data);	
	}

	function general_settings($param = '')
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		if ($param == 'update_details')
		{
			$data1['content']	= 	$this->input->post('title');
			$data2['content']	= 	$this->input->post('connection_fee');
			$data3['content']	=	strtotime($this->input->post('due_date'));

			$this->db->where('name', 'title');
			$this->db->update('setting', $data1);

			$this->db->where('name', 'connection_fee');
			$this->db->update('setting', $data2);

			redirect(base_url() . 'general_settings/', 'refresh');
		}
		$page_data['page_name']	=	'general_settings';

		$this->load->view('index', $page_data);
	}

	function admin_settings($param = '')
	{
		if ($this->session->userdata('login_type') != 'admin')
		{
			redirect(base_url() . 'login' , 'refresh');
		}

		if ($param == 'update_admin')
		{
			$data['email']		=	$this->input->post('email');
			$data['password']	=	$this->input->post('password');

			$this->db->where('admin_id', 1);
			$this->db->update('admin', $data);

			redirect(base_url() . 'admin_settings/', 'refresh');
		}

		else if ($param == 'update_logo')
		{
			$data['content']	=	$_FILES['logo']['name'];
			
			$this->db->where('name', 'logo');
			$this->db->update('setting', $data);

			move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/app/img/'. $data['content']);

			redirect(base_url() . 'admin_settings/', 'refresh');
		}
		$page_data['page_name']	=	'admin_settings';

		$this->load->view('index', $page_data);
	}

	function login()
	{
		$this->load->view('login');
	}
}
