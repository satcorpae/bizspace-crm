<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.7.0/build/vanilla-calendar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.7.0/build/themes/light.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.7.0/build/themes/dark.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.7.0/build/vanilla-calendar.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-50 :bg-inherit">

            {{-- BRAND --}}
            <x-app-brand  class="p-5 pt-3 ml-3"  />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                    <x-menu-separator />

                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>

                    <x-menu-separator />
                @endif

                <x-menu-item title="Dashboard" icon="m-chart-pie" link="dashboard" />
                <x-menu-sub title="Reports" icon="o-document">
                    <x-menu-item title="Ejari Tracksheet" icon="s-document-duplicate" link="ejari-tracksheet" />
                    <x-menu-item title="Sales Report Tracksheet" icon="o-clipboard-document-check" link="sr-tracksheet" />
                    <x-menu-item title="Virtual Ejari" icon="o-archive-box" link="virtual-ejari" />
                </x-menu-sub>

                 <x-menu-sub title="Finance" icon="o-banknotes">
                    <x-menu-item title="Invoice" icon="o-document-text" link="invoice" />
                    <x-menu-item title="Receipt" icon="o-receipt-percent" link="receipts" />
                    <x-menu-item title="Payment Voucher" icon="o-credit-card" link="payment-voucher" />
                    <x-menu-item title="Statement of Accounts" icon="o-building-library" link="soa" />
                </x-menu-sub>
            </x-menu>

            <img class="absolute bottom-20" src="vect-reports.png" alt="">
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
</body>
</html>
