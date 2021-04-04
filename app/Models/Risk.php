<?php

namespace App\Models;

use App\Events\RiskSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Risk extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'code',
        'name',
        'category',
        'group',
        'grace_period',
    ];

    protected $dispatchesEvents = [
        'saved' => RiskSaved::class
    ];

    public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'noteable')->withTimestamps();
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function get_notes()
    {
        return Cache::tags(['risk', 'notes', 'users'])->rememberForever('risks_' . $this->id . '_notes_all', function () {
            return $this->notes()->with('user')->get();
        });
    }
}
