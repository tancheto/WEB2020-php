function validate()
{
	let username = document.getElementById("username").value;
	let usernamePattern = /^[a-zA-Z0-9_]{3,10}$/;
	
	let pass = document.getElementById("pass").value;
	let passPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{6,}$/;
	
	let pass2 = document.getElementById("pass2").value;
	
	if (! validateField(username, usernamePattern))
	{
		document.getElementById('not-successful').innerHTML = "Username " + username + " not correct." + 
		"Username should be between 3 and 10 symbols containing letters, digits and _");
		document.getElementById('redirection').innerHTML = "Go back to the form.");
		return;
	}
	
	if (! validateField(pass, passPattern))
	{
		document.getElementById('not-successful').innerHTML = "Password should be at least 6 symbols containing at least 1 capital letter, 1 small letter and 1 digit!" + 
		document.getElementById('redirection').innerHTML = "Go back to the form.");
		return;
	}
	
	if (pass !== pass2)
	{
		document.getElementById('not-successful').innerHTML = "Reentered password should be the same as the first one!";
		document.getElementById('redirection').innerHTML = "Go back to the form.");
		return;
	}
}

function validateField(str, pattern)
{
	let res = str.match(pattern);	
	return (res!=null)
}