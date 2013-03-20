<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Welcome extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
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

  public function admin() {

    //echo base_url();

    $this->load->view('admin');
  }

  public function login($log = 1) {
    $this->load->view('login');
  }

  public function login_logic() {
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

  public function signup($sign = 2) {
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

  public function forgetpassword() {
    $this->load->view('forgetpassword');
  }
  
  public function laptop() {
    
    $this->load->model("ez_model");
    $result_product = $this->ez_model->get_all_products();
    $i=1;
    while ($i<3)
    {
    foreach ($result_product as $value) {
      $data[$i]["product_id"] = $value->product_id;
      $data[$i]['product_name'] = $value->product_name;
      $data[$i]['product_image'] = $value->product_image; 	
      $data[$i]['product_price'] = $value->product_price; 	
      $data[$i]['no_of_product'] = $value->no_of_product; 	
      $data[$i]['product_desc'] = $value->product_desc;
    }
    $i++;
    }
    
   
    echo base_url();
   $this->load->library('pagination');

$config['base_url'] = 'http://192.168.75.107/EZ_Cart/welcome/laptop';
$config['total_rows'] = $i;
$config['per_page'] = 1;

$this->pagination->initialize($config);


    $this->load->view('laptop',$data);
  }
  
  
  
     
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>