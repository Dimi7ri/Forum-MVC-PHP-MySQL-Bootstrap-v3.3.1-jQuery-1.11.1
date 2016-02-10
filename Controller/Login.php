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
	require '../Views/Login.php';
	require '../Views/MainPanel.php';
	require '../Views/UserError.php';
/**
 * @author Dimitri Vasiliev
 */	
	
	set_exception_handler('exception_handler');
	
	session_start();
	
	if(isset($_POST['LogAccount'])){
		sleep(2);
		if(!isset($_POST['username']))throw new Exception('Username failed');
		if(!isset($_POST['password']))throw new Exception('Password failed');
			
		$user = new Users;
		$LoginData = $user->logInUserPassword($_POST['username'] , $_POST['password']);
		if(!$LoginData){
			$mess = new UserError;
			$mess->Message = 'Incorrect user or password.';
			$mess->render();
		}
			
		if($LoginData and !$LoginData['blocked']){
			//******************** SESSION VARIABLES CREATION ********************\\
			$_SESSION['userid'] = $LoginData['user_id'];
			$_SESSION['account'] = $LoginData['account'];
			$_SESSION['acesslevel'] = $LoginData['access_level'];
				
			header("location: main");
			exit;
		}
		
		if($LoginData['blocked']){
			$mess = new UserError;
			$mess->Message = 'Your user was blocked by an Admin.';
			$mess->render();
		}
	}
	
	$login = new Login;
	$login->render();
	
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}			