# Simple-PHP-MVC-Framework
a Simple PHP-MVC-Framework - View, Controller framework with URL routing


## .htaccess

change dir in this line

```php
RewriteBase /mvc/public/
````

## Routing

add route in [app/routes](app/routes).

for example

```php
 Route::get('about/{name}','home@about');
```


MIT License


