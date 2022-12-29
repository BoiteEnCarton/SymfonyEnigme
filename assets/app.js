/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';


document.getElementById('assistanteIdee').addEventListener('click', function() {
    indice();
});

function indice() {
    alert('Indice : Pensez différemment')
}













let x = 0,
    y = 0,
    dirX = 1,
    dirY = 1;
const speed = 2;
const pallete = ["#ff8800", "#e124ff", "#6a19ff", "#ff2188", "#02B0CEFF", "#28FF21FF"];
let dvd = document.getElementById("dvd");
dvd.style.backgroundColor = pallete[0];
let prevColorChoiceIndex = 0;
let black = document.getElementById("black");
const dvdWidth = dvd.clientWidth;
const dvdHeight = dvd.clientHeight;

function getNewRandomColor() {
    const currentPallete = [...pallete]
    currentPallete.splice(prevColorChoiceIndex,1)
    const colorChoiceIndex = Math.floor(Math.random() * currentPallete.length);
    prevColorChoiceIndex = colorChoiceIndex<prevColorChoiceIndex?colorChoiceIndex:colorChoiceIndex+1;
    const colorChoice = currentPallete[colorChoiceIndex];
    return colorChoice;
}
function animate() {
    const screenHeight = document.body.clientHeight;
    const screenWidth = document.body.clientWidth;

    if (y + dvdHeight >= screenHeight || y < 0) {
        dirY *= -1;
        dvd.style.backgroundColor = getNewRandomColor();
    }
    if (x + dvdWidth >= screenWidth || x < 0) {
        dirX *= -1;

        dvd.style.backgroundColor = getNewRandomColor();
    }
    x += dirX * speed;
    y += dirY * speed;
    dvd.style.left = x + "px";
    dvd.style.top = y + "px";
    window.requestAnimationFrame(animate);
}

window.requestAnimationFrame(animate);

function bravo(){
    let yay = new Audio('assets/yaykids.mp3')
    yay.play();
    //wait for 5 seconds;
    setTimeout(function(){
        yay.pause();
    }
    , 5000);
}

