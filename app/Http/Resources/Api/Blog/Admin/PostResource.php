<?php

namespace App\Http\Resources\Api\Blog\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $datePublished = null;

        if ($this->published_at) {
            $datePublished = $this->published_at instanceof Carbon
                ? $this->published_at->format('Y-m-d H:i:s')
                : Carbon::parse($this->published_at)->format('Y-m-d H:i:s');
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'is_published' => (bool) $this->is_published,
            'date_published' => $datePublished,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ];
    }
}
