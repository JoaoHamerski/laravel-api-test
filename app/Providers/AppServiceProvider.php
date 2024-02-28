<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->guessDomainsNamespaceForFactory();
    }

    public function guessDomainsNamespaceForFactory()
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            $namespace = 'Database\\Factories\\';

            $modelName = Str::afterLast($modelName, '\\');

            return $namespace . $modelName . 'Factory';
        });
    }
}
