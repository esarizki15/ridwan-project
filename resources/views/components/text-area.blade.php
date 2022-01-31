<div class="form-group row">
    <label for="{{ $globalAttribute }}" class="col-md-4 col-form-label text-md-right">{{ __($label ? $label : ucwords($globalAttribute)) }}</label>

    <div class="col-md-6">
        <textarea id="{{ $globalAttribute }}" class="textarea @if($isTinyMce) tinymce @endif form-control @error($globalAttribute) is-invalid @enderror" name="{{ $globalAttribute }}" {{ $customAttribute }} autocomplete="{{ $globalAttribute }}" autofocus rows="{{ $rows ? $rows : 3 }}">{{ $defaultValue }}</textarea>
        {{ $slot }}
        @error($globalAttribute)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>