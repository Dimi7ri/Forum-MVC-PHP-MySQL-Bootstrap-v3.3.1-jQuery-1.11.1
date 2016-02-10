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
	require '../Models/Posts.php';
	require '../Models/Comments.php';
	require '../Views/DisplayPostWComments.php';
	require '../Views/UserMessage.php';
	require '../Views/UserError.php';
/**
 * @author Dimitri Vasiliev
 */	
	
	set_exception_handler('exception_handler');
	
	session_start();
	
	if(isset($_POST['NewComm'])) {
			if(!isset($_POST['PostId'])) throw new Exception('No post to comment');
			if(!isset($_POST['CommentData'])) throw new Exception('No comment data');
			$comment = new Comments;
			$comment->createComment($_POST['PostId'], $_SESSION['userid'], $_POST['CommentData']);
	}
		
	if(!isset($_GET['id'])) throw new Exception('There is no $post_id');
	$post = new Posts;
	$comments = new Comments;
	$postinfo = $post->getPostById($_GET['id']);
	$comminfo = $comments->getAllCommentsByPost($_GET['id']);
	if(!$postinfo['deleted'] OR $_SESSION['acesslevel']>=2){
		$v = new DisplayPostWComments;
		$v->postinfo = $postinfo;
		$v->comments = $comminfo;
		$v->render();
	}
	else{
		$mess = new UserError;
		$mess->Message = 'This post does not exist';
		$mess->render();
	}	
	
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}