<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\Category;
use App\Models\LiveChannel;
use App\Models\Page;
use App\Models\Post;

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

        // Top Advertisement
        $top_ad_data = TopAdvertisement::where('id', 1)->first();
        view()->share('global_top_ad_data', $top_ad_data);

        // Sidebar Top Advertisement
        $sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location','Top')->get();
        view()->share('global_sidebar_top_ad', $sidebar_top_ad);
 
        // Sidebar Bottom Advertisement
        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location','Bottom')->get();
        view()->share('global_sidebar_bottom_ad', $sidebar_bottom_ad);
 
        // Category
        $categories = Category::with('rSubCategory')->where('show_on_menu','Show')->orderBy('category_order', 'asc')->get();
        view()->share('global_categories',  $categories);

        // Live Chanel
        $live_channel_data = LiveChannel::get();
        view()->share('global_live_channel_data',  $live_channel_data);

        // Popular News  
        $popular_news_data = Post::with('rSubCategory')->orderBy('visitors','desc')->get();
        view()->share('global_popular_news_data',  $popular_news_data);

        // Recent News  
        $recent_news_data = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
        view()->share('global_recent_news_data',  $recent_news_data);

         // pages
         $page_data = Page::where('id', 1)->first();
         view()->share('global_page_data',  $page_data);
    }
}
