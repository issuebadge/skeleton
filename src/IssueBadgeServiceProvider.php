<?php

namespace NotificationChannels\IssueBadge;

use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use NotificationChannels\IssueBadge\IssueBadgeChannel;

class IssueBadgeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Optional: Publish config
        $this->publishes([
            __DIR__.'/../config/issuebadge.php' => config_path('issuebadge.php'),
        ], 'issuebadge-config');

        // Register the custom channel driver
        $this->app->make(ChannelManager::class)->extend('issuebadge', function ($app) {
            return new IssueBadgeChannel();
        });
    }

    public function register()
    {
        // Optional: Merge default config
        $this->mergeConfigFrom(__DIR__.'/../config/issuebadge.php', 'issuebadge');
    }
}
