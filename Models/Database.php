<?php
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
 * @author Mauro Gullino
 */	
 
	class Database {
		private static $instance=false;
		
		private $res;
		private $cn;
		
		public static function getInstance(){
			if(!self::$instance) self::$instance = new Database;
			return self::$instance;
		}
		
		private function __construct(){}
			
		public function query($q){
			if(!$this->cn) $this->connect();
			$this->res = mysql_query($q);
			if(mysql_error()!="") throw new DataBaseException("Result Not Found");
	    }
		
		public function fetch(){
			return mysql_fetch_assoc($this->res);
		}
		
		private function connect(){
			$this->cn = mysql_connect ("localhost","root","");
			mysql_select_db("forum", $this->cn);
		}
		
		public function fetchALL(){
			$aux=array();
			while($row=$this->fetch()){
				$aux[] = $row;
			}
			return $aux;
		}
		
		public function numRows(){
			return mysql_num_rows($this->res);
		}
		
		public function escape($s){
			if(!$this->cn) $this->connect();
			return mysql_real_escape_string($s);	
		}
		
	}

class DataBaseException extends Exception{}