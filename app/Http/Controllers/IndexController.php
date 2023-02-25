<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Fact;
use App\Models\PicturesWork;
use App\Models\Post;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        //ABOUT
        if (Cache::has('about')) {
            $about = Cache::get('about');
        } else {
            $about = About::first();
            Cache::put('about', $about);
        }
        //TEAM
        if (Cache::has('teams')) {
            $teams = Cache::get('teams');
        } else {
            $teams = Team::latest()->get();
            Cache::put('teams', $teams);
        }
        //SKILLS
        if (Cache::has('skills')) {
            $skills = Cache::get('skills');
        } else {
            $skills = Skill::all();
            Cache::put('skills', $skills);
        }
        //FACTS
        if (Cache::has('facts')) {
            $facts = Cache::get('facts');
        } else {
            $facts = Fact::all();
            Cache::put('facts', $facts);
        }
        //WORKS
        if (Cache::has('works')) {
            $works = Cache::get('works');
        } else {
            $works = Work::latest('id')->take(5)->get();
            Cache::put('works', $works);
        }
        //SERVICES
        if (Cache::has('services')) {
            $services = Cache::get('services');
        } else {
            $services = Service::all();
            Cache::put('services', $services);
        }
        //TESTIMONIALS
        if (Cache::has('testimonials')) {
            $testimonials = Cache::get('testimonials');
        } else {
            $testimonials = Testimonial::all();
            Cache::put('testimonials', $testimonials);
        }
        //IMAGE WORK
        if (Cache::has('imageWorks')) {
            $imageWorks = Cache::get('imageWorks');
        } else {
            $imageWorks = PicturesWork::latest('id')->take(6)->get();
            Cache::put('imageWorks', $imageWorks);
        }
        //POSTS
        if (Cache::has('posts')) {
            $posts = Cache::get('posts');
        } else {
            $posts = Post::all();
            Cache::put('posts', $posts);
        }

        return view('index.index',
        compact('about', 'teams', 'skills', 'facts', 'works', 'services', 'testimonials', 'imageWorks', 'posts'));
    }
}
