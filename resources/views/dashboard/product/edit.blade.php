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
                    Edit Data Produk
                </h4>

                <form class="grid grid-cols-1 gap-4 sm:grid-cols-2"
                    action="{{ route('dashboard.product.update', $product->id) }}" method="POST" class=""
                    enctype="multipart/form-data">
                    <div
                        class="col-span-full mt-4 w-full overflow-auto rounded-md bg-white px-2 py-2 shadow sm:col-span-1 sm:mx-0 sm:px-6">
                        <div>
                            @csrf
                            @method('put')
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
                                                    {{ old('warehouse', $product->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                                    {{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                        <livwire:error-notif field='warehouse' />
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
                                                    {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <livwire:error-notif field='category' />
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
                                                    {{ old('brand', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        <livwire:error-notif field='brand' />
                                    </label>
                                    <label class="form-control col-span-full w-full" for="name">
                                        <div class="label">
                                            <span class="label-text">Nama Produk</span>
                                        </div>
                                        <input type="text" placeholder="Nama Produk" name="name" id="name"
                                            value="{{ old('name', $product->name) }}"
                                            class="input input-bordered input-secondary w-full" />
                                        <livwire:error-notif field='name' />
                                    </label>
                                    <label class="form-control w-full" for="price">
                                        <div class="label">
                                            <span class="label-text">Harga (Rupiah)</span>
                                        </div>
                                        <input type="number" placeholder="0" name="price" id="price"
                                            value="{{ old('price', $product->price) }}"
                                            class="input input-bordered input-secondary w-full" />
                                        <livwire:error-notif field='price' />
                                    </label>
                                    <label class="form-control w-full" for="stock">
                                        <div class="label">
                                            <span class="label-text">Stok</span>
                                        </div>
                                        <input type="number" placeholder="0" name="stock" id="stock"
                                            value="{{ old('stock', $product->stock) }}"
                                            class="input input-bordered input-secondary w-full" />
                                        <livwire:error-notif field='stock' />
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
                                                    {{ old('unit', $product->unit_id) == $unit->id ? 'selected' : '' }}>
                                                    {{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                        <livwire:error-notif field='unit' />
                                    </label>
                                    <label class="form-control col-span-full" for="description">
                                        <div class="label">
                                            <span class="label-text">Deskripsi</span>
                                        </div>
                                        <textarea name="description" id="description" class="textarea textarea-bordered textarea-secondary"
                                            placeholder="Deskripsi Produk">{!! old('description', $product->description) !!}</textarea>
                                        <livwire:error-notif field='description' />
                                    </label>
                                    <label class="form-control col-span-full w-full">
                                        <div class="label">
                                            <span class="label-text">Gambar Produk (max:4mb)</span>
                                        </div>
                                        <input id="image" type="file" name="image"
                                            class="file-input file-input-bordered file-input-secondary w-full" />
                                        <livwire:error-notif field='image' />
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-block mt-6 text-base-100" type="submit">Submit</button>
                        </div>
                    </div>
                    <div
                        class="col-span-full mt-4 w-full overflow-auto rounded-md bg-white px-6 py-4 shadow sm:col-span-1 sm:mx-0">
                        <h4 class="align-baseline text-xl font-bold text-primary">Gambar Produk</h4>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-1" id="image-grid">
                            <label for="cover${cover}" class="relative h-full overflow-hidden rounded border-2">
                                <img src="{{ asset('storage/' . $product->image) }}" />
                            </label>`
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
            $("#image").change(function() {
                previewImages(this);
                $("#choose").show()
            });
        });

        function previewImages(input) {
            var preview = $('#image-grid');
            preview.html('')
            // console.log(input.files);

            if (input.files) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var cover = Math.floor(Math.random() * 51);
                        preview.prepend(
                            `<label for="cover${cover}" class="relative h-full overflow-hidden border-2 rounded">
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
