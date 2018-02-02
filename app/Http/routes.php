<?php

URL::forceSchema('https');

Route::get('pay/ya_demo/{id}', 'Site\O@testYaKassa');
Route::post('pay/ya_demo/{id}', 'Site\O@testYaKassa');


Route::get('search', function (\Illuminate\Http\Request $request) {
    require "sphinxapi.php";

    $s = new SphinxClient();
    $s->setServer("localhost", 9312);
    $s->setMatchMode(SPH_MATCH_ANY);
    $s->setMaxQueryTime(5);
    $s->SetSortMode(SPH_SORT_RELEVANCE);
    $s->SetArrayResult(true);
    $s->SetIndexWeights(array(
        "title" => 10,
        "author" => 9,
        "text" => 6
    ));
    $s->SetLimits(0, 100);
    $q = $request->q;

    $result = $s->query($request->q);

    $all = array();
    if (!empty($result["matches"])) {
        foreach ($result["matches"] as $res) {
            switch ($res['attrs']['model_id']) {
                case 1:
                    $learn = \App\Models\Learn::find($res["id"]);
                    $learn->path = '/learn' . $learn->path;
                    $all[] = $learn;
                    break;
                case 2:
                    $all[] = \App\Models\Articles::find($res["id"]);
                    break;
            }
        }
    }

//    $learns = \App\Models\Learn::whereIn('id', [136, 137, 138])->get();
//    $articles = \App\Models\Articles::whereIn('id', [2584, 2545, 2586])->get();
//    $collection = new \Illuminate\Support\Collection();
//    $merge = $collection->merge($learns)->merge($articles);
//
//    $all = paginateCollection($merge, 10);

    return view('iteam.search', compact('all', 'q'));
});

function paginateCollection($collection, $perPage, $pageName = 'page', $fragment = null)
{
    $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage($pageName);
    $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage);
    parse_str(request()->getQueryString(), $query);
    unset($query[$pageName]);
    $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
        $currentPageItems,
        $collection->count(),
        $perPage,
        $currentPage,
        [
            'pageName' => $pageName,
            'path' => \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPath(),
            'query' => $query,
            'fragment' => $fragment
        ]
    );

    return $paginator;
}

Route::get('verstka', ['as' => 'verstka', 'uses' => 'Learn\LearnController@verstka']);
Route::get('example-1', ['as' => 'example-1', 'uses' => 'Learn\LearnController@example1']);
Route::get('example-2', ['as' => 'example-2', 'uses' => 'Learn\LearnController@example2']);

Route::get('pay/ya/{id}', 'Site\O2@_YaKassa');
Route::post('pay/ya/{id}', 'Site\O2@_YaKassa');

Route::get('pay/{id}', 'Admin\OrderController@getCheck');
Route::post('pay/{id}', 'Admin\OrderController@postCheck');

Route::get('demon/order', 'Cron\OrderController@index');
Route::get('demon/order/rassrochka', 'Cron\OrderController@rassrochka');

Route::get('company/action{path?}', function () {
    return redirect('/company/about');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

Route::get('company/learn{path?}', function () {
    return redirect('/learn/webinar');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

Route::get('action{path?}', function () {
    return redirect('/learn/webinar');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');


Route::get('competence{path?}', function () {
    return redirect('/learn/webinar');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

Route::get('publications/article_463', function () {
    return redirect('/publications');
});

Route::get('publications/human/section_45/article_1115', function () {
    return redirect('/publications/human/section_45');
});

Route::get('publications/finances/section_30/article_2941', function () {
    return redirect('/publications/finances/section_30');
});


Route::get('publications/finances/section_29/article_15', function () {
    return redirect('/publications/finances/section_29');
});

Route::get('publications/finances/section_30/article_2962', function () {
    return redirect('/publications/finances/section_30');
});

Route::get('publications/finances/section_11/article_513', function () {
    return redirect('/publications/finances/section_11');
});

Route::get('publications/finances/section_12/page_1/count', function () {
    return redirect('/publications/finances/section_12');
});
Route::get('learn/11-effektivnyh-fishek-dlja-organizatsii-komandnoj-raboty-v-v', function () {
    return redirect('learn/organizatsionnaja-struktura/11-effektivnyh-fishek-dlja-organizatsii-komandnoj-raboty-v-v');
});

Route::get('publications/finances/section_14{path?}', function () {
    return redirect('/publications/finances');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

Route::get('company/philanthropy_news{path?}', function () {
    return redirect('/company');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

Route::get('company/action/seminar/motivation/webinar.htm{path?}', function () {
    return redirect('/company');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

Route::get('service{path?}', function () {
    return redirect('/company/service');
})->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

Route::get('61211', function () {
    return redirect('/learn/webinar');
});

Route::get('70625', function () {
    return redirect('/learn/webinar');
});

Route::get('str/main_edit.php', function () {
    return redirect('/learn/webinar');
});

Route::get('learn/breakfast/spiralnaja-dinamika-instrument-strategii', function () {
    return redirect('/learn/breakfast');
});

Route::get('learn/breakfast/findir-duties', function () {
    return redirect('/learn/webinar/findir-duties');
});

Route::get('learn/breakfast/razrabotka-strategii-shag-za-shagom', function () {
    return redirect('/learn/webinar/razrabotka-strategii-shag-za-shagom');
});

Route::get('learn/breakfast/organizations-culture', function () {
    return redirect('/learn/webinar/organizations-culture');
});

Route::get('learn/breakfast/indirect-cost-allocation', function () {
    return redirect('/learn/webinar/indirect-cost-allocation');
});

Route::get('learn/breakfast/calculate-cost-products', function () {
    return redirect('/learn/webinar/calculate-cost-products');
});

Route::get('learn/breakfast/what-is-roi', function () {
    return redirect('/learn/webinar/what-is-roi');
});

Route::get('learn/breakfast/kpi_experience', function () {
    return redirect('/learn/webinar/kpi_experience');
});

Route::get('learn/breakfast/offset-investment', function () {
    return redirect('/learn/webinar/offset-investment');
});

Route::get('learn/breakfast/manage-risks', function () {
    return redirect('/learn/webinar/manage-risks');
});

Route::get('learn/breakfast/maturity-of-processes', function () {
    return redirect('/learn/webinar/maturity-of-processes');
});

Route::get('learn/webinar/corporate_culture', function () {
    return redirect('/learn/breakfast/corporate_culture');
});

Route::get('company/publication', function () {
    return redirect('/company');
});

Route::get('company/action/webinar/strategy.php', function () {
    return redirect('/company');
});

Route::get('company/action/seminar/motivation/index.htm', function () {
    return redirect('/company');
});

Route::get('company/action/seminar/finance.htm', function () {
    return redirect('/company');
});

Route::get('news/50421', function () {
    return redirect('/news');
});


Route::get('60703', function () {
    return redirect('/learn/webinar');
});

Route::get('company/action/seminar/effective_planning/webinar.htm', function () {
    return redirect('/learn/webinar');
});

Route::get('61115', function () {
    return redirect('/learn/webinar');
});


Route::get('action/seminar/effective_planning/kochnev.htm', function () {
    return redirect('/learn/webinar');
});

Route::get('60518', function () {
    return redirect('/learn/webinar');
});

Route::get('60518', function () {
    return redirect('/learn/webinar');
});

Route::get('businesstraining/distance_learning', function () {
    return redirect('/learn/webinar');
});

Route::get('60518', function () {
    return redirect('/learn/webinar');
});

Route::get('projects', function () {
    return redirect('/company/projects');
});

Route::get('news/60518', function () {
    return redirect('/news');
});

Route::get('news/60221', function () {
    return redirect('/news');
});

Route::get('publications/processes/process_automation/avtomatizirovat_upravlenie_biznes_protsessami', function () {
    return redirect('/publications/processes/avtomatizirovat_upravlenie_biznes_protsessami');
});


Route::get('publications/corporation/section_97/article_2758', function () {
    return redirect('/publications/strategy/section_17/article_3642');
});


Route::get('index.htm', function () {
    return redirect('/index.php');
});

Route::get('publications/marketing/section_26/article_3518', function () {
    return redirect('/publications/marketing/section_26');
});

Route::get('publications/target/opyt-primenenija-kpi-prichiny-uspehov-i-nesbyvshihsja-ozhida', function () {
    return redirect('/publications/target/opyt-primenenija-kpi');
});

Route::get('publications/it/section_55/article_1810', function () {
    return redirect('/publications/it');
});

Route::get('publications/finances/section_29/article_1728', function () {
    return redirect('/publications/finances/section_29');
});

Route::get('news/81206', function () {
    return redirect('/news');
});

Route::get('news/81206', function () {
    return redirect('/news');
});

Route::get('news/80712', function () {
    return redirect('/news');
});

Route::get('businesstraining/justintime', function () {
    return redirect('/learn/webinar');
});


Route::get('news/30312', function () {
    return redirect('/news');
});


Route::get('news/120606', function () {
    return redirect('/news');
});

Route::get('news/60116', function () {
    return redirect('/news');
});

Route::get('company/seminar', function () {
    return redirect('/company/about');
});

Route::get('team', function () {
    return redirect('/company/about');
});

Route::get('forum-slovo.ru/index.php-topic=40366.msg2214046', function () {
    return redirect('/company/about');
});

Route::get('learn/webinar/change_man/11', function () {
    return redirect('/learn/webinar/change_man');
});

//Route::get('learn/course/process_control_system', function() {
//    return redirect('/learn/course/kak-postroit-sistemu-upravlenija-protsessami-za-4-mesjatsa');
//});

Route::get('learn/course/management_processes', function () {
    return redirect('/learn/course');
});


Route::get('company/corp_seminar', function () {
    return redirect('/company/about');
});

Route::get('company/actual', function () {
    return redirect('/company/about');
});

Route::get('company/business-club', function () {
    return redirect('/company/about');
});

// руты для отправки опроса на мыло
Route::group(['prefix' => 'SendMail'], function () {
    Route::get('/index', function () {
        return view('iteam.expertnaja-daignostika-sistemi-finansovogo-urpavlenija.index');
    });
    Route::get('/forma', function () {
        return view('iteam.expertnaja-daignostika-sistemi-finansovogo-urpavlenija.forma');
    });
});
Route::post('sendemail', ['as' => 'emailTest.EmailSend.sendMail', 'uses' => 'EmailTest\EmailSendController@sendMail']);



//руты для сбора отзывов для получения материалов
Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'SendComment'], function () {
        Route::get('/index', function () {
            return view('iteam.razrabotka-planov-i-budzhetov-na-2018.index');
        });
        Route::get('/materiali', function () {
            return view('iteam.razrabotka-planov-i-budzhetov-na-2018.materiali');
        });
    });

    Route::post('SendComment', ['as' => 'emailTest.EmailSend.sendComm', 'uses' => 'EmailTest\EmailSendController@sendComm']);
    Route::get('RequestCall', ['as' => 'emailTest.EmailSend.requestCall', 'uses' => 'EmailTest\EmailSendController@requestCall']);
});





Route::group(['middleware' => ['web']], function () {

    Route::group(['domain' => 'old.iteam.test'], function () {

        Route::group(['prefix' => 'walletone'], function () {
            Route::post('/', ['as' => 'walletone.incoming.transaction', 'uses' => 'Walletone\WalletoneController@proccessIncomingTransaction']);
        });
        
        Route::group(['prefix' => 'grform'], function () {
            Route::get('/', ['as' => 'grform.store', 'uses' => 'Ajax\FormController@store']);
            Route::get('/payment', ['as' => 'grform.payment', 'uses' => 'Ajax\FormController@storePayment']);
        });

        Route::get('companies', ['as' => 'companies.index', 'uses' => 'CompaniesController@index']);

        Route::post('send-question', ['as' => 'site.learn.send-question', 'uses' => 'Learn\LearnController@sendQuestion']);
        Route::post('send-review', ['as' => 'site.learn.send-review', 'uses' => 'Learn\LearnController@sendReview']);

        Route::group(['prefix' => 'mark'], function () {
            Route::get('get-list/{id}', ['as' => 'site.mark.get-list', 'uses' => 'MarkController@getList']);
        });

        Route::group(['prefix' => 'tests'], function () {
            Route::get('/', ['as' => 'site.test.index', 'uses' => 'TestController@index']);
            Route::get('show/{id}', ['as' => 'site.test.show', 'uses' => 'TestController@show']);
            Route::get('show-form/{id}', ['as' => 'site.test.show-form', 'uses' => 'TestController@showForm']);
//            Route::get('result', ['as' => 'site.test.result', 'uses' => 'TestController@result']);
            Route::post('send/{id}', ['as' => 'site.test.result', 'uses' => 'TestController@resultTest']);
            Route::get('order/{id}', ['as' => 'site.test.order', 'uses' => 'TestController@orderTest']);
            Route::post('corporation-send/{id}', ['as' => 'site.test.corporation.result', 'uses' => 'TestController@saveResultCorporationTest']);
        });


        // DisposableTest
        Route::group(['prefix' => 'master-test', 'middleware' => ['auth']], function () {
            Route::get('view/{name}', ['as' => 'master-test.index', 'uses' => 'DisposableTestController@index']);
            Route::get('system', ['as' => 'master-test.system', 'uses' => 'DisposableTestController@system']);
            Route::get('engine', ['as' => 'master-test.engine', 'uses' => 'DisposableTestController@engine']);
            Route::get('send-certificate/{name}', ['as' => 'master-test.certificate', 'uses' => 'DisposableTestController@getCertificate']);
        });

        // Company
        Route::group(['prefix' => 'company'], function () {
            //Route::get('/', 'CopageController@indexHome')->name('company.home');
            Route::get('response', 'ResponseController@index')->name('response.index');
            Route::get('response/{id}', 'ResponseController@show')->name('response.show');
            Route::get('projects', 'ProjectController@index');

            // TEMP
            Route::get('i', function () {
                return redirect('/i');
            });

            Route::get('/{path?}', 'CopageController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');
        });

        //
        Route::group(['prefix' => 'spec'], function () {
            Route::get('/', function () {
                return redirect('/');
            });

            Route::get('wish', 'WishController@index')->name('wish.index');
            Route::get('wish/create', 'WishController@create')->name('wish.create');
            Route::get('wish/{year}', 'WishController@show')->where('year', '201[5-7]')->name('wish.show');
            Route::post('wish', 'WishController@store')->name('wish.store');
        });

        // Редиректы
        Route::get('learn/webinar/corporate_culture/thanks', function () {
            return redirect('/promo/corporate_culture/thanks');
        });
        Route::get('courses', function () {
            return redirect('https://iteam.ru/learn/course/');
        });
        Route::get('courses/{path?}', function ($path) {
            return redirect('https://iteam.ru/learn/course/' . $path);
        })->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');


        // Курсы / Вебинары
        Route::get('learn/{path?}', 'Learn\LearnController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+')->name('learn');


        Route::group(['prefix' => 'v2', 'middleware' => ['admin']], function () {

            // Company
            Route::group(['prefix' => 'company'], function () {
                Route::get('response', 'Site\ResponseController@index')->name('response.index');
                Route::get('response/{id}', 'Site\ResponseController@show')->name('response.show');

                Route::get('projects', 'Site\ProjectController@index');

                Route::get('/{path?}', 'Site\CopageController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');
            });

            // Курсы / Вебинары 2
            Route::get('learn/{path?}', 'Site\ProductController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+')->name('product');

            /*
            Route::get('learn-template1', function(){
                return view('test.one');
            });
            Route::get('learn-template2', function(){
                return view('test.two');
            });
            */

            Route::get('news/{path?}', 'Site\NewsController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+')->name('news');

            Route::get('publications/{path?}', 'Site\ArticleController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+')->name('publications');
            Route::get('search', 'Site\HomeController@search')->name('search');

            Route::get('author', 'Site\AuthorController@index')->name('authors');
            Route::get('author/{id?}', 'Site\AuthorController@show')->name('author');

            Route::get('/', 'Site\HomeController@index')->name('home');
            Route::get('/{path}', 'Site\HomeController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+')->name('page');


        });

        Route::group(['prefix' => 'i', 'middleware' => ['auth']], function () {

            Route::get('/', 'ProfileController@index')->name('profile');
            Route::post('/', 'ProfileController@postProfile')->name('profile.post');

            Route::resource('order', 'OrderController', ['names' => [
                'index' => 'orders.index',
                'store' => 'orders.store',
                'create' => 'orders.create',
                'destroy' => 'orders.destroy',
                'show' => 'orders.show',
                'edit' => 'orders.edit',
                'update' => 'orders.update',
            ]]);

            //Route::get('upload', 'UploadController@index')->name('upload');
            //Route::post('upload', 'UploadController@store')->name('upload.store');

        });


        Route::get('i/auth', 'Auth\AuthController@getAuth')->name('auth.get');
        Route::get('i/auth/{email?}', 'Auth\AuthController@checkAuth')->name('auth.check');
        //Route::get('auth/{email?}', 'Auth\AuthController@postAuth')->name('auth.post');
        Route::post('i/auth', 'Auth\AuthController@postAuth')->name('auth.post');

        Route::get('auth/email/{email?}/{confirm?}', ['as' => 'email.get', 'uses' => 'Auth\AuthController@authEmail']);
        Route::post('i/email/{email?}/{confirm?}', 'Auth\AuthController@authEmailPost')->name('email.post');

        Route::post('i/ajax', [
            'middleware' => ['ajax'],
            'as' => 'auth.ajax',
            'uses' => 'Auth\AuthController@postAuthAjax'
        ]);

        Route::group(['prefix' => 'ajax', 'middleware' => ['ajax', 'auth']], function () {
            Route::resource('order', 'Ajax\OrderController', ['names' => [
                'index' => 'ajax.orders.index',
                'store' => 'ajax.orders.store',
                'create' => 'ajax.orders.create',
                'destroy' => 'ajax.orders.destroy',
                'show' => 'ajax.orders.show',
                'edit' => 'ajax.orders.edit',
                'update' => 'ajax.orders.update',
            ]]);
        });

        #Route::post('ajax/login', 'Auth\AuthController@postLoginAjax')->name('ajax.login');
        Route::post('ajax/login', [
            'middleware' => ['ajax'],
            'as' => 'login.ajax',
            'uses' => 'Auth\AuthController@postLoginAjax'
        ]);


        // Authentication routes...
        Route::get('auth/login', 'Auth\AuthController@getLogin')->name('login');
        Route::post('auth/login', 'Auth\AuthController@postLogin')->name('login.post');
        Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('logout');
        Route::get('auth/confirm/{token?}', 'Auth\AuthController@getConfirm')->name('confirm');
        Route::post('auth/confirm', 'Auth\AuthController@postConfirm')->name('confirm.post');

        // Resend routes...
        //Route::get('auth/resend', 'Auth\AuthController@getResend')->name('profile');

        // Registration routes...
        Route::get('auth/register', 'Auth\AuthController@getRegister')->name('register');
        Route::post('auth/register', 'Auth\AuthController@postRegister')->name('register.post');

        // Password reset link request routes...
        Route::get('password/email', 'Auth\PasswordController@getEmail')->name('password');
        Route::post('password/email', 'Auth\PasswordController@postEmail')->name('password.post');

        // Password reset routes...
        Route::get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('reset');
        Route::post('password/reset', 'Auth\PasswordController@postReset')->name('reset.post');

        // Admin
        Route::group(['prefix' => '~', 'middleware' => ['redac']], function () {

            Route::get('/', [
                'uses' => 'Admin\AdminController@index',
                'as' => 'admin.home'
            ]);

            Route::resource('company', 'Admin\CompanyController', ['names' => [
                'index' => 'admin.company.index',
                'store' => 'admin.company.store',
                'create' => 'admin.company.create',
                'destroy' => 'admin.company.destroy',
                'show' => 'admin.company.show',
                'edit' => 'admin.company.edit',
                'update' => 'admin.company.update',
            ]]);

            Route::group(['middleware' => 'admin'], function () {
                Route::group(['prefix' => 'mark', 'namespace' => 'Admin'], function () {
                    Route::get('index', ['as' => 'admin.mark.index', 'uses' => 'MarkController@index']);
                    Route::post('store', ['as' => 'admin.mark.store', 'uses' => 'MarkController@store']);
                    Route::get('destroy/{id}', ['as' => 'admin.mark.destroy', 'uses' => 'MarkController@destroy']);
                });
                Route::post('add-mark', ['as' => 'admin.resource.add-mark', 'uses' => 'Admin\MarkController@addMark']);
                Route::get('destroy-article-mark/{id}', ['as' => 'admin.resource.destroy', 'uses' => 'Admin\MarkController@destroyMark']);

                Route::group(['prefix' => 'report', 'namespace' => 'Admin'], function () {
                    Route::get('/month', ['as' => 'admin.report.month', 'uses' => 'ReportController@month']);
                });

                Route::group(['prefix' => 'test', 'namespace' => 'Admin'], function () {
                    Route::get('index', ['as' => 'admin.test.index', 'uses' => 'TestController@index']);
                    Route::get('type-test', ['as' => 'admin.test.type', 'uses' => 'TestController@getTypeTestAll']);
                    Route::post('create-test/{id}', ['as' => 'admin.test.create', 'uses' => 'TestController@createTest']);
                    Route::post('add-question/{id}', ['as' => 'admin.test.add.question', 'uses' => 'TestController@addQuestion']);
//                    Route::get('show-question/{id}', ['as' => 'admin.test.show', 'uses' => 'TestController@show']);
                    Route::get('edit-test/{id}', ['as' => 'admin.test.edit', 'uses' => 'TestController@edit']);
                    Route::group(['prefix' => 'update'], function () {
                        Route::post('base/{id}', ['as' => 'admin.test.update.base', 'uses' => 'TestController@updateBase']);
                        Route::post('question/{id}', ['as' => 'admin.test.update.question', 'uses' => 'TestController@updateQuestion']);
                        Route::post('condition/{id}', ['as' => 'admin.test.update.condition', 'uses' => 'TestController@updateCondition']);
                        Route::post('seo/{id}', ['as' => 'admin.test.update.seo', 'uses' => 'TestController@updateSeo']);
                    });
                    Route::post('store/{id}', ['as' => 'admin.test.store1', 'uses' => 'TestController@store1']);
                    Route::get('destroy/{id}', ['as' => 'admin.test.destroy', 'uses' => 'TestController@destroy']);
                    Route::get('destroy-question/{id}', ['as' => 'admin.test.destroy.question', 'uses' => 'TestController@destroyQuestion']);
                    Route::get('info/{id}', ['as' => 'admin.test.info', 'uses' => 'TestController@getInfo']);
                });

                Route::group(['prefix' => 'category-learn', 'namespace' => 'Admin'], function () {
                    Route::get('/', ['as' => 'admin.category-learn.index', 'uses' => 'CategoryController@index']);
                    Route::post('store', ['as' => 'admin.category-learn.store', 'uses' => 'CategoryController@store']);
                    Route::get('destroy/{id}', ['as' => 'admin.category-learn.destroy', 'uses' => 'CategoryController@destroy']);
                });

                Route::group(['prefix' => 'xmlhttp'], function () {
                    Route::post('urlupload', 'UploadController@ajaxUploadFromUrl')->name('urlupload');
                });
                //Route::group(['prefix' => 'ajax', 'middleware' => 'ajax'], function() {
                //	Route::post('urlupload', 'UploadController@ajaxUploadFromUrl')->name('urlupload');
                //});

                Route::resource('order', 'Admin\OrderController', ['names' => [
                    'index' => 'admin.order.index',
                    'store' => 'admin.order.store',
                    'create' => 'admin.order.create',
                    'destroy' => 'admin.order.destroy',
                    'show' => 'admin.order.show',
                    'edit' => 'admin.order.edit',
                    'update' => 'admin.order.update',
                ]]);
                Route::get('excelDate', ['as' => 'admin.order.exceldate', 'uses' => 'Admin\OrderController@excelDate']);
                Route::get('create-order-test', ['as' => 'admin.order.create-test', 'uses' => 'Admin\OrderController@createOrderTest']);
                Route::post('store-order-test', ['as' => 'admin.order.store-test', 'uses' => 'Admin\OrderController@storeOrderTest']);

                Route::get('checkemail/{email?}', 'Admin\OrderController@checkEmail')->name('admin.order.checkemail');

                Route::resource('user', 'Admin\UserController', ['names' => [
                    'index' => 'admin.user.index',
                    'store' => 'admin.user.store',
                    'create' => 'admin.user.create',
                    'destroy' => 'admin.user.destroy',
                    'show' => 'admin.user.show',
                    'edit' => 'admin.user.edit',
                    'update' => 'admin.user.update',
                ]]);

                // TEMP GR
                Route::get('gr', 'Admin\GRController@index');

            });

            Route::get('files', [
                'uses' => 'Admin\AdminController@filemanager',
                'as' => 'admin.files'
            ]);

            Route::resource('article', 'Admin\ArticleController', ['names' => [
                'index' => 'admin.article.index',
                'store' => 'admin.article.store',
                'create' => 'admin.article.create',
                'destroy' => 'admin.article.destroy',
                'show' => 'admin.article.show',
                'edit' => 'admin.article.edit',
                'update' => 'admin.article.update',
            ]]);

            Route::resource('news', 'Admin\NewsController', ['names' => [
                'index' => 'admin.news.index',
                'store' => 'admin.news.store',
                'create' => 'admin.news.create',
                'destroy' => 'admin.news.destroy',
                'show' => 'admin.news.show',
                'edit' => 'admin.news.edit',
                'update' => 'admin.news.update',
            ]]);

            Route::resource('learn', 'Admin\LearnController', ['names' => [
                'index' => 'admin.learn.index',
                'store' => 'admin.learn.store',
                'create' => 'admin.learn.create',
                'destroy' => 'admin.learn.destroy',
                'show' => 'admin.learn.show',
                'edit' => 'admin.learn.edit',
                'update' => 'admin.learn.update',
            ]]);

            Route::resource('wish', 'Admin\WishController', ['names' => [
                'index' => 'admin.wish.index',
                'store' => 'admin.wish.store',
                'create' => 'admin.wish.create',
                'destroy' => 'admin.wish.destroy',
                'show' => 'admin.wish.show',
                'edit' => 'admin.wish.edit',
                'update' => 'admin.wish.update',
            ]]);

            Route::resource('response', 'Admin\ResponseController', ['names' => [
                'index' => 'admin.response.index',
                'store' => 'admin.response.store',
                'create' => 'admin.response.create',
//				'destroy' => 'admin.response.destroy',
                'show' => 'admin.response.show',
                'edit' => 'admin.response.edit',
//				'update' => 'admin.response.update',
            ]]);

            Route::get('response/{id}/destroy', ['as' => 'admin.response.destroy', 'uses' => 'Admin\ResponseController@destroy']);
            Route::post('response/{id}/update', ['as' => 'admin.response.update', 'uses' => 'Admin\ResponseController@update']);


            Route::resource('project', 'Admin\ProjectController', ['names' => [
                'index' => 'admin.project.index',
                'store' => 'admin.project.store',
                'create' => 'admin.project.create',
                'destroy' => 'admin.project.destroy',
                'show' => 'admin.project.show',
                'edit' => 'admin.project.edit',
                'update' => 'admin.project.update',
            ]]);

        });

        Route::get('news/{path?}', 'Iteam\NewsController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

        Route::get('publications/{path?}', 'Iteam\ArticleController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');
        Route::get('search', 'Iteam\HomeController@search');

        #Route::get('teste', 'Cron\OrderController@index');
        #Route::get('teste', function(){
        #	return view('emails.auth.template', ['title'=>'Шаблон письма','text'=>'Текст письма<br><center><a class="btn" href="#">Ссылка для входа</a></center><br>']);
        #});
        Route::get('author', 'AuthorController@index')->name('author.index');
        Route::get('author/{id?}', 'AuthorController@show')->name('author.show');


        Route::get('/{path?}', 'Iteam\HomeController@index')->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');

    });

    // редирект с co.iteam
    Route::group(['domain' => 'co.iteam.ru'], function () {
        Route::get('/{path?}', function ($path) {
            return redirect('https://iteam.ru/' . $path);
        })->where('path', '[абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯa-zA-Z0-9/_-]+');
    });


});
