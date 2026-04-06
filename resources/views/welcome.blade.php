@extends('layouts.app')

@section('content')
    <section class="w-full min-h-screen bg-white flex flex-col lg:flex-row">

        <div class="w-full lg:w-1/2 flex justify-start items-center bg-white">
            <img src="{{ asset('images/test.png') }}" alt="Ilustrasi PesanBayar" class="w-full h-auto object-contain">
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 py-12 sm:px-12 lg:px-16 xl:px-24 bg-white">
            <h1
                class="text-[3rem] lg:text-[3.5rem] leading-[1.1] font-extrabold text-gray-900 mb-6 tracking-tight text-left">
                Pesan makan di meja<br>jadi lebih gampang!
            </h1>
            <p class="text-lg text-gray-800 font-medium mb-8 max-w-lg leading-relaxed text-left">
                Scan QR, pilih menu, dan bayar langsung dari HP kamu. Solusi cerdas untuk restoran modern dan
                pelanggan yang tidak suka menunggu.
            </p>
            <div class="flex items-center justify-start gap-4">
                <a href="#coba"
                    class="px-8 py-3.5 bg-orange-500 text-white font-semibold rounded-lg shadow-sm hover:bg-orange-600 transition">
                    Coba Pesan
                </a>
                <a href="{{ route('restaurant.create') }}"
                    class="px-8 py-3.5 bg-transparent border border-gray-900 text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition">
                    Daftarkan Resto
                </a>
            </div>
        </div>

    </section>
@endsection
