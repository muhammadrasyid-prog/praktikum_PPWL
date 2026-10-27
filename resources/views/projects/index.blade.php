@extends('layouts.app')

@section('title', 'Proyek Saya | Portfolio')

@section('content')
	<section class="mx-auto max-w-6xl px-6 py-16 lg:px-8">
        <div class="flex items-center justify-between border-l-2 border-blue-600 pl-6">
            <div>
                <h1 class="text-4xl font-bold tracking-tight text-slate-950">Proyek Saya</h1>
                <p class="mt-3 text-lg text-slate-600">Beberapa proyek yang sedang saya kerjakan.</p>
            </div>

			<a href="{{ route('projects.create') }}"
			   class="rounded-md bg-blue-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-800">
				+ Tambah Proyek
			</a>
        </div>

		<div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2">
			@forelse ($projects as $project)
				<article class="group overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
					<a href="{{ route('projects.show', $project->id) }}" class="block">
						<div class="overflow-hidden">
							<img src="{{ str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
								 class="aspect-[16/10] w-full object-cover transition duration-300 group-hover:scale-105"
								 loading="lazy">
						</div>

						<div class="p-5">
							<h2 class="text-lg font-semibold text-slate-950 sm:text-xl">{{ $project->title }}</h2>
							<p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">{{ $project->description }}</p>

							@if ($project->tech_stack)
								<div class="mt-4 flex flex-wrap gap-2">
									@foreach (explode(',', $project->tech_stack) as $tech)
										<span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">{{ trim($tech) }}</span>
									@endforeach
								</div>
							@endif

							<span class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
								Lihat detail
								<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
								</svg>
							</span>
						</div>
					</a>
				</article>
			@empty
				<p class="col-span-2 text-slate-600">Belum ada data project.</p>
			@endforelse
		</div>
	</section>
@endsection