
<div class="container">
    <div class="card" style="display: flex; flex-direction: column;">
        <div>
            Welcome, <?= $user["name"] ?>.
        </div>

        <div style="margin-top: 10px">
            <?= $user["email"] ?>
        </div>

        <br>

        <form action="/logout" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>

</div>
