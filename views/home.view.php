
<div class="container">
    <div class="card" style="display: flex; flex-direction: column; align-items: center">
        <div>
            Welcome, <strong><?= $user["name"] ?></strong>.
        </div>

        <div style="margin-top: 10px">
            <?= $user["email"] ?>
        </div>

        <br>

        <form action="/logout" method="POST" style="width: 100%">
            <button type="submit">Logout</button>
        </form>
    </div>

</div>
