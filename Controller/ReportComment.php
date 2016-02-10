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
	require '../Models/Comments.php';
	require '../Views/ReportComment.php';
	require '../Views/UserError.php';
	require '../Views/UserMessage.php';
	
/**
 * @author Dimitri Vasiliev
 */	
 	
	set_exception_handler('exception_handler');
	
	session_start();
	
	if(isset($_POST['Delete'])){
			if(!isset($_GET['id'])) throw new Exception('Comment id is required');
			if(!isset($_POST['PostId'])) throw new Exception('Approval failed, wrong post id');
			if($_SESSION['acesslevel']<2)throw new Exception('You are not allowed to perform this action');
			$comment = new Comments;
			
			if($comment->checkDeletedComment($_GET['id'])){
				$mess = new UserError;
				$mess->Message = 'You´ve already deleted this comment.';
				$mess->render();
			}
			else{
				$comment->deleteComment($_GET['id']);
				$mess = new UserMessage;
				$mess->Message = 'Comment deleted successfully.';
				$mess->render();
				echo '<meta http-equiv=REFRESH CONTENT=3;url=http://127.0.0.1:4001/Project/seepost='.$_POST['PostId'].'>';
			}				
	}	
	
	if(isset($_POST['Report'])){
			if(!isset($_GET['id'])) throw new Exception('Comment id is required');
			if(!$_SESSION['acesslevel'])throw new Exception('You are not allowed to perform this action');
			$Comment = new Comments;
				
			if($Comment->CheckReportedComment($_GET['id'],$_SESSION['userid'])){
				$mess = new UserError;
				$mess->Message = 'You´ve already reported this comment.';
				$mess->render();
			}
			else{
				$Comment->ReportComment($_GET['id'],$_SESSION['userid']);
				$mess = new UserMessage;
				$mess->Message = 'Comment reported successfully.';
				$mess->render();
				echo '<meta http-equiv=REFRESH CONTENT=3;url=http://127.0.0.1:4001/Project/seepost='.$_POST['PostId'].'>';
			}

	}

		if(!isset($_GET['id'])) throw new Exception('Comment id is required');
		if(!$_SESSION['account'])throw new Exception('You are not allowed to perform this action');
		$Comment = new Comments;
		$commentinfo = $Comment->getCommentByID($_GET['id']);

		$RepComment = new ReportComment;
		$RepComment->commentinfo = $commentinfo;
		$RepComment->render();		

	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}	