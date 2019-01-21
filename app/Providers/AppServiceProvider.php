<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Auth0\Login\LaravelCacheWrapper;
use Auth0\Login\Contract\Auth0UserRepository as Auth0UserRepositoryContract;
use App\Repositories\CustomUserRepository as Auth0UserRepository;
use Log;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::enableQueryLog();
        DB::listen(function ($query) {
            $ignoreKyes = ['insert into `jobs`', 'select * from `jobs`'];
            foreach ($ignoreKyes as $key) {
                if (substr($query->sql, 0, strlen($key)) === $key) {
                    return;
                }
            }
            Log::debug('SQL', [
                'sql' => $query->sql,
                'bindings' => $query->bindings,
                'runtime' => $query->time
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Firebase\JWT\JWT::$leeway = 10;

        $this->app->bind(
            Auth0UserRepositoryContract::class,
            Auth0UserRepository::class
        );
        
        // This is used for RS256 tokens to avoid fetching the JWKs on each request
        $this->app->bind(
            '\Auth0\SDK\Helpers\Cache\CacheHandler',
            function() {
                static $cacheWrapper = null;
                if ($cacheWrapper === null) {
                    $cache = Cache::store();
                    $cacheWrapper = new LaravelCacheWrapper($cache);
                }
                return $cacheWrapper;
            });
    }
}
