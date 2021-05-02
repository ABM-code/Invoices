<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=[    //  equals  to   protected $guarded = [];  without putting the fields
        'product_name',
        'description',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo('App\Sections');

    }


}
