This library creates a useful helper function debug() that can replace standard var_dumb() and print_r.

Installation.
-------------

#### If you install it manually, just include two files:
```php
require_once './debug/src/vanguardkras/debug/Debug.php';
require_once './debug/src/vanguardkras/debug/helper.php';
```

#### Composer:
```php
require __DIR__ . '/vendor/autoload.php';
```

Usage
------

Just use one function and give it any argument:
```php
debug($variable);
```
