<?php

namespace App\Imports;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {           
            $category = Category::firstOrCreate(
                ['name' => $row['category']],
                ['slug' => Str::slug($row['category'])]
            );
            
            Post::create([
                'title' => $row['title'],
                'slug' => $row['slug'],
                'category_id' => $category->id,
                'body' => $row['body'],
                'user_id' => auth()->id(),
                'excerpt' => Str::limit(strip_tags($row['body']), 200)
            ]);
        }
    }
}
