@extends('layouts.app')

@section('title', 'Proyek Saya | Portfolio')

@section('content')
	<section class="mx-auto max-w-6xl px-6 py-10 lg:px-8">
		<div class="max-w-2xl border-l-2 border-blue-600 pl-6">
			<h1 class="text-4xl font-bold tracking-tight text-slate-950">Proyek Saya</h1>
			<p class="mt-3 text-lg leading-8 text-slate-600">Beberapa proyek yang sedang saya kerjakan.</p>
		</div>

		<div class="mt-10 grid grid-cols-2 gap-6">
			<article class="overflow-hidden rounded-lg border border-slate-200 bg-white">
				<img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?fm=jpg&amp;q=60&amp;w=1200&amp;auto=format&amp;fit=crop" alt="Kode program untuk Proyek 1" class="aspect-[16/10] w-full object-cover" loading="lazy">
				<div class="p-6">
					<h2 class="text-xl font-semibold text-slate-950">Proyek 1</h2>
					<p class="mt-2 leading-7 text-slate-600">Website sederhana dengan tampilan bersih dan mudah digunakan.</p>
				</div>
			</article>

			<article class="overflow-hidden rounded-lg border border-slate-200 bg-white">
				<img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?fm=jpg&amp;q=60&amp;w=1200&amp;auto=format&amp;fit=crop" alt="Kode pemrograman untuk Proyek 2" class="aspect-[16/10] w-full object-cover" loading="lazy">
				<div class="p-6">
					<h2 class="text-xl font-semibold text-slate-950">Proyek 2</h2>
					<p class="mt-2 leading-7 text-slate-600">Aplikasi sederhana yang berfokus pada pengalaman pengguna.</p>
				</div>
			</article>
		</div>
	</section>
@endsection