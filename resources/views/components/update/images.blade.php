<!---- IMAGES TAB CONTENT--->
<div class="row">
    <!---- Banner --->
    <div class="form-group col-6">
        <label for="banner">Package Banner*</label>
        <div class="input-group">
            <input type="text" id="banner" class="form-control {{$errors->has('banner') ? 'is-invalid' : ''}}"
                   name="banner" required
                   aria-label="banner"
                   value="{{$model->banner}}"
                   placeholder="Package banner"
                   aria-describedby="button-banner">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"
                        id="button-banner" data-input="banner" data-preview="banner-preview">Select
                </button>
            </div>
        </div>
        @if($errors->has('banner'))
            <p class="text-danger">
                {{ $errors->first('banner') }}
            </p>
        @endif
    </div>
    <!---- Banner ALt --->
    <div class="form-group col-6">
        <label for="alt">Banner Alternative Text</label>
        <input type="text" class="form-control {{$errors->has('alt') ? 'is-invalid' : ''}}" name="alt"
               id="alt"
               value="{{$model->banner_alt}}"
               placeholder="Alternative Text ">
        @if($errors->has('banner_alt'))
            <p class="text-danger">
                {{ $errors->first('banner_alt') }}
            </p>
        @endif
    </div>
    <!---- Thumb --->
    <div class="form-group col-6">
        <label for="thumb">Package Thumb*</label>
        <div class="input-group">
            <input type="text" id="thumb" class="form-control {{$errors->has('thumb') ? 'is-invalid' : ''}}"
                   name="thumb" required
                   aria-label="thumb"
                   value="{{$model->thumb}}"
                   placeholder="Package thumb for  page"
                   aria-describedby="button-thumb">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"
                        id="button-thumb" data-input="thumb" data-preview="thumb-preview">Select
                </button>
            </div>
        </div>
        @if($errors->has('thumb'))
            <p class="text-danger">
                {{ $errors->first('thumb') }}
            </p>
        @endif
    </div>
    <!---- Thumb ALT  --->
    <div class="form-group col-6">
        <label for="thumb-alt">Thumb Alternative Text</label>
        <input type="text" class="form-control {{$errors->has('thumb_alt') ? 'is-invalid' : ''}}" name="thumb_alt"
               id="thumb-alt"
               value="{{$model->thumb_alt}}"
               placeholder="Thumb Alternative Text ">
        @if($errors->has('thumb_alt'))
            <p class="text-danger">
                {{ $errors->first('thumb_alt') }}
            </p>
        @endif
    </div>
    <div class="form-group col-6" id="banner-preview">
        <img src="{{$model->banner}}" height="250px">
    </div>
    <div class="form-group col-6" id="thumb-preview">
        <img src="{{$model->thumb}}" height="250px">
    </div>
</div>

@push('js')

    <script>
        var lfm = function (id, type, options) {
            let button = document.getElementById(id);

            button.addEventListener('click', function () {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));
                var target_preview = document.getElementById(button.getAttribute('data-preview'));

                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));

                    // clear previous preview
                    target_preview.innerHtml = '';
                    target_preview.querySelectorAll('*').forEach(n => n.remove());
                    // set or change the preview image src

                    let img = document.createElement('img')
                    img.setAttribute('style', 'height: 250px')
                    img.setAttribute('src', items[0].url)
                    target_preview.appendChild(img);
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };

        document.addEventListener("DOMContentLoaded", function () {
            var route_prefix = "";
            lfm('button-banner', 'image', {prefix: route_prefix});
            lfm('button-thumb', 'image', {prefix: route_prefix});
        });
    </script>
@endpush