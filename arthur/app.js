let img_slider = document.getElementsByClassName('img_slider');

let etape = 0;

let nb_img = img_slider.length;

let precedent = document.querySelector('.precedent');
let suivant = document.querySelector('.suivant');

function enleverActiveImage() {
    for (let i = 0 ; i < nb_img ; i ++) {
        img_slider[i].classList.remove('active');
    }
}

suivant.addEventListener('click', function() {
    etape++;
    enleverActiveImage();
    img_slider[etape].classList.add('active');
})
