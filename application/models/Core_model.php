<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Core_model extends CI_Model{
    
    public function isExist($tbl,$options)
    {
        $query = $this->db->get_where($tbl, $options);
        return $query->num_rows() > 0 ? true:false;
            
    }
   
    public function fetch_data($tbl,$options = null,$limit="")
    {
        if($options == NULL)
        {
            if(!empty($limit)){
                $this->db->limit($limit);
            }
            $query = $this->db->get($tbl);
            
        }else{
            if(!empty($limit)){
                $this->db->limit($limit);
            }
            $query = $this->db->get_where($tbl, $options);
        }
        
        return $query->result();
    }
    
    public function fetch_data_distinct($tbl,$options = null)
    {
        if($options == NULL)
        {
            $this->db->distinct();
            $query = $this->db->get($tbl);
            
        }else{
            $this->db->distinct();
            $query = $this->db->get_where($tbl, $options);
        }
        
        return $query->result();
    }
    
    public function fetch_data_as_array($tbl,$options = null)
    {
        if($options == NULL)
        {
            $query = $this->db->get($tbl);
            
        }else{
            $query = $this->db->get_where($tbl, $options);
        }
        
        return $query->result_array();
    }
    
            
     function insert_data($table,$data)  //inserts data into a table 
	{
		$this->db->insert($table,$data);
                $insert_id = $this->db->insert_id();
                 return  $insert_id;			
	}

    function insert_data2($table,$data)  //inserts data into a table 
    {
                $this->db->set($data);
                $this->db->insert($table);
                $insert_id = $this->db->insert_id();
                 return  $insert_id;            
    }



	
	function update_data($table,$where,$data) //updates data of a table 
	{
                $this->db->where($where);
		$this->db->update($table,$data);	
	}
        
        function update_data_byset($table,$where,$data) //updates data of a table 
	{
                $this->db->set($data);
                $this->db->where($where);
		$this->db->update($table);	
	}
        
        function update_data_byset2($table,$where,$value,$data) //updates data of a table 
	{
                $this->db->set($data);
                $this->db->where($where,$value);
		$this->db->update($table);	
	}
        function update_data2($table,$where,$value,$data)
        {
                $this->db->where($where,$value);
		$this->db->update($table,$data);
        }
        
         function update_data3($table,$where,$value,$where2,$value2,$data)
        {
                $this->db->where($where,$value);
                $this->db->where($where2,$value2);
		$this->db->update($table,$data);
        }
                


	function delete($table,$arg) //deletes data from a table 
	{
		$this->db->where($arg);
		$this->db->delete($table);
	}
        
	function delete_data($table,$where,$value) //deletes data from a table 
	{
		$this->db->where($where,$value);
		$this->db->delete($table);
	}	
        
        function delete_data2($table,$where1,$value1,$where2,$value2) //deletes data from a table 
	{
		$this->db->where($where1,$value1);
                $this->db->where($where2,$value2);
		$this->db->delete($table);
	}
        
        function query_fields($table,$fields,$where)
        {
             $this->db->select($fields) //note fields must be string separated by commas
               ->from($table)
               -> where($where)
               -> limit(1);

            $query = $this->db->get();
            if($query->num_rows() == 1)
              {             
                return $query->result_object();            
              }
             return false;
            
        }

        function query_field3($table,$fields,$where="")
        {
            if(empty($where)){
                $this->db->select($fields) //note fields must be string separated by commas
               ->from($table);
           }else{
            $this->db->select($fields) //note fields must be string separated by commas
               ->from($table)->where($where);
           }
             

            $query = $this->db->get();
            return $query->result_object();  
     }
            
        
        
        function query_field_distinct2($table,$where,$value)
        {
         $query = $this->db->select('*')
                ->where($where, $value)
                ->limit(1)
                ->get($table);
              return $query->result_object(); 
        }
        
        function query_field_distinct($table,$fields,$where)
        {
             $this->db->select($fields) //note fields must be string separated by commas
               ->from($table)
               -> where($where)
                ->distinct();

            $query = $this->db->get();
            return $query->result_object(); 
        }
        
         function execute_query($sql) //executes custom sql query
	{		
		$query=$this->db->query($sql);
		return $query->result_array();
	}
        
        function is_active($table,$field,$where='') // checks a row's status of a table is active or not, returns true if active
	{
		$this->db->select($field);
		$this->db->from($table);
		$where[$field]=1;
		$this->db->where($where);
		$query=$this->db->get();		
		$num_rows=$query->num_rows();
		
		if ($num_rows>0) return true;
		else return false;
	}



	function is_exist($table,$where='',$select='') //checks a row is exist or not, returns true if exists
	{		
		$this->db->select($select);
		$this->db->from($table);
		if($where!='') $this->db->where($where);
		$query=$this->db->get();
		$num_rows=$query->num_rows();		
		if($num_rows>0) return TRUE;
		else return FALSE;	
	}	
	


	function is_unique($table,$where='',$select='') //checks if a row is unique or not , returns true if unique
	{		
		$this->db->select($select);
		$this->db->from($table);
		if($where!='') $this->db->where($where);
		$query=$this->db->get();
		$num_rows=$query->num_rows();
		
		if($num_rows>0) return FALSE;
		else return TRUE;	
	}

	
	function get_enum_values($table_name="",$column_name="") //return array of enum values of a field in a table
	{
		$empty_array=array();
		
		if($table_name=="" || $column_name=="")
		return $empty_array();

		$sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
		$results=$this->execute_query($sql);
		
		$enumList = explode(",", str_replace("'", "", substr($results[0]['COLUMN_TYPE'], 5, (strlen($results[0]['COLUMN_TYPE'])-6))));
		return $enumList;	
        }
        
       
        
        public  function getUserDetails(){

        $response = array();

        // Select record
        $this->db->select('username,first_name,last_name,email');
        $q = $this->db->get('users');
        $response = $q->result_array();

        return $response;
        }
        
        public function getFormLeads($id)
        {
            $response = array();

        // Select record
        $this->db->select('first_name,last_name,email');
        $this->db->where(array('webhook_id'=>$id));
        $q = $this->db->get(WEBHOOK_LEADS);
        $response = $q->result_array();

        return $response;
        
        }
        
        public function getCustomLinkLeads($id)
        {
            $response = array();

        // Select record
        $this->db->select('first_name,last_name,email');
        $this->db->where(array('identifier'=>$id));
        $q = $this->db->get('customlinkleads');
        $response = $q->result_array();

        return $response;
        
        }
	
        
                 // Count all record of table "contact_info" in database.
        public function record_count($tbl,$where="") {
            if(!empty($where))
             {
             $this->db->like('title',$where);
             }
             $this->db->where('user_id',$this->session->user_id);
             $this->db->from($tbl);
             return $this->db->count_all_results();
        }

        // Fetch data according to per_page limit.
        public function fetch_pagination_data($tbl,$limit, $start,$search = NULL, $where=NULL) {
        
        if(empty($where))
        {
            $this->db->limit($limit, $start);
        }else{
            $this->db->limit($limit);
            $this->db->where($where); // in the format of 'key',value
        }
        if(!empty($search))
        {
           $this->db->like($search);
        }
        $this->db->where('user_id',$this->session->user_id);
        $this->db->order_by("created_at", "asc");
        $query = $this->db->get($tbl);
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        $data[] = $row;
        }
        
        return $data;
        }else{
            return false;
        }
        
        }
        
        
        public function search($tbl,$keyword) {
        
        $this->db->like('name',$keyword);
        $this->db->order_by("date", "asc");
        $query = $this->db->get($tbl);
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        $data[] = $row;
        }

        return $data;
        }else{
            return false;
        }
        
        }
        
        public function fetchNotification($tbl,$options)
        {
            $this->db->order_by('created_at', 'desc');
            $query = $this->db->get_where($tbl, $options);
            return $query->result();

        }
        
    
}

