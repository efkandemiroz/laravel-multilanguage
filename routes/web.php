<?php

    use Illuminate\Support\Facades\Route;

    Route::get('yeni-blog', function () {
        return view('blog-ekle');
    })->name('yeni-blog');

    Route::post('blog-kaydet', [\App\Http\Controllers\BlogController::class, 'BlogKaydet'])->name('blog-kaydet');

    Route::get('/', [\App\Http\Controllers\BlogController::class, 'Bloglar'])->name('/');

    // Butona tıklandığında session dilini değiştirmek için hazırladığımız route
    Route::get('dil-degistir/{locale}', function ($locale) {
        App::setLocale($locale);
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    });
