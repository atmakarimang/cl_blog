<?php

namespace App\Models;

use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['kategori', 'user'];

    //Filter
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('kategori', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['authors'] ?? false, function ($query, $authors) {
            return $query->whereHas('user', function ($query) use ($authors) {
                $query->where('username', $authors);
            });
        });
    }

    // relasi
    public function Kategori()
    {
        //one to one
        return $this->belongsTo(Kategori::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
