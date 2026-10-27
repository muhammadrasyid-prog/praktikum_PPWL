<nav class="bg-blue-700" aria-label="Main navigation">
	<div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5 lg:px-8">
		<a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-white">Portfolio<span class="text-blue-200">.</span></a>
		<div class="flex items-center gap-5 text-sm font-medium text-blue-100">
			<a href="{{ route('home') }}" class="transition hover:text-white">Home</a>
			<a href="{{ route('about') }}" class="transition hover:text-white">About</a>
			<a href="{{ route('education') }}" class="transition hover:text-white">Education</a>
			<a href="{{ route('projects.index') }}" class="transition hover:text-white">Projects</a>
			<a href="{{ route('posts.index') }}" class="transition hover:text-white">Posts</a>
		</div>
	</div>
</nav>
