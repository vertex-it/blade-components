@if($inline)
    <div class="col-lg-{{ $inline }} col-xs-12">
@endif

<div class="form-group {{ $inline ?? 'row' }} @error($name) has-error has-danger @enderror">

@if(! $inline)
    <div class="col-sm-12 col-md-8 col-xl-{{ $columns ?? '6' }}">
@endif