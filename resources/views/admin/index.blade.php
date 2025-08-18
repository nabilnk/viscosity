@extends('layouts.admin')

@section('content')
    {{-- Page title --}}
    <div class="mb-6 flex items-center justify-between gap-3">
        <div>
            <h1 class="text-xl sm:text-2xl font-semibold">Dashboard</h1>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Ringkasan aktivitas terbaru</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.events.create') ?? '#' }}"
               class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                + New Event
            </a>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        @php
            $stats = [
                ['label'=>'Customers','value'=>'3,782','delta'=>'+11.0%'],
                ['label'=>'Orders','value'=>'5,359','delta'=>'-9.0%'],
                ['label'=>'Revenue','value'=>'$20K','delta'=>'+4.3%'],
                ['label'=>'Active Events','value'=>'12','delta'=>'+2'],
            ];
        @endphp

        @foreach ($stats as $s)
            <div class="rounded-2xl border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                <div class="flex items-start justify-between">
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $s['label'] }}</p>
                    <span class="text-xs rounded-full px-2 py-0.5
                         {{ str_starts_with($s['delta'],'-') ? 'bg-red-100 text-red-600 dark:bg-red-900/20' : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/20' }}">
                        {{ $s['delta'] }}
                    </span>
                </div>
                <p class="mt-2 text-2xl font-semibold">{{ $s['value'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Charts row --}}
    <div class="mt-6 grid grid-cols-1 xl:grid-cols-3 gap-4">
        {{-- Monthly Sales (simple bars) --}}
        <div class="xl:col-span-2 rounded-2xl border border-slate-200 bg-white p-5
                    dark:border-slate-700 dark:bg-slate-800">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold">Monthly Sales</h3>
                <span class="text-xs text-slate-500 dark:text-slate-400">Jan → Dec</span>
            </div>

            {{-- Simple CSS bars (no lib) --}}
            @php $values = [120,360,180,300,210,260,100,230,320,250,90,140]; $max = 400; @endphp
            <div class="mt-6 h-56 flex items-end gap-2">
                @foreach($values as $v)
                    <div class="flex-1 rounded-t-md bg-indigo-500/70 dark:bg-indigo-400/80"
                         style="height: {{ max(4, intval($v / $max * 100)) }}%">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Monthly Target (progress ring) --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5
                    dark:border-slate-700 dark:bg-slate-800">
            <h3 class="font-semibold">Monthly Target</h3>
            <div class="mt-4 grid place-items-center">
                @php $pct = 75.55; @endphp
                <div class="relative h-44 w-44">
                    <svg class="h-44 w-44 -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="40" stroke="currentColor"
                                class="text-slate-300 dark:text-slate-600" stroke-width="12" fill="none"/>
                        <circle cx="50" cy="50" r="40" stroke="currentColor"
                                class="text-indigo-500" stroke-width="12" fill="none"
                                stroke-linecap="round"
                                stroke-dasharray="251.2"
                                stroke-dashoffset="{{ 251.2 - (251.2 * $pct / 100) }}"/>
                    </svg>
                    <div class="absolute inset-0 grid place-items-center text-center">
                        <div class="text-2xl font-bold">{{ number_format($pct, 2) }}%</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">of target</div>
                    </div>
                </div>
                <p class="mt-3 text-sm text-center text-slate-500 dark:text-slate-400">
                    Keep up your good work!
                </p>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-5
                dark:border-slate-700 dark:bg-slate-800">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold">Recent Orders</h3>
            <a href="{{ route('admin.events.index') }}"
               class="text-sm text-indigo-600 hover:text-indigo-500 font-medium">View all</a>
        </div>

        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="text-left text-slate-500 dark:text-slate-400">
                    <tr class="border-b border-slate-200 dark:border-slate-700">
                        <th class="py-3 pe-4">Order #</th>
                        <th class="py-3 pe-4">Customer</th>
                        <th class="py-3 pe-4">Event</th>
                        <th class="py-3 pe-4">Total</th>
                        <th class="py-3 pe-4">Status</th>
                        <th class="py-3 pe-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @foreach(range(1,6) as $i)
                        <tr>
                            <td class="py-3 pe-4 font-medium">#INV-10{{ $i }}</td>
                            <td class="py-3 pe-4">User {{ $i }}</td>
                            <td class="py-3 pe-4">Event {{ ['A','B','C','D','E','F'][$i-1] }}</td>
                            <td class="py-3 pe-4">$ {{ number_format(80 + $i*12) }}</td>
                            <td class="py-3 pe-4">
                                <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs
                                    {{ $i%3===0 ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/20' :
                                       ($i%2===0 ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/20' :
                                                   'bg-sky-100 text-sky-700 dark:bg-sky-900/20') }}">
                                    {{ $i%3===0 ? 'Pending' : ($i%2===0 ? 'Paid' : 'Processing') }}
                                </span>
                            </td>
                            <td class="py-3 pe-4 text-right">
                                <a href="#" class="rounded-lg px-3 py-1.5 text-xs font-semibold bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
