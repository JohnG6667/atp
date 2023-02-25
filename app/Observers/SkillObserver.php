<?php

namespace App\Observers;

use App\Models\Skill;
use Illuminate\Support\Facades\Storage;

class SkillObserver
{

    public function deleting(Skill $skill)
    {
        if ($skill->image) {
            Storage::delete($skill->image->url);
        }
    }

}
