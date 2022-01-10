<<<<<<< HEAD
<?php
/**
 * Developed by tenthfeet.com
 */
class Class_User{
  /**
	 * @var will going contain database connection
  */
  protected $_con;
  /**
  * it will initalize DBclass
  */
  public function __construct(){
    $db = new Class_DBcon();
	$this->_con = $db->con;
  }
	
  public function screening(array $data) {
    function screen($data){
      if (is_array($data)) {
        $data = implode(',', $data);
      }

      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      // $data = addslashes($data);
      $data = nl2br($data);
      return $data;
    }

    $a = $data;
    $t_data = array_map("screen", $a);
    return $t_data;
  }
   
  public function login( array $data ){
	  $_SESSION['logged_in'] = false;
  	    if( !empty( $data ) ){
	      // Trim all the incoming data:
	      $trimmed_data = array_map('trim', $data);
			
	      // escape variables for security
	      $email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
	      $password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
      
          $fy = mysqli_real_escape_string( $this->_con,  $trimmed_data['fy'] );
		
	      if((!$email) || (!$password) ) {
	        throw new Exception( LOGIN_FIELDS_MISSING );
	      }
          $password=md5(md5(base64_encode($password)));
      
          $query = "SELECT user_id, name, email, created, usertype, trcompany FROM ".users." where email = '$email' and password = '$password' and status= 'Active' ";
		  $result = mysqli_query($this->_con, $query);
		  $data = mysqli_fetch_assoc($result);
		  $count = mysqli_num_rows($result);
          if( $count == 1){
            session_start();
            $_SESSION['fy'] = $_POST['fy'];
            $_SESSION = $data;
				
            //	echo 
            $_SESSION['logged_in'] = true;
			
            //echo 
            $_SESSION['user'] = $data['name'];
			
            //echo 
            $_SESSION['email'] = $data['email'];
            
            //echo 
            $_SESSION['fy'] = $_POST['fy'];

            $_SESSION['usertype'] = $data['usertype'];                
                
            $_SESSION['user_id'] = $data['user_id'];
                
            $_SESSION['trcompany'] = $data['trcompany'];
               
            include_once "sv.php";

            $userid =  $_SESSION['user_id'];
            $username =  $_SESSION['user'];
            $usertype =  $_SESSION['usertype'];
            $ipadd =  $_SERVER['REMOTE_ADDR'];
            $email = $_SESSION['email'];
            $logtype = "login";
            $fy = $_POST['fy'];
              
            $curDate = date("Y-m-d");
            $logintime = date("Y-m-d H:i:s");
            $query = "INSERT INTO ".userslog." (`userid`, `username`, `logintime`, `logouttime`, `created`, `ipadd`, `usertype`, `email`, `logtype`, `fy`) 
              VALUES ('$userid','$username','$logintime','$logouttime', '$curDate', '$ipadd', '$usertype','$email','$logtype', '$fy')";
     	    $result = mysqli_query($this->_con, $query);
			
            if($result) { $msg="record added successfully "; } else {$msg="Error ! record not added "; }
              
            if( $email){
              $st = 1;
                           
              $email_to = $email;
              $email_subject = "member logged in to Innovio online accounts web application.";
              $email_from = $email; // required
              $email_message = "Details below.\n\n";
              $email_message .= "$email is logged in to Innovio online accounts web application\n";
              $email_message .= "Email: ".$email_from." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
      
              $headers = 'From: '.$email_from."\r\n".
              'Reply-To: '.$email_from."\r\n" .
              'X-Mailer: PHP/' . phpversion();
              //@mail("jayabal@gmail.com", $email_subject, $email_message, $headers);
              //$msg = "your password sent to your email id: ".$email.", please check email";        
             
              header('Location: index.php?sts='.$msg.'#popup7');
              return true;
			}
                    
            return true;
			} else {
				throw new Exception( LOGIN_FAIL );
			}
		} else {
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
      }
	
      /**
      * This handle sign out process
      */

	  public function logout(){
        $userid =  $_SESSION['user_id'];
        $username =  $_SESSION['user'];
        $usertype =  $_SESSION['usertype'];
        $ipadd =  $_SERVER['REMOTE_ADDR'];
        $email = $_SESSION['email'];
        $logtype = "logout";              

        $curDate = date("Y-m-d");
        $logouttime = date("Y-m-d H:i:s");
              
        if($userid){
          $query = "SELECT MAX(id) as maxid, logouttime as tlogouttime FROM ".userslog." WHERE userid = '$userid'";
		  $result = mysqli_query($this->_con, $query);
		  $data = mysqli_fetch_assoc($result);
		  $maxid = $data[maxid]; $tlogouttime = $data[tlogouttime];              
              
          if($tlogouttime == '0000-00-00 00:00:00'){
            //$query = "UPDATE ".userslog." SET `logouttime`='$logouttime' WHERE id='$maxid'";
			//$result = mysqli_query($this->_con, $query);
          } else {
            //$query = "INSERT INTO ".userslog." (`userid`, `username`, `logintime`, `logouttime`, `created`, `ipadd`, `usertype`, `email`, `logtype`) 
            //  VALUES ('$userid','$username','$logintime','$logouttime', '$curDate', '$ipadd', '$usertype','$email','$logtype')";
			//$result = mysqli_query($this->_con, $query);
          }
        }                            
        session_unset();
		session_destroy();
        header('Location: index.php');
	  }	 

    public function secretcode( array $data ){
	  //$_SESSION['logged_in'] = false;
	  if( !empty( $data ) ){
	    $st = 0;
			
        // Trim all the incoming data:
		$trimmed_data = array_map('trim', $data);
		$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
            
        $query = "SELECT COUNT(user_id) as emailcount FROM ".users." WHERE email = '$email'";
		$result = mysqli_query($this->_con, $query);
	    $row = mysqli_fetch_assoc($result);
            
        if ($row['emailcount'] > 0) {
          function generateRandomString($length = 10): string {
            $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            return substr(str_shuffle(str_repeat($x = $string, ceil($length / strlen($x)))), 1, $length);
          }

          $code = generateRandomString(10);
          $_SESSION['code'] = $code;
          $_SESSION['mpass_time'] = strtotime(date("Y-m-d H:i:s"));
          $_SESSION['email'] = $email;
          
                
                if( $email){
                  $st = 1;
                  $email_to = $email;
                  $email_subject = "Secret Code to reset your $company online account password";
                  $email_from = "jayabal@gmail.com"; // $email; // required
                  $email_message = "Details below.\n\n The Secret Code to reset your password is $code. Please copy this secret code and paste in the Reset Password form";
                  $email_message .= "Email: ".$email_from."\n"; //." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
      
                  $headers = 'From: '.$email_from."\r\n".
                  'Reply-To: '.$email_from."\r\n" .
                  'X-Mailer: PHP/' . phpversion();
                  //@mail($email_to, $email_subject, $email_message, $headers);  
                  //@mail("jayabal@gmail.com", $email_subject, $email_message, $headers);
     
                  //$msg = "your password sent to your email id: ".$email.", please check email";        
                  //  exit;
                  //return true;
                }          
                  
          
          
          // exit; 
          $msg = "Your secret code to reset password is sent to your email id: ".$email.", please check email";        
          header('Location: resetpassword.php?sts='.$msg.$_SESSION['code'].'#popup7');
        } 
        else {
	      $st = 0;
          $msg = "This email id is not yet registered !";
          header('Location: index.php?sts='.$msg.'#popup7');
		}
      }            
    }      
      
      
         public function resetpassword(array $data){
       	   //print_r($data);
           if( !empty( $data ) ){
			$st = 0;
            
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);

            $ipadd =  $_SERVER['REMOTE_ADDR'];
            $email = $_SESSION['email'];
			
             
             //echo $_SESSION['code']; 
            $secretcode = mysqli_real_escape_string( $this->_con,  $trimmed_data['secretcode'] );
            $password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );

        
            //$update_password ="`password`='$password'";
            $password = md5(md5(base64_encode($password)));
            
           // $password=md5(md5(base64_encode($t_data['pass'])));
           // $password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
            
            $t_diff = strtotime(date("Y-m-d H:i:s")) - $_SESSION['mpass_time']; 

               if ($t_diff <= 300) { 
                 if ($secretcode == $_SESSION['code']) { 
                  
            $query = "UPDATE ".users." SET `password`='".$password."' WHERE `email` = '".$email."'";
			$result = mysqli_query($this->_con, $query);             
		    
            if($result) { $msg="You reset the password successfully "; } else { $msg="Error! Please try again ! "; } 
         //exit;
             header('Location: index.php?sts='.$msg.'#popup7');     
                 }
               
               }
      
    }
    }
    
    
    
    
    
    
    
        //password sent to your email
/*                 |
                  \/
             Not in use      
   
    

   	public function forgetpassword( array $data ){
		$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){
			$st = 0;
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
            
            $query = "SELECT password FROM ".users." where email = '$email'";
			$result = mysqli_query($this->_con, $query);
	        list($password) 	= mysqli_fetch_array($result);
       
    		$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if($count >0 ) { 
            
            
            if( $email){
              $st = 1;
             
              //$st = send_mail($email);
              //print_r($st);
              //exit;
              
              $email_to = "jayabal@gmail.com";
              $email_subject = "password reset request";
              $email_from = $email; // required
              $email_message = "Details below.\n\n";
              $email_message .= "Email: ".$email_from." Password : ".$password."\n";
      
       $headers = 'From: '.$email_from."\r\n".
      'Reply-To: '.$email_from."\r\n" .
       'X-Mailer: PHP/' . phpversion();
      //@mail($email_to, $email_subject, $email_message, $headers);  
      //@mail($email, $email_subject, $email_message, $headers);
     
      $msg = "your password sent to your email id: ".$email.", please check email";        
             // exit;
              
              header('Location: index.php?sts='.$msg.'#popup7');
              
              return true;
			}
            }
            else{
				//throw new Exception( LOGIN_FAIL );
                $st = 0;
                $msg = "invalid or wrong email id";
                header('Location: index.php?sts='.$msg.'#popup7');
			}
		} else{
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
	}  */


      public function users_add( array $data ){
	  if( !empty( $data ) ){
        //print_r($data); exit;
        // Trim all the incoming data:
		$trimmed_data = array_map('trim', $data);
			
		// escape variables for security
		$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
		$password_tomail = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
		$name = mysqli_real_escape_string( $this->_con,  $trimmed_data['name'] );
		$phone = mysqli_real_escape_string( $this->_con,  $trimmed_data['phone'] );
		$status = mysqli_real_escape_string( $this->_con,  $trimmed_data['status'] );
        $usertype = mysqli_real_escape_string( $this->_con,  $trimmed_data['usertype'] );
        $trcompany = mysqli_real_escape_string( $this->_con,  $trimmed_data['trcompany'] );			
        $idproof = mysqli_real_escape_string( $this->_con,  $trimmed_data['idproof'] );
        $addressproof = mysqli_real_escape_string( $this->_con,  $trimmed_data['addressproof'] );
        $photo = mysqli_real_escape_string( $this->_con,  $trimmed_data['photo'] );
        $address1 = mysqli_real_escape_string( $this->_con,  $trimmed_data['address1'] );
        $latlong = mysqli_real_escape_string( $this->_con,  $trimmed_data['latlong'] );
        $franchiseename = mysqli_real_escape_string( $this->_con,  $trimmed_data['franchiseename'] );
        $merchantname = mysqli_real_escape_string( $this->_con,  $trimmed_data['merchantname'] );                        
        
        
        
        if($idproof !=0 || $idproof != '') $idproof_query = ", `idproof` = '$idproof' ";

		if(!$email){
		  throw new Exception( EMAIL_FIELD_MISSING );
		}
			
        $query = "SELECT user_id  FROM ".users." where email = '$email'";
		$result = mysqli_query($this->_con, $query);
		$data = mysqli_fetch_assoc($result);
		$count = mysqli_num_rows($result);
			
		if( $count > 0 ){
		  $msg="email already exists, record not added";
		  mysqli_close($this->_con);
		} else {
          $password=md5(md5(base64_encode($password_tomail)));
             
         // exit;    
              $curDate = date("Y-m-d");
              $query = "INSERT INTO ".users." (`email`, `password`, `name`, `phone`, `created`, `status`, `usertype`, `trcompany`, `idproof`, `addressproof`, `photo`, `address1`, `latlong`, `franchiseename`, `merchantname` ) 
              VALUES ('$email','$password','$name','$phone', '$curDate', '$status', '$usertype', '$trcompany', '$idproof', '$addressproof', '$photo', '$address1', '$latlong', '$franchiseename', '$merchantname')";
			  $result = mysqli_query($this->_con, $query);
              
                if( $email){
                  $st = 1;
                  $email_to = $email;
                  $email_subject = "Warm Welcome to $company Team! Your details are just registered with $company online accounts";
                  $email_from = "jayabal@gmail.com"; // $email; // required
                  $email_message = "Details below.\n\n Warm welcome to $company Group! Your details are just registered with $company online accounts through web $company portal.";
                  $email_message .= "Email: ".$email_from."\n"; //." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
                
                  $email_message .= "Your username : ".$email_from."\n"; //." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
                  $email_message .= "Your password : ".$password."\n";
      
                  $headers = 'From: '.$email_from."\r\n".
                  'Reply-To: '.$email_from."\r\n" .
                  'X-Mailer: PHP/' . phpversion();
                  //@mail($email_to, $email_subject, $email_message, $headers);  
                  //@mail("jayabal@gmail.com", $email_subject, $email_message, $headers);
     
                  //$msg = "your password sent to your email id: ".$email.", please check email";        
                  //  exit;
              
                  header('Location: users.php?sts='.$msg);
              
                  return true;
                }

              if($result) { $msg="record added successfully "; } else {$msg="Error ! record not added "; }
            }
          //  exit;
          //header('Location: registered-users.php?sts='.$msg);
          echo '<meta http-equiv="refresh" content="0; URL=users.php?sts='.$msg.'&party='.$party.'&addmore='.$addmore.'" />';
	    } 
	  }
	      
          
      public function user_edit( array $data ){
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
  		    $id = mysqli_real_escape_string( $this->_con,  $trimmed_data['hid_id'] );
            $email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
			$password_tomail = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
			$name = mysqli_real_escape_string( $this->_con,  $trimmed_data['name'] );
			$phone = mysqli_real_escape_string( $this->_con,  $trimmed_data['phone'] );
			$status = mysqli_real_escape_string( $this->_con,  $trimmed_data['status'] );
            $usertype = mysqli_real_escape_string( $this->_con,  $trimmed_data['usertype'] );
            $trcompany = mysqli_real_escape_string( $this->_con,  $trimmed_data['trcompany'] );            

            if($password_tomail){ 
              //$password = md5( $password );
             /* $key = 'jayabal';
              $string = $password; // note the spaces
    
              $iv = mcrypt_create_iv(
                mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
                MCRYPT_DEV_URANDOM
              );
    
              $encrypted = base64_encode(
                $iv .
                mcrypt_encrypt(
                  MCRYPT_RIJNDAEL_128,
                  hash('sha256', $key, true),
                  $string,
                  MCRYPT_MODE_CBC,
                  $iv
                )
              );
              $password = $encrypted;              
             */ 
              
              $update_password ="`password`='$password',";        
            } else { $update_password ="";}
			
            $curDate = date("Y-m-d");
            $query = "UPDATE ".users." SET `email`='$email', $update_password `name`='$name', `phone`='$phone', `modified`= '$curDate', 
            `status`= '$status', `usertype`= '$usertype', `trcompany`='$trcompany'   WHERE user_id='$id'";
			$result = mysqli_query($this->_con, $query);
		    if($result) { $msg="record updated  successfully "; } else {$msg="Error ! record not updated"; }
             //header('Location: registered-users.php?sts='.$msg);
           //exit;
             echo '<meta http-equiv="refresh" content="0; URL=users.php?sts='.$msg.'&party='.$party.'&addmore='.$addmore.'" />';

		} 
	}          
          
          
          
          
          
          public function user_delete( array $data ){
	  if( !empty( $data ) ){
			
	    // Trim all the incoming data:
	    $trimmed_data = array_map('trim', $data);
			
	    // escape variables for security
  	    $id = mysqli_real_escape_string( $this->_con,  $trimmed_data['id'] );
      
        $query = "DELETE FROM ".users." WHERE user_id='$id'";
	    $result = mysqli_query($this->_con, $query);
	    if($result) { $msg="record deleted successfully "; } else {$msg="Error ! record not deleted"; }
        //header('Location: registered-users.php?sts='.$msg);
        echo '<meta http-equiv="refresh" content="0; URL=users.php?sts='.$msg.'&party='.$party.'&addmore='.$addmore.'" />';
	  } 
	}	
    
    
    
    
=======
<?php
/**
 * Developed by tenthfeet.com
 */
class Class_User{
  /**
	 * @var will going contain database connection
  */
  protected $_con;
  /**
  * it will initalize DBclass
  */
  public function __construct(){
    $db = new Class_DBcon();
	$this->_con = $db->con;
  }
	
  public function screening(array $data) {
    function screen($data){
      if (is_array($data)) {
        $data = implode(',', $data);
      }

      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      // $data = addslashes($data);
      $data = nl2br($data);
      return $data;
    }

    $a = $data;
    $t_data = array_map("screen", $a);
    return $t_data;
  }
   
  public function login( array $data ){
	  $_SESSION['logged_in'] = false;
  	    if( !empty( $data ) ){
	      // Trim all the incoming data:
	      $trimmed_data = array_map('trim', $data);
			
	      // escape variables for security
	      $email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
	      $password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
      
          $fy = mysqli_real_escape_string( $this->_con,  $trimmed_data['fy'] );
		
	      if((!$email) || (!$password) ) {
	        throw new Exception( LOGIN_FIELDS_MISSING );
	      }
          $password=md5(md5(base64_encode($password)));
      
          $query = "SELECT user_id, name, email, created, usertype, trcompany FROM ".users." where email = '$email' and password = '$password' and status= 'Active' ";
		  $result = mysqli_query($this->_con, $query);
		  $data = mysqli_fetch_assoc($result);
		  $count = mysqli_num_rows($result);
          if( $count == 1){
            session_start();
            $_SESSION['fy'] = $_POST['fy'];
            $_SESSION = $data;
				
            //	echo 
            $_SESSION['logged_in'] = true;
			
            //echo 
            $_SESSION['user'] = $data['name'];
			
            //echo 
            $_SESSION['email'] = $data['email'];
            
            //echo 
            $_SESSION['fy'] = $_POST['fy'];

            $_SESSION['usertype'] = $data['usertype'];                
                
            $_SESSION['user_id'] = $data['user_id'];
                
            $_SESSION['trcompany'] = $data['trcompany'];
               
            include_once "sv.php";

            $userid =  $_SESSION['user_id'];
            $username =  $_SESSION['user'];
            $usertype =  $_SESSION['usertype'];
            $ipadd =  $_SERVER['REMOTE_ADDR'];
            $email = $_SESSION['email'];
            $logtype = "login";
            $fy = $_POST['fy'];
              
            $curDate = date("Y-m-d");
            $logintime = date("Y-m-d H:i:s");
            $query = "INSERT INTO ".userslog." (`userid`, `username`, `logintime`, `logouttime`, `created`, `ipadd`, `usertype`, `email`, `logtype`, `fy`) 
              VALUES ('$userid','$username','$logintime','$logouttime', '$curDate', '$ipadd', '$usertype','$email','$logtype', '$fy')";
     	    $result = mysqli_query($this->_con, $query);
			
            if($result) { $msg="record added successfully "; } else {$msg="Error ! record not added "; }
              
            if( $email){
              $st = 1;
                           
              $email_to = $email;
              $email_subject = "member logged in to Innovio online accounts web application.";
              $email_from = $email; // required
              $email_message = "Details below.\n\n";
              $email_message .= "$email is logged in to Innovio online accounts web application\n";
              $email_message .= "Email: ".$email_from." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
      
              $headers = 'From: '.$email_from."\r\n".
              'Reply-To: '.$email_from."\r\n" .
              'X-Mailer: PHP/' . phpversion();
              //@mail("jayabal@gmail.com", $email_subject, $email_message, $headers);
              //$msg = "your password sent to your email id: ".$email.", please check email";        
             
              header('Location: index.php?sts='.$msg.'#popup7');
              return true;
			}
                    
            return true;
			} else {
				throw new Exception( LOGIN_FAIL );
			}
		} else {
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
      }
	
      /**
      * This handle sign out process
      */

	  public function logout(){
        $userid =  $_SESSION['user_id'];
        $username =  $_SESSION['user'];
        $usertype =  $_SESSION['usertype'];
        $ipadd =  $_SERVER['REMOTE_ADDR'];
        $email = $_SESSION['email'];
        $logtype = "logout";              

        $curDate = date("Y-m-d");
        $logouttime = date("Y-m-d H:i:s");
              
        if($userid){
          $query = "SELECT MAX(id) as maxid, logouttime as tlogouttime FROM ".userslog." WHERE userid = '$userid'";
		  $result = mysqli_query($this->_con, $query);
		  $data = mysqli_fetch_assoc($result);
		  $maxid = $data[maxid]; $tlogouttime = $data[tlogouttime];              
              
          if($tlogouttime == '0000-00-00 00:00:00'){
            //$query = "UPDATE ".userslog." SET `logouttime`='$logouttime' WHERE id='$maxid'";
			//$result = mysqli_query($this->_con, $query);
          } else {
            //$query = "INSERT INTO ".userslog." (`userid`, `username`, `logintime`, `logouttime`, `created`, `ipadd`, `usertype`, `email`, `logtype`) 
            //  VALUES ('$userid','$username','$logintime','$logouttime', '$curDate', '$ipadd', '$usertype','$email','$logtype')";
			//$result = mysqli_query($this->_con, $query);
          }
        }                            
        session_unset();
		session_destroy();
        header('Location: index.php');
	  }	 

    public function secretcode( array $data ){
	  //$_SESSION['logged_in'] = false;
	  if( !empty( $data ) ){
	    $st = 0;
			
        // Trim all the incoming data:
		$trimmed_data = array_map('trim', $data);
		$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
            
        $query = "SELECT COUNT(user_id) as emailcount FROM ".users." WHERE email = '$email'";
		$result = mysqli_query($this->_con, $query);
	    $row = mysqli_fetch_assoc($result);
            
        if ($row['emailcount'] > 0) {
          function generateRandomString($length = 10): string {
            $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            return substr(str_shuffle(str_repeat($x = $string, ceil($length / strlen($x)))), 1, $length);
          }

          $code = generateRandomString(10);
          $_SESSION['code'] = $code;
          $_SESSION['mpass_time'] = strtotime(date("Y-m-d H:i:s"));
          $_SESSION['email'] = $email;
          
                
                if( $email){
                  $st = 1;
                  $email_to = $email;
                  $email_subject = "Secret Code to reset your $company online account password";
                  $email_from = "jayabal@gmail.com"; // $email; // required
                  $email_message = "Details below.\n\n The Secret Code to reset your password is $code. Please copy this secret code and paste in the Reset Password form";
                  $email_message .= "Email: ".$email_from."\n"; //." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
      
                  $headers = 'From: '.$email_from."\r\n".
                  'Reply-To: '.$email_from."\r\n" .
                  'X-Mailer: PHP/' . phpversion();
                  //@mail($email_to, $email_subject, $email_message, $headers);  
                  //@mail("jayabal@gmail.com", $email_subject, $email_message, $headers);
     
                  //$msg = "your password sent to your email id: ".$email.", please check email";        
                  //  exit;
                  //return true;
                }          
                  
          
          
          // exit; 
          $msg = "Your secret code to reset password is sent to your email id: ".$email.", please check email";        
          header('Location: resetpassword.php?sts='.$msg.$_SESSION['code'].'#popup7');
        } 
        else {
	      $st = 0;
          $msg = "This email id is not yet registered !";
          header('Location: index.php?sts='.$msg.'#popup7');
		}
      }            
    }      
      
      
         public function resetpassword(array $data){
       	   //print_r($data);
           if( !empty( $data ) ){
			$st = 0;
            
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);

            $ipadd =  $_SERVER['REMOTE_ADDR'];
            $email = $_SESSION['email'];
			
             
             //echo $_SESSION['code']; 
            $secretcode = mysqli_real_escape_string( $this->_con,  $trimmed_data['secretcode'] );
            $password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );

        
            //$update_password ="`password`='$password'";
            $password = md5(md5(base64_encode($password)));
            
           // $password=md5(md5(base64_encode($t_data['pass'])));
           // $password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
            
            $t_diff = strtotime(date("Y-m-d H:i:s")) - $_SESSION['mpass_time']; 

               if ($t_diff <= 300) { 
                 if ($secretcode == $_SESSION['code']) { 
                  
            $query = "UPDATE ".users." SET `password`='".$password."' WHERE `email` = '".$email."'";
			$result = mysqli_query($this->_con, $query);             
		    
            if($result) { $msg="You reset the password successfully "; } else { $msg="Error! Please try again ! "; } 
         //exit;
             header('Location: index.php?sts='.$msg.'#popup7');     
                 }
               
               }
      
    }
    }
    
    
    
    
    
    
    
        //password sent to your email
/*                 |
                  \/
             Not in use      
   
    

   	public function forgetpassword( array $data ){
		$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){
			$st = 0;
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
            
            $query = "SELECT password FROM ".users." where email = '$email'";
			$result = mysqli_query($this->_con, $query);
	        list($password) 	= mysqli_fetch_array($result);
       
    		$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if($count >0 ) { 
            
            
            if( $email){
              $st = 1;
             
              //$st = send_mail($email);
              //print_r($st);
              //exit;
              
              $email_to = "jayabal@gmail.com";
              $email_subject = "password reset request";
              $email_from = $email; // required
              $email_message = "Details below.\n\n";
              $email_message .= "Email: ".$email_from." Password : ".$password."\n";
      
       $headers = 'From: '.$email_from."\r\n".
      'Reply-To: '.$email_from."\r\n" .
       'X-Mailer: PHP/' . phpversion();
      //@mail($email_to, $email_subject, $email_message, $headers);  
      //@mail($email, $email_subject, $email_message, $headers);
     
      $msg = "your password sent to your email id: ".$email.", please check email";        
             // exit;
              
              header('Location: index.php?sts='.$msg.'#popup7');
              
              return true;
			}
            }
            else{
				//throw new Exception( LOGIN_FAIL );
                $st = 0;
                $msg = "invalid or wrong email id";
                header('Location: index.php?sts='.$msg.'#popup7');
			}
		} else{
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
	}  */


      public function users_add( array $data ){
	  if( !empty( $data ) ){
        //print_r($data); exit;
        // Trim all the incoming data:
		$trimmed_data = array_map('trim', $data);
			
		// escape variables for security
		$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
		$password_tomail = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
		$name = mysqli_real_escape_string( $this->_con,  $trimmed_data['name'] );
		$phone = mysqli_real_escape_string( $this->_con,  $trimmed_data['phone'] );
		$status = mysqli_real_escape_string( $this->_con,  $trimmed_data['status'] );
        $usertype = mysqli_real_escape_string( $this->_con,  $trimmed_data['usertype'] );
        $trcompany = mysqli_real_escape_string( $this->_con,  $trimmed_data['trcompany'] );			
        $idproof = mysqli_real_escape_string( $this->_con,  $trimmed_data['idproof'] );
        $addressproof = mysqli_real_escape_string( $this->_con,  $trimmed_data['addressproof'] );
        $photo = mysqli_real_escape_string( $this->_con,  $trimmed_data['photo'] );
        $address1 = mysqli_real_escape_string( $this->_con,  $trimmed_data['address1'] );
        $latlong = mysqli_real_escape_string( $this->_con,  $trimmed_data['latlong'] );
        $franchiseename = mysqli_real_escape_string( $this->_con,  $trimmed_data['franchiseename'] );
        $merchantname = mysqli_real_escape_string( $this->_con,  $trimmed_data['merchantname'] );                        
        
        
        
        if($idproof !=0 || $idproof != '') $idproof_query = ", `idproof` = '$idproof' ";

		if(!$email){
		  throw new Exception( EMAIL_FIELD_MISSING );
		}
			
        $query = "SELECT user_id  FROM ".users." where email = '$email'";
		$result = mysqli_query($this->_con, $query);
		$data = mysqli_fetch_assoc($result);
		$count = mysqli_num_rows($result);
			
		if( $count > 0 ){
		  $msg="email already exists, record not added";
		  mysqli_close($this->_con);
		} else {
          $password=md5(md5(base64_encode($password_tomail)));
             
         // exit;    
              $curDate = date("Y-m-d");
              $query = "INSERT INTO ".users." (`email`, `password`, `name`, `phone`, `created`, `status`, `usertype`, `trcompany`, `idproof`, `addressproof`, `photo`, `address1`, `latlong`, `franchiseename`, `merchantname` ) 
              VALUES ('$email','$password','$name','$phone', '$curDate', '$status', '$usertype', '$trcompany', '$idproof', '$addressproof', '$photo', '$address1', '$latlong', '$franchiseename', '$merchantname')";
			  $result = mysqli_query($this->_con, $query);
              
                if( $email){
                  $st = 1;
                  $email_to = $email;
                  $email_subject = "Warm Welcome to $company Team! Your details are just registered with $company online accounts";
                  $email_from = "jayabal@gmail.com"; // $email; // required
                  $email_message = "Details below.\n\n Warm welcome to $company Group! Your details are just registered with $company online accounts through web $company portal.";
                  $email_message .= "Email: ".$email_from."\n"; //." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
                
                  $email_message .= "Your username : ".$email_from."\n"; //." IP : ".$ipadd." DATE and TIME: ".$logintime."\n";
                  $email_message .= "Your password : ".$password."\n";
      
                  $headers = 'From: '.$email_from."\r\n".
                  'Reply-To: '.$email_from."\r\n" .
                  'X-Mailer: PHP/' . phpversion();
                  //@mail($email_to, $email_subject, $email_message, $headers);  
                  //@mail("jayabal@gmail.com", $email_subject, $email_message, $headers);
     
                  //$msg = "your password sent to your email id: ".$email.", please check email";        
                  //  exit;
              
                  header('Location: users.php?sts='.$msg);
              
                  return true;
                }

              if($result) { $msg="record added successfully "; } else {$msg="Error ! record not added "; }
            }
          //  exit;
          //header('Location: registered-users.php?sts='.$msg);
          echo '<meta http-equiv="refresh" content="0; URL=users.php?sts='.$msg.'&party='.$party.'&addmore='.$addmore.'" />';
	    } 
	  }
	      
          
      public function user_edit( array $data ){
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
  		    $id = mysqli_real_escape_string( $this->_con,  $trimmed_data['hid_id'] );
            $email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
			$password_tomail = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
			$name = mysqli_real_escape_string( $this->_con,  $trimmed_data['name'] );
			$phone = mysqli_real_escape_string( $this->_con,  $trimmed_data['phone'] );
			$status = mysqli_real_escape_string( $this->_con,  $trimmed_data['status'] );
            $usertype = mysqli_real_escape_string( $this->_con,  $trimmed_data['usertype'] );
            $trcompany = mysqli_real_escape_string( $this->_con,  $trimmed_data['trcompany'] );            

            if($password_tomail){ 
              //$password = md5( $password );
             /* $key = 'jayabal';
              $string = $password; // note the spaces
    
              $iv = mcrypt_create_iv(
                mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
                MCRYPT_DEV_URANDOM
              );
    
              $encrypted = base64_encode(
                $iv .
                mcrypt_encrypt(
                  MCRYPT_RIJNDAEL_128,
                  hash('sha256', $key, true),
                  $string,
                  MCRYPT_MODE_CBC,
                  $iv
                )
              );
              $password = $encrypted;              
             */ 
              
              $update_password ="`password`='$password',";        
            } else { $update_password ="";}
			
            $curDate = date("Y-m-d");
            $query = "UPDATE ".users." SET `email`='$email', $update_password `name`='$name', `phone`='$phone', `modified`= '$curDate', 
            `status`= '$status', `usertype`= '$usertype', `trcompany`='$trcompany'   WHERE user_id='$id'";
			$result = mysqli_query($this->_con, $query);
		    if($result) { $msg="record updated  successfully "; } else {$msg="Error ! record not updated"; }
             //header('Location: registered-users.php?sts='.$msg);
           //exit;
             echo '<meta http-equiv="refresh" content="0; URL=users.php?sts='.$msg.'&party='.$party.'&addmore='.$addmore.'" />';

		} 
	}          
          
          
          
          
          
          public function user_delete( array $data ){
	  if( !empty( $data ) ){
			
	    // Trim all the incoming data:
	    $trimmed_data = array_map('trim', $data);
			
	    // escape variables for security
  	    $id = mysqli_real_escape_string( $this->_con,  $trimmed_data['id'] );
      
        $query = "DELETE FROM ".users." WHERE user_id='$id'";
	    $result = mysqli_query($this->_con, $query);
	    if($result) { $msg="record deleted successfully "; } else {$msg="Error ! record not deleted"; }
        //header('Location: registered-users.php?sts='.$msg);
        echo '<meta http-equiv="refresh" content="0; URL=users.php?sts='.$msg.'&party='.$party.'&addmore='.$addmore.'" />';
	  } 
	}	
    
    
    
    
>>>>>>> 80ad18a9e8edf8966f3abec631dd834096f06899
}