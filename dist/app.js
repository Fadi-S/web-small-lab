function submit(url, form) {
    fetch(url, {
        method: "POST",
        body: form,
        headers: {
            "Accept": "application/json"
        },
    }).then(async response => {
        let res = await response.text();
        res = JSON.parse(res);
        if(response.ok) {
            window.location.href = res['_redirect'];
        } else {
            addError(res.error);
        }
    });
}

function addError(error) {
    document.querySelector("#error").innerHTML = error;
}

function validateEmail(email) {
    if(email === null || email === "") {
        return "Email cannot be empty";
    }

    let re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!re.test(email)) {
        return "Email is not valid";
    }

    return true;
}

function validatePassword(password, confirm_password, length=0) {
    if(password === null || password === "") {
        return "Password cannot be empty";
    }

    if(password !== confirm_password) {
        return "Passwords do not match";
    }

    if(length && password.length < length) {
        return `Password must be at least ${length} characters long`;
    }

    return true;
}

function validateName(name) {
    if(name === null || name === "") {
        return "Name cannot be empty";
    }

    return true;
}