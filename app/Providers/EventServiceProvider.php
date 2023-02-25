<?php

namespace App\Providers;

use App\Models\PicturesWork;
use App\Models\Post;
use App\Models\Skill;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Models\Work;
use App\Observers\PictureObserver;
use App\Observers\PostObserver;
use App\Observers\SkillObserver;
use App\Observers\TeamObserver;
use App\Observers\TestimonialObserver;
use App\Observers\WorkObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Work::observe(WorkObserver::class);
        PicturesWork::observe(PictureObserver::class);
        Team::observe(TeamObserver::class);
        Skill::observe(SkillObserver::class);
        Testimonial::observe(TestimonialObserver::class);
        Post::observe(PostObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
