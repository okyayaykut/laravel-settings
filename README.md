# laravel-settings
Management settings for laravel 5 using json file.

# Installation

To install this package include it in your `composer.json`

```
"require": {
    "okyayaykut/laravel-settings": "v1.0"
}
```

And run `composer update`

Add the Service Provider to the `provider` array in your `config/app.php`

```
okyayaykut\LaravelConfig\LaravelConfigServiceProvider::class
```

Add an alias for the facade to your `config/app.php`

```
'Settings' => okyayaykut\LaravelConfig\LaravelConfigFacade::class,
```

Publish the config files:

```
$ php artisan vendor:publish --provider="Webjektif\LaravelConfig\LaravelConfigServiceProvider"
```

Change `config/settings.php` according for changing json file path.

# Using

Set a value

```
Settings::set('key', 'value');
```

Set multiple

```
Settings::set([
    'key1' => 'value1',
    'key2' => 'value2',
]);
```

Save all settings

```
Settings::save();
```

Get a value

```
Settings::get('key');
```

Get a value with default

```
Settings::get('key', 'value');
```

Remove a value

```
Settings::remove('key');
```

Clean all settings

```
Settings::clean();
```

Get all settings

```
Settings::all();
```

Set all data

```
Settings::setData([
    'key1' => 'value1',
    'key2' => 'value2',
]);
```

# Contributors

- Aykut OKYAY - [Github](https://github.com/okyayaykut)
