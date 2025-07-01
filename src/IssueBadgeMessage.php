<?php

namespace NotificationChannels\IssueBadge;

class IssueBadgeMessage
{
    public $name;
    public $email;
    public $badgeId;

    public function __construct($name, $email, $badgeId)
    {
        $this->name = $name;
        $this->email = $email;
        $this->badgeId = $badgeId;
    }

    public static function create($name, $email, $badgeId)
    {
        return new static($name, $email, $badgeId);
    }
}