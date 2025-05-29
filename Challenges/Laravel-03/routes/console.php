<?php

use App\Mail\MyEmail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Artisan::command('send-myemail-mail', function () {
//     Mail::to('testreceiver@gmail.com')->send(new MyEmail("sara@test.com", 498273728228, "Sara"));

//     // Also, you can use specific mailer if your default mailer is not "mailtrap" but you want to use it for welcome mails
//     // Mail::mailer('mailtrap')->to('testreceiver@gmail.com')->send(new WelcomeMail("Jon"));
// })->purpose('Send welcome mail');
