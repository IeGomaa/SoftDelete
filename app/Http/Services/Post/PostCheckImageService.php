<?php

namespace App\Http\Services\Post;

class PostCheckImageService
{
    private $service;
    public function __construct(PostUploadImageService $service)
    {
        $this->service = $service;
    }

    public function checkImage($image, $post)
    {
        if (!is_null($image)) {
            return $this->service->uploadImage($image, $post->image);
        }
        return $post->getRawOriginal('image');
    }
}
