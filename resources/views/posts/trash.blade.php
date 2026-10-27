@extends('layouts.app')

@section('title', 'Trash | Posts')

@section('content')
	<main class="mx-auto max-w-6xl px-5 py-10 sm:px-8">
		<header class="mb-8 flex flex-col gap-5 border-b border-slate-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<a href="{{ route('posts.index') }}" class="mb-4 inline-block text-sm font-medium text-slate-500 hover:text-slate-900">&larr; Kembali ke posts</a>
				<h1 class="text-3xl font-semibold tracking-tight text-slate-950">Trash</h1>
				<p class="mt-2 text-sm text-slate-500">Kelola post yang sudah dipindahkan ke trash.</p>
			</div>
			<a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center gap-2 rounded-md border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
				Lihat post aktif
			</a>
		</header>

		@if (session('success'))
			<div class="mb-6 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">
				{{ session('success') }}
			</div>
		@endif

		<section class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
			<div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
				<h2 class="text-sm font-semibold text-slate-900">Post terhapus</h2>
				<span class="text-sm text-slate-500">{{ $posts->count() }} data</span>
			</div>

			@if ($posts->count())
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-slate-200 text-left text-sm">
						<thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
							<tr>
								<th scope="col" class="px-5 py-3 font-medium">No</th>
								<th scope="col" class="px-5 py-3 font-medium">Judul</th>
								<th scope="col" class="px-5 py-3 font-medium">Dihapus</th>
								<th scope="col" class="px-5 py-3 text-right font-medium">Aksi</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-slate-100">
							@foreach ($posts as $post)
								<tr class="transition hover:bg-slate-50">
									<td class="whitespace-nowrap px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
									<td class="min-w-48 px-5 py-4 font-medium text-slate-900">{{ $post->title }}</td>
									<td class="whitespace-nowrap px-5 py-4 text-slate-500">{{ $post->deleted_at?->format('d M Y, H:i') }}</td>
									<td class="whitespace-nowrap px-5 py-4 text-right">
										<form action="{{ route('posts.restore', $post->id) }}" method="POST" class="inline-block">
											@csrf
											@method('PATCH')
											<button type="submit" class="inline-flex items-center justify-center rounded-md border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm font-medium text-emerald-700 transition hover:border-emerald-300 hover:bg-emerald-100 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 cursor-pointer">Restore</button>
										</form>
										<form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" class="ml-2 inline-block" onsubmit="return confirm('Yakin ingin menghapus post ini secara permanen?');">
											@csrf
											@method('DELETE')
											<button type="submit" class="inline-flex items-center justify-center rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm font-medium text-red-700 transition hover:border-red-300 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 cursor-pointer">Hapus permanen</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<div class="px-5 py-16 text-center">
					<div class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-xl text-slate-500">-</div>
					<h3 class="mt-4 text-sm font-semibold text-slate-900">Trash masih kosong</h3>
					<p class="mt-1 text-sm text-slate-500">Post yang dihapus akan muncul di halaman ini.</p>
				</div>
			@endif
		</section>
	</main>
@endsection
