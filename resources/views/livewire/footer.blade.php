<footer class="footer items-center justify-between bg-accent p-4 text-neutral-content">
    <aside class="grid-flow-col items-center">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">
            <img src="{{ asset('images/logo-text-white.png') }}" alt="Logo Perum Bulog" class="h-full">
        </a>
        <p class="text-base-100">Copyright © {{ date('Y') }} - All right reserved</p>
    </aside>
    <aside class="grid-flow-col items-center gap-3 pr-8">
        <span class="text-lg font-semibold text-base-100">Contact Us :</span>
        <a target="_blank" href="https://www.instagram.com/bulog_medan"
            class="text-xl text-base-100 transition-all hover:text-secondary"><i class="fa-brands fa-instagram"></i></a>
        <a target="_blank" href="https://wa.me/6285399145364"
            class="text-xl text-base-100 transition-all hover:text-secondary"><i class="fa-brands fa-whatsapp"></i></a>
    </aside>
</footer>
