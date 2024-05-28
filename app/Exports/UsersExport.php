<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {        
        return Post::with('category')->get()->map(function($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'category' => $post->category->name,
                'slug' => $post->slug,
            ];
        });
    }

    public function headings(): array
    {
        return [
            '#',
            'Title',
            'Category',
            'Slug',
        ];
    }
}
