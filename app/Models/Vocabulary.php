<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model {
    protected $table = 'vocabularies';
    public $timestamps = false;
    protected $fillable = ['name', 'meaning_id', 'meaning_en', 'meaning_ja', 'f1_min', 'f1_max', 'f2_min', 'f2_max', 'f3_min', 'f3_max', 'f4_min', 'f4_max', 'f5_min', 'f5_max', 'ax_min', 'ax_max', 'ay_min', 'ay_max', 'az_min', 'az_max'];
    protected $casts = ['f1_min'=>'integer','f1_max'=>'integer','f2_min'=>'integer','f2_max'=>'integer','f3_min'=>'integer','f3_max'=>'integer','f4_min'=>'integer','f4_max'=>'integer','f5_min'=>'integer','f5_max'=>'integer','ax_min'=>'float','ax_max'=>'float','ay_min'=>'float','ay_max'=>'float','az_min'=>'float','az_max'=>'float'];
}