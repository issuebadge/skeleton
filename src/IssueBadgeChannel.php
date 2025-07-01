<?php

namespace NotificationChannels\IssueBadge;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class IssueBadgeChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (! method_exists($notification, 'toIssueBadge')) {
            return;
        }

        $message = $notification->toIssueBadge($notifiable);

        Http::withToken(config('issuebadge.api_key'))->post('https://app.issuebadge.com/api/v1/issue/create', [
            'name' => $message->name,
            'email' => $message->email,
            'badge_id' => $message->badgeId,
            'idempotency_key' => Str::uuid()
        ]);
    }
}