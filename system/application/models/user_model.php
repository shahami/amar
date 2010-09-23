<?php

/**
 * User_Model
 * 
 * @package Users
 */

class User_Model extends Model
{
	
	/** Utility Methods **/
	function _required($required, $data)
	{
		foreach($required as $field)
			if(!isset($data[$field])) return false;
			
		return true;
	}
	
	function _default($defaults, $options)
	{
		return array_merge($defaults, $options);
	}
	
	/** User Methods **/
	
	/**
	 * AddUser method creates a record in the users table
	 * 
	 * Option: Values
	 * --------------
	 * userEmail
	 * userPassword
	 * userType
	 * userStatus
	 * 
	 * @param array $options
	 * @result int insert_id()
	 */
	function AddUser($options = array())
	{
		// required values
		if(!$this->_required(
			array('userEmail', 'userPassword'),
			$options)
		) return false;
		
		$options = $this->_default(array('userStatus' => 'active'), $options);
		
		$this->db->insert('users', $options);
		
		return $this->db->insert_id();
	}
	
	/**
	 * UpdateUser method updates a record in the users table
	 * 
	 * Option: Values
	 * --------------
	 * userId			required
	 * userEmail
	 * userPassword
	 * userType
	 * userStatus
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateUser($options = array())
	{
		// required values
		if(!$this->_required(
			array('userId'),
			$options)
		) return false;

		if(isset($options['userEmail']))
			$this->db->set('userEmail', $options['userEmail']);

		if(isset($options['userPassword']))
			$this->db->set('userPassword', md5($options['userEmail']));

		if(isset($options['userType']))
			$this->db->set('userType', $options['userType']);
			
		if(isset($options['userStatus']))
			$this->db->set('userStatus', $options['userStatus']);

		$this->db->where('userId', $options['userId']);
		
		$this->db->update('users');
		
		return $this->db->affected_rows();
	}
	
	/**
	 * GetUsers method returns a qualified list of users from the users table
	 * 
	 * Options: Values
	 * ---------------
	 * userId
	 * userEmail
	 * userPassword
	 * userType
	 * userStatus
	 * 
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc, desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * userId
	 * userEmail
	 * userPassword
	 * userType
	 * userStatus
	 * 
	 * @param array $options 
	 * @return array of objects
	 * 
	 */
	function GetUsers($options = array())
	{
		// Qualification
		if(isset($options['userId']))
			$this->db->where('userId', $options['userId']);
		if(isset($options['userEmail']))
			$this->db->where('userEmail', $options['userEmail']);
		if(isset($options['userPassword']))
			$this->db->where('userPassword', $options['userPassword']);
		if(isset($options['userStatus']))
			$this->db->where('userStatus', $options['userStatus']);
        if(isset($options['userType']))
			$this->db->where('userType', $options['userType']);

		// limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'], $options['sortDirection']);
			
		if(!isset($options['userStatus'])) $this->db->where('userStatus !=', 'deleted');
		
		$query = $this->db->get("users");
		
		if(isset($options['count'])) return $query->num_rows();
		
		if(isset($options['userId']) || isset($options['userEmail']))
			return $query->row(0);
			
		return $query->result();
	}
	
	/** authentication methods **/
	
	/**
	 * The login method adds user information from the database to session data.
	 * 
	 * Option: Values
	 * --------------
	 * userEmail
	 * userPassword
	 *
	 * @param array $options
	 * @return object result()
	 */
	function Login($options = array())
	{
		// required values
		if(!$this->_required(
			array('userEmail', 'userPassword'),
			$options)
		) return false;
		
		$user = $this->GetUsers(array('userEmail' => $options['userEmail'], 'userPassword' => md5($options['userPassword'])));
		if(!$user) return false;
		
		$this->session->set_userdata('userEmail', $user->userEmail);
		$this->session->set_userdata('userId', $user->userId);
		$this->session->set_userdata('userType', $user->userType);
		
		return true;
	}
	
    /**
     * The secure method checks a user's session against the passed parameters to determine if the user has
     * access to a specific area.
     * 
     * Option: Values
     * --------------
     * userType
     * 
     * @param array @options
     * @return bool 
     */
    function Secure($options = array())
    {
		// required values
		if(!$this->_required(
			array('userType'),
			$options)
		) return false;
		        
        $userType = $this->session->userdata('userType');
        
        if(is_array($options['userType']))
        {
            foreach($options['userType'] as $optionUserType)
            {
                if($optionUserType == $userType) return true;
            }
        }
        else
        {
            if($userType == $options['userType']) return true;
        }
        
        return false;
    }
}

?>