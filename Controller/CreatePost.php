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
	require '../Views/CreatePost.php';
	require '../Models/Topics.php';
/**
 * @author Dimitri Vasiliev
 */		
 
	session_start();

	set_exception_handler('exception_handler');
	
	if(isset($_POST['NewPost'])){
		if(!isset($_POST['topic'])) throw new Exception('You must fill in all of the fields');
		if(!isset($_POST['title'])) throw new Exception('You must fill in all of the fields');
		if(!isset($_POST['PostData'])) throw new Exception('You must fill in all of the fields');
		$post = new Posts;
		$post->createPost($_SESSION['userid'], $_POST['title'], $_POST['PostData'], $_POST['topic']);
		header("location:main");
		exit;
	}


	if(!isset($_SESSION['userid']))throw new Exception('SESSION failed');
	$topics = new Topics;
	$topicslist= $topics->getAllTopics();
	$Create = new CreatePost;
	$Create->topicslist = $topicslist;
	$Create->render();
	
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}		