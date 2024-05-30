@extends('layouts.dashboard.app')

@section('body')
    <div class="container w-full">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold align-baseline text-primary">Daftar Produk</h4>

                <div class="flex justify-between">
                    <div class="flex flex-wrap items-end gap-4 my-2">
                        <label class="flex items-center gap-2 input input-bordered input-secondary">
                            <input type="text"
                                class="border-0 outline-none input-primary grow focus-within:outline-none focus:outline-none"
                                placeholder="Search" name="search" id="search" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </label>
                        <label class="max-w-xs form-control w-fit">
                            <div class="label">
                                <span class="label-text">Berdasarkan</span>
                            </div>
                            <select class="select select-bordered select-secondary w-fit" name="search_by" id="search_by">
                                <option value="nama">Nama</option>
                                <option value="kategori">Kategori</option>
                                <option value="merk">Merk</option>
                                <option value="gudang">Gudang</option>
                                <option value="harga">Harga</option>
                            </select>
                        </label>
                        <label class="max-w-xs form-control w-fit">
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
                    <a href="{{ route('dashboard.product.create') }}" class="mt-2 mb-4 btn btn-primary text-base-100">
                        <i class="mr-2 fa-solid fa-plus"></i>
                        Data Produk Baru
                    </a>
                </div>

                <div class="mt-6 overflow-auto bg-white rounded shadow w-fit">
                    <table class="overflow-auto text-left border-collapse w-fit">
                        <thead class="border-b">
                            <tr class="bg-primary">
                                <th class="p-3 text-sm font-bold text-gray-100 uppercase">No</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Nama</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Kategori</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Merk</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Deskripsi</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Stok</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Satuan</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Harga</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Gambar</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Status</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $key => $product)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-3 font-bold text-gray-700 border-b">{{ $key + 1 }}</td>
                                    <td class="p-3 text-gray-700 nama">{{ $product->name }}</td>
                                    <td class="p-3 text-gray-700 kategori">{{ $product->category->name }}</td>
                                    <td class="p-3 text-gray-700 merk">{{ $product->brand->name }}</td>
                                    <td class="p-3 text-gray-700 deskripsi">{!! $product->description !!}</td>
                                    <td class="p-3 text-gray-700 stok">
                                        {{ number_format($product->stock, 0, ',', '.') }}
                                    </td>
                                    <td class="p-3 text-gray-700 satuan">{{ $product->unit->name }}</td>
                                    <td class="p-3 text-gray-700 harga">
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="p-3 text-gray-700 gambar">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                class="max-w-24">
                                        @endif
                                    </td>
                                    <td class="p-3 text-gray-700 status">
                                        @if ($product->status)
                                            <div class="p-3 rounded-full badge bg-success text-base-100" status='Aktif'>
                                                Aktif</div>
                                        @else
                                            <div class="p-3 rounded-full badge bg-error text-base-100"
                                                status='Tidak Aktif''>
                                                Tidak Aktif
                                            </div>
                                        @endif
                                    </td>
                                    <td class="p-3 text-gray-700">
                                        <a href="{{ route('dashboard.product.edit', $product->id) }}"
                                            class="block my-1 text-base font-semibold text-indigo-600 transition hover:text-indigo-800">Edit</a>
                                        <form action="{{ route('dashboard.product.toggle_status', $product->id) }}"
                                            method="get">
                                            @csrf
                                            <button
                                                class="block my-1 text-base font-semibold text-left transition whitespace-nowrap text-error hover:text-error">Ubah
                                                Status</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100">
                                        <p class="p-2 italic text-center">Tidak ada data produk</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#search").on("input", function() {
                find();
            });

            $("#search_by").on("input", function() {
                find();
            });

            $("#filter_status").on("input", function() {
                find();
            });

            const find = () => {
                let search = $("#search").val();
                let searchBy = $('#search_by').val();
                let filter_status = $('#filter_status').val();
                let pattern = new RegExp(search, "i");

                $(`.${searchBy}`).each(function() {
                    let label = $(this).text();
                    let status = $(this).siblings('.status').children().first().attr('status')
                    if (pattern.test(label)) {
                        if (filter_status == '') {
                            $(this).parent().show();
                        } else {
                            if (filter_status == status) {
                                $(this).parent().show();
                            } else {
                                $(this).parent().hide();
                            }
                        }
                    } else {
                        $(this).parent().hide();
                    }
                });
            }

            const filter_status = () => {
                let filter_status = $('#filter_status').val();
                $(`.status`).each(function() {
                    let label = $(this).text();
                    if (filter_status == '') {
                        $(this).parent().parent().parent().show();
                    } else {
                        if (filter_status == label) {
                            $(this).parent().parent().parent().show();
                        } else {
                            $(this).parent().parent().parent().hide();
                        }
                    }
                });

            }
        })
    </script>
@endsection
