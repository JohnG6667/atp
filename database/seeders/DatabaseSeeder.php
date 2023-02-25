<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\Fact;
use App\Models\PicturesWork;
use App\Models\Post;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('testimonials');
        Storage::disk('public')->makeDirectory('testimonials');

        Storage::disk('public')->deleteDirectory('teams');
        Storage::disk('public')->makeDirectory('teams');

        Storage::disk('public')->deleteDirectory('works');
        Storage::disk('public')->makeDirectory('works');

        Storage::disk('public')->deleteDirectory('skills');
        Storage::disk('public')->makeDirectory('skills');

        Storage::disk('public')->deleteDirectory('pictures_works');
        Storage::disk('public')->makeDirectory('pictures_works');

        Storage::disk('public')->deleteDirectory('posts');
        Storage::disk('public')->makeDirectory('posts');

        $this->call(UserSeeder::class);

        Service::factory(3)->create();
        About::factory(1)->create();
        Fact::factory(3)->create();

        Testimonial::factory(4)->create();
        Team::factory(6)->create();
        Work::factory(10)->create();
        Skill::factory(3)->create();
        PicturesWork::factory(6)->create();
        Post::factory(6)->create();
    }
}
