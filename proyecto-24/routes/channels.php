<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('status-channel', function ($user) {
    return true;
});
