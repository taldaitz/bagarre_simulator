<section class="character_panel">
    <h2><?= $character['name'] ?></h2>
    <cite>Combattant</cite>
    <div class="character_energy">

        <p>
            <span>PV : </span> <?= $character['health'] ?>
        </p>

    </div>
    <div class="character_stats">
        <ul>
            <li>Force : <?= $character['strengh'] ?></li>
            <li>Constitution : <?= $character['constitution'] ?></li>
            <li>Agilité : <?= $character['agility'] ?></li>
            <li>Intelligence : <?= $character['intelligence'] ?></li>
        </ul>
    </div>
</section>