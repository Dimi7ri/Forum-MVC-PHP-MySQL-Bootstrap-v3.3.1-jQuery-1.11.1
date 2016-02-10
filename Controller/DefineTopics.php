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
    require '../Models/Topics.php';
	require '../Views/DefineTopics.php';
	require '../Views/UserMessage.php';
/**
 * @author Dimitri Vasiliev
 */		
 
	session_start();

	set_exception_handler('exception_handler');
	

	if(isset($_POST['topic'])){
		if($_SESSION['acesslevel']<3)throw new Exception('You are not allowed to perform this action');
		if(!isset($_POST['topic'])) throw new Exception('You must fill in all of the fields');

		$topic = new Topics;
		$topic->createTopic($_SESSION['userid'], $_POST['topic']);
		
		$mess = new UserMessage;
		$mess->Message = 'Topic created successfully.';
		$mess->render();	
	}
	
	
	$topic = new Topics;
	if($_SESSION['acesslevel']<3)throw new Exception('You are not allowed to perform this action');
	$topicslist = $topic->getAllTopics();
	
	$AdminTopicsList = new DefineTopics;
	$AdminTopicsList->AdminTopicsList = $topicslist;
	$AdminTopicsList->render();	
	
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}		