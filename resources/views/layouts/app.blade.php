<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'Portfolio')</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-white text-slate-950">
	<header>
		@include('partials.navbar')
	</header>

	<main class="flex-1">
		@yield('content')
	</main>

	<footer>
		@include('partials.footer')
	</footer>
</body>
</html>
