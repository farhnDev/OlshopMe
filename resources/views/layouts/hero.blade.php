<section class="text-gray-600 body-font mt-10 ">
    <div id="notification"
         class="hidden bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Mohon maaf anda belum login</p>
                <p class="text-sm">Silahkan login dahulu.</p>
            </div>
        </div>
    </div>
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div
            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900" id="title-font"></h1>
            <p class="mb-8 leading-relaxed">Temukan kecantikan alami Anda dengan produk kami. Dibuat dengan bahan-bahan
                alami dan teknologi terkini, kami menawarkan solusi kecantikan yang efektif dan aman.</p>
            <div class="flex justify-center">
                <button id="shop-button"
                        class="inline-flex items-center bg-orange-500 border-0 py-1 px-3 focus:outline-none hover:bg-orange-400 rounded text-base text-amber-50 mt-4 md:mt-0">
                    Belanja Disini
                </button>
            </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
            <img class="object-cover object-center rounded" alt="hero" src="{{asset('images/hero1.svg')}}">
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/gh/mattboldt/typed.js@2.0.11/lib/typed.min.js"></script>
<script>
    let i = 0;
    let txt = 'Merawat Diri dengan Alami dan Elegan';
    let speed = 150;

    function typeWriter() {
        if (i < txt.length) {
            document.getElementById("title-font").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }

    typeWriter();
</script>
<script>
    document.getElementById('shop-button').addEventListener('click', function () {
        @if(!Auth::check())
        let notification = document.getElementById('notification');
        notification.classList.remove('hidden');
        setTimeout(function () {
            notification.classList.add('hidden');
        }, 2000);
        @else
        window.location.href = "{{route('home')}}";
        @endif
    });
</script>
