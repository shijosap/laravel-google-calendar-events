<?php
/**
 * Created by PhpStorm.
 * User: shijosap
 * Date: 20-02-2017
 * Time: 04:16
 */
namespace Shijosap\GoogleCalendarEvents;

use Illuminate\Support\ServiceProvider;

class GoogleCalendarServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-google-calendar-events.php' => config_path('laravel-google-calendar-events.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-google-calendar-events.php', 'laravel-google-calendar-events');
        $this->app->bind(GoogleCalendar::class, function () {
            $google_calendar_id = config('laravel-google-calendar-events.google_calendar_id');
            return GoogleCalendarFactory::getCalendar($google_calendar_id);
        });
    }
}