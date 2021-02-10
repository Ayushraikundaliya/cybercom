<?php

class Database{
	protected $hostname = 'localhost';
	protected $username = 'root';
	protected $password = '';
	protected $dbname = 'blogapp';

	public function __construct()
	{
		$con = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
		$this->conn = $con;
		if(mysqli_connect_errno())
		{
			echo "Connection Failed".mysqli_connect_errno();
		}
	}

	public function insert($prefix,$firstname,$lastname,$mobile,$email,$passwordhash,$lastloginat,$information,$createdat,$updatedat)
	{
		$query = mysqli_query($this->conn,"insert into user(prefix,firstname,lastname,mobile,email,passwordhash,lastloginat,information,createdat,updatedat) values('$prefix','$firstname','$lastname','$mobile','$email','$passwordhash','$lastloginat','$information','$createdat','$updatedat')");
		return $query;
	}

	public function insertcategory($parentcategoryid,$title,$metatitle,$url,$content,$createdat,$updatedat,$image)
	{
		$query1 = mysqli_query($this->conn,"insert into category(parentcategoryid,title,metatitle,url,content,createdat,updatedat,image) values ('$parentcategoryid','$title','$metatitle','$url','$content','$createdat','$updatedat','$image')");
		return $query1;
	} 

	public function displaycategory()
	{
		$query2 = mysqli_query($this->conn,"select * from category");
		return $query2;
	}

	public function insertblog($user_id,$title,$url,$content,$image,$publishedat,$createdat,$updatedat)
	{
		$query3 = mysqli_query($this->conn,"insert into blog_post(user_id,title,url,content,image,createdat,updatedat,publishedat) values ('$user_id','$title','$url','$content','$image','$createdat','$updatedat','$publishedat')");
		return $query3;
	} 

	public function displayblogpost()
	{
		$query4 = mysqli_query($this->conn,"select * from blog_post");
		return $query4;
	}

	public function updatecategory($title,$metatitle,$url,$content,$createdat,$updatedat,$id)
	{
		$query5 = mysqli_query($this->conn,"update category set title='$title',metatitle='$metatitle',url='$url',content='$content',createdat='$createdat',updatedat='$updatedat' where id='$id'");
		return $query5;
	}

	public function updateblogpost($title,$url,$content,$publishedat,$createdat,$updatedat,$image,$id)
	{
		$query6 = mysqli_query($this->conn,"update blog_post set title='$title',url='$url',content='$content',createdat='$createdat',updatedat='$updatedat',publishedat='$publishedat',image='$image' where id='$id'");
		return $query6;
	}

	public function fetchblogpost($id)
	{
		$query7 = mysqli_query($this->conn,"select * from blog_post where id='$id'");
		return $query7;
	}

	public function deleteblogpost($id)
	{
		$query8 = mysqli_query($this->conn,"delete from blog_post where id='$id'");
		return $query8;
	}

	public function deletecategory($id)
	{
		$query9 = mysqli_query($this->conn,"delete from category where id='$id'");
		return $query9;
	}
}

?>