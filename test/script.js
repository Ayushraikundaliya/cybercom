var array = [{
	useremail : "ayushrk09@gmail.com",
	userpassword : "abc"
}];

function register(){
		
		var mail = document.getElementById("mail").value
		var pwd = document.getElementById("pwd").value

		var regnew = {
			useremail : mail,
			userpassword : pwd
		};

		if(localStorage.getItem('array'))
		{
			array = JSON.parse(localStorage.getItem('array'));
		}

		array.push(regnew);
		console.log(array);
	 	localStorage.setItem("array", JSON.stringify(array));

		
		window.location.href = "Login.html";
		
	}

function login(){
		var useremail = document.getElementById("useremail").value
		var userpassword = document.getElementById("userpassword").value

		for(i = 0;i<array.length;i++)
		{
			console.log(array.length);
			if(useremail == array[i].useremail || userpassword == array[i].userpassword)
			{
				window.location.href = "Dashboard.html"
				var x = document.getElementById("useremail").value;
				document.getElementById("user").innerHTML = x;
			}
		}
}

function registerNow(){
			window.location.href = "Registration.html";
		}


var arr = [];
function adduser()
{
	var uname = document.getElementById('name').value;
	var uemail = document.getElementById('email').value;
	var upwd = document.getElementById('password').value;
	var ubdate = document.getElementById('birth').value;
	var users = [{
		name : uname,
		email : uemail,
		password : upwd,
		birth : ubdate
	}]

	if(localStorage.getItem('arr'))
	{
		arr = JSON.parse(localStorage.getItem('arr'));
	}

	arr.push(users);
    console.log(arr);
	localStorage.setItem("arr", JSON.stringify(arr));
	
	alert(sname + " " + semail + " " + bdate + " added at index " + arr.length);

	 var arr = localStorage.getItem('arr');
    var items = JSON.parse(array);
    
    arr = items;
    
    document.write('<table border = "1" id = "table1">');
    document.write('<tr>');
    document.write('<th>Name</th> <th>Email</th> <th>Password</th> <th>Date Of Birth</th> </tr> <tr>');
          
      if(arr === null )
      {
        alert("Records not found!");
        document.getElementById("table1").style.display = "none";
      }     
      else
      {
        for(var k = 0 ; k < arr.length; k++)
        { 
          document.write('<td>'+ array[k].name + '</td>' );
          document.write('<td>'+ array[k].email + '</td>' );
          document.write('<td>'+ array[k].password + '</td>' );
          document.write('<td>'+ array[k].birth + '</td>' );
          document.write('</tr>');
        }
      }
      document.write('</table>'); 	
}
