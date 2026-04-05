@extends('layouts.app')

@section('title', 'Tanda Terima #' . $order->id)

@section('content')
    <div class="split-layout">
        <!-- Huge thank you text left side -->
        <div class="split-left" style="background-color: var(--text-dark); color: var(--text-light); justify-content: center;">
            <span style="display: block; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.2em; color: var(--text-muted); margin-bottom: 2rem;">
                Status: Diproses
            </span>
            <h1 class="serif" style="font-size: clamp(3.5rem, 6vw, 6rem); line-height: 1.1;">
                Pesanan <br>
                <i style="color: var(--accent-primary);">Diterima.</i>
            </h1>
            <p style="font-size: 1.2rem; opacity: 0.7; margin-top: 2rem; max-width: 400px; line-height: 1.6;">
                Dapur kami sedang menyiapkan mahakarya kuliner untuk Anda. Staf kami akan segera mengantarkannya ke meja Anda.
            </p>
        </div>
        
        <!-- Elegant receipt right side -->
        <div class="split-right" style="justify-content: center; background-color: var(--bg-main);">
            <div style="max-width: 450px; width: 100%; border: 2px solid var(--border-color); padding: 3rem; background-color: #fff;">
                
                <div style="text-align: center; border-bottom: 2px solid var(--border-color); padding-bottom: 2rem; margin-bottom: 2rem;">
                    <h2 class="serif" style="font-size: 1.75rem;">Tanda Terima</h2>
                    <p style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-top: 0.5rem;">Ticket #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 3rem;">
                    <div>
                        <span style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-bottom: 0.25rem;">Pemesan</span>
                        <strong style="font-size: 1.1rem;">{{ $order->customer_name }}</strong>
                    </div>
                    <div style="text-align: right;">
                        <span style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-bottom: 0.25rem;">Meja</span>
                        <strong style="font-size: 1.5rem; color: var(--accent-primary);">{{ $order->table_number }}</strong>
                    </div>
                </div>

                <div style="margin-bottom: 2rem;">
                    <span style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem; margin-bottom: 1rem;">
                        Rincian Pesanan
                    </span>
                    
                    @foreach ($order->orderItems as $item)
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <div style="display: flex; gap: 1rem;">
                                <span style="font-weight: 600; width: 20px;">{{ $item->quantity }}</span>
                                <div>
                                    <span style="display: block; font-weight: 500;">{{ $item->menu->name }}</span>
                                    <span style="font-size: 0.85rem; color: var(--text-muted);">@ Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <span style="font-weight: 600;">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>

                <div style="border-top: 2px solid var(--border-color); padding-top: 1.5rem; margin-bottom: 3rem; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;">Total Bersih</span>
                    <strong style="font-size: 1.5rem;">Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong>
                </div>

                <button class="btn btn-solid" style="width: 100%;">Tuntaskan Tagihan</button>
                
            </div>
        </div>
    </div>
@endsection
