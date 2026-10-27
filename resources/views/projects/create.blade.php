@extends('layouts.app')

@section('title', 'Tambah Proyek | Portfolio')

@section('content')
	<section class="mx-auto max-w-2xl px-6 py-16 lg:px-8">
		<h1 class="text-3xl font-bold text-slate-950">Tambah Proyek Baru</h1>

		<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-5">
			@csrf

			@if ($errors->any())
				<div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
					<ul class="list-inside list-disc">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<div>
				<label for="title" class="block text-sm font-medium text-slate-700">Judul</label>
				<input type="text" name="title" id="title" value="{{ old('title') }}" maxlength="200" required class="mt-1 w-full rounded-md border border-slate-300 p-2">
			</div>

			<div>
				<label for="description" class="block text-sm font-medium text-slate-700">Deskripsi</label>
				<textarea name="description" id="description" rows="4" required class="mt-1 w-full rounded-md border border-slate-300 p-2">{{ old('description') }}</textarea>
			</div>

			<div>
				<label for="image" class="block text-sm font-medium text-slate-700">Gambar Proyek</label>
				<input type="file" name="image" id="image" accept="image/*"
					   class="mt-1 w-full rounded-md border border-slate-300 p-2 text-sm">
			</div>

			<div>
				<label for="tech_stack" class="block text-sm font-medium text-slate-700">Tech Stack <span class="font-normal text-slate-500">(opsional)</span></label>
				<input type="text" name="tech_stack" id="tech_stack" value="{{ old('tech_stack') }}" placeholder="Laravel, Tailwind CSS" class="mt-1 w-full rounded-md border border-slate-300 p-2">
			</div>

			<div>
				<label for="project_url" class="block text-sm font-medium text-slate-700">URL Project <span class="font-normal text-slate-500">(opsional)</span></label>
				<input type="url" name="project_url" id="project_url" value="{{ old('project_url') }}" placeholder="https://github.com/..." class="mt-1 w-full rounded-md border border-slate-300 p-2">
			</div>

			<button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-white">Simpan</button>
		</form>
	</section>
@endsection