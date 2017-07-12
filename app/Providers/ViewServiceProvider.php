<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TestAnswer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('iteam.template_no_fb', function ($view) {
            $t5 = TestAnswer::where('test_id', '=', 3)->where('rating', '>', 80)->get();
            $t4 = TestAnswer::where('test_id', '=', 3)->where('rating', '>', 60)->where('rating', '<=', 80)->get();
            $t3 = TestAnswer::where('test_id', '=', 3)->where('rating', '>', 40)->where('rating', '<=', 60)->get();
            $t2 = TestAnswer::where('test_id', '=', 3)->where('rating', '<=', 40)->get();
//            dump(count($t5), count($t4), count($t3), count($t2));
            $t = [
                't5' => count($t5),
                't4' => count($t4),
                't3' => count($t3),
                't2' => count($t2),
            ];
            $sumt =count($t5) + count($t4) + count($t3) + count($t2);
            $view->with('result', $t);
        });
        view()->composer('iteam.template_no_fb', function ($view) {
            $t5 = TestAnswer::where('test_id', '=', 3)->where('rating', '>', 80)->get();
            $t4 = TestAnswer::where('test_id', '=', 3)->where('rating', '>', 60)->where('rating', '<=', 80)->get();
            $t3 = TestAnswer::where('test_id', '=', 3)->where('rating', '>', 40)->where('rating', '<=', 60)->get();
            $t2 = TestAnswer::where('test_id', '=', 3)->where('rating', '<=', 40)->get();
//            dump(count($t5), count($t4), count($t3), count($t2));
            $t = [
                't5' => count($t5),
                't4' => count($t4),
                't3' => count($t3),
                't2' => count($t2),
            ];
            $sumt = count($t5) + count($t4) + count($t3) + count($t2);
            $view->with('sum', $sumt);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
