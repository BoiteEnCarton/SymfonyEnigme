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



//HOMEPAGE
const noise = () => {
    let canvas, ctx;

    let wWidth, wHeight;

    let noiseData = [];
    let frame = 0;

    let loopTimeout;


    // Create Noise
    const createNoise = () => {
        const idata = ctx.createImageData(wWidth, wHeight);
        const buffer32 = new Uint32Array(idata.data.buffer);
        const len = buffer32.length;

        for (let i = 0; i < len; i++) {
            if (Math.random() < 0.5) {
                buffer32[i] = 0xff000000;
            }
        }

        noiseData.push(idata);
    };


    // Play Noise
    const paintNoise = () => {
        if (frame === 9) {
            frame = 0;
        } else {
            frame++;
        }

        ctx.putImageData(noiseData[frame], 0, 0);
    };


    // Loop
    const loop = () => {
        paintNoise(frame);

        loopTimeout = window.setTimeout(() => {
            window.requestAnimationFrame(loop);
        }, (1000 / 25));
    };


    // Setup
    const setup = () => {
        wWidth = window.innerWidth;
        wHeight = window.innerHeight;

        canvas.width = wWidth;
        canvas.height = wHeight;

        for (let i = 0; i < 10; i++) {
            createNoise();
        }

        loop();
    };


    // Reset
    let resizeThrottle;
    const reset = () => {
        window.addEventListener('resize', () => {
            window.clearTimeout(resizeThrottle);

            resizeThrottle = window.setTimeout(() => {
                window.clearTimeout(loopTimeout);
                setup();
            }, 200);
        }, false);
    };


    // Init
    const init = (() => {
        canvas = document.getElementById('noise');
        ctx = canvas.getContext('2d');
        setup();
        return 1;
    })();
};

noise();


//VIEUX

//
// var Pic = document.getElementById('pic').cloneNode();
// document.getElementById('container').appendChild(Pic);
// var line = document.createElement('div'); line.className = 'line';
// document.getElementById('container').appendChild(line);
//
//
// var tl = new TimelineMax({repeat:-1});
//
// for(var i=50; i--;){
//     tl.to(Pic,R(0.03,0.17),{opacity:R(0,1),y:R(-1.5,1.5)})
// };
//
// tl.to(line,tl.duration()/2,{opacity:R(0.1,1),x:R(0,300),ease:RoughEase.ease.config({strength:0.5,points:10,randomize:true,taper: "none"}),repeat:1,yoyo:true},0);
//
// function R(max,min){return Math.random()*(max-min)+min};