# Vertex IT Blade Components

## Installation

### Composer

In composer.json add:

```json
    "repositories": [
        {
            "type": "vcs", // "path",
            "url": "https://github.com/vertex-it/blade-components" // "../path/to/blade-components"
        }
    ]
```

Then install the package via composer:

```bash
    composer require vertex-it/blade-components
```

If you are installing blade-components for the first time you will be asked to generate a token, which is really easy, just follow the steps provided in the composer message.

### NPM Dependencies

```bash
    # Image Cropper
    npm install jquery cropperjs jquery-cropper

    # Date
    npm install flatpickr

    # Select
    npm install selectize

    # Textarea
    npm install tinymce

    # Timepicker
    npm install timepicker

    # Uppy
    npm install uppy

    # Bootstrap Switch
    npm install bootstrap4-toggle

    # Or if you want to install all the dependencies use this command
    npm install jquery cropperjs jquery-cropper flatpickr selectize tinymce timepicker uppy bootstrap4-toggle

```

To start using blade components you will need to add the following to your webpack.mix.js:
```js
    mix.js('resources/js/blade-components-bootstrap.js', 'public/js');

    // ...

    mix.styles([
        //... css resources
    ]).scripts([
        'public/js/blade-components-bootstrap.js',
        // ... all other js resources
    ]);

    // Tinymce resources
    // If you need to use tinymce rich text editor you will need to add the following
    mix.copyDirectory('node_modules/tinymce/icons', 'public/js/icons');
    mix.copyDirectory('node_modules/tinymce/plugins', 'public/js/plugins');
    mix.copyDirectory('node_modules/tinymce/skins', 'public/js/skins');
    mix.copyDirectory('node_modules/tinymce/themes', 'public/js/themes');
```

Finally run to get compiled frontend resources and start using blade components:
```bash
    npm run dev // or npm run prod if you are in production
```

## Usage

<!-- TODO: Add blade components mention and url to the docs -->

### Breadcrumb component

### Form component

```blade
    <x-form
        action="absolute/path/to/articles"
        method="POST"
        buttonText="Submit"
        multipart
    >
        {{-- There goes slot content --}}
    </x-form>
```

### Modal and modal-button component

### Multi-input component

### Translated component

### Input components

#### Common attributes
| Component attribute | HTML equivalent | Required | Description |
|:-:|:-:|:-:|:-:|
| name | name | Yes | Name attribute has the same value as passed to the x-component. <br> Only exception are the components which can accept multiple values: **checkbox** and **select**.  |
| label | label | No | If not passed, label will be created from formatted name attribute value. |
| placeholder | placeholder | No | If not passed, placeholder will be created from the placeholder_prefix (translation key) and generated label. <br> Some of the components do not support **placeholder** attribute: **checkbox**, **cropper**, **file**, **radio**, **toggle** and **uppy**. |
| value | value | No | If passed x-component will use it as value for the according input.<br> If there is a validation error, x-component will prefer old() value over originally passed value!
| required | required | No | If passed, it will be added to the inputs which have native required support. <br> All of the components with the required attribute will contain red asterisk as a sign of the required field in the label. |
| comment | - | No | Accepts text or HTML. Output is displayed below component as a small block of text (HTML). |
| inline | - | No |  If passed, components will use bootstrap inline configuration (classes, elements, etc.). <br> Please note that if you are using **inline** you should wrap those components in a bootstrap row! <br> Some of them do not support **inline** attribute: **checkbox**, **cropper**, **radio**, **textarea** and **uppy**. |

#### Checkbox <x-inputs.checkbox ... />
```blade
    <x-inputs.checkbox
        name="seasons"
        label="Custom seasons label"
        :value="['spring']"
        required
        comment="You can use <strong>comment</strong> attribute with all of the components and also you can add as much custom attributes as you want to all of the components! <br> Please note that already injected (predefined) attributes will not be available in the custom attributes array and that custom attributes should be named according to the HTML conventions!"
        :options="['winter', 'spring', 'summer', 'autumn']"
        {{-- These are custom attributes which will be apended to the input --}}
        custom_attribute_one="customAttributeOneValue"
        custom_attribute_two="customAttributeTwoValue"
        custom_attribute_n="customAttributeNValue"
    />
```

Checkbox component accepts **:options** array as a set of keys and labels. If keys are not specified then snake cased values will be used. The **:value** attribute accepts an array of keys which will be used to determine if the option is checked.

Please note that **checkbox** component is created as an alternative to the **select** component. If you want to use it as input representation of the boolean value then you should use **toggle** component instead.

#### Date <x-inputs.cropper ... />
```blade
<x-inputs.cropper
    name="cover"
    value="path/to/the/image"
    :aspectRatio="[16, 9]"
/>
```
Cropper component accepts optional **:aspectRatio** array. The optional **value** attribute should contain path to the image.

#### Date <x-inputs.date ... />
```blade

```

#### File <x-inputs.file ... />
```blade

```

#### Input <x-inputs.input ... />
```blade

```

#### Radio <x-inputs.radio ... />
```blade

```

#### Select <x-inputs.select ... />
```blade

```

#### Textarea <x-inputs.textarea ... />
```blade

```

#### Time <x-inputs.time ... />
```blade

```

#### Toggle <x-inputs.toggle ... />
```blade

```

#### Uppy <x-inputs.uppy ... />
```blade

```

## Inline input components

## Multiple input components


<!-- FIXME: Remove unnecessary documentation below -->

#### Cropper

Based on the [cropper](https://github.com/fengyuanchen/cropperjs) and the [jquery-cropper](https://github.com/fengyuanchen/jquery-cropper).

Use example:
```php
    <x-forms.cropper
        name="attrName"
        value="{{ $model->attrName }}"
        label="Attr name"
        required
        :aspectRatio="[0, 0]"
    />
```

#### Date

Based on the [flatpickr](https://github.com/flatpickr/flatpickr).

Use example:
```php
    <x-forms.date
        name="attrName"
        value="{{ $model->attrName }}"
        label="Attr name"
        // required
        // time
        // placeholder
        autofocus
    />
```

#### Select

Based on the [selectize](https://github.com/selectize/selectize.js).

#### Textarea

Based on the [TinyMCE](https://www.tiny.cloud/).

#### Timepicker

Based on the [jquery timepicker](https://timepicker.co/).

#### Uppy

Based on the [Uppy](https://github.com/transloadit/uppy).

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
