let username = document.querySelector('#loginform input[name=username]');
let password = document.querySelector('#loginform input[name=password]');
let register = document.querySelector('#loginform input[type=submit]');
password.addEventListener('keyup', validatePassword, false);
username.addEventListener('keyup', validateUsername, false);
register.addEventListener('click', validateRegister, false);

let invalidPassword = true;
let invalidUsername = true;

function validateUsername(other){
    if (!/^.*.{1,}$/.test(this.value))
      invalidUsername = true;
    else
      invalidUsername = false;
  }

function validatePassword(other){
  if (!/^.*(?=.*[A-Z])(?=.*[0-9]).{7,}$/.test(this.value))
    invalidPassword = true;
  else
    invalidPassword = false;
}


function validateRegister(event){
  if  (invalidPassword && invalidUsername){
    event.preventDefault(); 
    alert('Invalid or Missing Username and Password')
  }
  else if (invalidPassword || invalidUsername){
    event.preventDefault();
  if (invalidPassword)
    alert('No valid Password');
  if (invalidUsername)
    alert('No valid Username');
  }
}