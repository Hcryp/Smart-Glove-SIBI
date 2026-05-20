<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Vocabulary extends Model {
    protected $table = 'vocabularies'; public $timestamps = false; protected $guarded = [];
    protected $casts = ['f1_min'=>'integer','f1_max'=>'integer','f2_min'=>'integer','f2_max'=>'integer','f3_min'=>'integer','f3_max'=>'integer','f4_min'=>'integer','f4_max'=>'integer','f5_min'=>'integer','f5_max'=>'integer','ax_min'=>'float','ax_max'=>'float','ay_min'=>'float','ay_max'=>'float','az_min'=>'float','az_max'=>'float'];
}