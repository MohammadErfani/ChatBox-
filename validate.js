const errorElement = document.getElementById('errors');
const name = document.getElementById('name');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('myform');

const nameReg = /^[a-z]+$/;
const userReg = /^[a-z0-9]+$/i;
const emailReg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
form.addEventListener('submit',function(e){
	let message = [];
	//name validate
	if(name.value === '' || name.value == null){
		message.push('name is required')
	}
	else if(!nameReg.test(name.value)){
		message.push('name must have only letters')
	}
	else if(name.value.length <3 || name.value.length >32){
		message.push('your name must have between 3 to 32 letters')
	}

	//username validate
	if(username.value === '' || username.value == null){
		message.push('username is required')
	}
	else if(!userReg.test(username.value)){
		message.push('username must have only letters or number')
	}
	else if(username.value.length <3 || username.value.length >32){
		message.push('your username must have between 3 to 32 letters or number')
	}

	//email validate
	if(email.value === '' || email.value == null){
		message.push('email is required')
	}else if(!emailReg.test(email.value)){
		message.push('your email is not in correct way')
	}
	if(password.value === '' || password.value == null){
		message.push('password is required')
	}else if(password.value.length <4 || password.value.length >32){
		message.push('your password must have between 4 to 32 characters')
	}
	if(message.length >0){
		e.preventDefault();
		errorElement.innerText = message.join('\n')
		errorElement.classList.remove('d-none')
	}
})





// errorElement.classList.add('bg-dark')