# Vertex IT Blade Components

## Installation

In composer.json add:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/vertex-it/blade-components"
    }
]
```

Then install the package via composer:

```bash
composer require vertex-it/blade-components
```

You will be required to generate a token. It is easy, just follow the steps provided in the composer message.

## Usage

### NPM Dependencies

#### Image Cropper

Image cropper component uses [cropper](https://github.com/fengyuanchen/cropperjs) package. To install it in your project, do:

```bash
npm install cropper
```

In `resources/js/bootstrap.js` add:

```js
window.cropper = require('cropper');
```

In `resources/sass/app.scss` add:

```scss
@import '~cropper/dist/cropper.min.css';
```

#### Date

Date component uses [flatpickr](https://github.com/flatpickr/flatpickr) package. To install it in your project, do:

```bash
npm install flatpickr
```

In `resources/js/bootstrap.js` add:

```js
window.flatpickr = require('flatpickr');
```

If you want to localize it to, for example Serbian, also add:

```js
window.flatpickrSerbian = require("flatpickr/dist/l10n/sr.js").default.sr;
flatpickr.localize(flatpickrSerbian);
flatpickr.l10ns.default.firstDayOfWeek = 1;
```

In `resources/js/app.js` add:

```js
require('flatpickr');
```

In `resources/sass/app.scss` add:

```scss
@import '~flatpickr/dist/flatpickr.css';
```

#### Select

For selecting multiple values select component uses [selectize](https://github.com/selectize/selectize.js) package. To install it in your project, do:

```bash
npm install selectize
```

In `resources/js/bootstrap.js` add:

```js
window.selectize = require('selectize');
```

In `resources/sass/app.scss` add:

```scss
@import '~selectize/dist/css/selectize.css';
```

#### Textarea

Textarea can use [TinyMCE](https://www.tiny.cloud/) dependency for WYSIWYG.

To install TinyMCE, do:

```bash
npm install tinymce
```

In `resources/js/bootstrap.js` add:

```js
window.tinymce = require('tinymce/tinymce.js');
```

In `resources/js/app.js` add the plugins you want to use, the default ones are:

```js
require('tinymce/themes/silver/theme.js');
require('tinymce/plugins/autoresize/plugin.js');
require('tinymce/plugins/advlist/plugin.js');
require('tinymce/plugins/hr/plugin.js');
require('tinymce/plugins/charmap/plugin.js');
require('tinymce/plugins/fullscreen/plugin.js');
require('tinymce/plugins/insertdatetime/plugin.js');
require('tinymce/plugins/image/plugin.js');
require('tinymce/plugins/link/plugin.js');
require('tinymce/plugins/preview/plugin.js');
require('tinymce/plugins/searchreplace/plugin.js');
require('tinymce/plugins/visualblocks/plugin.js');
require('tinymce/plugins/wordcount/plugin.js');
require('tinymce/plugins/help/plugin.js');
require('tinymce/plugins/lists/plugin.js');
require('tinymce/plugins/code/plugin.js');
```

In `webpack.mix.js` add:

```js
mix.copyDirectory('node_modules/tinymce/icons', 'public/js/icons');
mix.copyDirectory('node_modules/tinymce/plugins', 'public/js/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/js/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/js/themes');
```

#### Timepicker

Time uses [jquery timepicker](https://timepicker.co/) package. To install it in your project, do:

```bash
npm install jquery-timepicker
```

In `resources/js/bootstrap.js` add:

```bash
window.timepicker = require('jquery-timepicker/jquery.timepicker');
```

In `resources/sass/app.scss` add:

```scss
@import '~jquery-timepicker/jquery.timepicker.css';
```

#### Uppy

Install npm package:

```bash
npm install uppy
```

In `resources/js/bootstrap.js` add:

```js
window.Uppy = require('@uppy/core');
window.XHRUpload = require('@uppy/xhr-upload');
window.Dashboard = require('@uppy/dashboard');
```

In `resources/js/app.js` add:

```js
require('@uppy/core/dist/style.css');
require('@uppy/dashboard/dist/style.css');
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@vertex-it.com instead of using the issue tracker.

## Credits

- [Vertex IT](https://github.com/vertex-it)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
