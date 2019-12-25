### Installations


add to routes/web.php
```php
$router->post('/user/todo/select', [
	'middleware' => 'xss',
	'uses' => 'TodoController@select'
]);
```
