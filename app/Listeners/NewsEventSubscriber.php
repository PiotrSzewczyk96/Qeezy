<?php

namespace App\Listeners;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NewsEventSubscriber
{
    /**
     * Handle news deleted events.
     * @param $event
     */
    public function handleNewsCreated($event) {
        $event2 = new Event();
        $event2->event = 'created';
        $event2->eventable()->associate($event->news);
        Auth::user()->events()->save($event2);
    }

    /**
     * Handle news deleted events.
     * @param $event
     */
    public function handleNewsUpdated($event) {
        //
    }

    /**
     * Handle news saved events.
     * @param $event
     */
    public function handleNewsSaved($event) {
        Cache::tags('news')->forget('news_' . $event->news->id);
        Cache::tags('news')->flush();
    }

    /**
     * Handle news deleted events.
     * @param $event
     */
    public function handleNewsDeleted($event) {
        Cache::tags('news')->forget('news_' . $event->news->id);
        Cache::tags('news')->flush();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\NewsCreated',
            [NewsEventSubscriber::class, 'handleNewsCreated']
        );

        $events->listen(
            'App\Events\NewsUpdated',
            [NewsEventSubscriber::class, 'handleNewsUpdated']
        );

        $events->listen(
            'App\Events\NewsSaved',
            [NewsEventSubscriber::class, 'handleNewsSaved']
        );

        $events->listen(
            'App\Events\NewsDeleted',
            [NewsEventSubscriber::class, 'handleNewsDeleted']
        );
    }
}