<?php

class ez_model extends CI_Model {

  public function get_all_category() {
    $query = $this->db->get('category');
    return $query->result();
  }

  public function get_all_cart() {
    $query = $this->db->get('cart');
    return $query->result();
  }
  
  public function count_category() {

    $query = $this->db->query('SELECT * FROM category;');

    return $query->num_rows();
  }

  public function get_all() {
    $query = $this->db->get('users');
    $this->db->from('users');
$this->db->order_by("username", "asc");
$query = $this->db->get(); 

return $query->result();
    
   
  }
  
  
  public function get_all_toggle($toggle) {
    if($toggle==1)
    {
    $query = $this->db->get('users');
    $this->db->from('users');
$this->db->order_by("username", "asc");
$query = $this->db->get(); 

return $query->result();
    }
    else if($toggle==0)
    {
    $query = $this->db->get('users');
    $this->db->from('users');
$this->db->order_by("username", "desc");
$query = $this->db->get(); 

return $query->result();
    }
      
    
  }
  
  public function get_all_orders() {
    $query = $this->db->get('view_order');
    
    return $query->result();
  }

  public function get_all_generic_category() {
    $query = $this->db->get('generic_category');
    return $query->result();
  }

  public function count_generic_category() {

    $query = $this->db->query('SELECT * FROM generic_category;');

    return $query->num_rows();
  }
  
  public function get_order_count(){
     $query = $this->db->query('SELECT * FROM view_order;');

    return $query->num_rows();
  }
  

  public function get_all_products() {
    $query = $this->db->get('product');
    return $query->result();
  }

  public function check_register($username, $email) {
    $query = $this->db->get('users');

    foreach ($query->result() as $row) {
      if ($row->username == $username){
        return 1;
      }
      if( $row->email == $email) {
        return 4;
      }
    }
    return 0;
  }

  public function signup_model($data) {
  
   
    
    $this->db->set('username', $data["username"]);
    $this->db->set('firstname', $data["firstname"]);
    $this->db->set('lastname', $data["lastname"]);
    $this->db->set('password', $data["password"]);
    $this->db->set('email', $data["email"]);
    $this->db->set('address', $data["address"]);
    $this->db->set('gender', $data["gender"]);
    $this->db->set('languages', $data["language"]);

    $checking = $this->check_register($data["username"], $data["email"]);
    if ($checking == 0) {
      $this->db->insert('users');
      return 1;
    } else if ($checking == 1) {
      return 0;
    }
    else if ($checking == 4) {
      return 4;
    }
  }

  public function insert_products($data) {
    
    if($data["sub_category_list_product"]==0)
    {
      $data["category_name"] = "";
    }
    else
    {
    $array = array('category_id' => $data["sub_category_list_product"]);
    $this->db->where($array);

    $result1 = $this->db->get('category');
    foreach ($result1->result() as $value) {
      $data["category_name"] = $value->category_name;
    }
    }
    
    $this->db->set('category_name', $data["category_name"]);
    $this->db->set('product_name', $data["product_name"]);
    $this->db->set('product_image', $data["product_img"]);
    $this->db->set('product_price', $data["product_price"]);
    $this->db->set('product_desc', $data["product_desc"]);
    $this->db->set('no_of_product', $data["no_of_product"]);
    $this->db->set('category_id', $data["sub_category_list_product"]);
    $this->db->set('generic_category_id', $data["generic_category_list_product"]);


    $result = $this->db->insert('product');
    return $result;
    
  }

  public function insert_sub_category($data) {


    $this->db->set('category_name', $data["sub_category"]);
    $this->db->set('generic_category_id', $data["generic_category"]);

    $result = $this->db->insert("category");
    return $result;
  }

  public function insert_generic_category($data) {

    $this->db->set('generic_category_name', $data["generic_category"]);

    $result = $this->db->insert("generic_category");
   
    return $result;
  }

  public function update_generic($data) {
    
    
    $array = array('generic_category_id' => $data["old_generic_name"]);
    $this->db->where($array);

    $result1 = $this->db->get('generic_category');
    foreach ($result1->result() as $value) {
      $data["old_generic_name"] = $value->generic_category_name;
    }
    
    $this->db->set('generic_category_name', $data["new_generic_name"]);
    $array = array('generic_category_name' => $data["old_generic_name"]);
    $this->db->where($array);

    $result = $this->db->update('generic_category');    
    return $result;
  }

  public function update_sub_category($data) {

    $this->db->set('category_name', $data["new_generic_name"]);

    $array = array('category_name' => $data["old_generic_name"]);
    $this->db->where($array);

    $result = $this->db->update('category');
    return $result;
  }

  public function delete_generic($data) {
   
    $flag=0;
    $generic_category_id = $data["generic_name"];
   
    $result_set = $this->get_all_products();
    foreach ($result_set as $value) {
      
      if($value->generic_category_id == $generic_category_id)
      {
        $flag=1;
        return 0;
        break;
      }
    }
    if($flag==0)
    {
      $array3 = array('generic_category_id' => $data["generic_name"]);
      $this->db->where($array3);
      $result = $this->db->delete('generic_category');
      return $result;
    }
    
   
  }

 
  //--------------------------password---------------------
  function pass_check_model($username,$email){
      $query = $this->db->get('users');
      foreach ($query->result() as $value) {
        
          if(($value->username==$username) && ($value->email==$email)){
            
          return 1;    
              
          
          }
      }
      return 0;
  }
  //----------------------------password----------------



  public function delete_sub($data) {

   
        $flag=0;
       $array = array('category_name' => $data["sub_name"]);
    $query = $this->db->get_where('category', $array);

    foreach ($query->result() as $value) {
      $category_id = $value->category_id;
    }
    
    
    
    $result_set = $this->get_all_products();
    foreach ($result_set as $value) {
      
      if($value->category_id == $category_id)
      {
        $flag=1;
        return 0;
        break;
      }
    }
    if($flag==0)
    {
      $array3 = array('category_id' => $category_id);
      $this->db->where($array3);
      $result = $this->db->delete('category');
      return $result;
    }

  }

  public function update_products($data) {
    if ($data["product_img"] != "<p>You did not select a file to upload.</p>") {
      $this->db->set('product_image', $data["product_img"]);
      $this->db->set('product_price', $data["product_price"]);
      $this->db->set('product_desc', $data["product_desc"]);
      $this->db->set('no_of_product', $data["no_of_product"]);
    } else {
      $this->db->set('product_price', $data["product_price"]);
      $this->db->set('product_desc', $data["product_desc"]);
      $this->db->set('no_of_product', $data["no_of_product"]);
    }
    
  

    $array = array('product_id' => $data["product_id"]);
    $this->db->where($array);

    $result = $this->db->update('product');
    return $result;
  }

  public function ajax_update_model($data) {

    $array = array('product_id' => $data["product_name"]);
    $this->db->where($array);
    $query = $this->db->get('product');
    return $query->result();
  }

  public function delete_products_name($data) {
    $array = array('category_id' => $data["cat_id"]);
    $this->db->where($array);
    $query = $this->db->get('product');
    return $query->result();
  }

  public function generic_category_list() {
    $query = $this->db->get('generic_category');
    return $query->result();
  }

  public function sub_category_list() {
    $query = $this->db->get('category');
    return $query->result();
  }

  public function sub_gen_category_list($data) {
    $array = array('generic_category_id' => $data["cat_id"]);
    $this->db->where($array);
    $query = $this->db->get('category');

  
    return $query->result();
  }
  
  public function genric_to_product_ajax($data)
  {
    $array = array('generic_category_id' => $data["cat_id"]);
    $this->db->where($array);
    $query = $this->db->get('product');

  
    return $query->result();
  }

  public function admin_delete_products($data) {
    $array = array('product_id' => $data["product_id"]);
    $this->db->where($array);
    $result = $this->db->delete('product');
    return $result;
  }

  public function count1() {
    $array = array('banned' => 0);
    $this->db->where($array);
    $query = $this->db->query('SELECT * FROM users where banned=1;');

    return $query->num_rows();
  }

  public function product_collection_model($data) {
   
    if(!is_numeric($data["product_name"]))
    {
    $array = array('category_name' => $data["product_name"]);
    $this->db->where($array);
    $query = $this->db->get('category');
    if ($query->num_rows() > 0) {
     
      foreach ($query->result() as $value) {
        $data['category_id'] = $value->category_id;
      }
      $array = array('category_id' => $data["category_id"]);
      $this->db->where($array);
      $query = $this->db->get('product');
      $i = 0;
      $data = "";
      foreach ($query->result() as $value) {
        $data[$i]['category_id'] = $value->category_id;
        $data[$i]['category_name'] = $value->category_name;
        $data[$i]['generic_category_id'] = $value->generic_category_id;
        $data[$i]['product_name'] = $value->product_name;
        $data[$i]['product_image'] = $value->product_image;
        $data[$i]['product_price'] = $value->product_price;
        $i++;
      }
      return $data;
    } else {
   
      $array = array('generic_category_name' => $data["product_name"]);
      $this->db->where($array);
      $query = $this->db->get('generic_category');
      
        
        foreach ($query->result() as $value) {
          $data['category_id'] = $value->generic_category_id;
         
        }
        $array = array('generic_category_id' => $data["category_id"]);
        $this->db->where($array);
        $query = $this->db->get('product');
        $i = 0;
        $data = "";
        foreach ($query->result() as $value) {
         
          
          $data[$i]['generic_category_id'] = $value->generic_category_id;
          $data[$i]['category_name'] = $value->category_name;
          $data[$i]['category_id'] = $value->category_id;
          $data[$i]['product_name'] = $value->product_name;
          $data[$i]['product_image'] = $value->product_image;
          $data[$i]['product_price'] = $value->product_price;
         
          
          
          $i++;
        }
        return $data;
      
      
     }
    }
  }

  public function checking($offset){
    $result_set = $this->generic_category_list();
    foreach ($result_set as $value) {
      if($value->generic_category_name==$offset)
      {
        return 1;
      }
    }
    
    $result_set = $this->get_all_category();
    foreach ($result_set as $value) {
      if($value->category_name==$offset)
      {
        return 1;
      }
    }
    return 0;
  }


  public function padination_get_products($category_id, $generic_category_id, $limit, $offset, $total) {
    
    $check = $this->checking($offset);
    if (is_numeric($offset) || $check == 1) {
    

      if ($category_id != 0) {
       // echo "category".$category_id;
        //echo "generic category".$generic_category_id;
        if ($offset < $total) {

          $query = $this->db->limit($limit, $offset);
          $array = array('category_id' => $category_id);
          $this->db->where($array);
          $query = $this->db->get('product');
        } else {
          $array = array('category_id' => $category_id);
          $this->db->where($array);
          $query = $this->db->get('product');
        }
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
        } else {

          $data[] = '';
        }

        return $data;
      } else {
        if ($offset < $total) {
         // echo "generic";

          $query = $this->db->limit($limit, $offset);
          $array = array('generic_category_id' => $generic_category_id);
          $this->db->where($array);
          $query = $this->db->get('product');
        } else {
          $array = array('generic_category_id' => $generic_category_id);
          $this->db->where($array);
          $query = $this->db->get('product');
        }
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
        } else {

          $data[] = '';
        }

        return $data;
      }
    } else {
    
      $data["category_id"] = 1;
      $data[] = 'prasad';
      return $data;
    }
  }
  
   public function padination_get_search_products($search_value, $limit, $offset, $total) 
   {
   
     /* if ($category_id != 0) {
  if ($offset < $total) {

  $query = $this->db->limit($limit, $offset);
  $array = array('category_id' => $category_id);
  $this->db->where($array);
  $query = $this->db->get('product');
  } else {
  $array = array('category_id' => $category_id);
  $this->db->where($array);
  $query = $this->db->get('product');
  }
  if ($query->num_rows() > 0) {
  foreach ($query->result() as $row) {
  $data[] = $row;
  }
  } else {

  $data[] = '';
  }

  return $data; */
     
      $search = $search_value;
      $check = $this->checking($offset);
      if (is_numeric($offset) || $check == 1) 
      {

        $query = $this->db->limit($limit, $offset);
        $this->db->like('product_name', $search);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) 
        {
          return $query->result();
        } 
        else 
        {

          
          $this->db->like('generic_category_name', $search);
          $query = $this->db->get('generic_category');
          if ($query->num_rows() > 0) 
          {
              foreach ($query->result() as $row) 
              {
                $generic_category_id = $row->generic_category_id;
              }
              $query = $this->db->limit($limit, $offset);
              $array = array('generic_category_id' => $generic_category_id);
              $this->db->where($array);
              $query = $this->db->get('product');
              return $query->result();
          }
          else 
          {
            $this->db->like('category_name', $search);
            $query = $this->db->get('category');
            if ($query->num_rows() > 0) 
            {
               foreach ($query->result() as $row) 
               {
                  $category_id = $row->category_id;
               }
               $query = $this->db->limit($limit, $offset);
               $array = array('category_id' => $category_id);
               $this->db->where($array);
               $query = $this->db->get('product');
                return $query->result();
            } 
            else
            {
              return $query->result();
            }
          }
          
          
        } 
        
      } 
      else 
      {
        if ($offset < $total) 
        {

          $query = $this->db->limit($limit, $offset);
        $this->db->like('product_name', $search);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) 
        {
          return $query->result();
        } 
        else 
        {

          
          $this->db->like('generic_category_name', $search);
          $query = $this->db->get('generic_category');
          if ($query->num_rows() > 0) 
          {
              foreach ($query->result() as $row) 
              {
                $generic_category_id = $row->generic_category_id;
              }
              $query = $this->db->limit($limit, $offset);
              $array = array('generic_category_id' => $generic_category_id);
              $this->db->where($array);
              $query = $this->db->get('product');
              return $query->result();
          }
          else 
          {
            $this->db->like('category_name', $search);
            $query = $this->db->get('category');
            if ($query->num_rows() > 0) 
            {
               foreach ($query->result() as $row) 
               {
                  $category_id = $row->category_id;
               }
               $query = $this->db->limit($limit, $offset);
               $array = array('category_id' => $category_id);
               $this->db->where($array);
               $query = $this->db->get('product');
                return $query->result();
            } 
            else
            {
              return $query->result();
            }
          }
          
          
          } 
        } 
        else
        {
          $query = $this->db->limit($limit, $offset);
        $this->db->like('product_name', $search);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) 
        {
          return $query->result();
        } 
        else 
        {

          
          $this->db->like('generic_category_name', $search);
          $query = $this->db->get('generic_category');
          if ($query->num_rows() > 0) 
          {
              foreach ($query->result() as $row) 
              {
                $generic_category_id = $row->generic_category_id;
              }
              $query = $this->db->limit($limit, $offset);
              $array = array('generic_category_id' => $generic_category_id);
              $this->db->where($array);
              $query = $this->db->get('product');
              return $query->result();
          }
          else 
          {
            $this->db->like('category_name', $search);
            $query = $this->db->get('category');
            if ($query->num_rows() > 0) 
            {
               foreach ($query->result() as $row) 
               {
                  $category_id = $row->category_id;
               }
               $query = $this->db->limit($limit, $offset);
               $array = array('category_id' => $category_id);
               $this->db->where($array);
               $query = $this->db->get('product');
                return $query->result();
            } 
            else
            {
              return $query->result();
            }
          }
          
          
        } 
       }
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
              $data[] = $row;
            }
        } 
        else 
        {

            $data[] = '';
        }

        return $data;
      }

}
  
 
      public function pagination_get_users($limit, $offset, $total,$toggle) {
       
        
        if ($offset < $total) {

          if($toggle==1)
          {
          $query = $this->db->limit($limit, $offset);
          
         
          $this->db->from('users');
$this->db->order_by("username", "desc");
$query = $this->db->get(); 
          }
          else if($toggle==0)
          {
          $query = $this->db->limit($limit, $offset);
          
         
          $this->db->from('users');
$this->db->order_by("username", "asc");
$query = $this->db->get(); 
          }
            

        } else {
          
          if($toggle==1)
          {
          
          $this->db->from('users');
$this->db->order_by("username", "desc");
$query = $this->db->get(); 

          }
           else if($toggle==0)
          {
        
          $this->db->from('users');
$this->db->order_by("username", "asc");
$query = $this->db->get(); 

          }
          }
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
        } else {

          $data[] = '';
        }
        return $data;
      } 
      
      
     public function pagination_get_orders($limit, $offset, $total) {
      
    
        if ($offset < $total) {

          $query = $this->db->limit($limit, $offset);
          
        
          $this->db->from('view_order');
$this->db->order_by("username", "asc");
$query = $this->db->get(); 

        } else {
         
          $this->db->from('view_order');
$this->db->order_by("username", "asc");
$query = $this->db->get(); 


        }
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
        } else {

          $data[] = '';
        }

        return $data;
      } 
        
        
  
  
  public function insert_view_order($username,$firstname,$lastname,$address,$email,$product_name, $product_count){
    
     $this->db->set('username', $username);
     $this->db->set('firstname', $firstname);
     $this->db->set('lastname', $lastname);
      $this->db->set('address', $address);
       $this->db->set('email', $email);
        $this->db->set('product_name', $product_name);
         $this->db->set('product_count', $product_count);
         $this->db->set('purchase_date', date("Y-m-d"));

    $this->db->insert("view_order");
    
    
  }
  
  
  
  
  public function add_to_cart_model($product_name)
  {
    
      
    
    $flag=0;
    $query = $this->db->get('cart');

    foreach ($query->result() as $row) {
      if ($row->product_name == $product_name) {
        $product_count=$row->product_count;
        $product_count++;
    
        $array = array('product_name' => $product_name);
    $this->db->where($array);
        $this->db->set('product_count', $product_count);
       $this->db->update("cart");
        $flag=1;
        break;
      }
    }
    if($flag==0)
    {
       $array = array('product_name' => $product_name);
      $this->db->where($array);
      $query = $this->db->get('product');
      foreach ($query->result() as $row) {
        $product_price = $row->product_price;
        break;
      }
       $this->db->set('product_name', $product_name);
        $this->db->set('product_price', $product_price);
       $this->db->insert("cart");
    }
  }
  
  
  public function bill_cart($product_name, $product_count){
    
   
    
    
    
    
     $query = $this->db->get('cart');

    foreach ($query->result() as $row) {
      
      if (($row->product_name == $product_name)) {
        
       
          $array = array('product_name' => $product_name);
          
    $this->db->where($array);
    $this->db->set('product_active', "0");
     if($row->product_count!= $product_count){
        $this->db->set('product_count', $product_count);
     }
       $this->db->update("cart");
       
          break;
        
      }
       
    }
    
  }
  
  
  public function bill_cart_updated(){
    
    $array = array('product_active' => 1);
            $this->db->where($array); 
            $this->db->delete("cart");
    
    
    $array = array('product_active' => 0);
    $this->db->where($array);
    $this->db->set('product_active', 1);
     $this->db->update("cart");
  }
  
  public function searching($data)
  {
    $search = $data["search"];
    $this->db->like('product_name', $search);
     $query = $this->db->get('product');
     
     if ($query->num_rows() > 0) {
        return $query->result();
} else {
    $this->db->like('generic_category_name', $search);
     $query = $this->db->get('generic_category');
     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
     $generic_category_id = $row->generic_category_id;
     }
     $array = array('generic_category_id' => $generic_category_id);
    $this->db->where($array);
    $query = $this->db->get('product');
 return $query->result();
} else {
  $this->db->like('category_name', $search);
     $query = $this->db->get('category');
      if ($query->num_rows() > 0) {
     foreach ($query->result() as $row) {
     $category_id = $row->category_id;
     }
     $array = array('category_id' => $category_id);
    $this->db->where($array);
    $query = $this->db->get('product');
 return $query->result();
      }
      else
      {
        return $query->result();
      }
}
    
    
    
  }
  }
  
  //---------------------------------------------------NEW--------------
  public function user_update_model($data){
 
    $this->db->set('email', $data["email"]);
    $this->db->set('address', $data["address"]);
    $this->db->set('gender', $data["gender"]);
    $this->db->set('languages', $data["language"]);
    
     $array = array('username' => $data["username"]);
       $this->db->where($array);
    if(  $this->db->update('users')){
      return 1;
    }
 
 else {
       return 0;
     }
     
  }
  
  public function destroy_cart(){
    $this->db->truncate('cart'); 
  }
  
  public function cart_delete_database($product_name, $product_count){
    
     $query = $this->db->get('product');

    foreach ($query->result() as $row) {
      if ($row->product_name == $product_name) {
        
        $count=($row->no_of_product) - ($product_count);
    
        $array = array('product_name' => $product_name);
    $this->db->where($array);
        $this->db->set('no_of_product', $count);
       $this->db->update("product");
       
        break;
      }
    }
    
  }
  
   function ban_user($data){
          
            $array = array('username' => $data["admin_ban_name"]);
            $this->db->where($array); 
            $change = array('banned' => 1);
            $this->db->update("users",$change);
			
		}
        
        function unban_user($data){
          
            $array = array('username' => $data["admin_unban_name"]);
            $this->db->where($array); 
            $change = array('banned' => 0);
            $this->db->update("users",$change);
			
		}
        
       
        
         public function count_ban(){
            $query = $this->db->query('SELECT * FROM users where banned=1;');

            return $query->num_rows(); 
    	}
        
        public function count_user(){
            $query = $this->db->query('SELECT * FROM users;');

            return $query->num_rows(); 
    	}

        public function autologin($username,$password,$ip,$agent)
        {
         
          $flag=0;
           $query = $this->db->get('autologin');
        
          foreach ($query->result() as $row)
          {
         
            if($row->ip == $ip)
            {
                $array = array('ip' => $ip);
    $this->db->where($array);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('agent',$agent);
       $this->db->update("autologin");
       $flag=1;
       break;
            }
            
          }
          
          if($flag==0)
          {
            $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('agent',$agent);
        
        $this->db->set('ip', $ip);
            $this->db->insert('autologin');
          }
        }
        
        public function get_all_autologin()
        {
           $query = $this->db->get('autologin');
            return $query->result();
          
        }
        
         public function updating_level($data){
          
            $array = array('username' => $data["update_user_name"]);
            $this->db->where($array); 
            $change = array('level' => $data["update_user_level"]);
            $this->db->update("users",$change);
			
		}
        
        public function user_updating_level($user_id,$user_level){
          
       
            $array = array('id' => $user_id);
            $this->db->where($array); 
            $change = array('level' => $user_level);
            $this->db->update("users",$change);
          
            
			
		}
        
         function delete_user($id){
          
            $array = array('id' => $id);
            $this->db->where($array); 
            $this->db->delete("users");
			
		}
        
        
        public function user_updating_banned($user_id,$user_banned){
         
          
            $array = array('id' => $user_id);
            $this->db->where($array); 
            $change = array('banned' => $user_banned);
            $this->db->update("users",$change);
          
        
		}
        
        
        /////// --------generic and category list together-------------------
  public function sub_category_click_list()
  {
      
      $query = $this->db->get('generic_category');
     
      $row = $query->first_row();
      $generic_category_id = $row->generic_category_id;
     
      
      $array3 = array('generic_category_id' => $generic_category_id);
      $this->db->where($array3);
      $result = $this->db->get('category');
      return $result->result();
      
      
      
  }
        
  /////// --------Generic and product list together-----------------
  public function product_click_list()
  {
      
      $query = $this->db->get('generic_category');
    
      $row = $query->first_row();
      $generic_category_id = $row->generic_category_id;
    
      
      $array3 = array('generic_category_id' => $generic_category_id);
      $this->db->where($array3);
      $result = $this->db->get('product');
      return $result->result();
      
      
      
  }
  
  
   public function user_present($name){
     
   
         $array = array('username' => $name);
      $this->db->where($array);
      $result = $this->db->get('users');  
      if ($result->num_rows() > 0){
        return 1;
    }
    else{
        return 0;
    }
      }
      
      
       public function user_level($name){
     
   
         $array = array('username' => $name);
      $this->db->where($array);
      $result = $this->db->get('users');  
      if ($result->num_rows() > 0){
        foreach ($result->result() as $value) {
          return $value->level;
        }
    }
    else{
        return 5;
    }
      }
      
      public function get_generic_name($generic_category_id)
      {
         $array = array('generic_category_id' => $generic_category_id);
      $this->db->where($array);
      $result = $this->db->get('generic_category');  
      foreach ($result->result() as $value) {
        return $value->generic_category_name;
      }
      }
        
}

;
?>
