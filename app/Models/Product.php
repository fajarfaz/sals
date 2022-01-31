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