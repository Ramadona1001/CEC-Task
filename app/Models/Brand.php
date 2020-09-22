<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function productCount()
    {
        return \DB::select('select count(*) as count from products where brand_id = '.$this->id)[0]->count;
    }
}
