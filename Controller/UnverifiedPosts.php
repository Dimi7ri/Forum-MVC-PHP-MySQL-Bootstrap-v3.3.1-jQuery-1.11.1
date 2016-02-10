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
	require '../Views/UnverifiedPosts.php';
	require '../Models/Posts.php';
/**
 * @author Dimitri Vasiliev
 */		
	set_exception_handler('exception_handler');
	
	session_start();
	if($_SESSION['acesslevel']<2)throw new Exception('You are not allowed to perform this action');
	$Unverif = new UnverifiedPosts;
	$posts = new Posts;
	$UnverifList = $posts->getNotApproved();
	$Unverif->UnverifList = $UnverifList;
	$Unverif->render();
	
	function exception_handler($exception) {
		echo "Fatal Error: Something went wrong";
	}