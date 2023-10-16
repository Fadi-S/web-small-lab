
<div class="container">
    <div class="card" style="min-width: 340px;">
        <h1>Login to System</h1>
        <form action="/login" method="POST" onsubmit="submit">
            <label class="label">
                <span>Email</span>
                <input id="email" name="email" type="email" required>
            </label>

            <label class="label" style="margin-top: 15px;">
                <span>Password</span>
                <input id="password" name="password" type="password" required>
            </label>

            <?php if(hasError()): ?>
            <div class="error-card">
                <?= getErrors() ?>
            </div>
            <?php endif ?>

            <button type="submit" style="margin-top: 20px; display: flex; align-items: center;">
                Login
            </button>
        </form>

        <script>
            function submit(event) {
                console.log("fsdfds", event);
                event.preventDefault();
                event.stopPropagation();

                let email = document.getElementById("email").value;
                let password = document.getElementById("password").value;

                fetch("/login", {
                    method: "POST",
                    body: {email, password},
                });
            }
        </script>

        <br>

        <a href="/register">Don't have an account? Create new Account</a>
    </div>
</div>