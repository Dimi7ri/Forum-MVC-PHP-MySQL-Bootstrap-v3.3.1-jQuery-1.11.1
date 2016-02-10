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
 
class Topics{

	private $database;
	
	public function __construct(){
		$this->database = Database::getInstance();
	}
	
		public function getAllTopics(){
		$this->database->query("SELECT topics.topic_id,topics.name , users.account FROM `topics`
									LEFT JOIN users ON topics.user_id = users.user_id;");
		return $this->database->fetchAll();		
	}
	
	public function createTopic($user_id , $topic){
		if(!ctype_digit($user_id))throw new Exception;
		$topic = $this->database->escape($topic);
		if(strlen($topic)<=3 and ($topic)>90)throw new Exception("Length failed");
		$topic = htmlEntities($topic);
		$this->database->query("INSERT INTO  `forum`.`Topics`
							  (`user_id`, `name`) VALUES (  '".$user_id."', '".$topic."')");
	}

	public function checkTopicById($topic_id){
		$this->database->query("SELECT `topic_id`, `name`, `user_id` FROM Topics WHERE topic_id=".$topic_id);
		if($this->database->numRows()){ 
			return true;
		}	
		return false;
	}	
	
	public function getTopicById($topic_id){
		if(!ctype_digit($topic_id))throw new Exception("Invalid Topic id");
		if(!$this->checkTopicById($topic_id))throw new Exception("This topic doesn't exist");
		$this->database->query("SELECT topics.topic_id , topics.name , users.account FROM Topics LEFT JOIN users ON topics.user_id = users.user_id WHERE topics.topic_id=".$topic_id);
		return $this->database->fetch();
	}

	public function changeTopicName($topic_id , $newname){
		if(!ctype_digit($topic_id))throw new Exception("Invalid user id");
		$newname = $this->database->escape($newname);
		$this->database->query("UPDATE topics SET name = '".$newname."' WHERE topic_id=".$topic_id);	
	}	
}