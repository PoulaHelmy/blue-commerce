<div class="row">
    <!---- Description --->
    <div class="form-group col-12">
        <label for="description">Package Description (150 Character)</label>
        <textarea name="description"
                  class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"
                  id="description">{{old('description')}}</textarea>
        @if($errors->has('description'))
            <label class="col-form-label" for="description"><i
                        class="far fa-times-circle"></i> {{ $errors->first('description') }}
            </label>
        @endif
    </div>
    <!---- OverView  --->
    <div class="form-group col-12">
        <label for="overview">Package Overview</label>
        <textarea name="overview" class="form-control {{$errors->has('overview') ? 'is-invalid' : ''}}"
                  id="editor">{{old('overview')}}</textarea>
        @if($errors->has('overview'))
            <label class="col-form-label" for="overview"><i
                        class="far fa-times-circle"></i> {{ $errors->first('overview') }}
            </label>
        @endif
    </div>
</div>



@push('js')
    <script>
        ClassicEditor.create(document.querySelector('#editor'));
    </script>
    <style>
        .ck-content {
            height: 300px !important;
        }
    </style>
@endpush
