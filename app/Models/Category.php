<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    public function documents() {
        return $this->belongsToMany('App\Models\Document', 'documents_categories',  'category_id', 'document_id');
    }
}
