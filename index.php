<?php

$ascii_upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$ascii_lower = 'abcdefghijklmnopqrstuvwxyz';
$numbers = '0123456789';
$symbols = '!#$%&\()*./:;?@\_~';

$charArray = ['ascii_upper', 'ascii_lower', 'numbers', 'symbols',];

$passwd = '';


if (isset($_GET['length'])) {
    if ($_GET['length'] >= 8 && $_GET['length'] < 50) {
        $str_length = $_GET['length'];
        echo $str_length;
        while (strlen($passwd) <= $str_length) {
            $random_number = rand(0, count($charArray) - 1);
            $current_list = $charArray[$random_number];
            $random_char = $$current_list[rand(0, strlen($$current_list) - 1)];
            echo $random_char;
            $passwd .= $random_char;
            #echo $passwd;
        }
    } else {
        $alert_danger = 'Numero non valido';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Password Generator</title>
</head>

<body class="bg-primary p-3">

    <h1 class="text-white text-center">Password Generator</h1>

    <div class="container bg-light p-3 rounded">
        <form action="index.php" method="get">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Lunghezza password</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="length">
                <?php if (isset($alert_danger)) echo "<div class='text-danger col-12 p-2 text-center mb-2'>$alert_danger</div>" ?>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </form>
    </div>

</body>

</html>