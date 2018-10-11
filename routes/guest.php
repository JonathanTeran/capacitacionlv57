<?php

Route::get('categoria-{category}-books',
        'GuestController@booksByCategory')
        ->name('category.book');