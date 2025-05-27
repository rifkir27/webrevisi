<!-- component -->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="bg-blue-900 absolute top-0 left-0 bg-gradient-to-b from-blue-900 via-blue-800 to-blue-600 bottom-0 leading-5 h-full w-full overflow-hidden">
</div>
<div class="relative min-h-screen sm:flex sm:flex-row justify-center bg-transparent rounded-3xl shadow-xl">
    <div class="flex-col flex vertical-align: top lg:px-20 sm:max-w-4xl xl:max-w-md z-10">
        <div class="self-start hidden lg:flex flex-col text-white">
            <h1 class="my-10 text-sm font-semibold text-8xl">Selamat datang</h1>
            <p class="pr-5 text-sm opacity-80">Mari Belajar dengan Semangat!!</p>
            <p class="pr-10 text-sm opacity-80">Jadilah Versi Terbaik dari Dirimu! Pantau Nilai, Jadwal, dan Tugas di Sini</p>
            <div class="mt-5">
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>
<svg class="absolute bottom-0 left-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
<style>
    .welcome-text {
        animation: fadeIn 1s ease-out;
    }
    
    .login-button {
        animation: pulse 2s infinite;
    }
    
    .wave-animation {
        animation: wave 10s linear infinite;
    }
    
    @keyframes wave {
        0% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(50px);
        }
        100% {
            transform: translateX(0);
        }
    }
</style>