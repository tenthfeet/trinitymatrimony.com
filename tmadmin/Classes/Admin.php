<?php
/**
 * Developed by tenthfeet.com
 */
class Class_Admin
{
	/**
	 * database connection
	 */
	protected $_con;
	
	/**
	 * it will initalize DB connection
	 */
	public function __construct()
	{
		$db = new Class_DBcon();
		$this->_con = $db->con;
	}

	public function login( array $data )
	{
		$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$username = mysqli_real_escape_string( $this->_con,  $trimmed_data['username'] );
			$password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
				
			if((!$username) || (!$password) ) {
			//	throw new Exception( LOGIN_FIELDS_MISSING );
			$error = "Username, Password should not be empty";
			return $error;
			}
			$password = md5( $password );
			$query = "SELECT admin_users_id, username, email FROM ".Admin." where username = '$username' and password = '$password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if( $count == 1){
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				$_SESSION['user'] = $_SESSION['username'];
              	$_SESSION['fy'] = $_POST['fy'];
				return true;
			}else{
				//throw new Exception( LOGIN_FAIL );
		   $error = "Username, Password not match";
			return $error;
			}
		} else{
			//throw new Exception( LOGIN_FIELDS_MISSING );
				$error = "Username, Password should not be empty";	
        return $error;		
		} 
		
		
		
 	}           
		      // exit;
	public function account( array $data )
	{
		if( !empty( $data ) ){
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['inputPassword'] );
			$cpassword = $trimmed_data['inputConfirmPassword'];
			//$user_id = mysqli_real_escape_string( $this->_con, $trimmed_data['user_id'] );
			
			if((!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "UPDATE ".Admin." SET password = '$password' WHERE username = 'admin'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	
	/**
	 * This handle sign out process
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
	
	
	public function forgetPassword( array $data )
	{
		if( !empty( $data ) ){
			
			// escape variables for security
			$email = mysqli_real_escape_string( $this->_con, trim( $data['email'] ) );
			
			if((!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$password = $this->randomPassword();
			$password1 = md5( $password );
			$query = "UPDATE ".Admin." SET password = '$password1' WHERE email = '$email'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$to = $email;
				$subject = "New Password Request";
				$txt = "Your New Password ".$password;
				$headers = "From: jayabal@gmail.com" . "\r\n" ."CC: tenthfeet@gmail.com";
				echo mail($to,$subject,$txt,$headers);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	
	/**
	 * This will generate random password
	 * @return string
	 */
	
	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
}