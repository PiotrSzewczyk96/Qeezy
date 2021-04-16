<?php

namespace App\Models;

use App\Events\ReplyCreated;
use App\Events\ReplyDeleted;
use App\Events\ReplySaved;
use App\Events\ReplyUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'content',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function news()
    {
        return $this->belongsTo('App\Models\News');
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
        return Cache::tags(['replies', $relation])->rememberForever('replies_' . $this->id . '_' . $relation, function () use ($relation) {
            return $this->{$relation};
        });
    }
}
