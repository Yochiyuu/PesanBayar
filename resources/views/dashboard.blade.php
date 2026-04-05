@extends('layouts.app')

@section('title', 'Dasbor Utama - CerdasResto')

@section('content')
    <div class="max-w-7xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-4 hover:border-slate-300 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium mb-1">Total Pendapatan</p>
                    <p class="text-xl font-bold text-slate-900">Rp 12.500.000</p>
                    <p class="text-xs text-green-600 font-medium mt-1">↑ 12.5% vs Kemarin</p>
                </div>
            </div>
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-4 hover:border-slate-300 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium mb-1">Total Pesanan</p>
                    <p class="text-xl font-bold text-slate-900">156</p>
                    <p class="text-xs text-red-600 font-medium mt-1">↓ 3.2% vs Kemarin</p>
                </div>
            </div>
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-4 hover:border-slate-300 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium mb-1">Pelanggan Baru</p>
                    <p class="text-xl font-bold text-slate-900">48</p>
                    <p class="text-xs text-green-600 font-medium mt-1">↑ 22.1% vs Kemarin</p>
                </div>
            </div>
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-4 hover:border-slate-300 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium mb-1">Meja Aktif</p>
                    <p class="text-xl font-bold text-slate-900">12/20</p>
                    <p class="text-xs text-slate-400 font-medium mt-1">Stabil vs Kemarin</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
            <div class="xl:col-span-2 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-slate-900">Laporan Pendapatan (7 Hari Terakhir)</h3>
                    <select class="text-sm border border-slate-200 rounded-lg px-3 py-1.5 bg-white outline-none">
                        <option>Harian</option>
                        <option>Mingguan</option>
                        <option>Bulanan</option>
                    </select>
                </div>
                <div
                    class="h-64 w-full bg-slate-50 rounded-lg flex items-center justify-center border border-dashed border-slate-200 text-slate-400 text-sm">
                    [Area Grafik Pendapatan]
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="font-semibold text-slate-900 mb-6">Analisis Tipe Pesanan</h3>
                <div
                    class="h-64 w-full bg-slate-50 rounded-lg flex items-center justify-center border border-dashed border-slate-200 text-slate-400 text-sm">
                    [Area Grafik Doughnut]
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-semibold text-slate-900">Aktivitas Pesanan Terbaru</h3>
                <button class="text-sm font-medium text-teal-600 hover:text-teal-700 transition-colors">Lihat Semua</button>
            </div>
            <div class="w-full overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-slate-500 border-b border-slate-100">
                            <th class="p-4 font-medium">ID Pesanan</th>
                            <th class="p-4 font-medium">Pelanggan</th>
                            <th class="p-4 font-medium">Tipe</th>
                            <th class="p-4 font-medium">Waktu</th>
                            <th class="p-4 font-medium">Status</th>
                            <th class="p-4 font-medium text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-800">
                        <tr class="border-b border-slate-100 hover:bg-slate-50">
                            <td class="p-4 font-medium">ORD-10023</td>
                            <td class="p-4">Dita Amelia</td>
                            <td class="p-4">Dine-In (M-04)</td>
                            <td class="p-4">15 Menit yang lalu</td>
                            <td class="p-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">Diproses</span>
                            </td>
                            <td class="p-4 text-right font-medium">Rp 125.000</td>
                        </tr>
                        <tr class="border-b border-slate-100 hover:bg-slate-50">
                            <td class="p-4 font-medium">ORD-10022</td>
                            <td class="p-4">Andi Prasetyo</td>
                            <td class="p-4">Takeaway</td>
                            <td class="p-4">30 Menit yang lalu</td>
                            <td class="p-4">
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Selesai</span>
                            </td>
                            <td class="p-4 text-right font-medium">Rp 88.000</td>
                        </tr>
                        <tr class="border-b border-slate-100 hover:bg-slate-50">
                            <td class="p-4 font-medium">ORD-10021</td>
                            <td class="p-4">Irfan Hakim</td>
                            <td class="p-4">Online (GoFood)</td>
                            <td class="p-4">1 Jam yang lalu</td>
                            <td class="p-4">
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium px-3 py-1 rounded-full">Dibatalkan</span>
                            </td>
                            <td class="p-4 text-right font-medium">Rp 210.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
