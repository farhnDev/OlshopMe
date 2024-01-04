import './bootstrap';
let lastScrollTop = 0;
let navbar = document.querySelector('#appBar');

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop < lastScrollTop && scrollTop > navbar.offsetHeight) {
        navbar.classList.remove('hidden');
    } else {
        navbar.classList.add('hidden');
    }
    lastScrollTop = scrollTop;
});
