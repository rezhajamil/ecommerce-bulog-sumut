@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <a href="{{ route('dashboard.product.index') }}" class="btn btn-outline mb-4 mt-2">
                    <i class="fa-solid fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <h4 class="align-baseline text-xl font-bold text-primary">
                    Tambah Data Produk
                </h4>

                <form class="grid grid-cols-1 gap-4 sm:grid-cols-2" action="{{ route('dashboard.product.store') }}"
                    method="POST" class="" enctype="multipart/form-data">
                    <div
                        class="col-span-full mt-4 w-full overflow-auto rounded-md bg-white px-2 py-2 shadow sm:col-span-1 sm:mx-0 sm:px-6">
                        <div>
                            @csrf
                            <div class="mt-4 grid grid-cols-1 gap-6">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                                    <label class="form-control w-full" for="warehouse">
                                        <div class="label">
                                            <span class="label-text">Gudang</span>
                                        </div>
                                        <select class="select select-bordered select-secondary w-full" name="warehouse"
                                            id="warehouse">
                                            <option value="" selected disabled>Pilih Gudang</option>
                                            @foreach ($warehouses as $warehouse)
                                                <option value="{{ $warehouse->id }}"
                                                    {{ old('warehouse') == $warehouse->id ? 'selected' : '' }}>
                                                    {{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label class="form-control w-full" for="category">
                                        <div class="label">
                                            <span class="label-text">Kategori Produk</span>
                                        </div>
                                        <select class="select select-bordered select-secondary w-full" name="category"
                                            id="category">
                                            <option value="" selected disabled>Pilih Kategori Produk</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label class="form-control w-full" for="brand">
                                        <div class="label">
                                            <span class="label-text">Merk Produk</span>
                                        </div>
                                        <select class="select select-bordered select-secondary w-full" name="brand"
                                            id="brand">
                                            <option value="" selected disabled>Pilih Merk Produk</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label class="form-control col-span-full w-full" for="name">
                                        <div class="label">
                                            <span class="label-text">Nama Produk</span>
                                        </div>
                                        <input type="text" placeholder="Nama Produk" name="name" id="name"
                                            class="input input-bordered input-secondary w-full" />
                                    </label>
                                    <label class="form-control w-full" for="price">
                                        <div class="label">
                                            <span class="label-text">Harga (Rupiah)</span>
                                        </div>
                                        <input type="number" placeholder="Harga" name="price" id="price"
                                            class="input input-bordered input-secondary w-full" />
                                    </label>
                                    <label class="form-control w-full" for="stock">
                                        <div class="label">
                                            <span class="label-text">Stok</span>
                                        </div>
                                        <input type="number" placeholder="Stok" name="stock" id="stock"
                                            class="input input-bordered input-secondary w-full" />
                                    </label>
                                    <label class="form-control w-full" for="unit">
                                        <div class="label">
                                            <span class="label-text">Satuan Produk</span>
                                        </div>
                                        <select class="select select-bordered select-secondary w-full" name="unit"
                                            id="unit">
                                            <option value="" selected disabled>Pilih Satuan Produk</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}"
                                                    {{ old('unit') == $unit->id ? 'selected' : '' }}>
                                                    {{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label class="form-control col-span-full" for="description">
                                        <div class="label">
                                            <span class="label-text">Deskripsi</span>
                                        </div>
                                        <textarea name="description" id="description" class="textarea textarea-bordered textarea-secondary"
                                            placeholder="Deskripsi Produk"></textarea>
                                    </label>
                                    <label class="form-control col-span-full w-full">
                                        <div class="label">
                                            <span class="label-text">Gambar Produk</span>
                                        </div>
                                        <input name="images" type="file" name="images[]"
                                            class="file-input file-input-bordered file-input-secondary w-full" multiple />
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button
                                    class="bg-secondary-400 hover:bg-secondary-600 focus:bg-secondary-600 w-full rounded-md px-4 py-2 font-bold text-white focus:outline-none">Submit</button>
                            </div>

                        </div>
                    </div>
                    <div
                        class="col-span-full mt-4 w-full overflow-auto rounded-md bg-white px-6 py-4 shadow sm:col-span-1 sm:mx-0">
                        <h4 class="align-baseline text-xl font-bold text-gray-600">Gambar Produk</h4>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2" id="image-grid">
                            @error('cover')
                                <span class="block text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#images").change(function() {
                previewImages(this);
                console.log($(this).val());
                $("#choose").show()
            });
        });

        function previewImages(input) {
            var preview = $('#image-grid');
            // console.log(input.files);

            if (input.files) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var cover = Math.floor(Math.random() * 51);
                        // console.log(e.target.result);
                        // console.log(input.files);
                        preview.prepend(
                            `<label for="cover${cover}" class="relative h-56 overflow-hidden border-2 rounded">
                                <img src="${e.target.result}"/>
                                
                            </label>`
                        );
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>
@endsection
