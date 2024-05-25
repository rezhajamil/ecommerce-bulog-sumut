<x-layouts.app>
    <div class="flex min-h-screen justify-center p-8">
        <div class="card h-fit w-1/2 bg-base-100 shadow-xl">
            <form class="card-body" method="POST" action="{{ route('user.order.store') }}">
                @csrf
                <input type="hidden" name="product" value="{{ $product->id }}">
                <h2 class="card-title">Checkout Pesanan</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="overflow-hidden rounded">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="">
                    </div>
                    <div class="flex flex-col">
                        <span class="mb-4 text-lg font-bold">{{ $product->name }}</span>
                        <div class="badge badge-primary mb-2 text-sm text-base-100">{{ $product->category->name }}</div>
                        <div class="badge badge-secondary mb-2 text-sm text-base-100">
                            {{ ucwords(strtolower($product->warehouse->name)) }}
                        </div>
                        <div class="">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
                <div class="my-4 grid grid-cols-3 gap-4">
                    <input type="text" placeholder="Nama Penerima" name="name" value="{{ auth()->user()->name }}"
                        class="input input-bordered w-full max-w-xs" required />
                    <input type="number" placeholder="Telepon" name="phone" value="{{ auth()->user()->phone }}"
                        class="input input-bordered w-full max-w-xs" required />
                    <input type="text" placeholder="Provinsi" name="province" value="{{ auth()->user()->province }}"
                        class="input input-bordered w-full max-w-xs" required />
                    <input type="text" placeholder="Kota" name="city" value="{{ auth()->user()->city }}"
                        class="input input-bordered w-full max-w-xs" required />
                    <input type="text" placeholder="Alamat Lengkap" name="address"
                        value="{{ auth()->user()->address }}" class="input input-bordered w-full max-w-xs" required />
                    <input type="number" placeholder="Kode Pos" name="zip_code" value="{{ auth()->user()->zip_code }}"
                        class="input input-bordered w-full max-w-xs" required />
                </div>
                <div class="card-actions mt-4 items-end justify-between">
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold text-primary">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                            <span class="text-sm font-normal text-gray-400">/ {{ $product->unit->name }}</span>
                        </h3>
                        <span class="text-xs text-gray-400">Stok : {{ $product->stock }}</span>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="join">
                            <button type="button" class="btn btn-outline join-item btn-sm hover:bg-primary"
                                id="counter-minus">
                                <i class="fa-solid fa-minus text-secondary hover:text-base-100"></i>
                            </button>
                            <input type="number" id="counter" class="h-8 w-16 text-center text-neutral"
                                value="1" name="quantity" max="{{ $product->stock }}">
                            <button type="button" class="btn btn-outline join-item btn-sm hover:bg-primary"
                                id="counter-plus">
                                <i class="fa-solid fa-plus text-secondary hover:text-base-100"></i>
                            </button>
                        </div>
                        <p class="font-semibold text-gray-400">Total : Rp <span class="text-primary" id="total"
                                total="{{ $product->price }}">{{ number_format($product->price, 0, ',', '.') }}</span>
                        </p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4 text-base-100"><svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path
                            d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>
                    Buy Now
                </button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#counter-minus").click(function() {
                    let counter = $("#counter");
                    let currentValue = parseInt(counter.val());
                    if (currentValue > 1) {
                        counter.val(currentValue - 1);
                    }

                    formatTotal()
                });

                $("#counter-plus").click(function() {
                    let counter = $("#counter");
                    let maxValue = parseInt(counter.attr('max'));
                    let currentValue = parseInt(counter.val());
                    if (currentValue < maxValue) {
                        counter.val(currentValue + 1);
                    }

                    formatTotal()
                });

                $("#counter").change(function() {
                    let counter = $(this);
                    let maxValue = parseInt(counter.attr('max'));
                    let currentValue = parseInt(counter.val());

                    if (currentValue > maxValue) {
                        counter.val(maxValue);
                    } else if (currentValue < 1 || isNaN(currentValue)) {
                        counter.val(1);
                    }

                    formatTotal()
                });

                function formatTotal() {
                    let total = $("#total")
                    let counter = $("#counter")
                    let price = {{ $product->price }}
                    console.log(total.attr('total'))
                    // console.log('price', price)
                    total.attr('total', counter.val() * price)
                    total.html(total.attr('total').toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
                }
            });
        </script>
    @endpush
</x-layouts.app>
