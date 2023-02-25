<?php

namespace App\Observers;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialObserver
{
    public function deleting(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::delete($testimonial->image->url);
        }
    }

}
