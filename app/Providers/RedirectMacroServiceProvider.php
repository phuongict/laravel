<?php

namespace App\Providers;

use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\ViewErrorBag;

class RedirectMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Redirect::macro('withMessages', $this->withMessages());
    }
    private function withMessages() {
        return function ($providers, $key = 'default'){
            $values = RedirectMacroServiceProvider::parseMessages($providers);
            $messages = [
                'errors' => session()->get('errors', new ViewErrorBag),
                'success' => session()->get('success', new ViewErrorBag),
                'warnings' => session()->get('warnings', new ViewErrorBag)
            ];
            $allMessages = RedirectMacroServiceProvider::setMessage($messages);
            foreach($allMessages as $type => $message){
                session()->flash(
                    $type, array_key_exists($type, $values)?$message->put($key, $values[$type]):$message
                );
            }
            return $this;
        };
    }
    public static function setMessage(array $messageTypes = [])
    {
        foreach ($messageTypes as $type => $message) {
            if (!$message instanceof ViewErrorBag) {
                $messageTypes[$type] = new ViewErrorBag;
            }
        }
        return $messageTypes;
    }

    public static function parseMessages($providers)
    {
        $providers = $providers instanceof MessageBag?$providers->getMessages():$providers;
        foreach ($providers as $key => $provider) {
            if ($provider instanceof MessageProvider) {
                $providers[$key] = $provider->getMessageBag();
            }
            $providers[$key] =  new MessageBag((array)$provider);
        }
        return $providers;
    }
}
