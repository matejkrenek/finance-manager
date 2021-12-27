<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

use App\Traits\FlashMessages;

class AppServiceProvider extends ServiceProvider
{
    use FlashMessages;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)->view('auth.emails.verify', ['url' => $url]);
        });

        view()->composer('components.messages', function ($view) {

            $messages = self::messages();
  
            return $view->with('messages', $messages);
        });
    }
}
