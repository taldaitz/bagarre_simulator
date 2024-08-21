const selectChar1 = document.getElementById("select_char_1");

selectChar1.addEventListener('change', function () {
    fetch('api_front.php?charac=' + this.value)
    .then(response => response.text())
    .then(content => {
        const spanFighter = document.getElementById('fighter_1_span');
        spanFighter.innerHTML = content;
    })
});