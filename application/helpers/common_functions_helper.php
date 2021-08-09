<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * DEALS WITH COMMON OPERATIONS
 */
 
/**
 *  MAKE A DROP DOWN FROM THE ACCOUNT TYPE
 */
if ( ! function_exists('account_type_drop_down')){
	function account_type_drop_down(){

		/**
		 * 	VARIABLE TO HOLD THE DROP DOWN
		 */
		$dropdown ='';

		/**
		 * get main CodeIgniter object
		 */
       	$ci =& get_instance();
       
       /**
        * load databse library
        */
       	$ci->load->database();

       /**
        * get data from database
        */
       	$query = $ci->db->get("account_type_tb");

       	if($query->num_rows() > 0){
           $account_types = $query->result();
           	foreach($account_types as $account_type){
				/**
				 * HTML CODE FOR DROPDOWN/SELECT FORM FIELD
				 */
				$dropdown .= '<option value="'. $account_type->account_type_id .'">'. $account_type->account_name.'</option>';

			}

			/**
			 * 	RETURN THE OPTIONS FOR THE VIEWS TO US
			 */
           	return $dropdown;
       	}else{
			$dropdown .= '<option disabled>Nothing found</option>';

           return $dropdown;
       	}
	}

}
/**
 *  MAKE A DROP DOWN FROM THE GENDER
 */
if ( ! function_exists('gender_drop_down')){
	function gender_drop_down(){

		/**
		 * 	VARIABLE TO HOLD THE DROP DOWN
		 */
		$dropdown ='';

		/**
		 * get main CodeIgniter object
		 */
       	$ci =& get_instance();
       
       /**
        * load databse library
        */
       	$ci->load->database();

       /**
        * get data from database
        */
       	$query = $ci->db->get("gender_tb");

       	if($query->num_rows() > 0){
           $genders = $query->result();
           	foreach($genders as $gender){
				/**
				 * HTML CODE FOR DROPDOWN/SELECT FORM FIELD
				 */
				$dropdown .= '<option value="'. $gender->gender_id .'">'. $gender->gender_name.'</option>';

			}

			/**
			 * 	RETURN THE OPTIONS FOR THE VIEWS TO US
			 */
           	return $dropdown;
       	}else{
			$dropdown .= '<option disabled>Nothing found</option>';

           return $dropdown;
       	}
	}

}
/**
 *  MAKE A DROP DOWN FROM THE COUNTRY
 */
if ( ! function_exists('country_drop_down')){
	function country_drop_down(){

		/**
		 * 	VARIABLE TO HOLD THE DROP DOWN
		 */
		$dropdown ='';

		/**
		 * get main CodeIgniter object
		 */
       	$ci =& get_instance();
       
       /**
        * load databse library
        */
       	$ci->load->database();

       /**
        * get data from database
        */
       	$query = $ci->db->get("country_tb");

       	if($query->num_rows() > 0){
           $countries = $query->result();
           	foreach($countries as $country){
				/**
				 * HTML CODE FOR DROPDOWN/SELECT FORM FIELD
				 */
				$dropdown .= '<option value="'. $country->country_id .'">'. $country->country_name.'</option>';

			}

			/**
			 * 	RETURN THE OPTIONS FOR THE VIEWS TO US
			 */
           	return $dropdown;
       	}else{
			$dropdown .= '<option disabled>Nothing found</option>';

           return $dropdown;
       	}
	}

}

/**
 *  MAKE A DROP DOWN FROM THE CATEGORY
 */
if ( ! function_exists('category_drop_down')){
	function category_drop_down(){

		/**
		 * 	VARIABLE TO HOLD THE DROP DOWN
		 */
		$dropdown ='';

		/**
		 * get main CodeIgniter object
		 */
       	$ci =& get_instance();
       
       /**
        * load databse library
        */
       	$ci->load->database();

       /**
        * get data from database
        */
       	$query = $ci->db->get("category_tb");

       	if($query->num_rows() > 0){
           $categories = $query->result();
           	foreach($categories as $category){
				/**
				 * HTML CODE FOR DROPDOWN/SELECT FORM FIELD
				 */
				$dropdown .= '<option value="'. $category->category_name .'">'. $category->category_name.'</option>';

			}

			/**
			 * 	RETURN THE OPTIONS FOR THE VIEWS TO US
			 */
           	return $dropdown;
       	}else{
			$dropdown .= '<option disabled>Nothing found</option>';

           return $dropdown;
       	}
	}

}
/**
 *  MAKE A DROP DOWN FROM THE TRANSACTIION TYPE
 */
if ( ! function_exists('transaction_type_drop_down')){
	function transaction_type_drop_down(){

		/**
		 * 	VARIABLE TO HOLD THE DROP DOWN
		 */
		$dropdown ='';

		/**
		 * get main CodeIgniter object
		 */
       	$ci =& get_instance();
       
       /**
        * load databse library
        */
       	$ci->load->database();

       /**
        * get data from database
        */
       	$query = $ci->db->get("transaction_type_tb");

       	if($query->num_rows() > 0){
           $transaction_types = $query->result();
           	foreach($transaction_types as $transaction_type){
				/**
				 * HTML CODE FOR DROPDOWN/SELECT FORM FIELD
				 */
				$dropdown .= '<option value="'. $transaction_type->transaction_type_id .'">'. $transaction_type->transaction_type_name.'</option>';

			}

			/**
			 * 	RETURN THE OPTIONS FOR THE VIEWS TO US
			 */
           	return $dropdown;
       	}else{
			$dropdown .= '<option disabled>Nothing found</option>';

           return $dropdown;
       	}
	}

}

/**
 *  GET DETAILS
 */
if ( ! function_exists('get_details')){
	function get_details($table_name){
		/**
		 * get main CodeIgniter object
		 */
       	$ci =& get_instance();
       
       /**
        * load databse library
        */
       	$ci->load->database();

       /**
        * get data from database
        */
       	$query = $ci->db->get($table_name);

       	if($query->num_rows() > 0){
           return $query->result();
        }
	 }
}
/**
 *  CHECK IF FIELD VALUE DOES'T EXIT AND
 *  RETURN DETAILS FOR THAT EMAIL
 */
if ( ! function_exists('check_field_exists')){
	function check_field_exists($table_name, $field_name, $field_value){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where($table_name,array($field_name=>$field_value));
       // $query = $ci->db->get_where('user_tb',array('email'=>$email));
       
       if($query->num_rows() > 0){
           $result = $query->result();
           return $result;
       }else{
           return false;
       }
   }
}
/**
 *  SAVE DETAILS TO SPECIFIED TABLE
 *  AND RETURN THE ID INSERTED LAST
 */
if ( ! function_exists('save_details')) {
	function save_details($table_name, $data){
		 /**
		  * GET MAIN CODEIGNITOR OBJECT FOR
		  * THE HELPER
		  */
       $ci =& get_instance();
       
       /**
        * LOAD DATABASE OBJECT
        * FOR THE HELPER TO USE
        */
       $ci->load->database();
       /**
        * SPECIFY THE CONDIGINATOR
        * STATEMENT THE HELPER 
        * INTANDES TO DO
        */
		if($ci->db->insert($table_name, $data)){
			$id = $ci->db->insert_id();
		}else{
			$id = $ci->db->error(); 
		}
		
		return $id;
	}
}

if (! function_exists('update_details')) {
	function update_details($table_name, $based_on_field, $based_on_value, $data){
		/**
		  * GET MAIN CODEIGNITOR OBJECT FOR
		  * THE HELPER
		  */
       $ci =& get_instance();
       
       /**
        * LOAD DATABASE OBJECT
        * FOR THE HELPER TO USE
        */
       $ci->load->database();
       /**
        * SPECIFY THE CONDIGINATOR
        * STATEMENT THE HELPER 
        * INTANDES TO DO
        */
	 	$ci->db->where($based_on_field, $based_on_value);
	 	$query = $ci->db->update($table_name, $data);
	 	return $ci->db->affected_rows();
	}
	// code...
}
if(! function_exists('save_user_profile_image')){
	function save_user_profile_image($user_id,$image){
		/**
		  * GET MAIN CODEIGNITOR OBJECT FOR
		  * THE HELPER
		  */
       $ci =& get_instance();
       
       /**
        * LOAD DATABASE OBJECT
        * FOR THE HELPER TO USE
        */
       $ci->load->database();
       /**
        * SPECIFY THE CONDIGINATOR
        * STATEMENT THE HELPER 
        * INTANDES TO DO
        */
        $data = array(
                'user_id'     => $user_id,
                'image' => $image
            );  
        $result= $ci->db->insert('user_image_tb',$data);
        return $result;
    }
}
// $this->db->query("select user_tb.user_id,user_tb.fname,user_tb.lname,user_tb.email,user_tb.telephone,user_tb.dob,gender_tb.gender_name,country_tb.country_name,account_type_tb.account_name
//                from user_tb
//                JOIN `gender_tb` ON `gender_tb`.`gender_id` = `user_tb`.`gender_id`
//                JOIN `country_tb` ON `country_tb`.`country_id` = `user_tb`.`country_id`
//                JOIN `account_type_tb` ON `account_type_tb`.`account_type_id` = `user_tb`.`account_type_id`
//                where `user_tb`.`user_id` = 1
//                AND `table3`.`dp_status` = 1
//                AND `user_tb`.`user_plan_id` = $up_id
//                AND gender_tb.pr_status = 1
//                group by user_tb.ud_id");

//Joins:

// $this->db->select(‘*’);
// $this->db->from(‘table1′);
// $this->db->join(‘table2′, ‘table2.id = table1.id’);

// $query = $this->db->get();


// $this->db->select('*');
// $this->db->from('users');
// $this->db->join('profile_image', 'profile_image.user_id = users.id');
// $this->db->join('city', 'city.user_id = users.id','left');
// $this->db->join('post', 'post.user_id = users.id','left');
// $this->db->join('friends', 'friends.user_id = users.id','left');
// $this->db->where('users.id', $id); 
// $query = $this->db->get();
?>