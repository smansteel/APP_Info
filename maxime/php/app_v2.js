
let toggle = document.querySelector('.toggle');
let body = document.querySelector('body');

toggle.addEventListener('click', function () {
    body.classList.toggle('open');
})



let img_slider = document.getElementsByClassName('img_slider');

let etape = 0;

let nb_img = img_slider.length;

let precedent = document.querySelector('.precedent');
let suivant = document.querySelector('.suivant');

function enleverActiveImage() {
    for (let i = 0; i < nb_img; i++) {
        img_slider[i].classList.remove('active');
    }
}

suivant.addEventListener('click', function () {
    etape++;
    if (etape >= nb_img) {
        etape = 0;
    }
    enleverActiveImage();
    img_slider[etape].classList.add('active');
})

precedent.addEventListener('click', function () {
    etape--;
    if (etape < 0) {
        etape = nb_img - 1;
    }
    enleverActiveImage();
    img_slider[etape].classList.add('active');
})
setInterval(function () {
    etape++;
    if (etape >= nb_img) {
        etape = 0;
    }
    enleverActiveImage();
    img_slider[etape].classList.add('active');
}, 3000)

/*scroll anim*/

const ratio = .1
const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}

const handleIntersect = function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal-visible')
            observer.unobserve(entry.target)
        }
    })
}

const observer = new IntersectionObserver(handleIntersect, options)
document.querySelectorAll('[class*="reveal-"]').forEach(function (r) {
    observer.observe(r)
})