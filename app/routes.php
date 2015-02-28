<?php

/*============================User routes============================*/

//Home route
Route::get('/',['as'=>'home.index.get','uses'=>'HomeController@getIndex']);


//admin login group
Route::group(['before'=>'guest'],function(){
	//admin logi
	Route::get('/login',['as'=>'admin.login.get','uses'=>'AdminController@getLogin']);
	//login post
	Route::post('/login',['as'=>'admin.login.post','uses'=>'AdminController@postLogin']);
});


//create order - get
Route::get('/order/new-order/{id}',['as'=>'order.create.get','uses'=>'OrderController@getCreate']);
//create order - post
Route::post('/order/new-order/{id}',['before'=>'csrf','as'=>'order.create.post','uses'=>'OrderController@postCreate']);
//single product
Route::get('/product/{id}',['as'=>'product.single.get','uses'=>'ProductController@getSingle']);

/*============================End of User routes============================*/



/*============================Admin routes============================*/
Route::group(['before'=>'auth','prefix'=>'admin'],function(){

	//get logout
	Route::get('/logout',['as'=>'admin.logout.get','uses'=>'AdminController@getLogout']);

	//Orders group
	Route::group(['prefix'=>'orders'],function(){

		//Orders home
		Route::get('/{rule?}',['as'=>'order.index.get','uses'=>'OrderController@getIndex']);

		Route::group(['before'=>'csrf'],function(){

			//change order status
			Route::post('/change-status/{id}',['as'=>'order.change-status.post','uses'=>'OrderController@postChangeStatus']);
			//change order uniq_number
			Route::post('/change-number/{id}',['as'=>'order.change-number.post','uses'=>'OrderController@postChangeNumber']);
			//delete order
			Route::post('/destroy/{id}',['as'=>'order.destroy.post','uses'=>'OrderController@postDestroy']);
		});
	});


	//Products group
	Route::group(['prefix'=>'products'],function(){

		//Products home
		Route::get('/',['as'=>'product.index.get','uses'=>'ProductController@getIndex']);
		//Create product
		Route::get('create',['as'=>'product.create.get','uses'=>'ProductController@getCreate']);
		//Edit product
		Route::get('edit/{id}',['as'=>'product.edit.get','uses'=>'ProductController@getEdit']);
		//get single product
		Route::get('{id}',['as'=>'product.single-admin.get','uses'=>'ProductController@getSingleAdmin']);


		Route::group(['before'=>'csrf'],function(){
			//Post create
			Route::post('create',['as'=>'product.create.post','uses'=>'ProductController@postCreate']);
			//Delete product
			Route::post('destroy/{id}',['as'=>'product.destroy.post','uses'=>'ProductController@postDestroy']);
			//Edit product
			Route::post('edit/{id}',['as'=>'product.edit.post','uses'=>'ProductController@postEdit']);
		});
	});
});
/*============================End of admin routes============================*/
