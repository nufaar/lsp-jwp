<?php

use App\Livewire\Admin\Student\Create;
use App\Livewire\Admin\Student\Edit;
use App\Livewire\Admin\Student\Index;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('students', Index::class)->name('students.index');
    Route::get('students/create', Create::class)->name('students.create');
    Route::get('students/{student}/edit', Edit::class)->name('students.edit');
    // Route::get('students/{student}/show', Show::class)->name('students.show');
});
