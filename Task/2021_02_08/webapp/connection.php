<?php

class Database{
	protected $hostname = 'localhost';
	protected $username = 'root';
	protected $password = '';
	protected $dbname = 'webapp';

	public function __construct()
	{
		$con = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
		$this->conn = $con;
		if(mysqli_connect_errno())
		{
			echo "Connection Failed".mysqli_connect_errno();
		}
	}

	public function insert($name,$email,$phone,$title,$created)
	{
		$query = mysqli_query($this->conn,"insert into contact(name,email,phone,title,created) values('$name','$email','$phone','$title','$created')");
		return $query;
	}

	public function display()
	{
		$query1 = mysqli_query($this->conn,"select * from contact");
		return $query1;
	}

	public function update($name,$email,$phone,$title,$created,$id)
	{
		$query2 = mysqli_query($this->conn,"update contact set name='$name',email='$email',phone='$phone',title='$title',created='$created' where id='$id'");
		return $query2;
	}

	public function fetch($id)
	{
		$query3 = mysqli_query($this->conn,"select * from contact where id='$id'");
		return $query3;
	}

	public function delete($id)
	{
		$query4 = mysqli_query($this->conn,"delete from contact where id='$id'");
		return $query4;
	}
}

?>