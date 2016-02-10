<?
/*
*   This program is free software: you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation, either version 3 of the License, or
*   (at your option) any later version.
*
*   This program is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*   GNU General Public License for more details.
*
*   You should have received a copy of the GNU General Public License
*   along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * @author Dimitri Vasiliev
 */	
 
class Users{

	private $database;
	
	public function __construct(){
		$this->database = Database::getInstance();
	}
	
	//Checks if user exist
		//by account
	public function checkUserByAcc($account){
		if(!preg_match("/^[a-zA-Z0-9]{4,40}$/",$account))throw new Exception("Length or special char was found1");
		$this->database->query("SELECT user_id, account FROM users WHERE account='".$account."'");
		if($this->database->numRows()){ 
			return true;
		}	
		return false;
	}
		//by user id
	public function checkUserById($user_id){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		$this->database->query("SELECT user_id, account FROM users WHERE user_id=".$user_id);
		if($this->database->numRows()){ 
			return true;
		}	
		return false;
	}
	
	//Checks format and date
	public function verifyDate($date){
		list($year, $month, $day) = explode("-", $date);	
		if (checkdate($month, $day, $year)){
			$this->database->query("SELECT CURDATE()");
			$Wfech = $this->database->fetch();
			$Wnow = $Wfech["CURDATE()"];
			list($year2, $month2, $day2) = explode("-", $Wnow);
			if($year < $year2)return true;
			if($year == $year2)
				if($month <= $month2){
					if($month < $month2)return true ;
					if($day < $day2)return true ;
				}
			return false ;
		}
		return false;	
	}
	
	//checks password
	public function checkUserAndPass($user_id, $password){
		if($this->checkUserById	($user_id)){
			if(strlen($password)<4 and ($password)>40)throw new Exception("Password Length failed");
			$password = $this->database->escape($password);
			$this->database->query("SELECT user_id, account,access_level,blocked FROM users WHERE user_id='".$user_id."' AND password='".$password."' ");
			if(!$this->database->numRows())return false;
			return true;	
		}
	}
	
	//checks country
	public function checkCountry($countrycode){
		if(!ctype_alpha($countrycode) OR !ctype_upper($countrycode))return false;
		if(strlen($countrycode)!=3)return false;
		$this->database->query("SELECT `Code` FROM `country` WHERE Code='".$countrycode."'");
		if(!$this->database->numRows())return false;
		return true;		
	}
	
	//getters for user info by userID and Account
	public function getUserInfo($user_id){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		$this->database->query("SELECT `email`,`account`,`name`,`last_name`,`birth_date`,`country_code` FROM `users` WHERE user_id=".$user_id);
		return $this->database->fetch();
	}
	
	public function getUserInfoByAccount($account){
		if(!$this->checkUserByAcc($account))throw new Exception("User doesn't exist");
		$this->database->query("SELECT `blocked`,`email`,`account`,`name`,`last_name`,`birth_date`,`country_code` FROM `users` WHERE account='".$account."' ");
		return $this->database->fetch();
	}
	
	//Get all users data
	public function getAllUsers(){
		$this->database->query("SELECT `user_id`,`account`,`accesslevels`.`description`,`blocked` FROM `users`
								LEFT JOIN accesslevels
								ON `users`.`access_level` = `accesslevels`.`access_level`;");
		return $this->database->fetchAll();
	}
	
	public function getUserInfoAdmin($user_id){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		$this->database->query("SELECT `users`.`user_id`,`users`.`email`,`users`.`account`,`users`.`name`,
										`users`.`last_name`,`users`.`birth_date`,`country`.`Name`,
										`accesslevels`.`description`,`users`.`blocked` 
								FROM `users`
								LEFT JOIN country
								ON `users`.`country_code` like `country`.`Code`
								LEFT JOIN accesslevels
								ON `users`.`access_level` = `accesslevels`.`access_level`
								WHERE user_id=".$user_id);
		return $this->database->fetch();
	}
	
	//New user creation
	public function createUser($account, $email, $pass, $name, $lastname, $birthdate, $countrycode){
		$pass = $this->database->escape($pass);
		if(strlen($pass)<4 and ($pass)>40)throw new Exception("Length failed");
		if(!preg_match("/^[a-zA-Z0-9' -]{4,40}$/",$name))throw new Exception("Length or special char was found");
		$name = $this->database->escape($name);
		if(!preg_match("/^[a-zA-Z0-9' -]{4,40}$/",$lastname))throw new Exception("Length or special char was found");
		$lastname = $this->database->escape($lastname);
		//if (!filter_var($email, FILTER_VALIDATE_EMAIL))throw new Exception("Invalid E-mail address");
		if(!$this->verifyDate($birthdate))throw new Exception("Invalid birth date");
		if(!$this->checkCountry($countrycode))throw new Exception("Invalid country code");
		$this->database->query("INSERT INTO  `forum`.`users`
		(`email` ,`account` ,`password` ,`name`,`last_name`,`birth_date`,`country_code`)
		VALUES ( '".$email."' ,  '".$account."' ,  '".$pass."' , '".$name."',  '".$lastname."',  '".$birthdate."',  '".$countrycode."' )");
	}
	
	//Login
	public function logInUserPassword($username, $password){
		if($this->checkUserByAcc($username)){
			if(strlen($password)<4 and ($password)>40)throw new Exception("Password Length failed");
			$password = $this->database->escape($password);
			$this->database->query("SELECT user_id, account,access_level,blocked FROM users WHERE account='".$username."' AND password='".$password."' ");
			return $this->database->fetch(); 
		}
	}
	
    //User data modifications
	public function changeAccount($user_id , $account){
		/*At this time, this functionality is unavailable */
	}
		
	public function changeName($user_id , $newname){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		if(!preg_match("/^[a-zA-Z0-9' -]{4,40}$/",$newname))throw new Exception("Length or special char was found");
		$newname = $this->database->escape($newname);
		$this->database->query("UPDATE users SET name = '".$newname."' WHERE user_id=".$user_id);	
	}
	
	public function changeLastName($user_id , $newlast){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		if(!preg_match("/^[a-zA-Z0-9' -]{4,40}$/",$newlast))throw new Exception("Length or special char was found");
		$newlast =$this->database->escape($newlast);
		$this->database->query("UPDATE users SET last_name = '".$newlast."' WHERE user_id=".$user_id);
	}
	
	public function changePassword($user_id , $newpassword){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		$newpassword = $this->database->escape($newpassword);
		if(strlen($newpassword)<4 and ($newpassword)>40)throw new Exception("Length failed");
		$this->database->query("UPDATE users SET password = '".$newpassword."' WHERE user_id=".$user_id);
    }
	
	public function changeBirthDate($user_id , $birthdate ){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		$this->database->query("UPDATE users SET birth_date = '".$birthdate."' WHERE user_id=".$user_id);
	}
	
	public function changeCountryCode($user_id , $countrycode ){
		if(!ctype_alpha($countrycode) OR !ctype_upper($countrycode))throw new Exception("Invalid country code");
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		$this->database->query("UPDATE users SET country_code = '".$countrycode."' WHERE user_id=".$user_id);
	}
	
	public function blockUser($user_id){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		$this->database->query("UPDATE users SET blocked = 1 WHERE user_id=".$user_id);
	}
	
	public function unblockUser($user_id){
		if(!ctype_digit($user_id))throw new Exception("Invalid user id");
		if(!$this->checkUserById($user_id))throw new Exception("User doesn't exist");
		$this->database->query("UPDATE users SET blocked = 0 WHERE user_id=".$user_id);
	}
	
}	