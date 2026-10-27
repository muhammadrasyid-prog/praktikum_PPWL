@extends('layouts.app')

@section('title', 'Riwayat Pendidikan | Portfolio')

@section('content')
	<section class="mx-auto max-w-6xl px-6 py-10 lg:px-8">
		<div class="max-w-2xl border-l-2 border-blue-600 pl-6">
			<h1 class="text-4xl font-bold tracking-tight text-slate-950">Riwayat Pendidikan</h1>
			<ul class="mt-6 list-disc space-y-5 pl-5 text-slate-600">
				<li class="pl-2">
					<h2 class="text-xl font-semibold text-slate-950">SMK Negeri 2 Depok SLeman</h2>
					<p class="mt-1 text-base leading-7">Mempelajari dasar-dasar keahlian dan mempersiapkan diri untuk melanjutkan pendidikan di bidang teknologi.</p>
				</li>
				<li class="pl-2">
					<h2 class="text-xl font-semibold text-slate-950">D4 Teknologi Rekayasa Perangkat Lunak</h2>
					<p class="mt-1 text-base leading-7">Sekolah Vokasi UGM, dengan fokus pada pengembangan web, pemrograman, database, dan pembuatan aplikasi.</p>
				</li>
			</ul>
		</div>
	</section>
@endsection