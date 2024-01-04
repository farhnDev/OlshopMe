<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> OlhsopMe Landing</title>
    <meta name="author" content="Farhan Maulana Pangestu">
    <meta name="description" content="">
    <link rel="icon" href="https://img.icons8.com/nolan/128/fast-cart.png">
    @vite('resources/css/app.css')
    <script src="../js/appbar-scroll.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
@include('layouts.appbar')

@include('layouts.hero')

@include('layouts.footer')

<script>
    // let lastScrollTop = 0;
    // let appBar = document.getElementById('appBar');
    //
    // window.addEventListener('scroll', function() {
    //     let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    //
    //     if (scrollTop < lastScrollTop) {
    //         appBar.style.top = '0';
    //         appBar.style.zIndex = '9999';
    //
    //     } else {
    //         appBar.classList.add('hidden');
    //         appBar.style.top = '0';
    //         appBar.style.zIndex = '9999';
    //     }
    //
    //     lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    // });
</script>

</body>
</html>
