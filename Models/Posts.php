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
 
class Posts{

	private $database;
	
	public function __construct(){
		$this->database = Database::getInstance();
	}

	public function getPostById($id){
		if(!ctype_digit($id))throw new Exception("Invalid Post");
		$this->database->query("SELECT post_id FROM posts WHERE post_id=".$id);
		if(!$this->database->numRows()) throw new Exception("This post doesn't exist");
		$this->database->query("SELECT `posts`.`post_id`,`topics`.`topic_id`,`posts`.`title`,`users`.`account`,`posts`.`post_date`,`posts`.`content`,`posts`.`deleted` , `topics`.`name`,`posts`.`approved_by`
								FROM `posts`
								LEFT JOIN `topics`
								ON `topics`.`topic_id` = `posts`.`topic_id`
								LEFT JOIN `users`
								ON `users`.`user_id` = `posts`.`user_id`
								WHERE post_id=".$id);
		return $this->database->fetch();
	}
	
	public function createPost($user_id , $title , $info, $topic){
		if(!ctype_digit($user_id))throw new Exception;
		if(!ctype_digit($topic))throw new Exception;
		$title = $this->database->escape($title);
		$info = $this->database->escape($info);
		if(strlen($title)<=3 and ($title)>90)throw new Exception("Length failed");
		$title = htmlEntities($title);
		if(strlen($info)<=3 and ($info)>300)throw new Exception("Length failed");
		$info = htmlEntities($info);
		$this->database->query("INSERT INTO  `forum`.`posts`
								(`user_id` ,`title`, `post_date` ,`content` ,`topic_id`)
								VALUES (  '".$user_id."',  '".$title."', now(), '".$info."' , '".$topic."' )");
		
	}
	
	public function changeTopic($post_id , $topic_id){
		if(!ctype_digit($post_id))throw new Exception;
		if(!ctype_digit($topic_id))throw new Exception;
		$this->database->query("UPDATE posts SET topic_id = '".$topic_id."' WHERE post_id=".$post_id);	
	}
	
	public function changeTitle($post_id , $title){
		if(!ctype_digit($post_id))throw new Exception;
		if(strlen($title)<=3 and ($title)>90)throw new Exception("Length failed");
		$title = $this->database->escape($title);
		$title = htmlEntities($title);
		$this->database->query("UPDATE posts SET title = '".$title."' WHERE post_id=".$post_id);	
	}
	
	public function changeBody($post_id , $info){
		if(!ctype_digit($post_id))throw new Exception;
		if(strlen($info)<=3 and ($info)>300)throw new Exception("Length failed");
		$info = $this->database->escape($info);
		$info = htmlEntities($info);
		$this->database->query("UPDATE posts SET content = '".$info."' WHERE post_id=".$post_id);
	}
	
	public function getLastTen(){
		$this->database->query("SELECT  `post_id` ,  `account` ,  `title` ,  `post_date` , `posts`.`deleted` , `topics`.`name`
								FROM posts
								LEFT JOIN `topics`
								ON `topics`.`topic_id` = `posts`.`topic_id`
								LEFT JOIN users
								ON `posts`.`user_id` = `users`.`user_id`
								WHERE  `posts`.`deleted` = 0
								ORDER BY  `post_id` DESC 
								LIMIT 10 ;");
		return $this->database->fetchAll();
	}

	public function getNotApproved(){
		$this->database->query("SELECT  `post_id` ,  `account` ,  `title` ,  `post_date` , `posts`.`deleted` , `topics`.`name`
								FROM posts
								LEFT JOIN `topics`
								ON `topics`.`topic_id` = `posts`.`topic_id`
								LEFT JOIN users
								ON `posts`.`user_id` = `users`.`user_id`
								WHERE  `posts`.`deleted` = 0 AND
								`posts`.`approved_by` IS NULL
								ORDER BY  `post_id` DESC ;");
		return $this->database->fetchAll();
	}
		
	
	public function getHighestPostRate(){
		$this->database->query("SELECT count(*) as quant , `users`.`account` FROM posts
								LEFT JOIN users
								ON `users`.`user_id` = `posts`.`user_id`
								WHERE  `posts`.`deleted` = 0
								GROUP BY `users`.`account`
								ORDER BY quant DESC
								LIMIT 1;");
		return $this->database->fetch();
	}
	
		public function getDeletedPosts(){
		$this->database->query("SELECT  `post_id` ,  `account` ,  `title` ,  `post_date` , `posts`.`deleted`
								FROM posts
								LEFT JOIN users
								ON `posts`.`user_id` = `users`.`user_id`
								WHERE  `posts`.`deleted` = 1
								ORDER BY  `post_id` DESC ;");
		return $this->database->fetchAll();
	}
	
	public function deletePost($post_id){
		if(!ctype_digit($post_id))throw new Exception;
		$this->database->query("UPDATE posts SET deleted = 1 WHERE post_id=".$post_id);	
	}
	
	public function recoverPost($post_id){
		if(!ctype_digit($post_id))throw new Exception;
		$this->database->query("UPDATE posts SET deleted = 0 WHERE post_id=".$post_id);	
	}
	
	public function ApprovePost($user_id , $post_id){
		if(!ctype_digit($user_id))throw new Exception;
		if(!ctype_digit($post_id))throw new Exception;
		$this->database->query("UPDATE posts SET `approved_by`= '".$user_id."' WHERE post_id=".$post_id);	
		
	}
}	