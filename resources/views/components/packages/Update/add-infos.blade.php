<div class="row">
    <!---- Description --->
    <div class="form-group col-12">
        <label for="description">Package Description (150 Character)</label>
        <textarea name="description"
                  class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"
                  id="description">{{$package->description}}</textarea>
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
                  id="editor">{{$package->overview}}</textarea>
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


{{--<textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>--}}
{{--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>--}}
{{--<script>--}}
{{--    var options = {--}}
{{--        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
{{--        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',--}}
{{--        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
{{--        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='--}}
{{--    };--}}
{{--</script>--}}
{{--<script>--}}
{{--    CKEDITOR.replace('my-editor', options);--}}
{{--</script>--}}
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
{{--<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>--}}
{{--<script>--}}
{{--    $('textarea.my-editor').ckeditor(options);--}}
{{--</script>--}}