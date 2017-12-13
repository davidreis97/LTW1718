let password = document.querySelector('#registerForm input[name=password]');
let confirmPassword = document.querySelector('#registerForm input[name=confirmPassword]');
let username = document.querySelector('#registerForm input[name=username]');
username.addEventListener('keyup', validateUsername, false);
password.addEventListener('keyup', validatePassword, false);
confirmPassword.addEventListener('keyup', validateRepeat.bind(confirmPassword, password), false);

let register = document.querySelector('#registerForm input[type=submit]');
register.addEventListener('click', validateRegister, false);

let invalidPassword = true;
let invalidConfirm = true;
let existingUsername = true;
let invalidUsername = true;

function validateUsername(something) {
  existingUsername = false;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if (this.responseText == "USER EXISTS"){
      existingUsername = true;
    }
  }
  xhttp.open("GET", `action_checkUserExists.php?username=${this.value}`, true);
  xhttp.send();

  if(this.value.length < 3){
      invalidUsername = true;
  }else{
      invalidUsername = false;
  }
}

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
  if (invalidPassword || invalidConfirm || existingUsername || invalidUsername)
    event.preventDefault();
  if (invalidPassword)
    alert('Password must contain at least 7 chars, including 1 number and 1 capital letter');
  if (invalidConfirm)
    alert('Password and repeat password dont match!');
  if (existingUsername)
    alert('Username already exists!');
  if (invalidUsername)
    alert('Username must be at least 3 characters long!');
}
