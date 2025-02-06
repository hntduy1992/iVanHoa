# iVanHoa
## Setup for development
1. Install laravel
```
laravel new app
```
2. Install inertia
* add package inertiajs/inertia-laravel
```
composer require inertiajs/inertia-laravel
```
* Setup the root template that will be loaded on the first page visit to your application
```html
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>
```
* Setup the Inertia middleware
```php
php artisan inertia:middleware
```
* Append the HandleInertiaRequests middleware to the web middleware group in your application's bootstrap/app.php file
```php
use App\Http\Middleware\HandleInertiaRequests;

->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        HandleInertiaRequests::class,
    ]);
})
```
* Install the Inertia client-side adapter corresponding to your framework of choice
```base
npm install @inertiajs/vue3
```
* Update your main JavaScript file to boot your Inertia app
```javascript
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
```
* Resolving components vite
```javascript
// Vite
resolve: name => {
  const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
  return pages[`./Pages/${name}.vue`]
}
```
3. Install tailwindcss
