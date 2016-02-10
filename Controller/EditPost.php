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
	require '../Models/Posts.php';
	require '../Views/EditPost.php';
	require '../Views/UserMessage.php';
	require '../Views/UserError.php';
/**
 * @author Dimitri Vasiliev
 */	

	//set_exception_handler('exception_handler');
	
	session_start();
	
	if(isset($_POST['Approve'])) {
		if(!isset($_POST['PostId'])) throw new Exception('Approval failed, wrong post id');
		$post = new Posts;
		$postinfo = $post->getPostById($_POST['PostId']);
		if((!isset($postinfo)))throw new Exception('You cannot edit this post,');
		$post->ApprovePost($_SESSION['userid'] , $_POST['PostId']);
			
		$mess = new UserMessage;
		$mess->Message = 'Post approved successfully';
		$mess->render();	
	}
	
	if(isset($_POST['Delete'])) {
		if(!isset($_POST['PostId'])) throw new Exception('Delete failed, wrong post id');
		$post = new Posts;
		$postinfo = $post->getPostById($_POST['PostId']);
		if(($postinfo["account"] != $_SESSION['account']) AND ($_SESSION['acesslevel'])<2)throw new Exception('You cannot edit this post,');
		$post->deletePost($_POST['PostId']);
			
		$mess = new UserMessage;
		$mess->Message = 'Post deleted successfully';
		$mess->render();	
	}
	
	if(isset($_POST['Recover'])) {
		if(!isset($_POST['PostId'])) throw new Exception('Recover failed, wrong post id');
		$post = new Posts;
		$postinfo = $post->getPostById($_POST['PostId']);
		if(($postinfo["account"] != $_SESSION['account']) AND ($_SESSION['acesslevel'])<2)throw new Exception('You cannot edit this post,');
		$post->recoverPost($_POST['PostId']);
		
		$mess = new UserMessage;
		$mess->Message = 'Post recovered successfully';
		$mess->render();	
	}
	
	if(isset($_POST['EditPost'])) {
		if(!isset($_POST['PostId'])) throw new Exception('Edit failed, wrong post id');
		if(!isset($_POST['topic_id'])) throw new Exception('Edit failed, topic id was not filled');
		if(!isset($_POST['title'])) throw new Exception('You must fill in all of the fields');
		if(!isset($_POST['PostData'])) throw new Exception('You must fill in all of the fields');
			
		$post = new Posts;
		$postinfo = $post->getPostById($_POST['PostId']);
		if($postinfo['deleted']){
			$mess = new UserError;
			$mess->Message = 'You cannot edit this post because it was deleted';
			$mess->render();
		}
		else {
		if(($postinfo["account"] != $_SESSION['account']) AND ($_SESSION['acesslevel'])<2)throw new Exception('You cannot edit this post,');
		$post->changeTopic($_POST['PostId'] , $_POST['topic_id']);
		$post->changeTitle($_POST['PostId'] , $_POST['title']);
		$post->changeBody($_POST['PostId'] , $_POST['PostData']);
			
		$mess = new UserMessage;
		$mess->Message = 'Post edited successfully.';
		$mess->render();
		}
	}
			
	if(!isset($_GET['id'])) throw new Exception('There is no $post_id');
	$post = new Posts;
	$postinfo = $post->getPostById($_GET['id']);

	$topics = new Topics;
	$topicslist= $topics->getAllTopics();

	
	$EditPost = new EditPost;
	$EditPost->postinfo = $postinfo;
	$EditPost->topicslist = $topicslist;
	$EditPost->render();	

/*	function exception_handler($exception){
		echo "Fatal Error: Something went wrong";
	}	
*/