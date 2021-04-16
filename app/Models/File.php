<?php

namespace App\Models;

use App\Events\FileCreated;
use App\Events\FileDeleted;
use App\Events\FileSaved;
use App\Events\FileUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'path',
        'name',
        'code',
        'extension',
        'draft',
    ];

    public function investments()
    {
        return $this->morphedByMany('App\Models\Investment', 'fileable')->withTimestamps();
    }

    public function employees()
    {
        return $this->morphedByMany('App\Models\Employee', 'fileable')->withTimestamps();
    }

    public function protectives()
    {
        return $this->morphedByMany('App\Models\Protective', 'fileable')->withTimestamps();
    }

    public function bancassurances()
    {
        return $this->morphedByMany('App\Models\Bancassurance', 'fileable')->withTimestamps();
    }

    public function file_category()
    {
        return $this->belongsTo('App\Models\FileCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Get cached relation.
     *
     * @param string $relation
     * @param string $field
     * @return array|mixed
     */
    public function getCachedRelation(string $relation)
    {
        return Cache::tags(['files', $relation])->rememberForever('files_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->{$relation};
        });
    }
}