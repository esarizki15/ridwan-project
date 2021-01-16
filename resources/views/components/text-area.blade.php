<div class="form-group row">
    <label for="{{ $globalAttribute }}" class="col-md-4 col-form-label text-md-right">{{ __($label ? $label : ucwords($globalAttribute)) }}</label>

    <div class="col-md-6">
        <textarea id="{{ $globalAttribute }}" class="textarea form-control @error($globalAttribute) is-invalid @enderror" name="{{ $globalAttribute }}" {{ $customAttribute }} autocomplete="{{ $globalAttribute }}" autofocus rows="{{ $rows ? $rows : 3 }}">{{ $defaultValue }}</textarea>
        {{ $slot }}
        @error($globalAttribute)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@section('script')
<script src="https://cdn.tiny.cloud/1/ozc9x14w309wc8eot0igzgly7fpfjmxtln50aaj7fi2mfrj2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '.textarea'
    });
  </script>
@endsection