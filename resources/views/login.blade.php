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

    <title>{{ $title ?? 'LOGIN | PERUM BULOG SUMUT' }}</title>

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

<body class="m-0 font-sans text-base antialiased font-normal bg-white leading-default text-start text-slate-500">
    <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">
        </div>
    </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap px-6">
                        <div
                            class="container flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-7/12 lg:mx-0 lg:w-5/12 xl:w-4/12">
                            <div class="relative flex flex-col min-w-0 break-words border shadow lg:py4 rounded-2xl">
                                <div class="p-6 pb-0 mb-0">
                                    <div class="flex justify-between mb-2">
                                        <h4 class="font-bold">Sign In</h4>
                                        <a href="{{ route('home') }}" class="underline text-secondary">Back to Home</a>
                                    </div>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form role="form" action="{{ route('user.login.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email" name="email"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('email')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Password" name="password"
                                                class="focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        <div class="form-control">
                                            <label class="justify-start gap-2 cursor-pointer label">
                                                <input type="checkbox"
                                                    class="checked:bg-primary hover:bg-primary focus:bg-primary"
                                                    name="remember" checked />
                                                <span class="label-text">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="active:opacity-85 hover:shadow-xs tracking-tight-rem bg-150 bg-x-25 mb-0 mt-6 inline-block w-full cursor-pointer rounded-lg border-0 bg-primary px-16 py-3.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 px-1 pt-0 text-center sm:px-6">
                                    <p class="mx-auto mb-6 text-sm leading-normal">Don't have an account? <a
                                            href="{{ route('user.register.create') }}"
                                            class="font-semibold text-transparent bg-gradient-to-tl from-primary to-secondary bg-clip-text">Sign
                                            up</a>
                                    </p>
                                    <a href="{{ route('user.forgot_password.create') }}"
                                        class="text-sm underline cursor-pointer text-secondary">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-1 pr-0 my-auto text-center flex-0 lg:flex">
                            <div class="relative flex flex-col justify-center h-full px-24 m-4 overflow-hidden bg-cover rounded-xl"
                                style="background-image: url('{{ asset('images/login.jpeg') }}')">
                                <span
                                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-primary to-secondary opacity-90"></span>
                                <h4 class="z-20 mt-12 mb-4 text-3xl font-bold text-center text-white whitespace-nowrap">
                                    PERUM BULOG
                                    SUMUT</h4>
                                <p class="z-20 text-center text-white whitespace-nowrap">Bersama mewujudkan kedaulatan
                                    pangan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
