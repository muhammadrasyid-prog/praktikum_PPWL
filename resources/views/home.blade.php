@extends('layouts.app')

@section('title', 'Home | Portfolio')

@section('content')
	<section class="mx-auto grid max-w-6xl gap-10 px-6 py-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center lg:px-8">
		<div>
			<p class="mb-4 text-sm font-semibold uppercase tracking-[0.18em] text-blue-700">Software Engineering Student</p>
			<h1 class="max-w-3xl text-5xl font-bold tracking-tight text-slate-950 sm:text-6xl">Muhammad Rasyid</h1>
			<p class="mt-6 max-w-xl text-lg leading-8 text-slate-600">Saya merancang dan membangun website yang cepat, jelas, dan menyenangkan digunakan.</p>
			<a href="{{ route('projects.index') }}" class="mt-8 inline-block rounded-md bg-blue-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-800">Lihat project</a>
		</div>
		<div class="w-full max-w-sm md:ml-auto">
			<img src="https://i.pinimg.com/474x/7d/1f/33/7d1f33bf35afa23b1f34ab002e3474cd.jpg"
				alt="foto profil"
				class="aspect-[3/4] w-full rounded-lg border border-slate-200 object-cover"
				loading="eager">
		</div>
	</section>
@endsection