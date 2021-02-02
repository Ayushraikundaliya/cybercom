function formVal(){
	var name = document.getElementById('name');
	var password = document.getElementById('password');
	var gender = document.userform.gender.value;
	var address = document.getElementById('address');
	var month = document.getElementById('month');
	var day = document.getElementById('day');
	var year = document.getElementById('year');
	var ms = document.userform.ms.value;
	var agree = document.userform.agree.value;
	
	
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
	if(gender == "")
	{
		document.getElementById("spangender").innerHTML="Select Your Gender.";
		return false;
	}
	if(address.value.trim() == "")
	{
		address.style.border = "2px solid red";
		document.getElementById("spanaddress").innerHTML="Enter Your Address";
		return false;
	}
	if(month.selectedIndex == "" || day.selectedIndex == "" || year.selectedIndex == "")
	{
		document.getElementById("spandate").innerHTML="Select your date";
		return false;
	}
	if(month.selectedIndex == "02" && (day.selectedIndex == "29" || day.selectedIndex == "30" || day.selectedIndex == "31"))
	{
		document.getElementById("spandate").innerHTML="February doesn't have 29,30 and 31 days. Reselect your day.";
		return false;
	}
	if(day.selectedIndex == "31" && (month.selectedIndex == "04" || month.selectedIndex == "06" || month.selectedIndex == "09" || month.selectedIndex == "11"))
	{
		document.getElementById("spandate").innerHTML="Month you have selected doesn't have 32 days. Reselect your day.";
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
    if(checked == false)
    {
    	document.getElementById('spangame').innerHTML ="Please Check atleast one game.";
        return false;
    }
	if(ms == "")
	{
		document.getElementById("spanms").innerHTML="Select Your Maritial Status.";
		return false;
	}
	if(agree.checked == false)
	{
		document.getElementById("spanagree").innerHTML="Please Accept The Agreement";
		return false;
	}
	else
	{
		return true;
	}
}