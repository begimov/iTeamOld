<?php namespace App\Providers;

use App\Services\Validation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new Validation($translator, $data, $rules, $messages);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $localProviders = config('app.local_providers', []);

            foreach ($localProviders as $provider) {
                $this->app->register($provider);
            }

            $localAliases = config('app.local_aliases', []);

            foreach ($localAliases as $alias => $class) {
                $this->app->alias($class, $alias);
            }
        }
    }

}
