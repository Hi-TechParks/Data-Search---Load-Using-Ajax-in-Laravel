# Data Search & Load Using Ajax in Laravel

*** views -layouts/app.blade.php ****

Meta Title should be added in the view header section.

<meta name="_token" content="{{csrf_token()}}" />

CSRF Token for Laravel Form submit verification



*** Routes - web.php ***

Route::post('/admin/faq/number','AjaxController@store');

Ajax Route for search must be as a post method



*** Config - config/database.php ***

Database configuration is optional
