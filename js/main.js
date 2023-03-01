// Switch between sign up and sign in
let signUp  = document.querySelector(".sign-up"),
    signIn  = document.querySelector(".sign-in"),
    buttons = document.querySelectorAll(".register h3");

// Toggle between sign up and sign in
function toggleRegsiterForm(btn) {

    if(btn.classList.contains("SignIn")) {

        signIn.style.display = "flex";

        signUp.style.display = "none";

    } else {

        signUp.style.display = "flex";
        
        signIn.style.display = "none";

    }

}

// Toggle active class on button
buttons.forEach((button) => {
    button.addEventListener("click", (e) => {
        buttons.forEach((btn) => {
            btn.classList.remove("active");
        })
        e.target.classList.add("active");
        toggleRegsiterForm(e.target);
    })
})

// Create an AJAX and connected with database
let request = new XMLHttpRequest();

 // Get info of sign up form
 let username       = document.querySelector(".sign-up input:first-of-type"),
     first_name     = document.querySelector(".sign-up input:nth-of-type(2)"),
     last_name      = document.querySelector(".sign-up input:nth-of-type(3)"),
     password       = document.querySelector(".sign-up input:nth-of-type(4)"),
     submit         = document.querySelector(".sign-up input:last-of-type");
     successful     = document.querySelector(".sign-up .success"),
     emptyUsername  = document.querySelector(".sign-up .username"),
     emptyFirstName = document.querySelector(".sign-up .first-name"),
     emptyLastName  = document.querySelector(".sign-up .last-name"),
     emptyPassword  = document.querySelector(".sign-up .password"),
     errorUsername  = document.querySelector(".sign-up .valid-username");

// Function to send request of sign up form to database
function signUpForm() {
    request.onreadystatechange = function() {
    
        if(this.readyState === 4 && this.status === 200) {

            // Check if username is empty
            if(username.value == "") {

                emptyUsername.style.display = "block";

                emptyUsername.innerHTML = "The usrename is empty !";

            } else {

                emptyUsername.style.display = "none";

            }

            // Check if first name is empty
            if(first_name.value == "") {

                emptyFirstName.style.display = "block";

                emptyFirstName.innerHTML = "The first name is empty !";

            } else {

                emptyFirstName.style.display = "none";

            }

            // Check if last name is empty
            if(last_name.value == "") {

                emptyLastName.style.display = "block";

                emptyLastName.innerHTML = "The last name is empty !";

            } else {

                emptyLastName.style.display = "none";

            }

            // Check if password is empty
            if(password.value == "") {

                emptyPassword.style.display = "block";

                emptyPassword.innerHTML = "The password is empty ! ";

            } else {

                emptyPassword.style.display = "none";

            }

            // Check if input fields are not null, means get response
            if(username.value != "" && first_name.value != "" && last_name.value != "" && password.value != "") {
                // If the result of response is 1, means successfully registerd
                if(this.responseText == 1) {
                    
                    errorUsername.style.display = "none";
                    
                    successful.style.display = "block";
            
                    successful.innerHTML = "Successfully registered";
    
                    username.value = "";
    
                    first_name.value = "";
                    
                    last_name.value = "";
    
                    password.value = "";
    
                } else {
    
                    successful.style.display = "none";
                        
                    errorUsername.style.display = "block";
                            
                    errorUsername.innerHTML = "The username isn't valid !";
    
                }

            } else {

                errorUsername.style.display = "none";
                
                successful.style.display = "none";

            }

        }
    
    }
    // Make a request
    request.open("POST", "signUpForm.php", true);

    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the request
    request.send(`username=${username.value}&firstname=${first_name.value}&lastname=${last_name.value}&password=${password.value}`);
}

// On click submit sign up form
submit.onclick = () => {
    signUpForm()
};

// Get info of sign in form
let usernameSignIn      = document.querySelector(".sign-in input:first-of-type"),
    passwordSignIn      = document.querySelector(".sign-in input:nth-of-type(2)"),
    emptyUsernameSignIn = document.querySelector(".sign-in .username"),
    emptyPasswrodSignIn = document.querySelector(".sign-in .password"),
    errorLogin          = document.querySelector(".sign-in .valid-login"),
    login               = document.querySelector(".sign-in input:last-of-type");

// Function to send request of sign in form to database
function signInForm() {
    request.onreadystatechange = function() {

        if(this.readyState === 4 && this.status === 200) {

            // Check if username is empty
            if(usernameSignIn.value == "") {

                emptyUsernameSignIn.style.display = "block";

                emptyUsernameSignIn.innerHTML = "The username is empty !";

            } else {

                emptyUsernameSignIn.style.display = "none";
                
            }

            // Check if password is empty
            if(passwordSignIn.value == "") {

                emptyPasswrodSignIn.style.display = "block";

                emptyPasswrodSignIn.innerHTML = "The password is empty !";

            } else {

                emptyPasswrodSignIn.style.display = "none";
                
            }

            // Check if input fields are not null, means get response
            if(usernameSignIn.value != "" && passwordSignIn.value != "") {
                // If the result of response is 1, means successfully login
                if(this.responseText == 1) {

                    // Redirect to your profile page
                    window.location.replace("profile.php");

                } else {
               
                    errorLogin.style.display = "block";

                    errorLogin.innerHTML = "The username or password isn't correct !";

                }

            } else {

                errorLogin.style.display = "none";

            }

        }

    }

    // Make a request
    request.open("POST", "signInForm.php", true);

    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the request
    request.send(`username=${usernameSignIn.value}&password=${passwordSignIn.value}`);
}

login.onclick = () => {
    signInForm()
};