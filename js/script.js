const progress = (value) => {
   document.getElementsByClassName('progress-bar')[0].style.width = `${value}%`;
}

   let step = document.getElementsByClassName('step');
   let prevBtn = document.getElementById('prev-btn');
   let nextBtn = document.getElementById('next-btn');
   let submitBtn = document.getElementById('submit-btn');
   let form = document.getElementsByTagName('form')[0];
   let preloader = document.getElementById('preloader-wrapper');
   let bodyElement = document.querySelector('body');
   let succcessDiv = document.getElementById('success');
   let aoaa = document.getElementById('aoaa');
 
   form.onsubmit = () => { return false }

   let current_step = 0;
   let stepCount = 3
   step[current_step].classList.add('d-block');
   if(current_step == 0){
      prevBtn.classList.add('d-none');
      submitBtn.classList.add('d-none');
      nextBtn.classList.add('d-inline-block');
   }


// Function to show SweetAlert2 warning message
const showWarningMessage = (message) => {
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: message
    });
};

// Function to handle next button click
nextBtn.addEventListener('click', () => {
    // Check if any required field in the current step is empty
    const currentStepFields = step[current_step].querySelectorAll('[required]');
    let fieldsAreValid = true; // Initialize as true
    currentStepFields.forEach(field => {
        if (field.value.trim() === '') {
            fieldsAreValid = false; // Set to false if any required field is empty
            field.style.border = '1px solid red'; // Add red border to missing field
        } else {
            field.style.border = ''; // Remove red border if field is filled
        }
    });

    // Proceed to the next step if all required fields are filled
    if (fieldsAreValid) {
        // Proceed with additional checks only if in the step where email is entered
        if (current_step === 1) {
            // Check if email already exists in the database
            const email = document.querySelector('input[name="email"]').value;
            const formData = new FormData();
            formData.append('email', email);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check_email.php', true);
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.hasOwnProperty('exists')) {
                        if (response.exists) {
                            showWarningMessage('Email already exists. Please use a different email.');
                            document.querySelector('input[name="email"]').style.border = '1px solid red'; // Add red border to email field
                        } else {
                            document.querySelector('input[name="email"]').style.border = ''; // Remove red border if email doesn't exist
                            goToNextStep(); // Proceed to the next step if email doesn't exist
                        }
                    } else {
                        showWarningMessage('Invalid response received from server.');
                    }
                } else {
                    showWarningMessage('Failed to check email. Please try again later.');
                    console.error(xhr.responseText);
                }
            };
            xhr.onerror = function () {
                showWarningMessage('Failed to check email. Please try again later.');
                console.error(xhr.statusText);
            };
            xhr.send(formData);
        } else if (current_step === 2) {
            // Check if username already exists in the database
            const username = document.querySelector('input[name="username"]').value;
            const formData = new FormData();
            formData.append('username', username);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check_username.php', true);
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.hasOwnProperty('exists')) {
                        if (response.exists) {
                            showWarningMessage('Username already exists. Please choose a different username.');
                            document.querySelector('input[name="username"]').style.border = '1px solid red'; // Add red border to username field
                        } else {
                            document.querySelector('input[name="username"]').style.border = ''; // Remove red border if username doesn't exist
                            goToNextStep(); // Proceed to the next step if username doesn't exist
                        }
                    } else {
                        showWarningMessage('Invalid response received from server.');
                    }
                } else {
                    showWarningMessage('Failed to check username. Please try again later.');
                    console.error(xhr.responseText);
                }
            };
            xhr.onerror = function () {
                showWarningMessage('Failed to check username. Please try again later.');
                console.error(xhr.statusText);
            };
            xhr.send(formData);
        } else {
            // Proceed with other checks if not in the email or username step
            goToNextStep(); // Proceed to the next step directly
        }
    } else {
        // If any required field is empty, show SweetAlert2 popup
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill out all required fields.'
        });
    }
});

// Function to proceed to the next step
function goToNextStep() {
    // Proceed with additional checks only if in the step where password and confirm password are entered
    if (current_step === 2) {
        // Check if passwords match
        const password = document.querySelector('input[name="password"]').value;
        const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
        if (password !== confirmPassword) {
            showWarningMessage("Passwords don't match. Please check and try again.");
            document.querySelector('input[name="confirm_password"]').style.border = '1px solid red'; // Add red border to confirm password field
            return; // Exit the function if passwords don't match
        } else {
            document.querySelector('input[name="confirm_password"]').style.border = ''; // Remove red border if passwords match
        }
    }

    // Proceed to the next step
    current_step++;
    let previous_step = current_step - 1;
    if ((current_step > 0) && (current_step <= stepCount)) {
        prevBtn.classList.remove('d-none');
        prevBtn.classList.add('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block');
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if (current_step == stepCount) {
            submitBtn.classList.remove('d-none');
            submitBtn.classList.add('d-inline-block');
            nextBtn.classList.remove('d-inline-block');
            nextBtn.classList.add('d-none');
        }
    } else {
        if (current_step > stepCount) {
            form.onsubmit = () => { return true; };
        }
    }
    progress((100 / stepCount) * current_step);
}


   prevBtn.addEventListener('click', () => {
     if(current_step > 0){
        current_step--;
        let previous_step = current_step + 1; 
        prevBtn.classList.add('d-none');
        prevBtn.classList.add('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block')
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if(current_step < stepCount){
           submitBtn.classList.remove('d-inline-block');
           submitBtn.classList.add('d-none');
           nextBtn.classList.remove('d-none');
           nextBtn.classList.add('d-inline-block');
           prevBtn.classList.remove('d-none');
           prevBtn.classList.add('d-inline-block');
        } 
     }

     if(current_step == 0){
        prevBtn.classList.remove('d-inline-block');
        prevBtn.classList.add('d-none');
     }
    progress((100 / stepCount) * current_step);
   });


    submitBtn.addEventListener('click', () => {
        // Prevent the default form submission
        event.preventDefault();

        // Perform AJAX request
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'register_action.php', true);
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // If AJAX request is successful and response indicates success, proceed to preloader and success page
                if (xhr.responseText.trim() === 'success') {
                    preloader.classList.add('d-block');
                    const timer = ms => new Promise(res => setTimeout(res, ms));
                    timer(2500)
                        .then(() => {
                            bodyElement.classList.add('loaded');
                        }).then(() => {
                            step[stepCount].classList.remove('d-block');
                            step[stepCount].classList.add('d-none');
                            prevBtn.classList.remove('d-inline-block');
                            prevBtn.classList.add('d-none');
                            submitBtn.classList.remove('d-inline-block');
                            submitBtn.classList.add('d-none');
                            succcessDiv.classList.remove('d-none');
                            succcessDiv.classList.add('d-block');
                            aoaa.classList.add('d-none');
                        });
                } else {
                    // If AJAX request is successful but response indicates error, show SweetAlert error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to submit the form. Please try again later.'
                    });
                }
            } else {
                // If AJAX request fails, show SweetAlert error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Failed to submit the form. Please try again later.'
                });
                console.error(xhr.responseText);
            }
        };
        xhr.onerror = function () {
            // If AJAX request fails, show SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to submit the form. Please try again later.'
            });
            console.error(xhr.statusText);
        };
        xhr.send(formData);
    });



