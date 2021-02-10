function InvalidFirstName(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Enter Your First Name');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}

function InvalidLastName(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Enter Your Last Name');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}

function InvalidEmail(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Enter Your Email-id');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}

function InvalidMobile(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Enter Your Mobile Number');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}

function InvalidPasswordhash(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Enter Your Password');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}

function InvalidcPasswordhash(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Enter Your Confirm Password');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}

function InvalidInformation(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Enter Your Information');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}

function InvalidAgree(textbox)
{
	if(textbox.value == '')
	{
		textbox.setCustomValidity('Please Accept the Terms & Conditions');
	}
	else
	{
		textbox.setCustomValidity('');
	}
}