@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <a href="{{ route('dashboard.unit.index') }}" class="btn btn-outline mb-4 mt-2">
                    <i class="fa-solid fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <h4 class="align-baseline text-xl font-bold text-primary">
                    Tambah Data Satuan Produk
                </h4>

                <form class="grid grid-cols-1 gap-4 sm:grid-cols-2" action="{{ route('dashboard.unit.store') }}" method="POST"
                    class="" enctype="multipart/form-data">
                    <div
                        class="col-span-full mt-4 w-full overflow-auto rounded-md bg-white px-2 py-2 shadow sm:col-span-1 sm:mx-0 sm:px-6">
                        <div>
                            @csrf
                            <div class="mt-4 grid grid-cols-1 gap-6">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">
                                    <label class="form-control w-full" for="name">
                                        <div class="label">
                                            <span class="label-text">Nama Satuan Produk*</span>
                                        </div>
                                        <input type="text" placeholder="Nama Satuan Produk" name="name" id="name"
                                            value="{{ old('name') }}" class="input input-bordered input-secondary w-full"
                                            required />
                                        <livewire:error-input field='name' />
                                    </label>
                                    <label class="form-control col-span-full" for="description">
                                        <div class="label">
                                            <span class="label-text">Deskripsi</span>
                                        </div>
                                        <textarea name="description" id="description" class="textarea textarea-bordered textarea-secondary"
                                            placeholder="Deskripsi Produk"> {{ old('description') }}</textarea>
                                        <livewire:error-input field='description' />
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-secondary btn-block mt-6 text-base-100" type="submit">Submit</button>
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
