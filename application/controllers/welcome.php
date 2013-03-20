<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Welcome extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->model("ez_model");
  }

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   * 	- or -  
   * 		http://example.com/index.php/welcome/index
   * 	- or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  public function index() {

    //echo base_url();

    $this->load->view('startpage');
  }

  public function startpage() {

    //echo base_url();

    $this->load->view('startpage');
  }

  public function forgetpassword() {
    $this->load->view('forgetpassword');
  }
  
  public function admin() {

    //echo base_url();

    $this->load->view('admin');
  }
  
  public function admin_insert() {
    
    $data["product_category"] = $this->input->post('product_category');
    $data["product_name"] = $this->input->post('product_name');
    $data["product_price"] = $this->input->post('product_price');
    $data["no_of_product"] = $this->input->post('no_of_product');
    $data["product_img"] = $this->input->post('product_img');
    $data["product_desc"] = $this->input->post('product_desc');
    
    echo $data["product_category"];
    echo $data["product_name"];
    echo $data["product_price"];
    echo $data["no_of_product"];
    echo $data["product_img"];
    echo $data["product_desc"];
    
   $data["product_img"] = $this->do_upload();
   //print_r($img_data);
     $this->load->model("ez_model");

   $this->ez_model->insert_products($data);
    //echo base_url();

    $this->load->view('admin');
  }
  
  // Adding products
  
  function do_upload()
  {
		$config['upload_path'] = './images/products/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();

			
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
             // echo $data->file_name;
			//$this->load->view('upload_success', $data);
            
            return $data['upload_data']['file_name'];
		}
	}

  public function login($log = 1) {
    $this->load->view('login');
  }
  
  

  public function login_logic() {       // Login
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $flag = 0;

    $data["username"] = $this->input->post('username');
    $data["password"] = $this->input->post('password');
    echo $data["username"];

    $this->load->model("ez_model");
    $result = $this->ez_model->get_all();
    if ($data["username"] == "admin" && $data["password"] == "admin123") {
      $this->admin();
    } else {
      foreach ($result as $value) {
        if ($data["username"] == $value->username && $data["password"] == $value->password) {
          $flag = 1;
          echo $flag;
          $data["username"] = $value->username;
          $data["email"] = $value->email;
          $data["address"] = $value->address;
          $data["level"] = $value->level;

          $this->session->set_userdata($data["username"]);
          $this->session->set_userdata($data["email"]);
          $this->session->set_userdata($data["address"]);
          $this->session->set_userdata($data["level"]);

          $this->startpage();
          break;
        }
      }
      if ($flag == 0) {
        $this->login(0);
      }
    }
  }

  public function signup($sign = 2) {       //To check the email and username registered or not
    if ($sign == 2) {
      $data["signupflag"] = 2;
      $this->load->view('signup', $data);
    } else if ($sign == 0) {
      $data["signupflag"] = 0;
      $this->load->view('signup', $data);
    } else if ($sign == 1) {
      $data["signupflag"] = 1;
      $this->load->view('signup', $data);
    }
  }

  public function signup_logic() {
    $this->load->helper('url');
    $this->load->helper('form');

    $data["username"] = $this->input->post('username');
    $data["password"] = $this->input->post('password');
    $data["email"] = $this->input->post('email');
    $data["address"] = $this->input->post('address');


    //echo "Controller -".$data["username"];
    $this->load->model("ez_model");
    $insert_answer = $this->ez_model->signup_model($data);
    $this->signup($insert_answer);
  }

  
  
  

  public function laptop($j = 0) {          // Products_Laptop

    $this->load->model("ez_model");
    $result_product = $this->ez_model->get_all_products();
    $i = 0;
    
    foreach ($result_product as $value) {
      $result[$i]["product_id"] = $value->product_id;
      $result[$i]['product_name'] = $value->product_name;
      $result[$i]['product_image'] = $value->product_image;
      $result[$i]['product_price'] = $value->product_price;
      $result[$i]['no_of_product'] = $value->no_of_product;
      $result[$i]['product_desc'] = $value->product_desc;
      $i++;
    }
    
    //$data["product"] = $result[$j];
    
    $data["product_image"] = $result[$j]['product_image'];
    $data["no_of_product"] = $result[$j]['no_of_product'];
    $data["product_name"] = $result[$j]['product_name'];
    $data["product_price"] = $result[$j]['product_price'];
    $data["product_desc"] = $result[$j]['product_desc'];

    $this->load->library('pagination');

    $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/laptop';
    $config['total_rows'] = $i;
    $config['per_page'] = 1;

    $this->pagination->initialize($config);
    $data["links"] = $this->pagination->create_links();

    $this->load->view('laptop', $data);
  }

  public function delete_products()
  {
    $data['cat_id'] = $this->input->post("cat_id");
    $result = $this->ez_model->delete_products($data);
    foreach ($result as $value) {
      echo "<option>$value->product_name</option>";
    }
    
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>