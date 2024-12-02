function validateForm() {
    let contactNumber = document.getElementById("contactNumber").value;
    let age = document.getElementById("age").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    let contactError = document.getElementById("contactError");
    let ageError = document.getElementById("ageError");
    let passwordError = document.getElementById("passwordError");
    let confirmPasswordError = document.getElementById("confirmPasswordError");
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");
    let emailError = document.getElementById("emailError");
    let idFileError = document.getElementById("idFileError");
    let addressError = document.getElementById("addressError");
    let usernameError = document.getElementById("usernameError");

    document.querySelectorAll('.error-message').forEach(function(error) {
        error.textContent = "";
    });

    let isValid = true;

    if (document.getElementById("firstName").value.trim() === "") {
        firstNameError.textContent = "First Name is required.";
        isValid = false;
    }

    if (document.getElementById("lastName").value.trim() === "") {
        lastNameError.textContent = "Last Name is required.";
        isValid = false;
    }

    let email = document.getElementById("email").value;
    if (!/\S+@\S+\.\S+/.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    }

    if (!/^\d{11}$/.test(contactNumber)) {
        contactError.textContent = "Contact number must be valid.";
        isValid = false;
    }

    if (age < 13 || !/^\d+$/.test(age)) {
        ageError.textContent = "Age must be 13 years old or older.";
        isValid = false;
    }

    if (!/(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}/.test(password)) {
        passwordError.textContent = "Password must contain a combination of letters and numbers and be at least 8 characters long.";
        isValid = false;
    }

    if (password !== confirmPassword) {
        confirmPasswordError.textContent = "Passwords do not match.";
        isValid = false;
    }

    let address = document.getElementById("address").value;
    if (address.trim() === "") {
        addressError.textContent = "Address is required.";
        isValid = false;
    }

    let username = document.getElementById("username").value;
    if (username.trim() === "") {
        usernameError.textContent = "Username is required.";
        isValid = false;
    }

    if (!document.getElementById("idFile").files.length) {
        idFileError.textContent = "Please upload an ID file.";
        isValid = false;
    }

    return isValid;
}

document.getElementById("contactNumber").addEventListener("input", function (e) {
    e.target.value = e.target.value.replace(/[^0-9]/g, "");
});

document.getElementById("age").addEventListener("input", function (e) {
    e.target.value = e.target.value.replace(/[^0-9]/g, ""); 
    if (e.target.value < 0) e.target.value = ""; 
});
