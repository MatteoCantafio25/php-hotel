<?php
require 'hotels.php';

$keys = [];

foreach ($hotels as $hotel) {
    foreach ($hotel as $key => $value) {
        if (!in_array($key, $keys)) {
            $keys[] = $key;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Hotels</h1>
        <table class="table">
            <thead>
                <tr>
                    <?php foreach($keys as $key) :
                $new_key = ucfirst(str_replace('_',' ', $key))?>
                    <th scope="col"><?= $new_key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hotels as $hotel) :?>
                    <tr>
                        <?php foreach ($hotel as $key => $value) :?>
                            <td><?= $value ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</body>
</html>