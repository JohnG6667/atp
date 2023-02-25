<?php

namespace App\Observers;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamObserver
{
    public function deleting(Team $team)
    {
        if ($team->image) {
            Storage::delete($team->image->url);
        }
    }
}
