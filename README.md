### Installations


add to routes/web.php
```php
$router->post('/user/todo/select', [
	'middleware' => 'xss',
	'uses' => 'TodoController@select'
]);
```

add to bootstrap/app.php
```php
$app->middleware([
     App\Http\Middleware\Xss::class
]);

$app->routeMiddleware([
    'xss' => App\Http\Middleware\Xss::class,
]);
```
