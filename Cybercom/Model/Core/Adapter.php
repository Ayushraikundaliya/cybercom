<?php

namespace Model\Core;

class Adapter {
	protected $db = [
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => 'cybercom'
	];

	protected $connect = Null;

	public function connection() {
		$connect = new \mysqli($this->db['hostname'],$this->db['username'],$this->db['password'],$this->db['dbname']);
		$this->setConnect($connect);
		if(!$this->isConnected()) {
			return false;
		}
		return true;
	}

	public function isConnected() {
		if(!$this->getConnect()) {
			return false;
		}
		return true;
	}

	public function setConnect(\mysqli $connect) {
		$this->connect = $connect;
		return $this;
	}

	public function getConnect() {
		return $this->connect;
	}

	public function insert($query) {
		if (!$this->isConnected()) {
			$this->connection();
		}
		$sql = $this->getConnect()->query($query);
		if (!$sql) {
			return false;
		}
		$this->getConnect()->insert_id;
	}

	public function fetchRow($query) {
		if(!$this->getConnect()) {
			$this->connection();
		}
		$result = $this->getConnect()->query($query);
		if(@mysqli_num_rows($result) == 0){
			return false;
		}
		$row = $result->fetch_assoc();
		return $row;
	}

	public function fetchAll($query) {
		if(!$this->getConnect()) {
			$this->connection();
		}
		$sql = $this->getConnect()->query($query);
		$rows = $sql->fetch_all(MYSQLI_ASSOC);
		if(!$rows) {
			return false;
		}
		return $rows;
	}

	public function fetchPairs($query) {
        if (!$this->isConnected()) 
        {
        $this->connection();
        }
            $result = $this->getConnect()->query($query);
            $rows = $result->fetch_all();
        if (!$rows) 
        {
            return $rows;
        }
        $columns = array_column($rows,'0');
        $values = array_column($rows,'1');
        return array_combine($columns,$values);
    }

	public function update($query) {
		if(!$this->getConnect()) {
			$this->connection();
		}
		$sql = $this->getConnect()->query($query);
		if(!$sql) {
			return false;
		}
		return true;
	}

	public function delete($query) {
		if(!$this->getConnect()) {
			$this->connection();
		}
		$sql = $this->getConnect()->query($query);
		if(!$sql) {
			return false;
		}
		return true;
	}
}

?>