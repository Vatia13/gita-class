<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','status','due_date','deleted_at'];

    public function scopeFinished($query) {
        $query->whereStatus('finished');
    }

    public function scopeActive($query) {
        $query->whereStatus('active');
    }
}
