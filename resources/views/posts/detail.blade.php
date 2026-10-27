@extends('layouts.app')

@section('title', $post->title . ' | Posts')

@section('content')
	<main class="mx-auto max-w-3xl px-5 py-10 sm:px-8">
		<header class="mb-8 flex flex-col gap-4 border-b border-slate-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<a href="{{ route('posts.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-900">&larr; Kembali ke posts</a>
				<p class="mt-6 mb-2 text-sm font-medium text-slate-500">Detail post</p>
				<h1 class="text-3xl font-semibold tracking-tight text-slate-950">{{ $post->title }}</h1>
			</div>
			<div class="flex flex-wrap gap-3">
				<a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center justify-center rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">Edit post</a>

				<form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Pindahkan post ini ke Trash?');">
					@csrf
					@method('DELETE')
					<button type="submit" class="inline-flex items-center justify-center rounded-md border border-red-200 px-4 py-2.5 text-sm font-medium text-red-700 transition hover:border-red-300 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2">Hapus post</button>
				</form>
			</div>
		</header>

		<article class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm sm:p-8">
			<div class="flex flex-wrap items-center gap-x-3 gap-y-1 border-b border-slate-100 pb-5 text-sm text-slate-500">
				<span>Dibuat {{ $post->created_at?->format('d M Y, H:i') }}</span>
				<span class="text-slate-300">|</span>
				<span>Post #{{ $post->id }}</span>
			</div>

			<div class="prose prose-slate mt-6 max-w-none text-slate-700">
				<p class="whitespace-pre-line">{{ $post->description ?: 'Post ini belum memiliki deskripsi.' }}</p>
			</div>
		</article>
	</main>
@endsection
