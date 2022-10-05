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
use App\Models\OnlinePoll;
use App\Models\Setting;
use App\Models\SocialItem;
use App\Models\Language;

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
        $sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Top')->get();
        view()->share('global_sidebar_top_ad', $sidebar_top_ad);

        // Sidebar Bottom Advertisement
        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Bottom')->get();
        view()->share('global_sidebar_bottom_ad', $sidebar_bottom_ad);

        // Category
        $categories = Category::with('rSubCategory')->where('show_on_menu', 'Show')->orderBy('category_order', 'asc')->get();
        view()->share('global_categories',  $categories);


        // Live Chanel, I used them inside the sidebar file directly into the PHP because of the language control

        // Live Chanel
        // $live_channel_data = LiveChannel::get();
        // view()->share('global_live_channel_data',  $live_channel_data);

        // Recent news and popular news, I used them inside the sidebar file directly into the PHP because of the language control

        // Popular News  
        // $popular_news_data = Post::with('rSubCategory')->orderBy('visitors', 'desc')->get();
        // view()->share('global_popular_news_data',  $popular_news_data);

        // Recent News  
        // $recent_news_data = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
        // view()->share('global_recent_news_data',  $recent_news_data);

        // pages, I used them inside the sidebar file directly into the PHP because of the language control

        // pages
        // $page_data = Page::where('id', 1)->first();
        // view()->share('global_page_data',  $page_data);

        // Online Poll, I used them inside the sidebar file directly into the PHP because of the language control

        // Online Poll
        // $online_poll_data = OnlinePoll::orderBy('id', 'desc')->first();
        // view()->share('global_online_poll_data', $online_poll_data);

        // Social Item
        $social_item_data = SocialItem::get();
        view()->share('global_social_item_data', $social_item_data);

        // Settings data
        $setting_data = Setting::where('id', 1)->first();
        view()->share('global_setting_data', $setting_data);

        // language data
        $language_data = Language::get();
        view()->share('global_language_data', $language_data);

        // language is_default
        $default_lang_data = Language::where('is_default', 'Yes')->first();
        view()->share('global_short_name', $default_lang_data->short_name);
    }
}
