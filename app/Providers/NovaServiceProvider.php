<?php

namespace App\Providers;


use App\Nova\Appointment;
use App\Nova\Dashboards\Main;
use App\Nova\Gallery;
use App\Nova\Media;
use App\Nova\Nav;
use App\Nova\Page;
use App\Nova\Post;
use App\Nova\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(
            function (Request $request) {
                return [
                    MenuSection::dashboard(Main::class)->icon('chart-bar'),

                    MenuSection::make('Termine', [
                        MenuItem::resource(Appointment::class),
                    ])->icon("calendar"),

                    MenuSection::make('Content', [
                        MenuItem::resource(Nav::class),
                        MenuItem::resource(Page::class),
                        MenuItem::resource(Post::class),
                    ])->icon('server'),

                    MenuSection::make('Bilder', [
                        MenuItem::resource(Gallery::class),
                        MenuItem::resource(Media::class),
                    ])->icon('camera'),

                    MenuSection::make('User', [
                        MenuItem::resource(User::class),
                    ])->icon('users'),
                ];
            });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
