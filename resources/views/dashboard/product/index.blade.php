@extends('layouts.dashboard.app')

@section('body')
    <div class="container w-full">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="align-baseline text-xl font-bold text-primary">Daftar Produk</h4>

                <div class="flex justify-between">
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
                            <select class="select select-bordered select-secondary w-fit" name="search_by" id="search_by">
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
                    <a href="{{ route('dashboard.product.create') }}" class="btn btn-primary mb-4 mt-2 text-base-100">
                        <i class="fa-solid fa-plus mr-2"></i>
                        Data Produk Baru
                    </a>
                </div>

                <div class="mt-6 w-fit overflow-auto rounded bg-white shadow">
                    <table class="w-fit border-collapse overflow-auto text-left">
                        <thead class="border-b">
                            <tr class="bg-primary">
                                <th class="p-3 text-sm font-bold uppercase text-gray-100">No</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Nama</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Kategori</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Merk</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Deskripsi</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Stok</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Satuan</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Harga</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Status</th>
                                <th class="p-3 text-sm font-medium uppercase text-gray-100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $key => $product)
                                <tr class="hover:bg-gray-200">
                                    <td class="border-b p-3 font-bold text-gray-700">{{ $key + 1 }}</td>
                                    <td class="nama p-3 font-bold text-gray-700">{{ $product->name }}</td>
                                    <td class="kategori p-3 font-bold text-gray-700">{{ $product->category->name }}</td>
                                    <td class="harga p-3 font-bold text-gray-700">
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="bahan p-3 font-bold text-gray-700">{{ $product->material }}</td>
                                    <td class="deskripsi p-3 text-gray-700">{!! $product->description !!}</td>
                                    <td class="status p-3 font-bold text-gray-700">
                                        @if ($product->status)
                                            <div
                                                class="flex items-center justify-center rounded-full bg-green-200/50 px-3 py-1">
                                                <span class="status text-sm font-semibold text-green-900">Aktif</span>
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center justify-center rounded-full bg-red-200/50 px-3 py-1">
                                                <span
                                                    class="status whitespace-nowrap text-sm font-semibold text-red-900">Tidak
                                                    Aktif</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="p-3 text-gray-700">
                                        <a href="{{ route('admin.product.show', $product->id) }}"
                                            class="my-1 block text-base font-semibold text-teal-600 transition hover:text-teal-800">Lihat
                                            Detail</a>
                                        <a href="{{ route('admin.product.edit', $product->id) }}"
                                            class="my-1 block text-base font-semibold text-indigo-600 transition hover:text-indigo-800">Edit</a>
                                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="my-1 block whitespace-nowrap text-left text-base font-semibold text-red-600 transition hover:text-red-800">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100">
                                        <p class="p-2 text-center italic">Tidak ada data produk</p>
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
                filter_status();
            });

            const find = () => {
                let search = $("#search").val();
                let searchBy = $('#search_by').val();
                let pattern = new RegExp(search, "i");
                $(`.${searchBy}`).each(function() {
                    let label = $(this).text();
                    if (pattern.test(label)) {
                        $(this).parent().show();
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
