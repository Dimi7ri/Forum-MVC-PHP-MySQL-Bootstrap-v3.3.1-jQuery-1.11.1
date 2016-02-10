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
	require '../Models/Countries.php';
	require '../Models/Users.php';
	require '../Views/EditUser.php';
	require '../Views/UserMessage.php';
/**
 * @author Dimitri Vasiliev
 */	
 
	set_exception_handler('exception_handler');
 
	session_start();
	
	if(isset($_POST['EditAccount'])){
		$user = new Users;
		if(!isset($_POST['name']))throw new Exception('You must fill in all of the fields');
		$user->changeName($_SESSION['userid'] , $_POST['name']);
			
		if(!isset($_POST['lastname']))throw new Exception('You must fill in all of the fields');
		$user->changeLastName($_SESSION['userid'] , $_POST['lastname']);
			
		if(!isset($_POST['birthdate']))throw new Exception('You must fill in all of the fields');
		$user->changeBirthDate($_SESSION['userid'] , $_POST['birthdate']);
			
		if(!isset($_POST['country']))throw new Exception('You must fill in all of the fields');
		$user->changeCountryCode($_SESSION['userid'] , $_POST['country']);
		
		$mess = new UserMessage;
		$mess->Message = 'Information updated successfully.';
		$mess->render();			
	}	
	
	if(!isset($_SESSION['userid']))throw new Exception('No message here!');
	$Countries = new Countries;
	$countrylist = $Countries->getCodeAndName();

	$user = new Users;
	$userdata = $user->getUserInfo($_SESSION['userid']);
	
	$Edituser = new EditUser;
	$Edituser->countrylist = $countrylist;
	$Edituser->userdata = $userdata;
	$Edituser->render();
	
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}			