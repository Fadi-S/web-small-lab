
<div class="container">
    <div class="card" style="min-width: 340px;">
        <h1>Login to System</h1>
        <form
            id="form"
            action="/login"
            method="POST"
            >
            <label class="label">
                <span>Email</span>
                <input id="email" name="email" type="email">
            </label>

            <label class="label" style="margin-top: 15px;">
                <span>Password</span>
                <input id="password" name="password" type="password">
            </label>

            <div id="error" class="error-card"><?= getErrors() ?></div>

            <button type="submit" style="margin-top: 20px">
                Login
            </button>
        </form>

        <br>

        <a href="/register">Don't have an account? Create new Account</a>
    </div>
</div>

<script>
    document.getElementById("form")
        .addEventListener("submit", function(evt) {
            evt.preventDefault();

            let email = document.getElementById("email").value;
            let vEmail = validateEmail(email);
            if(vEmail !== true) {
                addError(vEmail);
                return;
            }

            let password = document.getElementById("password").value;
            let vPassword = validatePassword(password);
            if(vPassword !== true) {
                addError(vPassword);
                return;
            }

            let form = new FormData();
            form.append("email", email);
            form.append("password", password);

            submit("/login", form);

            return false;
        }, true);
</script>