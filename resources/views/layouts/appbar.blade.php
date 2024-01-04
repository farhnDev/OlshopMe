<header class="text-black-600 body-font sticky-container" id="appBar">
    <div class="container mx-auto flex flex-wrap p-5 md:flex-row justify-between w-full">
        <a href="/" class="flex title-font font-medium items-center text-gray-900 mb-1 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                <path
                    d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
            </svg>
            <span class="ml-3 text-xl">OlshopMe</span>
        </a>
        <div class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center md:block hidden" id="navbar">
            @if(Auth::check())
                <a href="{{route('home')}}" class="mr-5 hover:text-gray-900">Home</a>
                <a href="https://github.com/farhnDev" target="_blank" class="mr-5 hover:text-gray-900">About</a>
            @else
                <a class="mr-5 hover:text-gray-900" style="pointer-events: none;">Home</a>
                <a href="https://github.com/farhnDev" target="_blank" class="mr-5 hover:text-gray-900"
                   style="pointer-events: none;">About</a>
            @endif
        </div>
        <button class="md:hidden ml-auto -mt-0" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6 justify-between">
                <path x-show="!open" fill-rule="evenodd" clip-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 6a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm1 5a1 1 0 100 2h12a1 1 0 100-2H4z"></path>
                <path x-show="open" fill-rule="evenodd" clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" style="display: none;"></path>
            </svg>
        </button>
        <div x-show="open" class="md:hidden" id="mobile-menu">
            @if(Auth::check())
                <a class="block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Home</a>
                <a href="https://github.com/farhnDev" target="_blank" class="block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">About</a>
            @else
                <a class="block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800" style="pointer-events: none;">Home</a>
                <a href="https://github.com/farhnDev" target="_blank" class="block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800" style="pointer-events: none;">About</a>
            @endif
        </div>
        @if(Auth::check())
            <div x-data="{ open: false }" class="md:block hidden">
                <button @click="open = !open"
                        class="inline-flex items-center bg-orange-500 border-0 py-1 px-3 focus:outline-none hover:bg-orange-400 rounded text-base text-amber-50 mt-4 md:mt-0">
                    {{ Auth::user()->name }}<svg class="h-6 w-6 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>


                </button>
                <div x-show="open" @click.away="open = false" class="absolute mt-2 w-15 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}"
               class="inline-flex items-center bg-orange-500 border-0 py-1 px-3 focus:outline-none hover:bg-orange-400 rounded text-base text-amber-50 mt-4 md:mt-0 md:block hidden">Login
            </a>
        @endif
    </div>
</header>
<script>
    function dropdownMenu() {
        return {
            open: false,
            show() {
                if (this.open) {
                    // if dropdown is already open, then close it
                    this.open = false;
                    document.getElementsByTagName('html')[0].classList.remove('overflow-hidden');
                } else {
                    // else, open it
                    this.open = true;
                    document.getElementsByTagName('html')[0].classList.add('overflow-hidden');
                }
            },
            close() {
                this.open = false;
                document.getElementsByTagName('html')[0].classList.remove('overflow-hidden');
            },
        }
    }

</script>
