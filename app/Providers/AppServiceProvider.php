<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
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

        paginator::useBootstrap();


        $top_ad_data = TopAdvertisement::where('id', 1)->first();
        view()->share('global_top_ad_data', $top_ad_data);

        $sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location','Top')->get();
        view()->share('global_sidebar_top_ad', $sidebar_top_ad);

        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location','Bottom')->get();
        view()->share('global_sidebar_bottom_ad', $sidebar_bottom_ad);
    }
}
