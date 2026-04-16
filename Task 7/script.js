function highlight(field) {
    field.style.background = "#e6f7ff";
}

function unhighlight(field) {
    field.style.background = "white";
}

function validateName() {
    var name = document.getElementById("name").value;
    if (name.length < 3) {
        document.getElementById("nameError").innerHTML = "Name must be at least 3 characters";
    } else {
        document.getElementById("nameError").innerHTML = "";
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    if (!email.includes("@")) {
        document.getElementById("emailError").innerHTML = "Invalid Email";
    } else {
        document.getElementById("emailError").innerHTML = "";
    }
}

function validateFeedback() {
    var feedback = document.getElementById("feedback").value;
    if (feedback.length < 10) {
        document.getElementById("feedbackError").innerHTML = "Feedback must be at least 10 characters";
    } else {
        document.getElementById("feedbackError").innerHTML = "";
    }
}

function submitForm() {
    alert("Feedback Submitted Successfully!");
}