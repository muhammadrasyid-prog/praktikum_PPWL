@extends('layouts.app')

@section('title', 'Posts | Portfolio')

@section('content')
	<main class="mx-auto max-w-6xl px-5 py-10 sm:px-8">
		<header class="mb-8 flex flex-col gap-5 border-b border-slate-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<p class="mb-2 text-sm font-medium text-slate-500">Manajemen konten</p>
				<h1 class="text-3xl font-semibold tracking-tight text-slate-950">Posts</h1>
				<p class="mt-2 text-sm text-slate-500">Kelola tulisan yang tersimpan di aplikasi.</p>
			</div>
			<div class="flex flex-wrap gap-3">
				<a href="{{ route('posts.trash') }}" class="inline-flex items-center justify-center gap-2 rounded-md border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-medium text-red-700 transition hover:border-red-300 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M9 10.5v6m6-6v6M5.25 6.75l.75 12a1.5 1.5 0 0 0 1.5 1.5h9a1.5 1.5 0 0 0 1.5-1.5l.75-12M9.75 6.75V4.5A1.5 1.5 0 0 1 11.25 3h1.5a1.5 1.5 0 0 1 1.5 1.5v2.25" />
					</svg>
					<span>Trash</span>
				</a>
				<a href="{{ route('posts.create') }}" class="inline-flex items-center justify-center gap-2 rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
					<span class="text-lg leading-none">+</span>
					Tambah post
				</a>
			</div>
		</header>

		@if (session('success'))
			<div class="mb-6 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">
				{{ session('success') }}
			</div>
		@endif

		<section class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
			<div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
				<h2 class="text-sm font-semibold text-slate-900">Semua post</h2>
				<span class="text-sm text-slate-500">{{ $posts->count() }} data</span>
			</div>

			<div class="border-b border-slate-200 bg-slate-50/60">
				<form method="GET" action="{{ route('posts.index') }}" id="posts-filter" class="flex flex-wrap items-end gap-4 px-6 py-4">
					<div class="min-w-[220px] flex-1">
						<label for="search" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-slate-500">
							Cari judul
						</label>
						<input type="text" name="search" id="search" value="{{ $search }}" placeholder="Cari judul..." class="h-10 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:border-slate-500 focus:ring-2 focus:ring-slate-900/10">
					</div>

					<div>
						<label for="status" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-slate-500">
							Filter status
						</label>
						<select name="status" id="status" class="h-10 rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-700 outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-900/10">
							<option value="">Semua status</option>
							<option value="draft" @selected($status === 'draft')>Draft</option>
							<option value="published" @selected($status === 'published')>Published</option>
						</select>
					</div>

					<div class="flex items-center gap-2">
						<button type="submit" class="h-10 rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
							Terapkan
						</button>
						@if ($status || $search || $perPage !== 10)
							<a href="{{ route('posts.index') }}" class="text-sm text-slate-500 transition hover:text-slate-900">
								Reset
							</a>
						@endif
					</div>
				</form>
			</div>

			@if ($posts->count())
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-slate-200 text-left text-sm">
						<thead class="bg-slate-50 text-xs uppercase text-slate-500">
							<tr>
								<th scope="col" class="w-16 px-6 py-3 font-medium">No</th>
								<th scope="col" class="px-6 py-3 font-medium">Judul</th>
								<th scope="col" class="px-6 py-3 font-medium">Deskripsi</th>
								<th scope="col" class="whitespace-nowrap px-6 py-3 font-medium">Dibuat</th>
								<th scope="col" class="px-6 py-3 font-medium">Status</th>
								<th scope="col" class="w-32 px-6 py-3 text-center font-medium">Aksi</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-slate-100">
							@foreach ($posts as $post)
								<tr class="transition hover:bg-slate-50">
									<td class="whitespace-nowrap px-6 py-4 text-slate-500">{{ $posts->firstItem() + $loop->index }}</td>
									<td class="min-w-48 px-6 py-4 font-medium text-slate-900">{{ $post->title }}</td>
									<td class="max-w-md px-6 py-4 text-slate-600"><p class="line-clamp-2">{{ $post->description }}</p></td>
									<td class="whitespace-nowrap px-6 py-4 text-slate-500">{{ $post->created_at?->format('d M Y') }}</td>
									<td class="whitespace-nowrap px-6 py-4">
										<span class="rounded-full px-2.5 py-0.5 text-xs font-medium {{ $post->status === 'published' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
											{{ ucfirst($post->status) }}
										</span>
									</td>
									<td class="whitespace-nowrap px-6 py-4 text-center">
										<a href="{{ route('posts.show', $post) }}" class="font-medium text-slate-700 hover:text-slate-950">Lihat</a>
										<span class="mx-2 text-slate-300">|</span>
										<a href="{{ route('posts.edit', $post) }}" class="font-medium text-slate-700 hover:text-slate-950">Edit</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<div class="px-5 py-16 text-center">
					<div class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-xl text-slate-500">+</div>
					<h3 class="mt-4 text-sm font-semibold text-slate-900">Belum ada post</h3>
					<p class="mt-1 text-sm text-slate-500">Mulai dengan menambahkan post pertama.</p>
					<a href="{{ route('posts.create') }}" class="mt-5 inline-block text-sm font-medium text-slate-900 underline underline-offset-4 hover:text-slate-600">Tambah post</a>
				</div>
			@endif

			<div class="flex flex-wrap items-center justify-between gap-4 border-t border-slate-200 px-6 py-4">
				<span class="text-sm text-slate-600">
					Menampilkan {{ $posts->firstItem() ?? 0 }}-{{ $posts->lastItem() ?? 0 }} dari {{ $posts->total() }} data
				</span>
				<div>
					<label for="per_page" class="mr-2 text-sm text-slate-600">Tampilkan</label>
					<select name="per_page" id="per_page" onchange="this.form.submit()" form="posts-filter" class="rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-700 outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-900/10">
						@foreach ([5, 10, 25] as $n)
							<option value="{{ $n }}" @selected($perPage === $n)>{{ $n }} / halaman</option>
						@endforeach
					</select>
				</div>
			</div>
			@if ($posts->hasPages())
				<div class="px-6 py-4">
					{{ $posts->links() }}
				</div>
			@endif
		</section>
	</main>
@endsection
