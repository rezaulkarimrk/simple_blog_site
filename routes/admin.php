<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'AdminLogin'])->name('admin.login');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'is_admin'], function(){
  Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
  Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

  // Category Route subcategory.index
  Route::group(['prefix' => 'category' ], function(){
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::post('store', 'CategoryController@store')->name('category.store');
    Route::get('delete/{id}', 'CategoryController@destroy')->name('category.delete'); 
    Route::get('edit/{id}', 'CategoryController@edit'); 
    Route::post('update', 'CategoryController@update')->name('category.update'); 
  });

  //SubCategory
  Route::group(['prefix' => 'subcategory' ], function(){
    Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
    Route::post('store', 'SubcategoryController@store')->name('subcategory.store');
    Route::get('delete/{id}', 'SubcategoryController@destroy')->name('subcategory.delete'); 
    Route::get('edit/{id}', 'SubcategoryController@edit'); 
    Route::post('update', 'SubcategoryController@update')->name('subcategory.update'); 
  });
  // header section
  Route::group(['prefix' => 'header' ], function(){
    Route::get('/', 'HeaderController@index')->name('header.index');
    Route::post('/', 'HeaderController@update')->name('header.update');
  });
  // About
  Route::group(['prefix' => 'about' ], function(){
    Route::get('/', 'AboutController@index')->name('about.index');
    Route::post('/', 'AboutController@update')->name('about.update');
  });
  // services store
  Route::group(['prefix' => 'services' ], function(){
    Route::get('/index', 'ServicesController@index')->name('services.index');
    Route::post('/update', 'ServicesController@update')->name('services.update');
  });
  // services skill
  Route::group(['prefix' => 'services_skill' ], function(){
    Route::post('skill', 'ServicesController@skillstore')->name('servicesSkill.store');
    Route::get('delete/{id}', 'ServicesController@destroy')->name('skill.delete');
    Route::get('edit/{id}', 'ServicesController@edit');
    Route::post('update', 'ServicesController@skillupdate')->name('servicesSkill.update');
  });

  // main skill section
  Route::group(['prefix' => 'skill' ], function(){
    Route::get('/index', 'SkillsController@index')->name('skill.index');
    Route::post('/update', 'SkillsController@update')->name('mainSkill.update');
  });

  // skill list
  Route::group(['prefix' => 'skill_list' ], function(){
    Route::post('skill', 'SkillsController@skillstore')->name('Skill.store');
    Route::get('delete/{id}', 'SkillsController@destroy')->name('skills.delete');
    Route::get('edit/{id}', 'SkillsController@edit');
    Route::post('update', 'SkillsController@skillupdate')->name('skill.update');
    });

  // main portfolio section
  Route::group(['prefix' => 'portfolio' ], function(){
    Route::get('/index', 'PortfolioController@index')->name('portfolio.index');
    Route::post('/update', 'PortfolioController@update')->name('portfolio.update');
  });

  // add portfolio 
  Route::group(['prefix' => 'portfolio' ], function(){
    Route::get('add', 'PortfolioController@add')->name('Portfolio.add');
    Route::post('store', 'PortfolioController@store')->name('portfolio.store');
    Route::get('delete/{id}', 'PortfolioController@destroy')->name('portfolio.delete');
    Route::get('edit/{id}', 'PortfolioController@edit')->name('portfolio.edit');
    Route::post('update_list/{id}', 'PortfolioController@singleupdate')->name('portfolio_list.update');
    });

});
