<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    {{-- <link rel="canonical" href="{{ $page->getUrl() }}"> --}}

    <meta name="description" content="PERUM BULOG SUMUT">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'REGISTER | PERUM BULOG SUMUT' }}</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
    {{-- <link rel="icon" href="{{ asset('images/mosque.svg') }}"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/trix.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/b2ba1193ce.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body class="leading-default m-0 bg-white text-start font-sans text-base font-normal text-slate-500 antialiased">
    <div class="z-sticky container sticky top-0">
        <div class="-mx-3 flex flex-wrap">
        </div>
    </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex min-h-screen items-center overflow-hidden bg-cover bg-center p-0">
                <div class="z-1 container">
                    <div class="flex flex-wrap justify-end px-6">
                        <div
                            class="flex-0 absolute left-0 top-0 my-auto hidden h-full w-6/12 max-w-full flex-col justify-center px-1 pr-0 text-center lg:flex">
                            <div class="relative m-4 flex h-full flex-col justify-center overflow-hidden rounded-xl bg-cover bg-center px-24"
                                style="background-image: url('{{ asset('images/register.jpeg') }}')">
                                <span
                                    class="absolute left-0 top-0 h-full w-full bg-gradient-to-tl from-primary to-secondary bg-cover bg-center opacity-90"></span>
                                <h4 class="z-20 mb-4 mt-12 whitespace-nowrap text-center text-3xl font-bold text-white">
                                    PERUM BULOG
                                    SUMUT</h4>
                                <p class="z-20 whitespace-nowrap text-center text-white">Bersama mewujudkan kedaulatan
                                    pangan</p>
                            </div>
                        </div>
                        <div
                            class="md:flex-0 container mx-auto flex w-full max-w-full shrink-0 flex-col px-3 md:w-7/12 lg:mx-0 lg:w-5/12 xl:w-4/12">
                            <div class="lg:py4 relative flex min-w-0 flex-col break-words rounded-2xl border shadow">
                                <div class="mb-0 p-6 pb-0">
                                    <div class="mb-2 flex justify-between">
                                        <h4 class="font-bold">Register</h4>
                                        <a href="{{ route('home') }}" class="text-secondary underline">Back to Home</a>
                                    </div>
                                </div>
                                <div class="flex-auto p-6">
                                    <form role="form" action="{{ route('user.register.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <input type="text" placeholder="Nama Lengkap" name="name"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('name')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email" name="email"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('email')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="number" placeholder="Nomor Telepon (081234567890)"
                                                name="phone"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('phone')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="number" placeholder="Nomor Whatsapp (081234567890)"
                                                name="whatsapp"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('whatsapp')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" placeholder="Alamat Lengkap" name="address"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('address')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Password" name="password"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('password')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Konfirmasi Password"
                                                name="password_confirmation"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('password_confirmation')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="active:opacity-85 hover:shadow-xs tracking-tight-rem bg-150 bg-x-25 mb-0 mt-6 inline-block w-full cursor-pointer rounded-lg border-0 bg-primary px-16 py-3.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px">Sign
                                                Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 px-1 pt-0 text-center sm:px-6">
                                    <p class="mx-auto mb-6 text-sm leading-normal">Sudah memiliki akun? <a
                                            href="{{ route('login') }}"
                                            class="bg-gradient-to-tl from-primary to-secondary bg-clip-text font-semibold text-transparent">Sign
                                            In</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
