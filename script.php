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



// Controllo se arriva il filtro parcheggio e agisco di conseguenza

if(isset($_GET['parking'])){
    $filtered_hotels = [];
    $checked = 'checked';

    foreach ($hotels as $hotel){
        if($hotel['parking']) $filtered_hotels[] = $hotel;
    }

    $hotels = $filtered_hotels;
}

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
</head>
<body>
    
    <div class="container">
        <!-- Form -->
        <form action="" method="GET" class="d-flex align-items-center mt-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="parking" name="parking" <?= $checked ?? '' ?>>
                <label class="form-check-label" for="parking">
                    Show only hotels with parking
                </label>
            </div>
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
                        <th scope="col"><?= $hotel['name'] ?></th>
                        <td><?= $hotel['description'] ?></td> 
                        <td><?= $hotel['parking'] ? '&#10003': '&#10007' ?></td>
                        <td><?= $hotel['vote'] ?></td>
                        <td><?= $hotel['distance_to_center'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>