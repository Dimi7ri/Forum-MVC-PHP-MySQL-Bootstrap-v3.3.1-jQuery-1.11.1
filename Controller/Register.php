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
	require '../fw/fw.php';
	require '../Models/Users.php';
	require '../Models/Countries.php';
	require '../Views/CreateUser.php';
	require '../Views/UserError.php';
	require '../Views/UserMessage.php';
	
/**
 * @author Dimitri Vasiliev
 */	
 
	set_exception_handler('exception_handler');
	
	if(isset($_POST['NewAccount'])){
			if(!isset($_POST['name'])) throw new Exception('Unfilled field name');
			if(!isset($_POST['lastname'])) throw new Exception('Unfilled field lastname');
			if(!isset($_POST['login'])) throw new Exception('Unfilled field login');
			if(!isset($_POST['email'])) throw new Exception('Unfilled field email');
			if(!isset($_POST['password1'])) throw new Exception('Unfilled field password1');
			if(!isset($_POST['birthdate'])) throw new Exception('Unfilled field birthdate');
			if(!isset($_POST['country'])) throw new Exception('Unfilled field country');
			$user = new Users;
			
			if(!$user->checkUserByAcc($_POST['login'])){
				($user->createUser($_POST['login'],$_POST['email'],$_POST['password1'], $_POST['name'], $_POST['lastname'], $_POST['birthdate'],$_POST['country']));
				 header("location:login");
				 exit;
			}			
			else{
				$mess = new UserError;
				$mess->Message = 'User Already exists';
				$mess->render();
				
				$userdata = array("email"=> $_POST['email'], "name"=> $_POST['name'], "lastname"=> $_POST['lastname'], "birthdate"=> $_POST['birthdate'],"country"=> $_POST['country']);
				$Countries = new Countries;
				$countrylist = $Countries->getCodeAndName();
				$Create = new CreateUser;
				$Create->userdata = $userdata;
				$Create->countrylist = $countrylist;
				$Create->render();
				die();
			}	
		   
	}
		
	$Countries = new Countries;
	$countrylist = $Countries->getCodeAndName();
	$Create = new CreateUser;
	$Create->countrylist = $countrylist;
	$Create->render();
	
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}