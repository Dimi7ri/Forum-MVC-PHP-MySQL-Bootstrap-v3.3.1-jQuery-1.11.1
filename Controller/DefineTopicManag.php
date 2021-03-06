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
	require '../Views/DefineTopicManag.php';
	require '../Views/UserError.php';
	require '../Views/UserMessage.php';
	
/**
 * @author Dimitri Vasiliev
 */	
 
	set_exception_handler('exception_handler');
 
	session_start();
	
	if(isset($_POST['Update'])){
		$topic = new Topics;
		if(!isset($_POST['name']))throw new Exception('Topic name is required');
		if(!isset($_GET['id'])) throw new Exception('Topic Id is required');	
		$topic->changeTopicName($_GET['id'] , $_POST['name']);
		
		$mess = new UserMessage;
		$mess->Message = 'Topic updated successfully.';
		$mess->render();			
	}
	
		if(!isset($_GET['id'])) throw new Exception('Topic Id is required');
		if($_SESSION['acesslevel']<3)throw new Exception('You are not allowed to perform this action');
		$topic = new Topics;
		$topicinfo = $topic->getTopicById($_GET['id']);
		
		$TopicMan = new DefineTopicManag;
		$TopicMan->topicinfo = $topicinfo;
		$TopicMan->render();		

	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}
	