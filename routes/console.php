<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('queue:work --stop-when-empty')->everySecond()->withoutOverlapping();
Schedule::command('optimize:clear')->dailyAt('03:00');
Schedule::command('sessions:clear')->dailyAt('03:00');