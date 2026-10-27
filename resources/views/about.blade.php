@extends('layouts.app')

@section('title', 'Tentang Saya | Portfolio')

@section('content')
	<section class="mx-auto grid max-w-6xl grid-cols-1 items-center gap-10 px-6 py-10 md:grid-cols-2 lg:px-8">
		<div class="max-w-xl">
			<h1 class="text-4xl font-bold tracking-tight text-slate-950">Tentang Saya</h1>
			<p class="mt-5 text-lg leading-8 text-slate-600">
				Saya adalah seorang mahasiswa Teknik Informatika yang memiliki minat besar dalam pengembangan web. Saya bersemangat untuk belajar dan mengembangkan keterampilan saya dalam membangun aplikasi web yang efisien dan menarik.
			</p>
		</div>

		<div class="w-full max-w-sm md:ml-auto">
			<img src="https://i.pinimg.com/474x/7d/1f/33/7d1f33bf35afa23b1f34ab002e3474cd.jpg"
				alt="foto profil"
				class="aspect-[3/4] w-full rounded-lg border border-slate-200 object-cover"
				loading="eager">
		</div>
	</section>
@endsection