<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    // Puting the fillable array to protect some errors when submiting the form 
    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags', 'logo'];

    public function scopeFilter($query, array $filters){
        //   dd($filters['tag']);
          if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
          }
          
          if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
          }

    }
    // Relationship with Users
    public function user(){
      return $this->belongsTo(User::class, 'user_id');
   }
}

 