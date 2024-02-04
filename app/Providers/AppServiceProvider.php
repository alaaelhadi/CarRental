<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        view()->composer('Admin.includes.topNavigation', function($show){  
            $showUnreadMessages = Contact::where('unread', 0)->orderBy('created_at', 'desc')->get();
            $show->with('showUnreadMessages', $showUnreadMessages);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapThree();
        view()->composer('Admin.includes.topNavigation', function($view){
            $countUnreadMessages = Contact::where('unread', 0)->count();
            $view->with('unreadMessages', $countUnreadMessages);
            
        });
    }
}
