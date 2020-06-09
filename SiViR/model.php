<?php

class Model{

	protected $conn;

	function __construct() {
	    $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	}

	function get_connection(){
		return $this->conn;
	}

	function emptyTable(){
		$sql = 'delete from results';
		$stmt = $this->get_connection()->prepare($sql);
		$stmt->execute();
		$stmt->close();
	}

	function insertRow($title,$link,$source){
		$stmt = $this->get_connection()->prepare("INSERT INTO results (LINK,TITLE,SOURCE) VALUES(?,?,?)");
		$stmt->bind_param("sss", $link,$title,$source);
		$stmt->execute();
		$stmt->close();
	}

	function query($query){	
		$stmt = $this->get_connection()->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		return $result;
	}
}
?>