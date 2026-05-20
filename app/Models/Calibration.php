<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calibration extends Model {
    use HasFactory;
    protected $fillable = ['name', 'f0', 'f1', 'f2', 'f3', 'f4', 'b0', 'b1', 'b2', 'b3', 'b4', 'sf0', 'sf1', 'sf2', 'sf3', 'sf4', 'sb0', 'sb1', 'sb2', 'sb3', 'sb4', 'ax', 'ay', 'az', 'gx', 'gy', 'gz'];
}