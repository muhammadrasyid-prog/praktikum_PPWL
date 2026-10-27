@extends('layouts.app')

@section('title', 'Edit Post | Portfolio')

@section('content')
	<main class="mx-auto max-w-3xl px-5 py-10 sm:px-8">
		<header class="mb-8 border-b border-slate-200 pb-6">
			<a href="{{ route('posts.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-900">&larr; Kembali ke posts</a>
			<p class="mt-6 mb-2 text-sm font-medium text-slate-500">Manajemen konten</p>
			<h1 class="text-3xl font-semibold tracking-tight text-slate-950">Edit post</h1>
			<p class="mt-2 text-sm text-slate-500">Edit informasi berikut untuk mengubah post.</p>
		</header>

		<section class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm sm:p-8">
			@if ($errors->any())
				<div class="mb-6 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
					<p class="font-medium">Periksa kembali data yang diisi.</p>
					<ul class="mt-2 list-inside list-disc">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
				@csrf
				@method('PUT')

				<div>
					<label for="title" class="block text-sm font-medium text-slate-700">Judul</label>
					<input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" minlength="5" maxlength="200" required autofocus class="mt-2 block w-full rounded-md border-slate-300 px-3 py-2.5 text-sm shadow-sm outline-none ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-slate-900 @error('title') ring-red-400 @enderror" placeholder="Masukkan judul post">
					@error('title')
						<div class="mt-2 text-sm text-red-600">{{ $message }}</div>
					@enderror
				</div>

				<div>
					<label for="description" class="block text-sm font-medium text-slate-700">Deskripsi</label>
					<textarea id="description" name="description" rows="6" minlength="10" required class="mt-2 block w-full resize-y rounded-md border-slate-300 px-3 py-2.5 text-sm shadow-sm outline-none ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-slate-900 @error('description') ring-red-400 @enderror" placeholder="Tulis deskripsi post">{{ old('description', $post->description) }}</textarea>
					@error('description')
						<div class="mt-2 text-sm text-red-600">{{ $message }}</div>
					@enderror
				</div>

				<div>
					<label for="status" class="block text-sm font-medium text-slate-700">Status</label>

					<select id="status" name="status"
						class="mt-2 block w-full rounded-md border-slate-300 px-3 py-2.5 text-sm shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-slate-900">
						<option value="draft" @selected(old('status', $post->status) === 'draft')>
							Draft
						</option>
						<option value="published" @selected(old('status', $post->status) === 'published')>
							Published
						</option>
					</select>

					@error('status')
						<div class="mt-2 text-sm text-red-600">{{ $message }}</div>
					@enderror
				</div>

				<div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
					<a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center rounded-md px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">Batal</a>
					<button type="submit" class="inline-flex items-center justify-center rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">Simpan post</button>
				</div>
			</form>
		</section>
	</main>
@endsection
