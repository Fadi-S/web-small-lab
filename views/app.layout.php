<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= $title ?? "" ?></title>

    <style>
        body {
            margin: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .error-card {
            margin-top: 10px;
            padding: 10px;
            border: darkred solid 1px;
            border-radius: 5px;
            color: darkred;
            background-color: #ffc4c4;
        }

        .label {
            display: flex;
            flex-direction: column;
            align-items: start;
        }

        .label > span {
            font-size: 15px;
            font-weight: 700;
            color: rgb(40, 40, 40);
        }

        .card {
            margin: auto;
            background-color: white;
            padding: 1rem 2rem 1rem 2rem;
            border-radius: 10px;
        }

        input {
            padding: 6px 5px 6px 5px;
            border-radius: 5px;
            border: #7f7f7f 1px solid;
            font-size: 16px;
            width: 100%;
        }

        button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #7496e6;
            color: white;
            transition: all;
            transition-duration: 200ms;
            cursor: pointer;
        }

        button:hover {
            background-color: #446dcc;
        }
        button:focus {
            background-color: #446dcc;
        }
    </style>
</head>
<body style="height:100vh; background-color: rgba(231,231,231,0.97)">

<?= $body ?? "" ?>

</body>
</html>