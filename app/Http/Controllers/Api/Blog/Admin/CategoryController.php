<?php

namespace App\Http\Controllers\Api\Blog\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(5);

        return $paginator;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_categories,slug'],
            'parent_id' => ['nullable', 'integer', 'exists:blog_categories,id'],
            'description' => ['nullable', 'string'],
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $item = BlogCategory::create($data);

        return [
            'success' => true,
            'message' => 'Успішно збережено',
            'data' => $item,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = BlogCategory::find($id);
        if (empty($item)) {
            return ['message' => "Запис id=[{$id}] не знайдено"];
        }

        $data = $request->all();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $result = $item->update($data);

        if ($result) {
            return [
                'success' => true,
                'message' => 'Успішно збережено',
                'data' => $item->fresh(),
            ];
        } else {
            return ['message' => 'Помилка збереження'];
        }
    }
}
