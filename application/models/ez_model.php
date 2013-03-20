<?php

class ez_model extends CI_Model
{
  
  public function get_all()
  {
      $query = $this->db->get('users');
      return $query->result();
  }
  
  public function get_all_products()
  {
      $query = $this->db->get('product');
      return $query->result();
  }
  
  public function check_register($username,$email)
  {
      echo $username;
      echo $email;
      $query = $this->db->get('users');

      foreach ($query->result() as $row)
      {
          //echo $row->username;
          if($row->username==$username || $row->email==$email)
          {
            return 1;
          }
          
      }
      return 0;
  }
  
  
  function signup_model($data)
  {
    $this->db->set('username', $data["username"]);
    $this->db->set('password', $data["password"]);
    $this->db->set('email', $data["email"]);
    $this->db->set('address', $data["address"]);
    
    $checking = $this->check_register($data["username"],$data["email"]);
    if($checking==0)
    {
      $this->db->insert('users'); 
      return 1;
    }
    else 
    {
      return 0;
    }
    
   // $this->db->insert("users",$data);
			
  }
  
  
};
?>
