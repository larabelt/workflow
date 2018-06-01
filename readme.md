## Installation

Add the ServiceProvider to the providers array in config/app.php

```php
Belt\Workflow\BeltWorkflowServiceProvider::class,
```

```
# publish
php artisan belt-workflow:publish
composer dumpautoload

# migration
php artisan migrate

# seed
php artisan db:seed --class=BeltWorkflowSeeder

# compile assets
npm run
```
