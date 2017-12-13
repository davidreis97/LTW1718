let password = document.querySelector('#registerForm input[name=password]');
let confirmPassword = document.querySelector('#registerForm input[name=confirmPassword]');
password.addEventListener('keyup', validatePassword, false);
confirmPassword.addEventListener('keyup', validateRepeat.bind(confirmPassword, password), false);


let register = document.querySelector('#registerForm input[type=submit]');
register.addEventListener('click', validateRegister, false);

let invalidPassword = true;
let invalidConfirm = true;


function validatePassword(other){
  if (!/^.*(?=.*[A-Z])(?=.*[0-9]).{7,}$/.test(this.value))
    invalidPassword = true;
  else
    invalidPassword = false;
}

function validateRepeat(password){
  if (this.value !== password.value)
    invalidConfirm = true;
  else
    invalidConfirm = false;
}

function validateRegister(event){
  if (invalidPassword || invalidConfirm)
    event.preventDefault();
  if (invalidPassword)
    alert('Password must contain at least 7 chars, including 1 number and 1 capital letter');
  if (invalidConfirm)
    alert('Password and repeat password dont match!')
}
