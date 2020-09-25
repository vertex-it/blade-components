@extends('admin.layouts.master')

@section('title', $getFormTitle)

@section('content')
    {{-- TODO: Add breadcrumb component to the vertex-it blade-components --}}
    {{-- {{ Breadcrumbs::render('firms.edit', $site, $firm) }} --}}

    <div class="content-i">
        <div class="content-box col-xxxl-9 col-xxl-12">
            <div class="element-wrapper">
                <div class="element-box">

                    <x-form
                        action="{{ $getFormAction }}"
                        method="{{ $getFormMethod }}"
                        buttonText="Sačuvajte"
                        multipart
                    >
                        <h5 class="form-header">
                            {{ $getFormTitle }}
                        </h5>

                        <x-inputs.checkbox
                            name="seasons"
                            label="Custom seasons label"
                            :value="['spring']"
                            required
                            comment="You can use <strong>comment</strong> attribute with all of the components and also you can add as much custom attributes as you want to all of the components! <br> Please note that already injected (predefined) attributes will not be available in the custom attributes array and that custom attributes should be named according to the HTML conventions!"
                            {{-- :options="['winter', 'spring', 'summer', 'autumn']" --}}
                            :options="[
                                'winter' => 'Winter (21.12. - 21.3.)',
                                'summer' => 'Summer (21.6. - 21.9.)'
                            ]"
                            {{-- These are custom attributes which will be apended to the input --}}
                            custom_attribute_one="customAttributeOneValue"
                            custom_attribute_two="customAttributeTwoValue"
                            custom_attribute_n="customAttributeNValue"
                        />

                        <x-inputs.cropper
                            name="cover"
                            {{-- label="Custom cover label" --}}
                            {{-- value="http://aspirano.test/storage/media/5/sss.jpeg" --}}
                            {{-- required --}}
                            comment="There you can add input notes!"
                            {{-- :aspectRatio="[false, false]" --}}
                        />

                        <x-inputs.date
                            name="birth_date"
                            {{-- label="Custom birth date label" --}}
                            {{-- placeholder="Please enter the birth day..." --}}
                            {{-- value="2020-5-5 21:30" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                            {{-- time --}}
                        />

                        {{-- TODO: Check what to do on edit because file upload is not working --}}
                        <x-inputs.file
                            name="profile_photo"
                            {{-- label="Custom profile photo label" --}}
                            {{-- value="http://aspirano.test/storage/media/5/sss.jpeg" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                        />

                        <x-inputs.input
                            name="name"
                            {{-- label="Custom headline label" --}}
                            {{-- placeholder="Headline placeholder" --}}
                            {{-- value="23" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                            {{-- type="number" --}}
                        />

                        <x-inputs.radio
                            name="gender"
                            {{-- label="Custom gender label" --}}
                            {{-- value="male" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                            :options="[
                                'Male',
                                'Female'
                            ]"
                        />

                        <x-inputs.select
                            name="cars"
                            {{-- label="Custom cars label" --}}
                            {{-- placeholder="Custom cars placeholder" --}}
                            {{-- value="audi" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                            :options="[
                                'Audi',
                                'BMW',
                                'Mercedes',
                                'VW',
                                'Ferrari'
                            ]"
                            {{-- selectize --}}
                            {{-- multiple --}}
                        />

                        <x-inputs.textarea
                            name="description"
                            {{-- label="Custom cars label" --}}
                            {{-- placeholder="Custom cars placeholder" --}}
                            {{-- value="audi" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                            richText
                        />

                        <x-inputs.time
                            name="alarm"
                            {{-- data-min-time="12:00" --}}
                            {{-- data-step="45" --}}
                            {{-- label="Custom cars label" --}}
                            {{-- placeholder="Custom cars placeholder" --}}
                            {{-- value="14:00" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                            {{-- inline --}}
                            {{-- start="12:00" --}}
                            {{-- interval="60" --}}
                        />

                        <x-inputs.toggle
                            name="active"
                            {{-- label="Custom active label" --}}
                            {{-- value="1" --}}
                            {{-- required --}}
                            {{-- comment="There you can add input notes!" --}}
                            {{-- :options="['Yes', 'No']" --}}
                        />

                        <x-inputs.uppy
                            name="gallery"
                            {{-- label="Custom gallery label" --}}
                            {{-- placeholder="Custom gallery label" --}}
                            {{-- :value="['http://aspirano.test/storage/media/5/sss.jpeg']" --}}
                            {{-- required --}}
                            {{-- route="{{ route('resource.gallery-handle-route') }}" --}}
                            {{-- comment="There you can add input notes!" --}}
                        />

                        <br>
                        <h6>Inline Components</h6>
                        <br>

                        {{-- TODO: Document inline inputs behaviour --}}
                        <div class="row">
                            <x-inputs.input name="first_name" inline="3" type="text" />
                            <x-inputs.input name="last_name" inline="3" type="text" />
                            <x-inputs.date name="birth_date" inline="3" />
                            <x-inputs.file name="logo" inline="3" value="{{ $firm->logo }}" />
                        </div>

                        {{-- TODO: Document translated component --}}
                        <x-translated :languages="['sr', 'en']">
                            @foreach ($locales as $locale)
                                <x-slot :name="$locale">
                                    <x-inputs.input name="headline_{{ $locale }}" type="text" />
                                    <x-inputs.input name="content_{{ $locale }}" type="text" />
                                </x-slot>
                            @endforeach
                        </x-translated>

                        {{-- TODO: Add multiple component --}}

                        {{-- <x-inputs.multi-input
                            name="todo"
                            :inputs="
                                [
                                    [
                                        ['type' => 'number', 'name' => 'number'],
                                        ['type' => 'text', 'name' => 'text']
                                    ], [
                                        ['type' => 'number', 'name' => 'number']
                                    ], [
                                        ['type' => 'number', 'name' => 'number']
                                    ]
                                ]
                            "
                        /> --}}

                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection