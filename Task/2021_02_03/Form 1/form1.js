function formVal(){
	var name = document.getElementById('name');
	var password = document.getElementById('password');
	var address = document.getElementById('address');
	var gender = document.userform.gender.value;
	var age = document.getElementById('age');
	var file = document.getElementById('file'); 
	

	if(name.value.trim()=="")
	{
		name.style.border = "2px solid red";
		document.getElementById("spanname").innerHTML="Please Enter your name.";
		return false;
	}
	if(!isNaN(name.value))
	{
		name.style.border = "2px solid red";
		document.getElementById("spanname").innerHTML="Only alphabet is allowed.";
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
	if(address.value.trim() == "")
	{
		address.style.border = "2px solid red";
		document.getElementById("spanaddress").innerHTML="Enter Your Address";
		return false;
	}
	var game = [];
    var check = document.getElementsByName("game[]");
    var checked=false;
    for(var i=0; i < check.length; i++) {
        if(check[i].checked) {
            game.push(check[i].value);
            checked=true;
        }
    }
        if(checked == false){
    	document.getElementById('spangame').innerHTML ="Please Check atleast one game.";
        return false;
    }

	if(gender == "")
	{
		document.getElementById("spangender").innerHTML="Select Your Gender.";
		return false;
	}
	if(age.selectedIndex == "")
	{
		document.getElementById("spanage").innerHTML="Select Your Age.";
		return false;
	}
	if(file.value == "")
	{
		document.getElementById("spanfile").innerHTML="Select a file";
		return false;
	}
	else
	{
		return true;
	}

}