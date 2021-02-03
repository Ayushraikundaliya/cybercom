function formVal(){
	var fname = document.getElementById('fname');
	var lname = document.getElementById('lname');
	var month = document.getElementById('month');
	var day = document.getElementById('day');
	var year = document.getElementById('year');
	var gender = document.signup.gender.value;
	var country = document.getElementById('country');
	var email = document.getElementById('email');
	var phone = document.getElementById('phone');
	var password = document.getElementById('password');
	var cpassword = document.getElementById('cpassword');
	var agree = document.signup.agree.value;

	if(fname.value.trim()=="")
	{
		fname.style.border = "2px solid red";
		document.getElementById("spanfname").innerHTML="Please Enter your firstname.";
		return false;
	}
	if(!isNaN(fname.value))
	{
		fname.style.border = "2px solid red";
		document.getElementById("spanfname").innerHTML="Only alphabet is allowed.";
		return false;
	}
	if(lname.value.trim()=="")
	{
		lname.style.border = "2px solid red";
		document.getElementById("spanlname").innerHTML="Please Enter your lastname.";
		return false;
	}
	if(!isNaN(lname.value))
	{
		lname.style.border = "2px solid red";
		document.getElementById("spanlname").innerHTML="Only alphabet is allowed.";
		return false;
	}
	if(month.selectedIndex == "" || day.selectedIndex == "" || year.selectedIndex == "")
	{
		document.getElementById("spandate").innerHTML="Select your date";
		return false;
	}
	if(month.selectedIndex == "02" && (day.selectedIndex == "29" || day.selectedIndex == "30" || day.selectedIndex == "31"))
	{
		document.getElementById("spanday").innerHTML="February doesn't have 29,30 and 31 days. Reselect your day.";
		return false;
	}
	if(day.selectedIndex == "31" && (month.selectedIndex == "04" || month.selectedIndex == "06" || month.selectedIndex == "09" || month.selectedIndex == "11"))
	{
		document.getElementById("spanmonth").innerHTML="Month you have selected doesn't have 32 days. Reselect your day.";
		return false;
	}
	if(gender == "")
	{
		document.getElementById("spangender").innerHTML="Select Your Gender.";
		return false;
	}
	if(country.selectedIndex == "")
	{
		document.getElementById("spancountry").innerHTML="Select Your country.";
		return false;
	}

	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(!(email.value.match(mailformat)) || (email.value == ""))
	{
		document.getElementById("spanemail").innerHTML= "Enter your mail";
		return false;
	}

	var phoneno = /^\d{10}$/;
	if(!(phone.value.match(phoneno)))
	{
		document.getElementById("spanphone").innerHTML= "Re-enter your phoneno";
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
	if(password.value != cpassword.value)
	{
		cpassword.style.border="2px solid red";
		document.getElementById("spancpassword").innerHTML="Password doesn't match";
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