<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function productCount()
    {
        return \DB::select('select count(*) as count from products where category_id = '.$this->id)[0]->count;
    }
}
