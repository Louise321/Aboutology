<?php

use App\Http\Conversations\OnboardingConversation;
// use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$botman = app('botman');

// $botman->hears('Hi', function ($bot) {
//     $bot->reply('Bye');
// });
// $botman->fallback(function (BotMan $bot) {
//     $bot->reply("I have no idea what you are looking for?");
// });

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
// $botman = BotManFactory::create($config);

$botman->hears('Hello|Hi', function($bot) {
    $bot->startConversation(new OnboardingConversation);
});