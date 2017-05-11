<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    
    public function categories() {
        return $this->belongsToMany('App\Models\Category', 'documents_categories', 'document_id', 'category_id');
    }
}
