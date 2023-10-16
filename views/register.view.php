
<div class="container">
    <div class="card" style="min-width: 340px;">
        <h1>Register</h1>
        <form action="/register" method="POST" onsubmit="submit">
            <label class="label">
                <span>Name</span>
                <input name="name" type="text">
            </label>

            <label class="label" style="margin-top: 10px;">
                <span>Email</span>
                <input name="email" type="email">
            </label>

            <label class="label" style="margin-top: 10px;">
                <span>Password</span>
                <input name="password" type="password">
            </label>

            <?php if(hasError()): ?>
                <div class="error-card">
                    <?= getErrors() ?>
                </div>
            <?php endif ?>

            <button type="submit" style="margin-top: 20px; display: flex; align-items: center;">
                Register
            </button>
        </form>

        <br>

        <a href="/login">Already have an account? Login</a>
    </div>
</div>

<script>
    function submit(event) {
        event.preventDefault();
        event.stopPropagation();


    }
</script>