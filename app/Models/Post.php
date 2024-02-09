<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body',  'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function sluggable(): array
    {
        // protected $guarded = ['id'];
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $guarded = [
        'id',
    ];
}


// Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis recusandae eveniet excepturi earum quae fugiat sit. Nobis, magnam expedita. Eius rerum sequi, quibusdam dolorem quaerat accusantium doloremque nemo consequatur, id architecto unde voluptas perferendis laudantium quae? Recusandae similique quis maxime, quae cumque officiis quam exercitationem necessitatibus eius aspernatur hic dolor obcaecati, mollitia sunt, cum illum nesciunt in amet error modi itaque! Distinctio consectetur eligendi ullam nisi repudiandae dolorum possimus sunt reiciendis quia voluptas, aperiam magnam dolores. Laborum, unde quasi at repellendus odio eos. Perferendis suscipit minima aspernatur beatae libero voluptatem quaerat quisquam, obcaecati fugit in laudantium maiores ullam! Nihil tempora sapiente alias pariatur veniam sed provident quos error obcaecati temporibus ipsa nisi adipisci maiores ad doloremque distinctio, non, laboriosam facilis consequuntur architecto! Laboriosam nemo ut asperiores iure, eos dolore dolorem accusamus culpa molestiae, architecto recusandae enim itaque sint earum quis blanditiis sit obcaecati vitae consectetur repudiandae nesciunt? Quo illum nam, libero quae atque impedit alias ad itaque debitis eaque dolores laborum eligendi assumenda. Rerum aliquam, commodi earum dolor nam ullam dignissimos optio neque fugiat numquam officia amet unde vel corrupti, fuga ea accusamus ratione sint consequatur perferendis aperiam vitae sunt. Expedita repellendus perspiciatis mollitia. Est, nam architecto pariatur dicta deleniti mollitia ducimus asperiores autem culpa maiores odit voluptates quaerat voluptatibus ipsa aut atque, eos nobis accusantium eveniet error! Adipisci blanditiis non vitae molestias labore illum sunt! Dolores, ullam animi, adipisci assumenda vitae ipsa temporibus facere fugiat laudantium sequi nobis nulla dignissimos officia et necessitatibus enim sit expedita pariatur ducimus id.