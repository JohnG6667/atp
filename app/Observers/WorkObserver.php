<?php

namespace App\Observers;

use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class WorkObserver
{
    public function deleting(Work $work)
    {
        if ($work->image) {
            Storage::delete($work->image->url);
        }
    }
}
