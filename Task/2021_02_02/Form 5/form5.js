function formVal(){
	var email = document.getElementById('email');
	var password = document.getElementById('password');
	
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(!(email.value.match(mailformat)) || (email.value == ""))
	{
		document.getElementById("spanemail").innerHTML= "Enter your mail";
		return false;
	}

	if(password.value.trim()=="")
	{
		password.style.border = "2px solid red";
		document.getElementById("spanpassword").innerHTML="Enter Your Password.";
		return false;
	}
	if(password.value.trim().length<8)
	{
		password.style.border = "2px solid red";
		document.getElementById("spanpassword").innerHTML="Password length is less than 8 re-enter it. ";
		return false;
	}
}