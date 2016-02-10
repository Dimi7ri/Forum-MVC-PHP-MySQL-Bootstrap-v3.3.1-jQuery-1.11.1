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
	require '../Views/ChangePassword.php';
	require '../Views/UserMessage.php';
	require '../Views/UserError.php';
/**
 * @author Dimitri Vasiliev
 */		

	set_exception_handler('exception_handler');
 
	session_start();
	
	if(isset($_POST['ChangePass'])){
		
			$user = new Users;
		
			if(!isset($_POST['curpass'])) throw new Exception('You must fill in all of the fields');
			if(!isset($_POST['newpass'])) throw new Exception('You must fill in all of the fields');			
			if(!$user->checkUserAndPass($_SESSION['userid'], $_POST['curpass'])){
				$mess = new UserError;
				$mess->Message = 'Wrong current password typed. Please fill out all fields again.';
				$mess->render();
			}
			else{
				$user->changePassword($_SESSION['userid'] , $_POST['newpass']);
				$mess = new UserMessage;
				$mess->Message = 'Password changed successfully';
				$mess->render();
			}
	}		
	if(!isset($_SESSION['userid']))throw new Exception('No message here!');
	$changepass = new ChangePassword;
	$changepass->render();	
			
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}				