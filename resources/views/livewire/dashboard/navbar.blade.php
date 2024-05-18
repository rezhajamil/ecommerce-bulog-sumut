<div class="navbar bg-base-100">
    <div class="navbar-start">
        <label for="my-drawer" class="">
            <div tabindex="0" role="button" class="btn btn-circle btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </div>
            </;>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl">DASHBOARD BULOG SUMUT</a>
    </div>
    <div class="navbar-end">
        <livewire:notification />
        <div class="dropdown-end dropdown">
            <div tabindex="0" role="button" class="avatar btn btn-circle btn-ghost">
                <div class="w-10 rounded-full p-2">
                    <img alt="Profile Image" src="{{ asset('images/avatar.png') }}" class="object-contain" />
                </div>
            </div>
            <ul tabindex="0" class="menu dropdown-content menu-sm z-[1] mt-3 w-52 rounded-box bg-base-100 p-2 shadow">
                <li>
                    <a class="justify-between">
                        Profile
                    </a>
                </li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
