<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->mediumtext('description');
            $table->string('image')->nullable();
            $table->string('tech_stack')->nullable();
            $table->string('project_url')->nullable();
            $table->timestamps();
        });

        DB::table('projects')->insert([
            [
                'title' => 'Proyek 1',
                'description' => 'Website sederhana yang dibuat dengan tampilan bersih dan mudah digunakan.',
                'image' => 'https://images.unsplash.com/photo-1542831371-29b0f74f9713?fm=jpg&q=60&w=1200&auto=format&fit=crop',
                'tech_stack' => 'Laravel, Tailwind CSS',
                'project_url' => 'https://github.com/username/proyek-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Proyek 2',
                'description' => 'Aplikasi yang berfokus pada pengalaman pengguna dan struktur informasi yang jelas.',
                'image' => 'https://images.unsplash.com/photo-1542831371-29b0f74f9713?fm=jpg&q=60&w=1200&auto=format&fit=crop&crop=right',
                'tech_stack' => 'Laravel, Blade, Bootstrap',
                'project_url' => 'https://github.com/username/proyek-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
