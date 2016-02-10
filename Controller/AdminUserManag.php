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
	require '../Views/AdminUsersList.php';
	require '../Views/AdminUserManag.php';
	require '../Views/UserError.php';
	require '../Views/UserMessage.php';
	
/**
 * @author Dimitri Vasiliev - 2013
 */	
 	
	set_exception_handler('exception_handler');
	
	session_start();
	
	if(isset($_POST['BlockUser'])){
			if(!isset($_GET['id'])) throw new Exception('User id is required');
			if($_SESSION['acesslevel']<3)throw new Exception('You are not allowed to perform this action');
			$user = new Users;
			if($_GET['id'] != $_SESSION['userid']){
				$user->blockUser($_GET['id']);
		
				$mess = new UserMessage;
				$mess->Message = 'User blocked successfully.';
				$mess->render();
			}
			else{
				$mess = new UserError;
				$mess->Message = 'Unable to block yourself.';
				$mess->render();
			}			
	}	
	
	if(isset($_POST['UnBlockUser'])){
			if(!isset($_GET['id'])) throw new Exception('User id is required');
			if($_SESSION['acesslevel']<3)throw new Exception('You are not allowed to perform this action');
			$user = new Users;
			if($_GET['id'] != $_SESSION['userid']){
				$user->unblockUser($_GET['id']);
		
				$mess = new UserMessage;
				$mess->Message = 'User Unblocked.';
				$mess->render();
			}
			else{
				$mess = new UserError;
				$mess->Message = 'Unable to unblock yourself.';
				$mess->render();
			}
	}

		if(!isset($_GET['id'])) throw new Exception('User id is required');
		if($_SESSION['acesslevel']<3)throw new Exception('You are not allowed to perform this action');
		$user = new Users;
		$userinfo = $user->getUserInfoAdmin($_GET['id']);

		$AdminMan = new AdminUserManag;
		$AdminMan->userinfo = $userinfo;
		$AdminMan->render();		

	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}		
	