<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [
         'id',
    ]; 

    public function scopeFilter($query, array $filters){
      $query->when($filters['search'] ?? false, function($query, $search) {
       return $query->where(function($query) use ($search) {
        $query->where('title', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%');
    });
   });

      $query->when($filters['category'] ?? false, function($query, $category) {
        return $query->whereHas('category', function($query) use ($category){
            $query->where('slug', $category);
        });
    });
      $query->when($filters['sort'] ?? false, function($query, $sort) {
        return  $product->orderBy($sort);
    });

   }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function additionalSettings()
    {
        return $this->hasOne(AdditionalSettings::class);
    }

    //  public function setSelectAttribute($value)
    // {
    //      $this->attributes['color'] = json_encode($value);
    //      $this->attributes['size'] = json_encode($value);
    // }

    // public function getSelectAttribute($value)
    // {
    //     return $this->attributes['color'] = json_decode($value);
    //     return $this->attributes['size'] = json_decode($value);
    // }
}

?>