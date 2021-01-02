<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eleve extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['first_name','last_name','description','classe_id'];
    

    public function classe(){
    	return $this->belongsTo('App\Models\Classe');
    }

    public function compte(){
    	return $this->belongsTo('App\Models\Compte','id','eleve_id');

    }

}