  <?php

  if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class Welcome extends CI_Controller {
   var $data = 0;

    function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->helper('date');
      $this->load->model("ez_model");
        $this->load->library('form_validation');
          $this->load->helper('security');
          $this->load->helper('captcha');

      $data['result_generic_category'] = $this->ez_model->get_all_generic_category();
       $data["count_generic_category"]=$this->ez_model->count_generic_category();


       $data['result_category'] = $this->ez_model->get_all_category();
       $data["count_category"]=$this->ez_model->count_category();


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

    
   $category_generic = $this->ez_model->get_all_generic_category();
      



      $i = 0;
       foreach ($category_generic as $value) {
        $result_generic[$i]["generic_category_name"] = $value->generic_category_name;
        $result_generic[$i]["generic_category_id"] = $value->generic_category_id;
        $i++;
      }
      $data["result_generic_category"] = $result_generic;


      $category_sub = $this->ez_model->get_all_category();

      $j = 0;
       foreach ($category_sub as $value) {
        $result_sub[$j]["category_name"] = $value->category_name;
        $result_sub[$j]["category_id"] = $value->category_id;
        $result_sub[$j]["rel_gen_category_id"] = $value->generic_category_id;

        $j++;
      }

    
      $data["result_sub_category"]=$result_sub;


      $this->load->view('startpage',$data);
    }

    public function startpage() {

      $data = $this->menubar();
    if($this->session->userdata("level")!="" &&  $this->ez_model->user_present($this->session->userdata("username")))
      {
     
     
        if($this->ez_model->user_level($this->session->userdata("username"))== 1){
          $this->session->unset_userdata("level");
            $this->session->set_userdata("level",1);
          $this->load->view('mod_startpage',$data);
       }
       if($this->ez_model->user_level($this->session->userdata("username"))==2)
      {
           $this->session->set_userdata("level",2);
     $this->load->view('startpage',$data);
      }
        
      }
      
      else{
   
        
       $this->session->sess_destroy();
        $this->ez_model->destroy_cart();
        $this->load->view('startpage',$data);
     }
    }
    
    
    
    public function moderator_startpage() {

       $data = $this->menubar();
      if($this->session->userdata("level")!="" &&  $this->ez_model->user_present($this->session->userdata("username")))
      {
      
     
        if($this->ez_model->user_level($this->session->userdata("username"))== 1){
          $this->session->unset_userdata("level");
            $this->session->set_userdata("level",1);
          $this->load->view('mod_startpage',$data);
       }
       if($this->ez_model->user_level($this->session->userdata("username"))==2)
      {
           $this->session->set_userdata("level",2);
     $this->load->view('startpage',$data);
      }
        
      }
      
      else{
   
        
       $this->session->sess_destroy();
        $this->ez_model->destroy_cart();
        $this->load->view('startpage',$data);
     }
      
      
      
      
   /*   $data = $this->menubar();
      if($this->session->userdata("level")==1){
     $this->load->view("mod_startpage",$data);
      }else{
        $this->logout();
      }
     */
    }
    
    
    public function admin_startpage() {

      $data = $this->menubar();
      $data['insert_result'] = 2;
      if($this->session->userdata("level")==0){
      $this->load->view('admin_startpage',$data);
      }else{
        $this->logout();
      }
    }

   
    
    
    
    
    
    public function admin($sign = 2) {
      
     $toggle = $this->session->userdata("toggle");
      
      $data["insert_generic_result"] = 2;
      $data["update_generic_result"] = 2;
      $data["delete_generic_result"] = 2;
      
      $data["insert_category_result"] = 2;
      $data["update_category_result"] = 2;
      $data["delete_category_result"] = 2;
      
      $data["insert_product_result"] = 2;
      $data["update_product_result"] = 2;
      $data["delete_product_result"] = 2;
      
      if($this->uri->segment(3)=="t")
      {
        
        
        if($toggle==1)
      {
          $this->session->unset_userdata("toggle");
        $this->session->set_userdata("toggle","0");
      }
      else if($toggle==0)
      {
        $this->session->unset_userdata("toggle");
        $this->session->set_userdata("toggle","1");
      }
      
     
      }
      
      

     
      if($this->session->userdata("username")=="admin")
      {
      $category_generic = $this->ez_model->get_all_generic_category();

      $i = 0;
       foreach ($category_generic as $value) {
        $result_generic[$i]["generic_category_name"] = $value->generic_category_name;
        $result_generic[$i]["generic_category_id"] = $value->generic_category_id;
        $i++;
      }
      $data["result_generic_category"] = $result_generic;


      $category_sub = $this->ez_model->get_all_category();

      $j = 0;
       foreach ($category_sub as $value) {
        $result_sub[$j]["category_name"] = $value->category_name;
        $result_sub[$j]["category_id"] = $value->category_id;
        $result_sub[$j]["rel_gen_category_id"] = $value->generic_category_id;

        $j++;
      }


      $data["result_sub_category"]=$result_sub;

   
      
      $data["order_set"]=$this->ez_model->get_all_orders();
    
      
      $data["count"]=$this->ez_model->count_ban();
      $data["count_user"]=$this->ez_model->count_user();
      $this->session->set_userdata("count_user",$data["count_user"]);

      $data["tab_name"]=$this->session->userdata("tab_name");
     
      
   
      
        if ($sign == 2) {
        $data["signupflag"] = 2;
       
      } else if ($sign == 0) {
        $data["signupflag"] = 0;
        
      } else if ($sign == 1) {
        $data["signupflag"] = 1;
      
      } 
      
      else if ($sign == 4) {
        $data["signupflag"] = 4;
      
      } 
      
      else if ($sign == 5) {
        $data["signupflag"] = 5;
      
      } 
      
      
      
      
      // -------------------- Pagination -----------------
      
        $i = $this->session->userdata("count_user");
        $o = $this->ez_model->get_order_count();
     $this->load->library('pagination');

      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/admin';
      $config['total_rows'] = $i;
      $config['per_page'] = 7;
      $config['per_page1'] = 7;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();
      

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      
     
       if($this->session->userdata("tab_name")=="update_level" || $this->session->userdata("tab_name")=="")
       {
         
       $data["result_set"] = $this->ez_model->pagination_get_users($config["per_page"], $page, $i,$toggle);
       
       }
       if($this->session->userdata("tab_name")=="view_order")
       {  
        
       $data["order_set"] = $this->ez_model->pagination_get_orders($config["per_page1"], $page, $o);
       }
      
     
      $this->load->view('admin',$data);
      }
 else if($this->session->userdata("level")==""){
      $this->logout();  
      }
    }

    
    public function moderator() {
      
      
      
      
      $data = $this->menubar();
    
    if($this->session->userdata("level")!="" &&  $this->ez_model->user_present($this->session->userdata("username")))
      {
     
     
        if($this->ez_model->user_level($this->session->userdata("username"))== 1){
          
        
          $this->session->unset_userdata("level");
            $this->session->set_userdata("level",1);
     
      
      
    //---------------------------------------------------  
      $data["insert_generic_result"] = 2;
      $data["update_generic_result"] = 2;
      $data["delete_generic_result"] = 2;
      
      $data["insert_category_result"] = 2;
      $data["update_category_result"] = 2;
      $data["delete_category_result"] = 2;
      
      $data["insert_product_result"] = 2;
      $data["update_product_result"] = 2;
      $data["delete_product_result"] = 2;
     
      $toggle = $this->session->userdata("toggle");
      if($this->uri->segment(3)=="t")
      {
        
        
        if($toggle==1)
      {
          $this->session->unset_userdata("toggle");
        $this->session->set_userdata("toggle","0");
      }
      else if($toggle==0)
      {
        $this->session->unset_userdata("toggle");
        $this->session->set_userdata("toggle","1");
      }
      
     
      }
      
      
      if($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username")))
      {
      
      $category_generic = $this->ez_model->get_all_generic_category();

      $i = 0;
       foreach ($category_generic as $value) {
        $result_generic[$i]["generic_category_name"] = $value->generic_category_name;
        $result_generic[$i]["generic_category_id"] = $value->generic_category_id;
        $i++;
      }
      $data["result_generic_category"] = $result_generic;


      $category_sub = $this->ez_model->get_all_category();

      $j = 0;
       foreach ($category_sub as $value) {
        $result_sub[$j]["category_name"] = $value->category_name;
        $result_sub[$j]["category_id"] = $value->category_id;
        $result_sub[$j]["rel_gen_category_id"] = $value->generic_category_id;

        $j++;
      }


      $data["result_sub_category"]=$result_sub;

      $data['result_set'] = $this->ez_model->get_all();
      $data["count"]=$this->ez_model->count_ban();
      $data["order_set"]=$this->ez_model->get_all_orders();
      $data["tab_name"]=$this->session->userdata("tab_name");
     
      
      
      
      
      // -------------------- Pagination -----------------
      $data["count_user"]=$this->ez_model->count_user();
      $this->session->set_userdata("count_user",$data["count_user"]);
      
        $i = $this->session->userdata("count_user");
        
     $this->load->library('pagination');

      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/moderator';
      $config['total_rows'] = $i;
      $config['per_page'] = 7;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["result_set"] = $this->ez_model->pagination_get_users($config["per_page"], $page, $i,$toggle);
       
       
              
      
      $this->load->view('moderator',$data);
     
      
      }
       }
       if($this->ez_model->user_level($this->session->userdata("username"))==2)
      {
       
           $this->session->set_userdata("level",2);
     $this->load->view('startpage',$data);
      }
        
      }
      
      else{
   
       $this->session->sess_destroy();
        $this->ez_model->destroy_cart();
        $this->load->view('startpage',$data);
     }
      
    
      
    }
    

    public function menubar()
    {

      $this->benchmark->mark('code_start');
      $category_generic = $this->ez_model->get_all_generic_category();
      $i = 0;
       foreach ($category_generic as $value) {
        $result_generic[$i]["generic_category_name"] = $value->generic_category_name;
        $result_generic[$i]["generic_category_id"] = $value->generic_category_id;
        $i++;
      }
      $data["result_generic_category"] = $result_generic;


      $category_sub = $this->ez_model->get_all_category();

      $j = 0;
       foreach ($category_sub as $value) {
        $result_sub[$j]["category_name"] = $value->category_name;
        $result_sub[$j]["category_id"] = $value->category_id;
        $result_sub[$j]["rel_gen_category_id"] = $value->generic_category_id;

        $j++;
      }

    
      $data["result_sub_category"]=$result_sub;

      //-----------------------------
       $cart_products = $this->ez_model->get_all_cart();
       $j = 0;
       $data["cart_products"]="";
       foreach ($cart_products as $value) {
        $result_cart[$j]["product_name"] = $value->product_name;
        $result_cart[$j]["product_count"] = $value->product_count;
       
        $j++;
      }$data["insert_product_result"] = 2;
      $data["update_product_result"] = 2;
      $data["delete_product_result"] = 2;

      if($j==0)
      {
        $data["cart_products"]=0;
      }
      else
      {
      $data["cart_products"]=$result_cart;
      }

       $data['result_set'] = $this->ez_model->get_all();
      $data["count"]=$this->ez_model->count_ban();


      $data["tab_name"]=$this->session->userdata("tab_name");

      $data["order_set"]=$this->ez_model->get_all_orders();
     $data["signupflag"] = 2;
      
      $this->benchmark->mark('code_end');

      $data["insert_generic_result"] = 2;
      $data["update_generic_result"] = 2;
      $data["delete_generic_result"] = 2;
      
      $data["insert_category_result"] = 2;
      $data["update_category_result"] = 2;
      $data["delete_category_result"] = 2;
      
      $data["insert_product_result"] = 2;
      $data["update_product_result"] = 2;
      $data["delete_product_result"] = 2;
      
      
      
      
      
       // -------------------- Pagination -----------------
      
        $i = $this->session->userdata("count_user");
         $o = $this->ez_model->get_order_count();
     $this->load->library('pagination');

      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/admin';
      $config['total_rows'] = $i;
      $config['per_page'] = 7;
      $config['per_page1'] = 7;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      
      
      return $data;
    }




    public function admin_insert_generic(){
        $data["generic_category"] = $this->input->post('insert_generic_category_name');
      $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","add_category");

    
      $this->load->library('form_validation');
      $this->form_validation->set_rules('insert_generic_category_name', 'Category Name', 'trim|required|xss_clean');


      if ($this->form_validation->run() == FALSE)
          {
    
            $data= $this->menubar();
            $data["signupflag"] = 2;
            if($this->session->userdata("level")==0 )
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
          else
          {
    

       $result = $this->ez_model->insert_generic_category($data);
       
       $data= $this->menubar();
       $data["signupflag"] = 2;
       $data["insert_generic_result"] = $result;
      
       if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
    }

    public function admin_insert_category()
    {
      $data["generic_category"] = $this->input->post('generic_category');
      $data["sub_category"] = $this->input->post('insert_category_name');
      $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","add_sub_category");


       $this->load->library('form_validation');
      $this->form_validation->set_rules('insert_category_name', 'Category Name', 'trim|required|xss_clean');


      if ($this->form_validation->run() == FALSE)
          {
    
            $data= $this->menubar();
            $data["signupflag"] = 2;
            if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
          else
          {
    
      

     $result = $this->ez_model->insert_sub_category($data);
       
       $data= $this->menubar();
       $data["insert_category_result"] = $result;
       $data["signupflag"] = 2;
       
     if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
           else{
            $this->logout();
          }
          }
    }


    public function admin_insert() {

      $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","add_product");

       $this->load->library('form_validation');
      $this->form_validation->set_rules('insert_product_name', 'insert_product_name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('insert_product_price', 'insert_product_price', 'trim|required|integer');
      $this->form_validation->set_rules('insert_no_of_product', 'insert_no_of_product', 'trim|required|integer');
      $this->form_validation->set_rules('insert_product_desc', 'insert_product_desc', 'trim|required');
      $this->form_validation->set_message('required', 'You cannot leave this Blank');


          if ($this->form_validation->run() == FALSE)
          {
                        $data=$this->menubar();
                        $data["signupflag"] = 2;

     if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
          else
          {

      $data["generic_category_list_product"] = $this->input->post('generic_category_list_product');
      $data["sub_category_list_product"] = $this->input->post('sub_category_list_product');
      $data["product_category"] = $this->input->post('insert_product_category');
      $data["product_name"] = $this->input->post('insert_product_name');
      $data["product_price"] = $this->input->post('insert_product_price');
      $data["no_of_product"] = $this->input->post('insert_no_of_product');
      $data["product_img"] = $this->input->post('insert_product_img');
      $data["product_desc"] = $this->input->post('insert_product_desc');

      $file_info=$data['product_name'].":".$data['product_desc'];
     $data["product_img"] = $this->do_upload();
    
     
     
     $result = $this->ez_model->insert_products($data);
       
       $data= $this->menubar();
       $data["insert_product_result"] = $result;
       $data["signupflag"] = 2;
    
     $this->load->helper('file');                   //Product File
     write_file('/var/www/EZ_Cart/ez_cart_file/ez_cart', $file_info,'w');

     $this->load->library('image_lib');            // Image Manipulation
     $config['image_library'] = 'gd2';
      $config['source_image'] = '/var/www/EZ_Cart/images/products/sofa.jpg' ;
      $config['create_thumb'] = TRUE;
      $config['maintain_ratio'] = TRUE;
      $config['width'] = 75;
      $config['height'] = 50;

      $this->load->library('image_lib', $config);

       $this->image_lib->resize();


     
  if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          else{
            $this->logout();
          }
    }
    }



    public function admin_update_generic(){
      $data["old_generic_name"] = $this->input->post('generic_category');
       $data["new_generic_name"] = $this->input->post('update_generic_category_name');

       $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","update_category");


        $this->load->library('form_validation');
      $this->form_validation->set_rules('update_generic_category_name', 'Category Name', 'trim|required|xss_clean');


      if ($this->form_validation->run() == FALSE)
          {
    
            $data= $this->menubar();
            $data["signupflag"] = 2;
            
             if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
          else
          {


     
 $result =  $this->ez_model->update_generic($data);
       
       $data= $this->menubar();
       $data["update_generic_result"] = $result;
       $data["signupflag"] = 2;
     


        if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          else {
            $this->logout();
          }
    }
    }

    public function admin_update_category(){

      $data["old_generic_name"] = $this->input->post('sub_category');
       $data["new_generic_name"] = $this->input->post('update_category_name');


       $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","update_sub_category");

        $this->load->library('form_validation');
      $this->form_validation->set_rules('update_category_name', 'Category Name', 'trim|required|xss_clean');


      if ($this->form_validation->run() == FALSE)
          {
    
            $data= $this->menubar();
            $data["signupflag"] = 2;
            if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
          else
          {
     
      
      


       $result = $this->ez_model->update_sub_category($data);
       
       $data= $this->menubar();
       $data["signupflag"] = 2;
       $data["update_category_result"] = $result;


       if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
    }

    public function admin_delete_generic(){
       $data["generic_name"] = $this->input->post('generic_category');
      $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","delete_category");
      
      
      


      $result = $this->ez_model->delete_generic($data);
       
       $data= $this->menubar();
       $data["delete_generic_result"] = $result;
       $data["signupflag"] = 2;

       if($this->session->userdata("level")==0)
       {
       $this->load->view('admin',$data);
       }
       else{
         $this->logout();
       }
    }


    public function admin_delete_category(){
      $data["sub_name"] = $this->input->post('sub_category');
      $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","delete_sub_category");
      


       $result = $this->ez_model->delete_sub($data);
       
       $data= $this->menubar();
       $data["delete_category_result"] = $result;
       $data["signupflag"] = 2;


       $this->load->view('admin',$data);
    }




    public function admin_update() {

      $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","update_product");


       $this->load->library('form_validation');
      $this->form_validation->set_rules('update_product_price', 'update_product_price', 'trim|required|integer');
      $this->form_validation->set_rules('update_no_of_product', 'update_no_of_product', 'trim|required|integer');
      $this->form_validation->set_rules('update_product_desc', 'update_product_desc', 'trim|required');
      $this->form_validation->set_message('required', 'You cannot leave this Blank');


          if ($this->form_validation->run() == FALSE)
          {
                        $data=$this->menubar();
$data["signupflag"] = 2;
      if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
          else
          {

      $data["product_id"] = $this->input->post('product_category_list1');
      $data["product_price"] = $this->input->post('update_product_price');
      $data["no_of_product"] = $this->input->post('update_no_of_product');
      $data["product_img"] = $this->input->post('update_product_img');
      $data["product_desc"] = $this->input->post('update_product_desc');




      $data["product_img"] = $this->do_upload();
      $this->load->model("ez_model");

     
     $result = $this->ez_model->update_products($data);
       
       $data= $this->menubar();
       $data["update_product_result"] = $result;
       $data["signupflag"] = 2;
      if($this->session->userdata("level")==0)
            {
              $this->load->view('admin',$data);
            }
            elseif ($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))) {
            $this->load->view('moderator',$data);
          }
          }
    }

    public function admin_delete() {

      $data["product_id"] = $this->input->post('product_category_list_del');
      $this->session->unset_userdata("tab_name");
      $this->session->set_userdata("tab_name","delete_product");

     
     $result = $this->ez_model->admin_delete_products($data);
       
       $data= $this->menubar();
       $data["delete_product_result"] = $result;
       $data["signupflag"] = 2;
       
      $this->load->view('admin',$data);
    }

    // Adding products

    function do_upload()
    {
          $config['upload_path'] = './images/products/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']	= '10000';
          $config['max_width']  = '1500';
          $config['max_height']  = '1500';

          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload())
          {
            return "default_image.jpg";
    

          }
          else
          {
              $data = array('upload_data' => $this->upload->data());
    
              return $data['upload_data']['file_name'];
          }
      }

   public function login($log = 1,$error = 1) {
      $flag=0;
     
      $result = $this->ez_model->get_all_autologin();
      $ip = $this->input->ip_address();
      foreach ($result as $value) {
        if( $value->ip==$ip)
        {
          $data['username'] = $value->username;
          $data['password'] = $value->password;
          $data["error"] = "";
          if($error==0)
          {
              $data["error"] = "Wrong Credentials";
          }
          $this->load->view('login',$data);
          $flag=1;
          break;
        }

      }
      

      if($flag==0)
      {
           $data["error"] = "";
          if($error==0)
          {
              $data["error"] = "Wrong Credentials";
          }
         $data['username'] = "";
          $data['password'] = "";
         
          $this->load->view('login',$data);
      }
    }


    
    


    public function login_logic() {       // Login
      $flag = 0;
$this->session->set_userdata("toggle","1");
      $data["username"] = $this->input->post('username');
      $data["password"] = $this->input->post('password');


       $checked = (isset($_POST['remember']))?true:false;  

       $ip = $this->input->ip_address();
       $data["pass"] = $this->input->post('password');

      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

      if ($this->form_validation->run() == FALSE)
          {
                       $this->login();
          }
          else
          {
      $this->load->model("ez_model");
      $result = $this->ez_model->get_all();
      if ($data["username"] == "admin" && $data["password"] == "admin123") {
        
         $this->session->set_userdata("username","admin");
            $this->session->set_userdata("email","admin@admin.com");
            $this->session->set_userdata("firstname","admin");
            $this->session->set_userdata("lastname","admin");
           $this->session->set_userdata("username","admin");
            $this->session->set_userdata("address","pune");
            $this->session->set_userdata("level","0");
            $this->admin_startpage();
      } else {
          $data["password"] = do_hash($data["password"],'md5');
        foreach ($result as $value) {
          if ($data["username"] == $value->username && $data["password"] == $value->password) {
            $flag = 1;
            $data["username"] = $value->username;
            $data["firstname"] = $value->firstname;
            $data["lastname"] = $value->lastname;
            $data["email"] = $value->email;
            $data["address"] = $value->address;
            $data["level"] = $value->level;

            $data["gender"] = $value->gender;
            $data["languages"] = $value->languages;
            
            if($checked)
            {

              $this->load->library('user_agent');

              if ($this->agent->is_browser())
              {
                  $agent = $this->agent->browser();
              }
              elseif ($this->agent->is_robot())
              {
                  $agent = $this->agent->robot();
              }
              elseif ($this->agent->is_mobile())
              {
                  $agent = $this->agent->mobile();
              }
              else
              {
                  $agent = 'Unidentified User Agent';
              }

              $this->ez_model->autologin($data["username"],$data["pass"],$ip,$agent);
            }
            
            
           
            $this->session->set_userdata("username",$data["username"]);
            $this->session->set_userdata("firstname",$data["firstname"]);
            $this->session->set_userdata("lastname",$data["lastname"]);
            $this->session->set_userdata("email",$data["email"]);
            $this->session->set_userdata("address",$data["address"]);
            $this->session->set_userdata("level",$data["level"]);
            $this->session->set_userdata("gender",$data["gender"]);
            $this->session->set_userdata("languages",$data["languages"]);
           

          
            if($this->session->userdata("temp_method_name")=="")
            {
              
              if($data["level"]==1 &&  $this->ez_model->user_present($this->session->userdata("username")))
              {
               
                $this->moderator_startpage();
              }
              else
                {
             
                 $data = $this->menubar();
              
            $this->startpage($data);
            break;
              }
            }
            else
            {
              $temp_method_name =  $this->session->userdata("temp_method_name");
             $temp_para_name =  $this->session->userdata("temp_para_name");
              $this->$temp_method_name();
            }
          }
        }
        if ($flag == 0) {
          $this->login(0,0);
        }
      }
          }
    }

    public function signup($sign = 2) {       //To check the email and username registered or not
      
        
         $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                     $count = mb_strlen($chars);

                    for ($i = 0, $result = ''; $i < 5; $i++) {
                        $index = rand(0, $count - 1);
                        $result .= mb_substr($chars, $index, 1);
                    }
                    
                   
                        $vals = array(
                    'word' => $result,
                    'img_path' => './captcha/',
                    'img_url' => base_url().'captcha/',
                    
                    'img_width' => '150',
                    'img_height' => 30,
                    'expiration' => 7200
                    );
                        

                 $data = create_captcha($vals);
                 
                 
                 
                  $data['cap_error']="";
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
      else if ($sign == 4) {
        $data["signupflag"] = 4;
        $this->load->view('signup', $data);
      } 
      else if ($sign == 7) {
      
        $data["signupflag"] = 7;
        $this->load->view('signup', $data);
      } 


    }

    public function signup_logic() {

      $this->load->helper('url');
      $this->load->helper('form');
      
      $data["cat_image"] = $this->input->post('cat_image');
      
      $data["username"] = $this->input->post('username');
       $data["firstname"] = $this->input->post('firstname');
        $data["lastname"] = $this->input->post('lastname');
      $data["password"] = $this->input->post('password');
      $data["email"] = $this->input->post('email');
      $data["address"] = $this->input->post('address');
      $data["gender"] = $this->input->post('radio_gender');
      
      $data1 = $this->input->post('language');
      
      
      $data["password"] = do_hash($data["password"], 'md5');


      $data['language']="";
      foreach( $data1 as $value)
      {

        $data['language'].= $value.',';
      }

        /*$this->load->library('unit_test');
            $array_test="Check for array for delete";
            $this->unit->run($data, 'is_array', $array_test);
            echo $this->unit->report();*/

      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
      $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[re-password]|md5');
      $this->form_validation->set_rules('re-password', 'Password Confirmation', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('address', 'Address', 'trim|required');
      $this->form_validation->set_message('required', 'You cannot leave this Blank');
     
      $this->form_validation->set_message('valid_email', 'Please enter a valid email id');


          if ($this->form_validation->run() == FALSE)
          {
            
            // ------------------- Captcha Start ------------------
            
             $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                     $count = mb_strlen($chars);

                    for ($i = 0, $result = ''; $i < 5; $i++) {
                        $index = rand(0, $count - 1);
                        $result .= mb_substr($chars, $index, 1);
                    }
                    
                   
                        $vals = array(
                    'word' => $result,
                    'img_path' => './captcha/',
                    'img_url' => base_url().'captcha/',
                    
                    'img_width' => '150',
                    'img_height' => 30,
                    'expiration' => 7200
                    );
                        

                 $cap = create_captcha($vals);
                   $cap_letter=$this->input->post('cap_image');
                        $cap_org=$this->input->post('captcha');
                        
                       
                 
                  
                  
                  // ---------- Captcha End
            
                      
                       $this->signup();
          }
          else
          {
             
            
              
          
                  $cap_letter=$this->input->post('cap_image');
                        $cap_org=$this->input->post('captcha');
                        if($cap_letter==$cap_org)
                        {
                          $insert_answer = $this->ez_model->signup_model($data);
              
               $this->session->set_userdata("username",$data["username"]);
               $this->session->set_userdata("firstname",$data["firstname"]);
               $this->session->set_userdata("lastname",$data["lastname"]);
            $this->session->set_userdata("email",$data["email"]);
            $this->session->set_userdata("address",$data["address"]);
            $this->session->set_userdata("level",2);
            $this->session->set_userdata("gender",$data["gender"]);
            $this->session->set_userdata("languages",$data["language"]);
            
            $this->signup($insert_answer);
                        }
 else {
   
    $this->signup(7);
 }
                        
                  
              
          }



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

    
      $data["product_image"] = $result[$j]['product_image'];
      $data["no_of_product"] = $result[$j]['no_of_product'];
      $data["product_name"] = $result[$j]['product_name'];
      $data["product_price"] = $result[$j]['product_price'];
      $data["product_desc"] = $result[$j]['product_desc'];

      $this->load->library('pagination');

      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/laptop';
      $config['total_rows'] = $i;
      $config['per_page'] = 2;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();

      $this->load->view('laptop', $data);
    }

    public function ajax_delete_products()   //ajax
    {
      $data['cat_id'] = $this->input->post("cat_id");
      $result = $this->ez_model->delete_products_name($data);
      foreach ($result as $value) {
        echo "<option value='$value->product_name' >$value->product_name</option>";
      }

    }


    public function generic_category_list_ajax()
    {
      $result = $this->ez_model->generic_category_list();

      foreach ($result as $value) {
        echo "<option value='$value->generic_category_id'>$value->generic_category_name</option>";
      }
    }

    public function sub_category_list_ajax()
    {
      $result = $this->ez_model->sub_category_list();
      foreach ($result as $value) {
        echo "<option>$value->category_name</option>";
      }
    }

    public function ajax_sub_gen_category_list()
    {

      $data['cat_id'] = $this->input->post("cat_id");

    
      $result = $this->ez_model->sub_gen_category_list($data);
    
      foreach ($result as $value) {
        echo "<option value='$value->category_id'>$value->category_name</option>";
      }

    }
    
    
    ///////// -------------- ajax for sub category click

 public function sub_category_click()
    {
        $result = $this->ez_model->sub_category_click_list();
       
      foreach ($result as $value) {
        echo "<option>$value->category_name</option>";
      }
    }

    
    ///////// -------------- ajax for product click

  public function product_click()
    {
        $result = $this->ez_model->product_click_list();
        
      foreach ($result as $value) {
        echo "<option>$value->product_name</option>";
      }
    }

    
    public function logo()
    {
     
      
      if($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username")))
      {
       
        $this->moderator_startpage();
      }
      else if($this->session->userdata("level")==2 &&  $this->ez_model->user_present($this->session->userdata("username")))
      {
       
         $this->startpage();
      }
      else if($this->session->userdata("level")==0)
      {
      
        $this->admin_startpage();
      }
      else if($this->session->userdata("level")===0)
      {
      
        $this->admin_startpage();
      }
      else{
        
         $this->startpage();
      }
    }
    
    

    public function ajax_update_products()  //ajax for updating products
    {
      $data['cat_id'] = $this->input->post("cat_id");
      $result = $this->ez_model->genric_to_product_ajax($data);
    
      foreach ($result as $value) {
        if($value->category_name=="")
        {
               echo "<option value='$value->product_id'>$value->product_name</option>";
        }
 else {
        echo "<option value='$value->product_id'>$value->product_name($value->category_name)</option>";
 }
   
      }
    }
    public function ajax_update_products1()    //ajax
    { 

      $data['product_name'] = $this->input->post("product_name");
      $result = $this->ez_model->ajax_update_model($data);
      echo json_encode($result);

    }



      public function product_collection()
      {
             $this->session->set_userdata("temp_method_name",$this->uri->segment(2));
             $this->session->set_userdata("temp_para_name",$this->uri->segment(3));
             if($this->session->userdata("temp_product_name")!="")
             {
               $data = "";
        $data["product_name"] = $this->addtocart1();
        $this->session->unset_userdata("temp_product_name");
             }
              else if($this->uri->segment(3)=="")
              {
                $data["product_name"] = $this->session->userdata('product');
              }
              else if(!is_numeric($this->uri->segment(3)))
              {
                $data["product_name"] = $this->uri->segment(3);
                $this->session->set_userdata('product', $data["product_name"]);
              }

            else {
                    $data["product_name"] = $this->session->userdata('product');


            }
             $check = $this->ez_model->checking($data["product_name"]);
             if ($check == 1) {
          

            $data["product_info"] = $this->ez_model->product_collection_model($data);
           
         
            if($data["product_info"]=="")
            {
                
                redirect("/welcome/product_summary");
            }

            $k = 0;

          foreach ($data["product_info"] as $value) {

               $category_id= $value["category_id"];  
               $generic_category_id= $value["generic_category_id"];  

               $k++;
          }
            }
             else
             {
               $data["product_info"] = "";
               $k=0;
               $category_id=0;
               $generic_category_id=0;
             }

          $category_generic = $this->ez_model->get_all_generic_category();




      $i = 0;
       foreach ($category_generic as $value) {
        $result_generic[$i]["generic_category_name"] = $value->generic_category_name;
        $result_generic[$i]["generic_category_id"] = $value->generic_category_id;
        $i++;
      }
      $data["result_generic_category"] = $result_generic;


      $category_sub = $this->ez_model->get_all_category();

      $j = 0;
       foreach ($category_sub as $value) {
        $result_sub[$j]["category_name"] = $value->category_name;
        $result_sub[$j]["category_id"] = $value->category_id;
        $result_sub[$j]["rel_gen_category_id"] = $value->generic_category_id;

        $j++;
      }


      $data["result_sub_category"]=$result_sub;

      $cart_products = $this->ez_model->get_all_cart();
       $j = 0;
       $data["cart_products"]="";
       foreach ($cart_products as $value) {
        $result_cart[$j]["product_name"] = $value->product_name;
        $result_cart[$j]["product_count"] = $value->product_count;

        $j++;
      }

      if($j==0)
      {
        $data["cart_products"]=0;
        $data["total_cart_product"]=0;
      }
      else
      {
      $data["cart_products"]=$result_cart;
      $data["total_cart_product"]=$j;
      }

     
      /*--------------------------------------------------------------*/

          $this->load->library('pagination');

      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/product_collection';
      $config['total_rows'] = $k;
      $config['per_page'] = 2;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["product_display"] = $this->ez_model->padination_get_products($category_id,$generic_category_id,$config["per_page"], $page, $k);
       
          $this->load->view('product_summary',$data);

      }

      public function addtocart()
      {
        if($this->session->userdata("username")!="")
          {
          if($this->input->post("add_to_cart"))
          {
            echo "VIshal";
            $this->ez_model->add_to_cart_model($this->input->post("product_name"));
            $data=$this->menubar();
            if($this->session->userdata("search_value")!="")
            {
              $this->search();
            }
            else{
            $this->product_collection();
            }
  
          }
          
          else if($this->input->post("buy_now")){
            $this->ez_model->add_to_cart_model($this->input->post("product_name"));
            $data["bill_items"] = $this->ez_model->get_all_cart();

            $this->load->view("bill",$data);

          }
          else{
            $data["bill_items"] = $this->ez_model->get_all_cart();

            $this->load->view("bill",$data);
          }
          }
          else{
            $this->session->set_userdata("temp_product_name",$this->input->post("product_name"));
            $this->login();
          }
      }
      
       public function addtocart1()
      {
       
           $this->ez_model->add_to_cart_model($this->session->userdata("temp_product_name"));
             
           return $this->session->userdata("product");
            

         
      }

      public function bill_generate()
      {

         $data1 = $this->input->post('product_name');
         $data2 = $this->input->post('product_count');
         
         $data3 = $this->input->post('select_product');
         
      
         
      foreach( array_combine($data1, $data2) as $product_name => $product_count)
      {
     
        foreach ($data3 as $data3_value) {
       
          if($data3_value==$product_name){
         
        $this->ez_model->bill_cart($product_name, $product_count);
          }
      }
         }
         
         $this->ez_model->bill_cart_updated();
         
       $data["bill_items"] = $this->ez_model->get_all_cart();

          $this->load->view("bill",$data);

      }

      public function gen_bill_ajax()
      {
        $temp = $_POST['arr'];

      }

      public function successful()
      {
        
        if($this->session->userdata("level")!="" && $this->ez_model->user_present($this->session->userdata("username")))
        {
        
        $data1 = $this->input->post('product_name');
         $data2 = $this->input->post('product_count');
         
         

      foreach( array_combine($data1, $data2) as $product_name => $product_count)
      {
        $this->ez_model->insert_view_order($this->session->userdata("username"),$this->session->userdata("firstname"),$this->session->userdata("lastname"),$this->session->userdata("address"),$this->session->userdata("email"),$product_name, $product_count);
        $this->ez_model->cart_delete_database($product_name, $product_count);
      }
        $this->ez_model->destroy_cart();
        
        
        $this->load->view("successful");
        }
 else {
   
   $this->logout();
 }
      }

      public function search()
      { 
        if($this->input->post('search')){
          $data["search"] = $this->input->post('search');
          $this->session->unset_userdata("search_value");
          $this->session->set_userdata("search_value",$data["search"]);
        }
        else{
          $data["search"] = $this->session->userdata("search_value");
        }
        $search_value = $data["search"];
        $searching_result = $this->ez_model->searching($data);

        $j = 0;
       $data["searching_result"]="";
       foreach ($searching_result as $value) {
        $result_search[$j]["product_name"] = $value->product_name;
        $result_search[$j]["no_of_products"] = $value->no_of_product;
        $result_search[$j]["product_image"] = $value->product_image;
        $result_search[$j]["product_price"] = $value->product_price;
         $result_search[$j]["product_desc"] = $value->product_desc;
      
        $j++;
      }      
      $k = $j;
       $data= $this->menubar();
       if($j>0)
       {
          $data["searching_result"]=$result_search;

       }
   else {
         $data["searching_result"] = $j;
         
       }

       $cart_products = $this->ez_model->get_all_cart();
       $j = 0;
       $data["cart_products"]="";
       foreach ($cart_products as $value) {
        $result_cart[$j]["product_name"] = $value->product_name;
        $result_cart[$j]["product_count"] = $value->product_count;

        $j++;
      }

      if($j==0)
      {
        $data["cart_products"]=0;
        $data["total_cart_product"]=0;
      }
      else
      {
      $data["cart_products"]=$result_cart;
      $data["total_cart_product"]=$j;
      }
      
      
      
      if($this->session->userdata("level")==0 && $this->session->userdata("username")=="admin")
      {
         $this->load->library('pagination');

           
      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/search';
      $config['total_rows'] = $k;
      $config['per_page'] = 2;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["searching_result"] = $this->ez_model->padination_get_search_products($search_value,$config["per_page"], $page, $k);
       $data["k"]=$k;
        
        $this->load->view('admin_search',$data);
      }
      else if($this->session->userdata("level")==1)
      {
         $this->load->library('pagination');

           
      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/search';
      $config['total_rows'] = $k;
      $config['per_page'] = 2;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["searching_result"] = $this->ez_model->padination_get_search_products($search_value,$config["per_page"], $page, $k);
       $data["k"]=$k;
        $this->load->view('mod_search',$data);
      }
      else {
        
           $this->load->library('pagination');

           
      $config['base_url'] = 'http://192.168.75.107/EZ_Cart/index.php/welcome/search';
      $config['total_rows'] = $k;
      $config['per_page'] = 2;

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();

       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["searching_result"] = $this->ez_model->padination_get_search_products($search_value,$config["per_page"], $page, $k);
       $data["k"]=$k;
       
          //$this->load->view('product_summary',$data);
          
       
       if($this->session->userdata("level")==0 && $this->session->userdata("username")=="admin")
       {
           $this->load->view('admin_search',$data);
        }
        else if($this->session->userdata("level")==1)
      {
          $this->load->view('mod_search',$data);
        }
        else
        {
          $this->load->view('search',$data);
        }
      
      }
       
       
       
       
       
      }

      public function logout()
      {
        
        $this->session->sess_destroy();
        $this->ez_model->destroy_cart();
        $this->startpage();
      }

      /*-------------------- MY PROFILE ----------------------------------------------------------------*/

       public function my_profile(){
         
           
      $data = $this->menubar();
    if($this->session->userdata("level")!="" &&  $this->ez_model->user_present($this->session->userdata("username")))
      {
      
     
        if($this->ez_model->user_level($this->session->userdata("username"))== 2){
          $this->session->unset_userdata("level");
            $this->session->set_userdata("level",2);
         
          $data["username"]=$this->session->userdata("username");
          $data["firstname"]=$this->session->userdata("firstname");
          $data["lastname"]=$this->session->userdata("lastname");
          $data["email"]=$this->session->userdata("email");
          $data["address"]=$this->session->userdata("address");
          $data["gender"]=$this->session->userdata("gender");
           $data["languages"]=$this->session->userdata("languages");
            $data["languages"] = explode(',', $data['languages']);
           $data["update"]="";
           $data["order_set"]=$this->ez_model->get_all_orders();
           
           $data["update_result"]=1;
           
          
          $this->load->view("user_profile",$data);
          
          }
       
       if($this->ez_model->user_level($this->session->userdata("username"))==1)
      {
         
           $this->session->set_userdata("level",1);
          $this->load->view('mod_startpage',$data);
      }
        
      }
      
      else{
  
       $this->session->sess_destroy();
        $this->ez_model->destroy_cart();
        $this->load->view('startpage',$data);
     }
          
          
          
          
      }

      public function edit_profile(){
        if($this->session->userdata("level")!="" &&  $this->ez_model->user_present($this->session->userdata("username")))
          {
          
         
      $data["username"] = $this->session->userdata('username');
      $data["firstname"] = $this->session->userdata('firstname');
              $data["lastname"] = $this->session->userdata('lastname');
      $data["email"] = $this->input->post('email');
      $data["address"] = $this->input->post('address');
      $data["gender"] = $this->input->post('radio_gender');
      $data["order_set"]=$this->ez_model->get_all_orders();
      $data1 = $this->input->post('language');
   
      




      $data['language']="";
      foreach( $data1 as $value)
      {
        $data['language'].= $value.',';
      }


      $this->load->library('form_validation');
       $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('address', 'Address', 'trim|required');
      $this->form_validation->set_message('required', 'You cannot leave this Blank');
      $this->form_validation->set_message('valid_email', 'Please enter a valid email id');


          if ($this->form_validation->run() == FALSE)
          {
          
                     $data["update"]="error";
                       $data["languages"] = explode(',', $data['language']);
                       $this->load->view("user_profile",$data);
          }
          else
          {
           
              $this->load->model("ez_model");
                          $data["update"]="success";
               $data["update_result"]= $this->ez_model->user_update_model($data);
               $this->session->set_userdata("email",$data["email"]);
               $this->session->set_userdata("address",$data["address"]);
                $this->session->set_userdata("gender",$data["gender"]);
                 $this->session->set_userdata("languages",$data["language"]);
              
                $data["languages"] = explode(',', $data['language']);
              


             $this->load->view("user_profile",$data);
          }
          }
          else{
            
            $this->logout();
          }

      }

      
      
      public function admin_user($sign = 2) {       //To check the email and username registered or not
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
      function  admin_create_user()
    {
      
        
      $this->load->helper('url');
      $this->load->helper('form');

      $data["username"] = $this->input->post('username');
       $data["firstname"] = $this->input->post('firstname');
        $data["lastname"] = $this->input->post('lastname');
      $data["password"] = $this->input->post('password');
      $data["email"] = $this->input->post('email');
      $data["address"] = $this->input->post('address');
      $data["gender"] = $this->input->post('radio_gender');

      $data1 = $this->input->post('language');
      $data["password"] = do_hash($data["password"], 'md5');

    $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","create_user");
    
      $data['language']="";
      foreach( $data1 as $value)
      {

        $data['language'].= $value.',';
      }



      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
      $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
      
      $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[re-password]|md5');
      $this->form_validation->set_rules('re-password', 'Password Confirmation', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('address', 'Address', 'trim|required');
      $this->form_validation->set_message('required', 'You cannot leave this Blank');
     
      $this->form_validation->set_message('valid_email', 'Please enter a valid email id');

     
          if ($this->form_validation->run() == FALSE)
          {
           
            
             $data= $this->menubar();
     
       $data["signupflag"] = 2;


       $this->load->view('admin',$data);
                     
                      
          }
          else
          {
            
              $this->load->model("ez_model");
            
              
             $signupflag=$this->ez_model->signup_model($data);
              
               $data= $this->menubar();
      
    
 $data["signupflag"] = $signupflag;
       $this->load->view('admin',$data);
              
             
          }

        
        
        
        
        
        
      $data['level'] = $this->session->userdata('level');
   /*   if($data['level']==0)
     {
       $this->admin();
     }
     
     if($data['level']==1)
     {
        $this->moderator();
     }*/

    }
    
    
    
   
    
    
     function delete_user()
    {
      $data["admin_delete_name"]=$this->input->post("admin_delete_name");


      $this->ez_model->delete_user($data);

      $data['level'] = $this->session->userdata('level');
      if($data['level']==0)
     {
       $this->admin();
     }
     
     if($data['level']==1)
     {
        $this->moderator();
     }

    }
    
    //--------------------------forget---------------------
    public function forgetpassword($check=2) {
        $data["pass_check"]=$check;
      $this->load->view('forgetpassword',$data);
    }
    
    
    public function forget_pass_logic() {
        
        $data["usename"]=$this->input->post("username");
        $data["email"]=$this->input->post("email");
        $check=$this->ez_model->pass_check_model($data["usename"],$data["email"]);
        
      $this->forgetpassword($check);
    }
    
    
  //--------------------------------forget--------------------  

    function ban_user()
    {

      $data["admin_ban_name"]=$this->input->post("admin_ban_name");

      $this->load->model("ez_model");
      $this->ez_model->ban_user($data);
      $data['level'] = $this->session->userdata('level');
      if($data['level']==0)
     {
       $this->admin();
     }
     
     if($data['level']==1)
     {
        $this->moderator();
     }

    }

    
    function update_level()
  {
    
    $data["update_user_name"]=$this->input->post("update_user_name");
    $data["update_user_level"]=$this->input->post("update_user_level");
     $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","update_level");
    
    $this->ez_model->updating_level($data);
    
    
    $data['username'] = $this->session->userdata('username');
    $data['user_id'] = $this->session->userdata('user_id');
    $data['level'] = $this->session->userdata('level');
    $data['email'] = $this->session->userdata('email');
    
    
     if($data['level']=="0")
     {
       $this->admin();
     }
     
     if($data['level']==1 &&  $this->ez_model->user_present($this->session->userdata("username")))
     {
       $this->moderator();
     }
     
  }
  
  
    function manage_users()
  {
      
   if(($this->input->post("update_user")=="Update"))   
  {
    
    $data["update_user_id"]=$this->input->post("user_id");
    $data["update_user_level"]=$this->input->post("radio_level");
     $data["update_user_banned"]=$this->input->post("radio_banned");
   
    
     $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","update_level");
    
     $data1 = $data["update_user_id"];
         $data2 = $data["update_user_level"];
         
      foreach( array_combine($data1, $data2) as $user_id => $user_level)
      {
        
        $this->ez_model->user_updating_level($user_id,$user_level);
      }
       
      $data1 = $data["update_user_id"];
         $data2 = $data["update_user_banned"];
      foreach( array_combine($data1, $data2) as $user_id => $user_banned)
      {
        
       $this->ez_model->user_updating_banned($user_id,$user_banned);
      }
      
      $data["signupflag"] = 4;
      /*$this->load->library('unit_test');
            $array_test="Check for array for delete";
            $this->unit->run($data, 'is_array', $array_test);
            echo $this->unit->report();*/
   
  } 
      if(($this->input->post("delete_user")=="Delete User"))
      {
        
        
     $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","update_level");
     
         $data["delete_user_id"]=$this->input->post("user_id");
         $data["select_user"]=$this->input->post("select_user");
         
       
        if($data["select_user"]!="")
        {
          
        
        foreach( $data["select_user"] as $user_id)
        {

         $this->ez_model->delete_user($user_id);
        }
         $data["signupflag"] = 5;
        }
      }      
      
    
    $data['username'] = $this->session->userdata('username');
    $data['user_id'] = $this->session->userdata('user_id');
    $data['level'] = $this->session->userdata('level');
    $data['email'] = $this->session->userdata('email');
   
    
  
      
    
     if($data['level']=="0")
     {
       
       $this->admin( $data["signupflag"]);
     }
     
     if($data['level']==1 &&  $this->ez_model->user_present($this->session->userdata("username")))
     {
       $this->moderator( $data["signupflag"]);
     }
     
  }
    
    
    function unban_user()
    {

      $data["admin_unban_name"]=$this->input->post("admin_unban_name");


      $this->load->model("ez_model");
      $this->ez_model->unban_user($data);
      
      $data['level'] = $this->session->userdata('level');
      if($data['level']==0)
     {
       $this->admin();
     }
     
     if($data['level']==1 &&  $this->ez_model->user_present($this->session->userdata("username")))
     {
        $this->moderator();
     }


    }

    function delete_ban_user()
    {


      $data["admin_delete_name"]=$this->input->post("delete_ban_name");

      $this->load->model("ez_model");
      $this->ez_model->delete_user($data);
      $data['level'] = $this->session->userdata('level');
     if($data['level']=="0")
     {
       $this->admin();
     }
     
     if($data['level']==1)
     {
        $this->moderator();
     }


    }

    public function aboutus()
    {
      if($this->session->userdata("level")==0){
        $this->load->view('aboutus_admin');
      }
      else if($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))){
        $this->load->view('aboutus_mod');
      }else{
      $this->load->view('aboutus');
      }
    }

    public function contactus()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required|integer');
      $this->form_validation->set_rules('address', 'Address', 'trim|required');
      $this->form_validation->set_message('required', 'You cannot leave this Blank');
     
      $this->form_validation->set_message('valid_email', 'Please enter a valid email id');


          if ($this->form_validation->run() == FALSE)
          {
            
            if($this->session->userdata("level")==0 && $this->session->userdata("username")=="admin"){
             
              $data["error"]=1;
        $this->load->view('contactus_admin',$data);
      }
      else if($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))){
        $data["error"]=1;
        $this->load->view('contactus_mod',$data);
      }else{
        $data["error"]=1;
       
      $this->load->view('contactus',$data);
      }
                      
          }
          else
          {
     if($this->session->userdata("level")==0){
       $data["error"]=0;
        $this->load->view('contactus_admin',$data);
      }
      else if($this->session->userdata("level")==1 &&  $this->ez_model->user_present($this->session->userdata("username"))){
        $data["error"]=0;
        $this->load->view('contactus_mod',$data);
      }else{
        $data["error"]=0;
      $this->load->view('contactus',$data);
      }
    }
    }


    public function latest_products()
    {

        $cart_products = $this->ez_model->get_latest_cart();
       $j = 0;
       $data["cart_products"]="";
       foreach ($cart_products as $value) {
        $result_cart[$j]["product_name"] = $value->product_name;
        $result_cart[$j]["product_count"] = $value->product_count;

        $j++;
      }
       $data["latest_products"]=$result_cart;
    }
    
    
    //--------- Product Summary----------------


    public function product_summary()
    {
        $data = $this->menubar();
        $data["product_display"] = 0;
        
        $cart_products = $this->ez_model->get_all_cart();
        $j = 0;
        $data["cart_products"] = "";
        foreach ($cart_products as $value) {
            $result_cart[$j]["product_name"] = $value->product_name;
            $result_cart[$j]["product_count"] = $value->product_count;

            $j++;
        }

        if ($j == 0) {
            $data["cart_products"] = 0;
            $data["total_cart_product"] = 0;
        } else {
            $data["cart_products"] = $result_cart;
            $data["total_cart_product"] = $j;
        }
        
        $this->load->view('product_summary', $data);
    }
    
    
    public function set_tab_name()
    {
      
       
     $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","update_level");
      redirect("/welcome/admin#lJ");
     
    }
    
    public function set_tab_name1()
    {
      
       
     $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","update_level");
      redirect("/welcome/moderator#lJ");
     
    }
    public function set_tab_order()
    {
     
     $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","view_order");
      redirect("/welcome/admin#lK");
     
    }
    
    public function set_tab_order1()
    {
     
     $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","view_order");
      redirect("/welcome/moderator#lK");
     
    }
    
    public function view_edit_profile()
    {
      $data = $this->menubar();
      $this->load->view('edit_profile', $data);
      
    }
    
   
    public function admin_view_profile(){
      if($this->session->userdata("level")==0){
        
     
      $username= $this->uri->segment(3);
     
      $result_set=  $this->ez_model->get_all();
      
   
      foreach ($result_set as $value) {
        if($value->username == $username){
         
          $data["username"]=$value->username;
          $data["firstname"]=$value->firstname;
          $data["lastname"]=$value->lastname;
          $data["address"]=$value->address;
           $data["email"]=$value->email;
          $data["gender"]=$value->gender;
          $data["languages"]=$value->languages;
           $data["order_set"]=$this->ez_model->get_all_orders();
           
          break;
        }
        else{
           $data["username"]=$username;
          $data["firstname"]="";
          $data["lastname"]="";
          $data["address"]="";
           $data["email"]="";
          $data["gender"]="";
          $data["languages"]="";
           $data["order_set"]=$this->ez_model->get_all_orders();
        }
      
      }
        
       $this->load->view("admin_view_profile",$data);
      }
      else{
        $this->logout();
      }
      
      
      
      }
      
      public function moderator_view_profile(){
      if($this->session->userdata("level")==1){
        
     
      $username= $this->uri->segment(3);
     
      $result_set=  $this->ez_model->get_all();
      
   
      foreach ($result_set as $value) {
        if($value->username == $username){
         
          $data["username"]=$value->username;
          $data["firstname"]=$value->firstname;
          $data["lastname"]=$value->lastname;
          $data["address"]=$value->address;
           $data["email"]=$value->email;
          $data["gender"]=$value->gender;
          $data["languages"]=$value->languages;
           $data["order_set"]=$this->ez_model->get_all_orders();
          break;
        }
        else{
           $data["username"]=$username;
          $data["firstname"]="";
          $data["lastname"]="";
          $data["address"]="";
           $data["email"]="";
          $data["gender"]="";
          $data["languages"]="";
           $data["order_set"]=$this->ez_model->get_all_orders();
        }
      
      }
        
       $this->load->view("moderator_view_profile",$data);
      }
      else{
        $this->logout();
      }
      
      
      
      }
    

      function toggle_profile()
        {
        
         $this->session->unset_userdata("tab_name");
     $this->session->set_userdata("tab_name","profiler");
        
            if($this->session->userdata('profile_flag')==0)
            {
                $newdata = array(
			'profile_flag'  => 1,
			);
                
            $this->output->enable_profiler(TRUE);
            
            $sections = array(
                'config'  => TRUE,
                'queries' => TRUE
                );
        
            $this->output->set_profiler_sections($sections);
            
            }
            else
            {
                $newdata = array(
			'profile_flag'  => 0,
			);
                
            $this->output->enable_profiler(FALSE);
            
            $sections = array(
                'config'  => TRUE,
                'queries' => TRUE
                );

            $this->output->set_profiler_sections($sections);
        
            }
            
            $this->admin();
        }
        
         public function error_404(){
          $this->load->view("error404");
        }
  }
  /* End of file welcome.php */
  /* Location: ./application/controllers/welcome.php */
  ?>
