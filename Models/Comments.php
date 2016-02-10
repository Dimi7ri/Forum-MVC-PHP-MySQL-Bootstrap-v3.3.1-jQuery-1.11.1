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
 
class Comments{

	private $database;
	
	public function __construct(){
		$this->database = Database::getInstance();
	}
	
	public function getAllCommentsByPost($post_id){
	    if(!ctype_digit($post_id))throw new Exception('Invalid post id');
		$this->database->query("SELECT comments.comment_id, comments.comment, comments.comment_date, users.account
								FROM comments
								LEFT JOIN users ON users.user_id = comments.user_id
								WHERE comments.deleted = 0 AND post_id =".$post_id);
		return $this->database->fetchALL();
	}
	
	public function createComment($post_id, $user_id, $comment){
		if(!ctype_digit($post_id))throw new Exception('Invalid post id');
		if(!ctype_digit($user_id))throw new Exception('Invalid user id');
		if(strlen($comment)<2 or ($comment)>900)throw new Exception("Length failed");
		$this->database->query("SELECT post_id FROM posts WHERE post_id=".$post_id);
		if(!$this->database->numRows())throw new Exception('Post now found');
		$this->database->query("SELECT user_id FROM users WHERE user_id=".$user_id);
		if(!$this->database->numRows())throw new Exception('user not found') ;
		$comment = $this->database->escape($comment);
		$comment = htmlEntities($comment);
		$this->database->query("INSERT INTO  `forum`.`comments`
								(`post_id` ,`user_id` ,`comment` ,`comment_date`)
								VALUES (  '".$post_id."',  '".$user_id."',  '".$comment."' , now() )");
	}
		
	public function getHighestCommentRate(){
		$this->database->query("SELECT count(*) as quant, `users`.`account` FROM `comments`
								LEFT JOIN users
								ON `comments`.`user_id` = `users`.`user_id`
								LEFT JOIN posts 
								ON  `posts`.`post_id` = `comments`.`post_id` 
								WHERE  `posts`.`deleted` =0
								GROUP BY `users`.`account`
								ORDER BY quant DESC
								LIMIT 1;");
		return $this->database->fetch();
	}
	
	public function getCommentByID($comment_id){
	    if(!ctype_digit($comment_id))throw new Exception('Invalid comment id');
		$this->database->query("SELECT comments.comment_id, posts.post_id, posts.title, comments.comment, comments.comment_date, users.account
								FROM comments
								LEFT JOIN users ON users.user_id = comments.user_id
								LEFT JOIN posts ON posts.post_id=comments.`post_id`
								WHERE comment_id =".$comment_id);
		return $this->database->fetch();	
	}
	
	public function checkReportedComment($comment_id, $user_id){
		if(!ctype_digit($comment_id))throw new Exception('Invalid post id');
		if(!ctype_digit($user_id))throw new Exception('Invalid user id');
		$this->database->query("SELECT comment_id FROM comments WHERE comment_id=".$comment_id);
		if(!$this->database->numRows())throw new Exception('Comment not existent');
		$this->database->query("SELECT user_id FROM users WHERE user_id=".$user_id);
		if(!$this->database->numRows())throw new Exception('User not found') ;
		$this->database->query("SELECT * FROM `reported_comments` WHERE `comment_id` ='".$comment_id."' AND `user_id` =".$user_id);
		return $this->database->fetch();	
	}
	
	public function checkDeletedComment($comment_id){
		if(!ctype_digit($comment_id))throw new Exception('Invalid post id');
		$this->database->query("SELECT comment_id FROM comments WHERE comment_id=".$comment_id);
		if(!$this->database->numRows())throw new Exception('Comment not existent');
		$this->database->query("SELECT * FROM `comments` WHERE deleted = 1 AND `comment_id` =".$comment_id);
		return $this->database->fetch();	
	}	
	public function reportComment($comment_id, $user_id){
		if(!ctype_digit($comment_id))throw new Exception('Invalid post id');
		if(!ctype_digit($user_id))throw new Exception('Invalid user id');
		$this->database->query("SELECT comment_id FROM comments WHERE comment_id=".$comment_id);
		if(!$this->database->numRows())throw new Exception('Comment not existent');
		$this->database->query("SELECT user_id FROM users WHERE user_id=".$user_id);
		if(!$this->database->numRows())throw new Exception('User not found') ;
		$this->database->query("INSERT INTO  `forum`.`reported_comments` ( `comment_id` ,`user_id`)VALUES ('".$comment_id."','".$user_id."')");
	}
	
		public function getReportedComments(){
		$this->database->query("SELECT posts.title, comments.comment, users.account, comments.comment_date, posts.post_id, comments.user_id, reported_comments.`comment_id`, count(reported_comments.`comment_id`)as times_reported
								FROM `reported_comments`
								LEFT JOIN comments
								ON comments.`comment_id` = reported_comments.`comment_id`
								LEFT JOIN posts
								ON comments.`post_id` = posts.post_id
								LEFT JOIN users
								ON comments.user_id = users.user_id
								WHERE comments.deleted = 0
								GROUP BY `comment_id` 
								ORDER BY times_reported DESC");
		return $this->database->fetchALL();
		}	
		public function deleteComment($comment_id){
			if(!ctype_digit($comment_id))throw new Exception('Invalid comment id');
			$this->database->query("SELECT comment_id FROM comments WHERE comment_id=".$comment_id);
			if(!$this->database->numRows())throw new Exception('Comment not existent');
			$this->database->query("UPDATE comments SET deleted = 1 WHERE comment_id=".$comment_id);	
		}
		
}