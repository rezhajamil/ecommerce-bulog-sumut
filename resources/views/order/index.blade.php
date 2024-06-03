<x-layouts.app>
    <div class="flex min-h-screen justify-center p-8">
        <div class="container w-full">
            <div class="flex flex-col">
                <div class="mt-4">
                    <h4 class="align-baseline text-xl font-bold text-primary">Daftar Pesanan</h4>
                    <div class="flex items-end justify-between">
                        <div class="my-2 flex flex-wrap items-end gap-4">
                            <label class="input input-bordered input-secondary flex items-center gap-2">
                                <input type="text"
                                    class="input-primary grow border-0 outline-none focus-within:outline-none focus:outline-none"
                                    placeholder="Search" name="search" id="search" />
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="h-4 w-4 opacity-70">
                                    <path fill-rule="evenodd"
                                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                            <label class="form-control w-fit max-w-xs">
                                <div class="label">
                                    <span class="label-text">Berdasarkan</span>
                                </div>
                                <select class="select select-bordered select-secondary w-fit" name="search_by"
                                    id="search_by">
                                    <option value="nama">Nama</option>
                                    <option value="kategori">Kategori</option>
                                    <option value="merk">Merk</option>
                                    <option value="gudang">Gudang</option>
                                    <option value="harga">Harga</option>
                                </select>
                            </label>
                            <label class="form-control w-fit max-w-xs">
                                <div class="label">
                                    <span class="label-text">Status</span>
                                </div>
                                <select class="select select-bordered select-secondary w-fit" name="filter_status"
                                    id="filter_status">
                                    <option value="">All</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </label>
                        </div>

                        <a target="_blank" href="https://wa.me/6285399145364"
                            class="btn btn-success mb-4 mt-2 text-base-100">
                            <i class="fa-brands fa-whatsapp text-lg"></i>
                            Admin
                        </a>
                    </div>

                    <div class="mt-6 w-fit overflow-auto rounded bg-white shadow">
                        <table class="w-fit border-collapse overflow-auto text-left">
                            <thead class="border-b">
                                <tr class="bg-primary">
                                    <th class="p-3 text-sm font-bold uppercase text-gray-100">No</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Gambar</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Tanggal</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Nama</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Kategori</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Merk</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Gudang</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Qty</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Total</th>
                                    <th class="p-3 text-sm font-medium uppercase text-gray-100">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $key => $order)
                                    <tr class="hover:bg-gray-200">
                                        <td class="border border-b p-3 text-center font-bold text-gray-700">
                                            {{ $key + 1 }}</td>
                                        <td class="gambar border p-3 text-center text-gray-700">
                                            @if ($order->product->image)
                                                <img src="{{ asset('storage/' . $order->product->image) }}"
                                                    alt="{{ $order->product->name }}" class="max-w-48">
                                            @endif
                                        </td>
                                        <td class="tanggal whitespace-nowrap border p-3 text-center text-gray-700">
                                            {{ date('d M Y', strtotime($order->created_at)) }}
                                        </td>
                                        <td class="nama border p-3 text-center text-gray-700">
                                            {{ $order->product->name }}</td>
                                        <td class="kategori border p-3 text-center text-gray-700">
                                            {{ $order->product->category->name }}
                                        </td>
                                        <td class="merk whitespace-nowrap border p-3 text-center text-gray-700">
                                            {{ $order->product->brand->name }}
                                        </td>
                                        <td class="gudang border p-3 text-center text-gray-700">
                                            {{ $order->product->warehouse->name }}</td>
                                        <td class="qty whitespace-nowrap border p-3 text-center text-gray-700">
                                            {{ $order->quantity }}
                                            {{ $order->product->unit->name }}</td>
                                        <td class="total whitespace-nowrap border p-3 text-center text-gray-700">
                                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                        </td>
                                        <td class="status border p-3 text-center text-gray-700">
                                            @if ($order->status)
                                                <div
                                                    class="flex items-center justify-center rounded-full bg-yellow-200/50 px-3 py-1">
                                                    <span
                                                        class="status whitespace-nowrap text-sm font-semibold text-yellow-900">{{ $order->status }}</span>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100">
                                            <p class="p-2 text-center italic">Tidak ada data pesanan</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {});
        </script>
    @endpush
</x-layouts.app>
