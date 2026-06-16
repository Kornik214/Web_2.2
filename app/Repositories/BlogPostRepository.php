<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Отримати список статей
     */
    public function getAllWithPaginate($perPage = 25)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        return $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                },
                //'category:id,title',
                'user:id,name',
            ])
            ->paginate($perPage);
    }

    /**
     * Отримати модель для редагування
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Отримати один пост для публічного перегляду
     */
    public function getShow($id)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        return $this->startConditions()
            ->select($columns)
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                },
                'user:id,name',
            ])
            ->find($id);
    }
}
