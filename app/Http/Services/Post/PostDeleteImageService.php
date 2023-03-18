<?php

namespace App\Http\Services\Post;

class PostDeleteImageService
{
    public function deleteImageInLocal($image_name)
    {
        unlink(public_path($image_name));
    }
}
