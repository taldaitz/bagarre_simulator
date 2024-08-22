const selectChar1 = document.getElementById("select_char_1");
const selectChar2 = document.getElementById("select_char_2");
const fightBtn = document.getElementById("fightBtn");

let fighter1, fighter2 = null;

selectChar1.addEventListener('change', function () {
    fighter1 = this.value;

    fetch('api_front.php?charac=' + this.value)
    .then(response => response.text())
    .then(content => {
        const spanFighter = document.getElementById('fighter_1_span');
        spanFighter.innerHTML = content;
        updateBtnFight();
    })

    
});

selectChar2.addEventListener('change', function () {
    fighter2 = this.value;

    fetch('api_front.php?charac=' + this.value)
    .then(response => response.text())
    .then(content => {
        const spanFighter = document.getElementById('fighter_2_span');
        spanFighter.innerHTML = content;
        updateBtnFight();
    })
});


function updateBtnFight() {
    if(fighter1 != null && fighter2 != null)
        fightBtn.style.display = 'inline';
}


fightBtn.addEventListener('click', function (){
    fetch('api_front_battle_log.php?charac1=' + fighter1 + '&charac2=' + fighter2)
    .then(response => response.text())
    .then(content => {
        document.getElementById('fight_log').innerHTML = content;
    })
});