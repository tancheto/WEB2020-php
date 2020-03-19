function validate()
{
	//document.body.appendChild(form);
	
	console.log("eho");
	
	let username = document.getElementById("username").value;
	let usernamePattern = /^[a-zA-Z0-9_]{3,10}$/;
	
	let pass = document.getElementById("pass").value;
	let passPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{6,}$/;
	
	let pass2 = document.getElementById("pass2").value;
	
	if (! validateField(username, usernamePattern))
	{
		document.write("<div>Username " + username + " not correct. ");
		document.write("Username should be between 3 and 10 symbols containing letters, digits and _</div>");
		document.write("<a href='./js-validated-form.html'>Go back to the form.</a>");
		return;
	}
	
	if (! validateField(pass, passPattern))
	{
		document.write("<p>Password should be at least 6 symbols containing at least 1 capital letter, 1 small letter and 1 digit!</p>");
		document.write("<a href='./js-validated-form.html'>Go back to the form.</a>");
		return;
	}
	
	if (pass !== pass2)
	{
		document.write("<p>Reentered password should be the same as the first one!</p>");
		document.write("<a href='./js-validated-form.html'>Go back to the form.</a>");
		return;
	}
}

function validateField(str, pattern)
{
	let res = str.match(pattern);	
	return (res!=null)
}