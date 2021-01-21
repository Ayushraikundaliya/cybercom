var mail = document.getElementById('mail');
var pwd = document.getElementById('pwd');


function register(){
		localStorage.setItem('mail',mail.value);
		localStorage.setItem('pwd',pwd.value);
		var admin = [];
		admin.push(mail.value);
		localStorage.setItem('admins',JSON.stringify(admin));
		var adminpass = [];
		adminpass.push(pwd.value);
		localStorage.setItem('adminpassword',JSON.stringify(adminpass));
		login();
	}

function login(){
		window.location.href = "Login.html";
		var email1 = localStorage.getItem('mail');
		var password1 = localStorage.getItem('pwd');

		var email2 = document.getElementById('email2');
		var password2 = document.getElementById('password2');

		if(email2.value == email1 || password2.value == password1)
		{
			alert('Successful');
		}
		else{
			alert('Error');
		}
}

function registerNow(){
			window.location.href = "Registration.html";
		}