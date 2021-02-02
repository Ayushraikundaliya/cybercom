function formVal(){
	var name = document.getElementById('name');
	var email = document.getElementById('email');
	var subject = document.getElementById('subject');
	var message = document.getElementById('message');

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
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(!(email.value.match(mailformat)) || (email.value == ""))
	{
		document.getElementById("spanemail").innerHTML= "Enter your mail";
		return false;
	}
	if(subject.value.trim()=="")
	{
		subject.style.border="2px solid red";
		document.getElementById('spansubject').innerHTML="Please enter the subject";
		return false;
	}
	if(message.value.trim()=="")
	{
		message.style.border="2px solid red";
		document.getElementById('spanmessage').innerHTML="Please enter your message";
		return false;
	}
}