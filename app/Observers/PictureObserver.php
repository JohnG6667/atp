<?php

namespace App\Observers;

use App\Models\PicturesWork;
use Illuminate\Support\Facades\Storage;

class PictureObserver
{
    public function deleting(PicturesWork $picturesWork)
    {
        if ($picturesWork->image) {
            Storage::delete($picturesWork->image->url);
        }
    }
}
