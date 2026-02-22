# geodit/vm-osjs

Package Laravel pour executer une VM OS.js avec builder PHP et workflow livewire-first.

## Installation locale
1. Ajouter le repository path dans le projet hote.
2. `composer require geodit/vm-osjs:@dev`
3. Publier la config: `php artisan vendor:publish --tag=vm-osjs-config`

## Usage rapide
```php
Route::get('/vm', fn () => vm_osjs()->entry());
```

## Structure
- `src/VmOsjsServiceProvider.php`
- `src/VmManager.php`
- `src/helpers.php`
- `routes/web.php`
- `config/vm.php`
- `resources/views/*`
