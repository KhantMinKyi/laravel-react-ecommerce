<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable=['name','image','description'];
    protected $appends = ['img_url'];

    public function addTransaction(){
        return  $this->hasMany(ProductAddTransaction::class);
    }
    public function removeTransaction(){
        return  $this->hasMany(ProductRemoveTransaction::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function getImgUrlAttribute(){
        return (asset('/images/'.$this->image));
    }
}
