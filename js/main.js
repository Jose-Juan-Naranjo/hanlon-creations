var i = 0; //start point
var time = 6000;

//Text list
var h1 = ['Architectual Concrete Designs', 'Cement Overlays', 'Terrazzo Countertops', 'Polished Concrete Countertops'];

function barFill() {
    const timeBar = document.querySelector('.time-bar').style.display = block;
    return barFill;
}


var images = ["url('../images/compass-header.jpg')", "url('../images/bathfloor-header.jpg')", "url('../images/terrazzo-countertop3.jpg')","url('../images/polished-counter4.jpg')"];

function changeImage () {
    document.querySelector('.header').style.backgroundImage = images[i];
    document.querySelector('#slide-text').textContent = h1[i];

    if(i < images.length - 1){
        i++;
    } else {
        i = 0;
    }

    setTimeout("changeImage()", time);
}
window.onload = changeImage, barFill;

