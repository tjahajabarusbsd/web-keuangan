<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (!empty($title))
        <title>{{ $title ?? 'Default Title' }} | SumbarJobs</title>
    @else
        <title>@yield('title', 'Default Title') | SumbarJobs</title>
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @filamentStyles
</head>

<body class="min-h-screen bg-surface-dark transition-colors">
    <header class="bg-gray-800">
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <div class="text-2xl font-bold text-blue-600"><a href="/" wire:navigate>JobFinder</a></div>
                    <div class="flex space-x-4">
                        <a href="/" wire:navigate
                            class="text-sm/6 font-semibold text-gray-700 hover:text-blue-600">Home</a>
                        <a href="/about-us" wire:navigate
                            class="text-sm/6 font-semibold text-gray-700 hover:text-blue-600">About</a>
                        <a href="/contact-us" wire:navigate
                            class="text-sm/6 font-semibold text-gray-700 hover:text-blue-600">Contact</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="pb-11 min-h-screen">
        {{ $slot ?? '' }}
        @yield('content')
    </div>

    <footer class="bg-white py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p class="text-gray-600">&copy; 2023 JobFinder. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
