<div class="card card-compact w-96 bg-base-100 shadow-2xl">
    <figure><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
    </figure>
    <div class="card-body">
        <h2 class="card-title font-semibold">{{ $product->name }}</h2>
        <p class="mb-4">{!! $product->description ?? '<span class="text-sm italic text-gray-400">Tidak Ada Deskripsi Produk</span>' !!}</p>
        <div class="flex flex-col gap-2">
            <div class="tooltip text-left" data-tip="Merk">
                <a
                    class="badge badge-accent cursor-pointer truncate text-xs text-base-100 hover:badge-primary hover:text-base-100">{{ $product->brand->name }}</a>
            </div>
            <div class="tooltip text-left" data-tip="Gudang">
                <a
                    class="badge badge-secondary cursor-pointer truncate text-xs text-base-100 hover:badge-primary hover:text-base-100">{{ $product->warehouse->name }}</a>
            </div>
        </div>
        <div class="card-actions mt-4 items-end justify-between">
            <div class="flex flex-col gap-y-1">
                <h3 class="text-lg font-semibold text-primary">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                    <span class="text-sm font-normal text-gray-400">/ {{ $product->unit->name }}</span>
                </h3>
                <span class="text-xs text-gray-400">Stok : {{ $product->stock }}</span>
            </div>
            <a href="{{ route('user.order.create', $product->id) }}" class="btn btn-primary text-base-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                    <path
                        d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                </svg>
                Pesan
            </a>
        </div>
    </div>
</div>
