$(document).ready(function() 
{
	alert('hi');
  $("#product_category").change(function () { 
    alert('in');
    var cat_id=$('#product_category').val();

    var temp= "http://192.168.75.107/EZ_Cart/index.php/welcome/delete_products";
	
		
    $.ajax({
      type: "POST",
      data:{'cat_id':cat_id},
      url:temp,
      //dataType: 'json',
      success: function(output_string) {
		           	
		alert(output_string);
      }
    });
		
  });

 /* public function delete_products()
  {
		
    $state = $_POST['state'];
    $table_name="hf_states";
    $data="";
    $query = $this->db->query("SELECT * FROM ".$table_name." WHERE states_state_name= '".$state."' ");
    if ($query->num_rows() > 0)
    {
      foreach ($query->result() as $row) 
      {
        $state_id = $row->state_id;
      }
    }
    $table_name="hf_county";
		
    $query = $this->db->query("SELECT * FROM ".$table_name." WHERE county_state_id= '".$state_id."' ");
    if ($query->num_rows() > 0)
    {
      foreach ($query->result() as $row) 
      {
        array_push($county,$row->county_id);
        $data .= '<option>'.$row->county_county_name.'<option/>';	
      }
    }
    echo json_encode($data);  

  }
*/