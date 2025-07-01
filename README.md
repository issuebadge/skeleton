# ðŸ… Laravel Notification Channel for IssueBadge

This package makes it easy to send developer badges or certificates via [IssueBadge](https://issuebadge.com) using Laravel's notification system.

---

## ðŸ“¦ Installation

Install the package via Composer:

```bash
composer require issuebadge/laravel-notification-channel
```

If using a local development path:

```json
"repositories": [
  {
    "type": "path",
    "url": "../laravel-notification-channel-issuebadge"
  }
]
```

---

## âš™ï¸ Configuration

Add your IssueBadge API key to your `.env` file:

```env
ISSUEBADGE_API_KEY=your_api_key_here
```

Then optionally publish the config:

```bash
php artisan vendor:publish --tag=issuebadge-config
```

---

## âœ‰ï¸ Usage

You can now send badges using Laravel notifications:

### Step 1: Create a Notification

```php
use Illuminate\Notifications\Notification;
use NotificationChannels\IssueBadge\IssueBadgeMessage;

class BadgeNotification extends Notification
{
    public function via($notifiable)
    {
        return ['issuebadge'];
    }

    public function toIssueBadge($notifiable)
    {
        return IssueBadgeMessage::create(
            $notifiable->name,
            $notifiable->email,
            'W238GD8PK' // your badge ID
        );
    }
}
```

### Step 2: Send Notification

```php
$user->notify(new BadgeNotification());
```

---

## ðŸ§© Service Provider

The service provider will be auto-discovered in Laravel 5.5+.

If using manually, register it in `config/app.php`:

```php
'providers' => [
    NotificationChannels\IssueBadge\IssueBadgeServiceProvider::class,
],
```

---

## âœ… Testing

You can test by creating a dummy Laravel app and triggering a notification with a test badge ID and email.

---

## ðŸ™Œ Credits

- Developed by [IssueBadge](https://issuebadge.com)
- Inspired by the Laravel Notification Channel Skeleton

---

## ðŸ“„ License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
