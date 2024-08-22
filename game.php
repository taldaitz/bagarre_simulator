<?php

use Symfony\Component\HttpClient\HttpClient;

    require 'vendor/autoload.php';


    $client = HttpClient::create();
    $response = $client->request('GET', 'http://127.0.0.1:8000/api/character-list');

    $webCharacters = $response->toArray();

    $charactList = [
        'conan' => 'Conan - Guerrier',
        'arthur' => 'Arthur - Guerrier',
        'merlin' => 'Merlin - Magicien',
        'arsene' => 'Arsène - Voleur',
    ];

    foreach($webCharacters as $webCharac) {
        $charactList[$webCharac['id']] = $webCharac['name'] . ' - ' . $webCharac['job'];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
   <header>
        <span id='fighter_1_span'>
            <label>Combattant 1</label>
            <select name="fighter1" id="select_char_1">
                <option value="">-</option>
                <?php

                foreach($charactList as $value => $charac)
                {
                    echo '<option value="' . $value . '">' . $charac . '</option>';
                }

                ?>
            </select>
        </span>



        <span class="title">
            VS
        </span>

        <span id='fighter_2_span'>
            <label>Combattant 2</label>
            <select name="fighter2" id="select_char_2">
                <option value="">-</option>
                <?php

                foreach($charactList as $value => $charac)
                {
                    echo '<option value="' . $value . '">' . $charac . '</option>';
                }

                ?>
            </select>
        </span>

        
    </header>

    <p style="text-align: center;">
        <input type="submit" value="Fight !" id="fightBtn">
    </p>

    <main>
        <section id="fight_log">
        </section>
    </main>

    <script src="js/script.js"></script>
</body>
</html>