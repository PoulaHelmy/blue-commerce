<!---- SEO ATTRibutes --->
<div class="row">
    <div class="form-group col-6">
        <label for="title">Page Title*</label>
        <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title"
               id="title" value="{{old('title')}}"
               placeholder="Page Title ">
        @if($errors->has('title'))
            <p class="text-danger">
                {{ $errors->first('title') }}
            </p>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="keywords">Meta Keywords</label>
        <input type="text" class="form-control tags {{$errors->has('keywords') ? 'is-invalid' : ''}}" name="keywords"
               id="keywords"
               value="{{old('keywords')}}">
        @if($errors->has('keywords'))
            <p class="text-danger">
                {{ $errors->first('keywords') }}
            </p>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="meta_description">Meta Description</label>
        <textarea name="meta_description" class="form-control {{$errors->has('meta_description') ? 'is-invalid' : ''}}"
                  id="meta_description">{{old('meta_description')}}</textarea>
        @if($errors->has('meta_description'))
            <p class="text-danger">
                {{ $errors->first('meta_description') }}
            </p>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="og_title">Og:title</label>
        <input type="text" class="form-control" value="{{old('og_title')}}"
               name="og_title" {{$errors->has('og_title') ? 'is-invalid' : ''}}
               id="og_title">
        @if($errors->has('og_title'))
            <p class="text-danger">
                {{ $errors->first('og_title') }}
            </p>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="og_description">Og:description</label>
        <textarea name="og_description" class="form-control {{$errors->has('og_description') ? 'is-invalid' : ''}}"
                  id="og_description">{{old('og_description')}}</textarea>
        @if($errors->has('og_description'))
            <p class="text-danger">
                {{ $errors->first('og_description') }}
            </p>
        @endif
    </div>
    <div class="form-group col-6">
        <label for="og_image">Og:image</label>
        <div class="input-group">
            <input type="text"
                   id="ogimage"
                   class="form-control {{$errors->has('og_image') ? 'is-invalid' : ''}}" name="og_image"
                   aria-describedby="button-og">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"
                        id="button-og" data-input="ogimage">Select
                </button>
            </div>
        </div>
        @if($errors->has('og_image'))
            <p class="text-danger">
                {{ $errors->first('og_image') }}
            </p>
        @endif
    </div>
</div>

@push('js')
    <script>
        $('#button-og').filemanager('image');
    </script>
@endpush

