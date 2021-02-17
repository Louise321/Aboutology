<?php

namespace App\Http\Conversations;

use BotMan\Drivers\Facebook\Extensions\ElementButton as ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate as ButtonTemplate;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use DB;
use App\Models\Article;


class OnboardingConversation extends Conversation
{
    protected $firstname;

    protected $email;
    
    public function askFirstname()
    {
        $this->ask('Hello what is your name ?', function(Answer $answer) {
            // Save result
            // $this->firstname = $answer->getText();

            $search = $answer->getText();

            // $article = Article::query()
            // ->where('title', 'LIKE', "%{$search}%")
            // ->get();

            // $this->firstname = $answer->getText();

            // $this->reply('Nice to meet you '.$this->firstname);


            $this->say('Nice to meet you '.$search);
            // $this->reply('Nice to meet you '.$answer->getText());
            // $this->askEmail();

            // $this->questions();
            // $this->test();
            $this->askNextStep();
        });
    }

    public function askNextStep()
    {
        // $this->ask('What are you looking for?', [
        //     [
        //         'pattern' => 'gas|tank|LPG',
        //         'callback' => function () {
        //             $this->say('Article: <a href=http://localhost:8080/article/6">Fact Check : Does The LPG Gas Tank Pressure Test Work?</a>');
                    // $this->say('News: <a href=http://localhost:8080/newspage/8">PDB Becomes The First LNG Solution Provider For Off-Grid Customers In Peninsular Malaysia</a>');
                    // $this->questions();
            //     }
            // ],
            // [
            //     'pattern' => 'petrol|RON95|fuel',
            //     'callback' => function () {
            //         $this->say('PANIC!! Stop the engines NOW!');
                    // $this->say('Article: <a href=http://localhost:8080/article/4">Is RON97 Really Better Than RON95? (Part 2) – Tried And Tested!</a>');
                    // $this->say('Forum: <a href=http://localhost:8080/forums/2">What is best RON95 petrol?, why everyone say Shell low quality</a>');
            //     }
            // ]
            // [
            //     'pattern' => '.*',
            //     'callback' => function () {
            //         $this->say('Sorry I did not get that.');
            //         $this->repeat('What are you looking for??');
            //     }
            // ],
        // ]);

        $this->ask('What are you looking for??', [
            [
                'pattern' => 'pump|petrol|station',
                'callback' => function () {
                    // $this->say('Okay - we\'ll keep going');
                    $this->say('Article: <a href=http://localhost:8080/article/10">Precautions While Filling Petrol at Petrol Stations</a>');
                    // $this->repeat('What are you looking for??');
                    $this->askNext();

                }
            ],
            [
                'pattern' => 'gas|pressure',
                'callback' => function () {
                    // $this->say('PANIC!! Stop the engines NOW!');
                    $this->say('Article: <a href=http://localhost:8080/article/6">Fact Check : Does The LPG Gas Tank Pressure Test Work?</a>');
                    $this->askNext();
                    // $this->repeat('What are you looking for??');
                }
            ],
            [
                'pattern' => 'petroleum',
                'callback' => function () {
                    // $this->say('Okay - we\'ll keep going');
                    $this->say('Article: <a href=http://localhost:8080/newspage/12">News: PDB Announces Q1 2020 Results Amidst Sharp Decline In Petroleum Product Prices</a>');
                    // $this->repeat('What are you looking for??');
                    $this->askNext();

                }
            ],
            [
                    'pattern' => '.*',
                    'callback' => function () {
                       
                        // for($i=0;$i<3;$i++){
                            // if()
                            $this->say('Sorry I did not get that.');
                            $this->repeat('What are you looking for??');
                             
                        // }
                    }
                ],
        ]);       


    }

    public function askNext()
    {
        $question = Question::create("Is this helpful?")
		->addButtons([
			// Button::create('A')->value('yes'),
            // Button::create('B')->value('no'),
            Button::create('YES - to say bye bye')->value('yes'),
            Button::create('NO - to retry')->value('no'),
		]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->getValue() === 'yes') {
                $this->say('Okay you have ended the conversation!');
                return true;
                // return $this->bot->startConversation(new QuizConversation());
            }else{
                $this->askNextStep();

            }
        });
    }

    public function questions()
    {

        $question = Question::create('Do you find this useful?')
		->addButtons([
			Button::create('Yes')->value('yes'),
            Button::create('No')->value('no'),
            // Button::create('WhatsApp')->value('whatsapp')->additionalParameters(['css' => 'rate txt', 'url' => 'http://localhost:8080/article/22']),
            // Button::create('Phone')->value('phone')->additionalParameters(['css' => 'rate txt']),
		]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->getValue() === 'yes') {
                    $this->say('Okay Bye!');
                // return $this->bot->startConversation(new EndConversation());
            }
        
            $this->askNextStep();
            // $this->say('😒');
            // $this->say('If you change your opinion, you can start the quiz at any time using the start command or by typing "start".');
        });

        // $question = Question::create('Choose a convenient way to communicate 👇')
        // ->addButtons([
        //     Button::create('WhatsApp')->value('whatsapp')->additionalParameters(['css' => 'rate txt', 'url' => 'http://testing.test/article/22']),
        //     Button::create('Phone')->value('phone')->additionalParameters(['css' => 'rate txt']),
        // ]);
        
        // $bot = ButtonTemplate::create('Are you looking for this?')
        //     ->addButton(ElementButton::create('Tell me more')->type('postback')->payload('tellmemore'))
        //     ->addButton(ElementButton::create('Show me the docs')->url('http://botman.io/'))
        // );
        
    }

    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
        
    }
}