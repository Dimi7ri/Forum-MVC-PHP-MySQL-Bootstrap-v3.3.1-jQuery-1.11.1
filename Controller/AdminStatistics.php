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
	require '../Views/AdminStatistics.php';
	
/**
 * @author Dimitri Vasiliev
 */		
	
	set_exception_handler('exception_handler');
	
	session_start();

		if($_SESSION['acesslevel']<3)throw new Exception('You are not allowed to perform this action');
		$userHPR = new Posts;
		$userHPR = $userHPR->getHighestPostRate();
		
		$userHCR = new Comments;
		$userHCR = $userHCR->getHighestCommentRate();

		$adminlist = new AdminStatistics;
		$adminlist->adminlist1 = $userHPR;
		$adminlist->adminlist2 = $userHCR;
		$adminlist->render();

	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}		
	