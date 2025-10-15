<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'App')</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-900">
	<nav class="bg-white shadow">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-between h-16 items-center">
				<div class="text-lg font-semibold">My App</div>
				<div>
					<!-- ...existing code... -->
				</div>
			</div>
		</div>
	</nav>

	<main class="py-8">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			@yield('content')
		</div>
	</main>

	<!-- ...existing code... -->
</body>
</html>