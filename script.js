function signUpValidation(){
	var userName 		 	= ((document.getElementById("user_name")||{}).value)||"";
	var userEmail 		 	= ((document.getElementById("user_email")||{}).value)||"";
	var userPassword 		= ((document.getElementById("password-field_1")||{}).value)||"";
	var userConfirmPassword = ((document.getElementById("confirm_password")||{}).value)||"";

	var error_username 		  = document.getElementById("error_username")||{} || "";
	var error_email 		  = document.getElementById("error_email")||{} || "";;
	var error_password 		  = document.getElementById("error_password")||{} || "";;
	var error_confirmPassword = document.getElementById("error_confirmPassword")||{} || "";;

	var regex_username = /^[a-zA-Z0-9_]{5,15}$/;
	var regex_email    = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,3})$/ 
	var regex_password = /^[a-zA-Z0-9_$]{5,15}$/;
	
	//Username
	if (userName.length === 0) {
		error_username.innerHTML = "Username is requied";
		return false;
	}else{
		error_username.innerHTML = "";
	}
	if (regex_username.test(userName)) {
		error_username.innerHTML = "";
	}else{
		error_username.innerHTML = "Invalid Username";
		return false;
	}	

	//Email
	if (userEmail.length === 0) {
		error_email.innerHTML = "Email Address is requied";
		return false;
	}else{
		error_email.innerHTML = "";
	}
	if (regex_email.test(userEmail)) {
		error_email.innerHTML = "";
	}else{
		error_email.innerHTML = "Invalid Email Address";
		return false;		
	}

	//Password
	if (userPassword.length == 0) {
		error_password.innerHTML = "Password is requied";
		return false;
	}else{
		error_password.innerHTML = "";
	}
	if (regex_password.test(userPassword)) {
		error_password.innerHTML = "";
	}else{
		error_password.innerHTML = "Invalid Password";
		return false;
	}

	//Confirm Password
	if(userConfirmPassword.length == 0) {
		error_confirmPassword.innerHTML = "Password is requied";
		return false;
	}else{
		error_confirmPassword.innerHTML = "";
	}
	
	//Password Match
	if (userPassword === userConfirmPassword && userPassword.length !== 0) {
		document.getElementById('success_confirmPassword').innerHTML = "Password Match";
		// error_confirmPassword.innerHTML = "Match";
	}else{
		error_confirmPassword.innerHTML = "Password Not Match";
		return false;
	}		
}

function loginValidation(){
	var userName = document.getElementById('userName').value;
	var userPassword = document.getElementById('password-field').value;

	var error_userName = document.getElementById('error_userName');
	var error_userPassword = document.getElementById('error_userPassword');

	if (userName.length === 0) {
		error_userName.innerHTML = "Username is requied";
		return false;
	}else{
		error_userName.innerHTML = "";
	}

	if (userPassword.length === 0) {
		error_userPassword.innerHTML = "Password is requied";
		return false;
	}else{
		error_userPassword.innerHTML = "";
	}
}

function passwordRecoveryValidation(){
	var emai_recovery = document.getElementById('emai_recovery').value;
	var error_email = document.getElementById('error_email');

	var regex_email    = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,3})$/ 

	if (emai_recovery.length == 0) {
		error_email.innerHTML = "Email Address is requied";
		return false;
	}else{
		error_email.innerHTML = "";
	}

	if (regex_email.test(emai_recovery)) {
		error_email.innerHTML = "";
	}else{
		error_email.innerHTML = "Invalid Email Address";
		return false;		
	}
}

function passwordResetValidation(){
	var reset_password = document.getElementById('reset_password').value;
	var confirm_password = document.getElementById('confirm_password').value;

	var error_resetPassword = document.getElementById('error_resetPassword');
	var error_confirmPassword = document.getElementById('error_confirmPassword');

	var regex_password = /^[a-zA-Z0-9_$]{5,15}$/;

	if (reset_password.length == 0) {
		error_resetPassword.innerHTML = "Password is requied";
		return false;
	}else{
		error_resetPassword.innerHTML = "";
	}
	if (confirm_password.length == 0) {
		error_confirmPassword.innerHTML = "Password is requied";
		return false;
	}else{
		error_confirmPassword.innerHTML = "";
	}
	if (regex_password.test(reset_password)) {
		error_resetPassword.innerHTML = "";
	}else{
		error_resetPassword.innerHTML = "Invalid Password";
		return false;
	}
	if (reset_password !== confirm_password) {
		error_confirmPassword.innerHTML = "Password Not Match";
		return false;
	}else{
		success_confirmPassword.innerHTML = "Password Match";
	}
}