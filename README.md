# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vertex-it/blade-components.svg?style=flat-square)](https://packagist.org/packages/vertex-it/blade-components)
[![Build Status](https://img.shields.io/travis/vertex-it/blade-components/master.svg?style=flat-square)](https://travis-ci.org/vertex-it/blade-components)
[![Quality Score](https://img.shields.io/scrutinizer/g/vertex-it/blade-components.svg?style=flat-square)](https://scrutinizer-ci.com/g/vertex-it/blade-components)
[![Total Downloads](https://img.shields.io/packagist/dt/vertex-it/blade-components.svg?style=flat-square)](https://packagist.org/packages/vertex-it/blade-components)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

In composer.json add:

```json
"repositories": [
    {
        "type": "path",
        "url": "../path/to/blade-components"
    }
]
```

Then install the package via composer:

```bash
composer require vertex-it/blade-components
```

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

Textarea can use [TinyMCE](https://www.tiny.cloud/) dependency for WYSIWYG. Right now there is no way to install it through npm, so it needs to be added manually.

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