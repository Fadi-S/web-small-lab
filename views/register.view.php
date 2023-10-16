
<div class="container">
    <div class="card" style="min-width: 340px;">
        <h1>Register</h1>
        <form id="form" action="/register" method="POST">
            <label class="label">
                <span>Name</span>
                <input id="name" name="name" type="text">
            </label>

            <label class="label" style="margin-top: 10px;">
                <span>Email</span>
                <input id="email" name="email" type="text">
            </label>

            <label class="label" style="margin-top: 10px;">
                <span>Password</span>
                <input id="password" name="password" type="password">
            </label>

            <div id="error" class="error-card"><?= getErrors() ?></div>

            <button type="submit" style="margin-top: 20px;">
                Register
            </button>
        </form>

        <br>

        <a href="/login">Already have an account? Login</a>
    </div>
</div>

<script>

    document.getElementById("form")
        .addEventListener("submit", function(evt) {
            evt.preventDefault();

            let name = document.getElementById("name").value;
            let vName = validateName(name);
            if(vName !== true) {
                addError(vName);
                return;
            }

            let email = document.getElementById("email").value;
            let vEmail = validateEmail(email);
            if(vEmail !== true) {
                addError(vEmail);
                return;
            }

            let password = document.getElementById("password").value;
            let vPassword = validatePassword(password, 6);
            if(vPassword !== true) {
                addError(vPassword);
                return;
            }

            let form = new FormData();
            form.append("name", name);
            form.append("email", email);
            form.append("password", password);

            submit("/register", form);

            return false;
        }, true);
</script>