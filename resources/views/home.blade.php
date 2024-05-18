<x-layouts.app>
    <div class="hero min-h-screen" style="background-image: url({{ asset('images/hero.jpeg') }});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Selamat Datang</h1>
                <p class="mb-5">Dapatkan beras dengan kualitas terbaik</p>
                <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                            clip-rule="evenodd" />
                    </svg>
                    Lihat Produk
                </button>
            </div>
        </div>
    </div>
    <section id="profile" class="overflow-hidden bg-gray-100 px-1 pb-10 pt-12 sm:px-6">
        <div class="container mx-auto">
            <div class="-mx-4 flex flex-wrap items-center justify-between gap-6">
                <div class="w-full px-2 lg:w-6/12">
                    <div class="-mx-3 flex items-center sm:-mx-4">
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="py-3 sm:py-4">
                                <img src="{{ asset('images/profile.jpg') }}" alt=""
                                    class="w-full rounded-2xl" />
                            </div>
                            <div class="py-3 sm:py-4">
                                <img src="{{ asset('images/profile-2.jpg') }}" alt=""
                                    class="w-full rounded-2xl" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="relative z-10 my-4">
                                <img src="{{ asset('images/profile-3.jpg') }}" alt=""
                                    class="w-full rounded-2xl" />
                                <span class="absolute -bottom-7 -right-7 z-[-1] text-secondary">
                                    <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.66667" cy="104" r="1.66667"
                                            transform="rotate(-90 1.66667 104)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="104" r="1.66667"
                                            transform="rotate(-90 16.3333 104)" fill="#367BFB" />
                                        <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                            fill="#367BFB" />
                                        <circle cx="45.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 45.6667 104)" fill="#367BFB" />
                                        <circle cx="60.3334" cy="104" r="1.66667"
                                            transform="rotate(-90 60.3334 104)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 88.6667 104)" fill="#367BFB" />
                                        <circle cx="117.667" cy="104" r="1.66667"
                                            transform="rotate(-90 117.667 104)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 74.6667 104)" fill="#367BFB" />
                                        <circle cx="103" cy="104" r="1.66667"
                                            transform="rotate(-90 103 104)" fill="#367BFB" />
                                        <circle cx="132" cy="104" r="1.66667"
                                            transform="rotate(-90 132 104)" fill="#367BFB" />
                                        <circle cx="1.66667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 89.3333)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 89.3333)" fill="#367BFB" />
                                        <circle cx="31" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 31 89.3333)" fill="#367BFB" />
                                        <circle cx="45.6667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 89.3333)" fill="#367BFB" />
                                        <circle cx="60.3333" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 89.3338)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 89.3338)" fill="#367BFB" />
                                        <circle cx="117.667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 117.667 89.3338)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 89.3338)" fill="#367BFB" />
                                        <circle cx="103" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 103 89.3338)" fill="#367BFB" />
                                        <circle cx="132" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 132 89.3338)" fill="#367BFB" />
                                        <circle cx="1.66667" cy="74.6673" r="1.66667"
                                            transform="rotate(-90 1.66667 74.6673)" fill="#367BFB" />
                                        <circle cx="1.66667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 31.0003)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 16.3333 74.6668)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 31.0003)" fill="#367BFB" />
                                        <circle cx="31" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 31 74.6668)" fill="#367BFB" />
                                        <circle cx="31" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 31 31.0003)" fill="#367BFB" />
                                        <circle cx="45.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 45.6667 74.6668)" fill="#367BFB" />
                                        <circle cx="45.6667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 31.0003)" fill="#367BFB" />
                                        <circle cx="60.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 60.3333 74.6668)" fill="#367BFB" />
                                        <circle cx="60.3333" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 60.3333 30.9998)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 88.6667 74.6668)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 88.6667 30.9998)" fill="#367BFB" />
                                        <circle cx="117.667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 117.667 74.6668)" fill="#367BFB" />
                                        <circle cx="117.667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 117.667 30.9998)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 74.6667 74.6668)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 74.6667 30.9998)" fill="#367BFB" />
                                        <circle cx="103" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 103 74.6668)" fill="#367BFB" />
                                        <circle cx="103" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 103 30.9998)" fill="#367BFB" />
                                        <circle cx="132" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 132 74.6668)" fill="#367BFB" />
                                        <circle cx="132" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 132 30.9998)" fill="#367BFB" />
                                        <circle cx="1.66667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 60.0003)" fill="#367BFB" />
                                        <circle cx="1.66667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 16.3333)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 60.0003)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 16.3333)" fill="#367BFB" />
                                        <circle cx="31" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 31 60.0003)" fill="#367BFB" />
                                        <circle cx="31" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 31 16.3333)" fill="#367BFB" />
                                        <circle cx="45.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 60.0003)" fill="#367BFB" />
                                        <circle cx="45.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 16.3333)" fill="#367BFB" />
                                        <circle cx="60.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 60.3333 60.0003)" fill="#367BFB" />
                                        <circle cx="60.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 60.3333 16.3333)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 88.6667 60.0003)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 88.6667 16.3333)" fill="#367BFB" />
                                        <circle cx="117.667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 117.667 60.0003)" fill="#367BFB" />
                                        <circle cx="117.667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 117.667 16.3333)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 74.6667 60.0003)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 74.6667 16.3333)" fill="#367BFB" />
                                        <circle cx="103" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 103 60.0003)" fill="#367BFB" />
                                        <circle cx="103" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 103 16.3333)" fill="#367BFB" />
                                        <circle cx="132" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 132 60.0003)" fill="#367BFB" />
                                        <circle cx="132" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 132 16.3333)" fill="#367BFB" />
                                        <circle cx="1.66667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 45.3333)" fill="#367BFB" />
                                        <circle cx="1.66667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 1.66667 1.66683)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 45.3333)" fill="#367BFB" />
                                        <circle cx="16.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 16.3333 1.66683)" fill="#367BFB" />
                                        <circle cx="31" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 31 45.3333)" fill="#367BFB" />
                                        <circle cx="31" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 31 1.66683)" fill="#367BFB" />
                                        <circle cx="45.6667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 45.3333)" fill="#367BFB" />
                                        <circle cx="45.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 45.6667 1.66683)" fill="#367BFB" />
                                        <circle cx="60.3333" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 45.3338)" fill="#367BFB" />
                                        <circle cx="60.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 60.3333 1.66683)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 45.3338)" fill="#367BFB" />
                                        <circle cx="88.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 88.6667 1.66683)" fill="#367BFB" />
                                        <circle cx="117.667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 117.667 45.3338)" fill="#367BFB" />
                                        <circle cx="117.667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 117.667 1.66683)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 45.3338)" fill="#367BFB" />
                                        <circle cx="74.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 74.6667 1.66683)" fill="#367BFB" />
                                        <circle cx="103" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 103 45.3338)" fill="#367BFB" />
                                        <circle cx="103" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 103 1.66683)" fill="#367BFB" />
                                        <circle cx="132" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 132 45.3338)" fill="#367BFB" />
                                        <circle cx="132" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 132 1.66683)" fill="#367BFB" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-2 lg:w-1/2 xl:w-5/12">
                    <div class="mt-10 lg:mt-0">
                        <h2 class="mb-8 text-3xl font-bold text-primary sm:text-4xl">
                            SEKILAS PERUM BULOG
                        </h2>
                        <p class="mb-8 text-justify text-base leading-loose text-gray-800">
                            BULOG adalah perusahaan umum milik negara yang bergerak di bidang logistik pangan. Ruang
                            lingkup bisnis perusahaan meliputi usaha logistik/pergudangan, survei dan pemberantasan
                            hama, penyediaan karung plastik, usaha angkutan, perdagangan komoditi pangan dan usaha
                            eceran. Sebagai perusahaan yang tetap mengemban tugas publik dari pemerintah, BULOG tetap
                            melakukan kegiatan menjaga Harga Dasar Pembelian untuk gabah, stabilisasi harga khususnya
                            harga pokok, menyalurkan beras untuk bantuan sosial (Bansos) dan pengelolaan stok pangan.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="produk" class="">

    </section>


</x-layouts.app>
