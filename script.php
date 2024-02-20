<?php
// Faccio vedere hotels.php a questa pagina così da non riscrivere tutti i dati
require 'hotels.php';


// Prendo le singole chiavi del singolo hotel
$keys = [];

foreach ($hotels as $hotel) {
    foreach ($hotel as $key => $value) {
        if (!in_array($key, $keys)) {
            $keys[] = $key;
        }
    }
};


// Raccolgo la scelta dell'utente dal form

$user_choice = $_GET['select'] ?? '';

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Matteo Cantafio">
    <meta name="description" content="PHP Hotel">
    <title>PHP Hotel</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    
    <div class="container">
        <!-- Form -->
        <form action="" method="GET">
            <select name="select" class="form-select">
                <option value="" selected>Filter</option>
                <option value="parking">Parking</option>
                <option value="no-parking">Without Parking</option>
            </select>
            <button class="btn btn-success ms-2">Cerca</button>
        </form>
        
        <!-- Table -->
        <h1 class="mt-4 mb-4">Hotels</h1>
        <table class="table">
            <thead>
                <tr>
                    <?php foreach($keys as $key) :
                    $new_key = ucfirst(str_replace('_',' ', $key))
                    ?>
                    <th scope="col"><?= $new_key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hotels as $hotel) :?>
                    <tr>
                        <?php foreach ($hotel as $value) :
                            $new_value = is_bool($value) ? ($value ? '&#10003' : '&#10007;') : $value;
                            ?>
                            <?php if ($user_choice === ''): ?>
                                <td><?= $new_value ?></td>
                            <?php elseif ($user_choice === 'parking' && $hotel['parking']) :?>
                                <td><?= $new_value ?></td>
                            <?php elseif ($user_choice === 'no-parking' && !($hotel['parking'])) :?>
                            <td><?= $new_value ?></td>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>