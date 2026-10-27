@extends('layouts.app')

@section('title', $project->title . ' | Portfolio')

@section('content')
	<section class="mx-auto max-w-5xl px-6 py-16 lg:px-8">

		<a href="{{ route('projects.index') }}" class="inline-flex items-center gap-1 text-sm font-medium text-slate-500 hover:text-slate-900">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
			</svg>
			Kembali ke semua proyek
		</a>

		<div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
			<img src="{{ str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="aspect-[16/7] w-full object-cover">
		</div>

		<div class="mt-8 grid grid-cols-1 gap-10 lg:grid-cols-3">

			<div class="lg:col-span-2">
				<h1 class="text-3xl font-bold tracking-tight text-slate-950">{{ $project->title }}</h1>
				<p class="mt-4 leading-7 text-slate-600">{{ $project->description }}</p>
			</div>

			<aside class="space-y-6 rounded-xl border border-slate-200 bg-slate-50 p-6 lg:col-span-1">
				@if ($project->tech_stack)
					<div>
						<h3 class="text-xs font-semibold uppercase tracking-wide text-slate-500">Tech Stack</h3>
						<div class="mt-2 flex flex-wrap gap-2">
							@foreach (explode(',', $project->tech_stack) as $tech)
								<span class="rounded-full bg-white px-3 py-1 text-xs font-medium text-slate-700 border border-slate-200">{{ trim($tech) }}</span>
							@endforeach
						</div>
					</div>
				@endif

				<div>
					<h3 class="text-xs font-semibold uppercase tracking-wide text-slate-500">Ditambahkan</h3>
					<p class="mt-2 text-sm text-slate-700">{{ $project->created_at->translatedFormat('d F Y') }}</p>
				</div>

				@if ($project->project_url)
					<a href="{{ $project->project_url }}" target="_blank" rel="noopener"
					   class="flex w-full items-center justify-center rounded-md bg-blue-700 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-800">
						Lihat Project
					</a>
				@endif
			</aside>

		</div>
	</section>
@endsection