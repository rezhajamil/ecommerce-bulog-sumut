@extends('layouts.dashboard.app')

@section('body')
    <div class="card mx-auto h-fit w-3/4 bg-base-100 shadow-xl">
        <div class="card-body">
            <a href="{{ route('dashboard.order.index') }}" class="btn btn-outline mb-4 mt-2 w-fit">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <div class="grid grid-cols-2 gap-4">
                <div class="overflow-hidden rounded">
                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}"
                        class="">
                </div>
                <div class="flex flex-col">
                    <span class="mb-4 text-lg font-bold">{{ $order->product->name }}</span>
                    <div class="badge badge-primary mb-2 text-sm text-base-100">
                        {{ date('d M Y H:i', strtotime($order->created_at)) }}</div>
                    <div class="badge badge-secondary mb-2 text-sm text-base-100">
                        {{ ucwords(strtolower($order->product->warehouse->name)) }}
                    </div>
                    <div class="badge badge-accent mb-2 text-sm text-base-100">
                        {{ $order->quantity }} {{ $order->product->unit->name }}
                    </div>
                    <p class="mt-4 font-semibold text-gray-400">Total : <span class="text-primary" id="total"
                            total="{{ $order->product->price }}">Rp
                            {{ number_format($order->product->price * $order->quantity, 0, ',', '.') }}</span>
                    </p>
                </div>
            </div>
            <div class="my-4 gap-4">
                <table class="w-full border-collapse overflow-hidden rounded text-left">
                    <thead class="">
                        <tr class="bg-primary text-base-100">
                            <th colspan="2" class="p-1 text-center">INFO PENERIMA</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="text-center">
                            <td class="border-b border-b-white bg-accent p-1 font-semibold text-base-100">Nama</td>
                            <td class="border-b border-r p-1">{{ $order->receiver_name }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-b border-b-white bg-accent p-1 font-semibold text-base-100">Telepon</td>
                            <td class="border-b border-r p-1">{{ $order->receiver_phone }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-b border-b-white bg-accent p-1 font-semibold text-base-100">Provinsi</td>
                            <td class="border-b border-r p-1">{{ $order->receiver_province }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-b border-b-white bg-accent p-1 font-semibold text-base-100">Kota</td>
                            <td class="border-b border-r p-1">{{ $order->receiver_city }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-b border-b-white bg-accent p-1 font-semibold text-base-100">Alamat</td>
                            <td class="border-b border-r p-1">{{ $order->receiver_address }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-b border-b-white bg-accent p-1 font-semibold text-base-100">Kode Pos</td>
                            <td class="border-b border-r p-1">{{ $order->receiver_zip_code }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form method="GET" action="{{ route('dashboard.order.update_status', $order->id) }}"
                class="card-actions mt-4">
                <div class="label cursor-pointer">
                    <label for="status-1"
                        class="has-[:checked]:bg-gray-500 has-[:checked]:font-semibold has-[:checked]:text-white flex cursor-pointer items-center justify-center rounded-full border border-gray-200 bg-gray-100/50 px-3 py-1 text-gray-400">
                        <span class="status whitespace-nowrap text-sm">
                            Menunggu Konfirmasi
                        </span>
                        <input type="radio" id="status-1" name="status" value="Menunggu Konfirmasi" class="hidden"
                            {{ $order->status == 'Menunggu Konfirmasi' ? 'checked' : '' }} />
                    </label>
                </div>
                <div class="label cursor-pointer">
                    <label for="status-2"
                        class="has-[:checked]:bg-yellow-500 has-[:checked]:font-semibold has-[:checked]:text-white flex cursor-pointer items-center justify-center rounded-full border border-yellow-200 bg-yellow-100/50 px-3 py-1 text-yellow-400">
                        <span class="status whitespace-nowrap text-sm">
                            Sedang Disiapkan
                        </span>
                        <input type="radio" id="status-2" name="status" value="Sedang Disiapkan" class="hidden"
                            {{ $order->status == 'Sedang Disiapkan' ? 'checked' : '' }} />
                    </label>
                </div>
                <div class="label cursor-pointer">
                    <label for="status-3"
                        class="has-[:checked]:bg-sky-500 has-[:checked]:font-semibold has-[:checked]:text-white flex cursor-pointer items-center justify-center rounded-full border border-sky-200 bg-sky-100/50 px-3 py-1 text-sky-400">
                        <span class="status whitespace-nowrap text-sm">
                            Sedang Dikirim
                        </span>
                        <input type="radio" id="status-3" name="status" value="Sedang Dikirim" class="hidden"
                            {{ $order->status == 'Sedang Dikirim' ? 'checked' : '' }} />
                    </label>
                </div>
                <div class="label cursor-pointer">
                    <label for="status-4"
                        class="has-[:checked]:bg-red-500 has-[:checked]:font-semibold has-[:checked]:text-white flex cursor-pointer items-center justify-center rounded-full border border-red-200 bg-red-100/50 px-3 py-1 text-red-400">
                        <span class="status whitespace-nowrap text-sm">
                            Dibatalkan
                        </span>
                        <input type="radio" id="status-4" name="status" value="Dibatalkan" class="hidden"
                            {{ $order->status == 'Dibatalkan' ? 'checked' : '' }} />
                    </label>
                </div>
                <div class="label cursor-pointer">
                    <label for="status-5"
                        class="has-[:checked]:bg-green-500 has-[:checked]:font-semibold has-[:checked]:text-white flex cursor-pointer items-center justify-center rounded-full border border-green-200 bg-green-100/50 px-3 py-1 text-green-400">
                        <span class="status whitespace-nowrap text-sm">
                            Selesai
                        </span>
                        <input type="radio" id="status-5" name="status" value="Selesai" class="hidden"
                            {{ $order->status == 'Selesai' ? 'checked' : '' }} />
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-4 w-full text-base-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                            clip-rule="evenodd" />
                    </svg>
                    Ubah Status
                </button>
        </div>
    </div>
    </div>
    </div>
@endsection
