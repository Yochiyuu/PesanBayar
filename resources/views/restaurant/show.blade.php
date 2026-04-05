@extends('layouts.app')

@section('title', $restaurant->name . ' - Buku Menu')

@section('content')
    <form action="{{ route('order.store', $restaurant->id) }}" method="POST">
        @csrf
        <div class="split-layout">
            <!-- Left Header Identity & Order Form -->
            <div class="split-left" style="justify-content: flex-start; padding-top: 6rem;">
                <span class="text-accent" style="display: block; text-transform: uppercase; letter-spacing: 0.15em; font-size: 0.85rem; font-weight: 600; margin-bottom: 1.5rem;">
                    Buku Menu Artisanal
                </span>
                <h1 class="serif" style="font-size: clamp(3.5rem, 6vw, 5rem); line-height: 1.1; margin-bottom: 2rem;">
                    {{ $restaurant->name }}
                </h1>
                <p style="font-size: 1.2rem; color: var(--text-muted); max-width: 400px; line-height: 1.6; margin-bottom: 4rem;">
                    {{ $restaurant->description }}
                </p>

                <!-- Identitas Pesanan diletakkan di sisi kiri bawah -->
                <div style="background-color: var(--bg-secondary); padding: 3rem; border: 2px solid var(--border-color);">
                    <h3 class="serif" style="font-size: 1.5rem; margin-bottom: 2rem;">Detail Meja</h3>
                    <div class="form-group">
                        <label class="form-label">Nama Pelanggan Yth.</label>
                        <input type="text" name="customer_name" required class="form-input" style="border-bottom-color: var(--border-color); background: transparent;" placeholder="Nama lengkap">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Nomor / Kode Meja</label>
                        <input type="text" name="table_number" required class="form-input" style="border-bottom-color: var(--border-color); background: transparent; font-size: 2rem;" placeholder="01">
                    </div>
                </div>
            </div>

            <!-- Right Side Menu Items (List format, not grid) -->
            <div class="split-right" style="border-left: 2px solid var(--border-color); padding-top: 6rem; padding-bottom: 8rem; justify-content: flex-start;">
                <div style="display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border-color); padding-bottom: 1.5rem; margin-bottom: 1.5rem;">
                    <span style="font-size: 0.85rem; text-transform: uppercase; font-weight: 600; letter-spacing: 0.1em;">Daftar Hidangan</span>
                    <span style="font-size: 0.85rem; text-transform: uppercase; font-weight: 600; letter-spacing: 0.1em; color: var(--text-muted);">Harga & Kuantitas</span>
                </div>

                <div class="menu-list" style="margin-bottom: 4rem;">
                    @foreach ($restaurant->menus as $menu)
                        <div class="menu-list-item">
                            <div style="padding-right: 2rem;">
                                <h3 class="serif" style="font-size: 1.75rem; color: var(--text-dark); margin-bottom: 0.5rem;">{{ $menu->name }}</h3>
                                <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.6; max-width: 450px;">
                                    {{ $menu->description }}
                                </p>
                            </div>
                            <div style="text-align: right; display: flex; flex-direction: column; align-items: flex-end;">
                                <span style="font-size: 1.25rem; font-weight: 600; display: block; margin-bottom: 1rem;">
                                    Rp{{ number_format($menu->price, 0, ',', '.') }}
                                </span>
                                <input type="hidden" name="items[{{ $loop->index }}][menu_id]" value="{{ $menu->id }}">
                                <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $menu->price }}">
                                <input type="number" name="items[{{ $loop->index }}][quantity]" value="0" min="0" class="qty-input">
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-solid" style="width: 100%; padding: 1.5rem; font-size: 1.1rem;">
                    Siapkan Pesanan Terpilih
                </button>
            </div>
        </div>
    </form>
@endsection
