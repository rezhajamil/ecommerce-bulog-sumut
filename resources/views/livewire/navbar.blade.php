<div class="navbar bg-base-100">
    <div class="flex-1">
        <a href="{{ route('home') }}" class="text-xl btn btn-ghost">
            <img src="{{ asset('images/logo-text.png') }}" alt="Logo Perum Bulog" class="h-full">
        </a>
    </div>
    @auth
        <div class="flex-none gap-x-4">
            {{-- <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-circle btn-ghost">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        @if ($notif)
                            <span class="badge indicator-item badge-sm">{{ count($notif) }}</span>
                        @endif
                    </div>
                </div>
                <div tabindex="0" class="card dropdown-content card-compact z-[1] mt-3 w-52 bg-base-100 shadow">
                    <div class="card-body">
                        <span class="text-lg font-bold">8 Items</span>
                        <span class="text-info">Subtotal: $999</span>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-block">View cart</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('dashboard.index') }}" class="py-2 btn btn-outline btn-primary btm-nav-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z"
                            clip-rule="evenodd" />
                    </svg>
                    Dashboard
                </a>
            @endif
            <div class="dropdown-end dropdown">
                <div tabindex="0" role="button" class="avatar btn btn-circle btn-ghost">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component" src="{{ asset('images/avatar.png') }}" />
                    </div>
                </div>
                <ul tabindex="0" class="menu dropdown-content menu-sm z-[1] mt-3 w-52 rounded-box bg-base-100 p-2 shadow">
                    <li>
                        <a class="justify-between">
                            Profile
                        </a>
                    </li>
                    @if (Auth::user()->role != 'admin')
                        <li><a href="{{ route('user.order.index') }}">Pesanan Saya</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    @else
        <div class="navbar-end gap-x-4">
            <a href="{{ route('login') }}" class="py-2 btn btn-primary btm-nav-sm text-base-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                        clip-rule="evenodd" />
                </svg>
                LOGIN
            </a>
            <a href="{{ route('user.register.create') }}" class="py-2 btn btn-outline btn-primary btm-nav-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                        d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                </svg>
                REGISTER
            </a>
        </div>
    @endauth
</div>
