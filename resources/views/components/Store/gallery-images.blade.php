<!---- SLIDER  --->
<div class="row">
    <input type="hidden" id="sliderCount" name="sliderCount" value="1">
    <!---- SLIDER  --->
    <div class="form-group col-8">
        <div class="card card-success">
            <div class="card-header">
                <span class="h4 d-inline-block">Gallery Images</span>
                <div class="btn btn-outline-light float-right" id="add-image-main-slider">Add Image</div>
                <div class="clear-fix"></div>
            </div>
            <div class="card-body">
                <div class="single-image" id="single-image-slider">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputFile">Image </label>
                            <div class="input-group">
                                <input type="text" id="image-slider-main-defalut-0"
                                       class="form-control {{$errors->has(`slider[1][image]`) ? 'is-invalid' : ''}}"
                                       name="slider[1][image]" required

                                       aria-label="slider[1][image]"
                                       placeholder="Slider Image "
                                       aria-describedby="button-slider">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"
                                            id="button-slider-main-0" data-input="image-slider-main-defalut-0"
                                            data-preview="image-slider-main-preview-0">Select
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-5">
                            <label for="thumb-alt">Image Alternative Text</label>
                            <input type="text"
                                   class="form-control {{$errors->has(`slider[1][alt]`) ? 'is-invalid' : ''}}"
                                   name="slider[1][alt]"
                                   id="thumb-alt1ss"
                                   value="{{old('thumb_alt')}}"

                                   placeholder="Thumb Alternative Text ">
                            @if($errors->has(`slider[1][alt]`))
                                <p class="text-danger">
                                    {{ $errors->first(`slider[1][alt]`) }}
                                </p>
                            @endif
                        </div>
                        <div class="col-1 my-auto">
                            <button class="btn btn-sm btn-danger disabled cursor-not-allowed"
                                    type="button"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---- Image Preview  --->
    <div class="form-group col-4">
        <div class="card card-success">
            <div class="card-header text-center">
                <span class="h4 d-inline-block text-center">Gallery Images Previews</span>
            </div>
            <div class="card-body text-center">
                <div class="row" id="main-image-previews">
                    <div class="form-group col-12" id="image-slider-main-preview-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@push('js')
    <script>
        var lfm2 = function (id, type) {
            let button = document.getElementById(id);

            button.addEventListener('click', function () {
                var route_prefix = '/laravel-filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));
                var target_preview = document.getElementById(button.getAttribute('data-preview'));

                window.open(route_prefix + '?type=' + 'file', 'FileManager', 'width=900,height=600');
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
                    img.setAttribute('style', 'height: 150px')
                    img.setAttribute('src', items[0].url)
                    target_preview.appendChild(img);

                    // trigger change event
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };
        const parentPreviews = document.getElementById('main-image-previews');

        document.addEventListener("DOMContentLoaded", function () {
            lfm2('button-slider-main-0', 'image');
            // lfm('button-thumb', 'image', {prefix: route_prefix});
        });
    </script>
    <script>
        $('#add-image-main-slider').click(function (e) {
            let MainSliderCount = parseInt($('#sliderCount').val());
            MainSliderCount++

            $("#sliderCount").val(MainSliderCount);
            e.preventDefault();
            $("#single-image-slider").append(`
                                       <div class="row justify-content-around" id="single-slider-main-image-${MainSliderCount}">
                    <div class="form-group col-6">
                        <label for="exampleInputFile">Image </label>
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" id="image-slider-main-${MainSliderCount}" class="form-control"
                                       name="slider[${MainSliderCount}][image]" required
                                       aria-label="slider[${MainSliderCount}][image]"
                                       placeholder="Slider Image "
                                       aria-describedby="button-slider">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"
                                            id="button-slider-main-${MainSliderCount}"  data-input="image-slider-main-${MainSliderCount}" data-preview="image-slider-main-${MainSliderCount}-preview">Select
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-5">
                        <label for="thumb-alt">Image Alternative Text</label>
                        <input type="text" class="form-control" name="slider[${MainSliderCount}][alt]"
                               id="alt-${MainSliderCount}"
                               placeholder="Thumb Alternative Text ">
                    </div>
                    <div class="col-1 my-auto">
                    <button class="btn btn-sm btn-danger" id="remove-image-main-slider-${MainSliderCount}"
                                type="button"><i class="fa fa-trash"></i></button>

                    </div>
                </div>
`)
            lfm2(`button-slider-main-${MainSliderCount}`, 'image');

            document.getElementById(`button-slider-main-${MainSliderCount}`).addEventListener('click', (event) => {
                event.preventDefault();
                inputId = `image-slider-main-${MainSliderCount}`;
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });

            let divvv = document.createElement('div')
            divvv.setAttribute("id", `image-slider-main-${MainSliderCount}-preview`);
            divvv.classList.add("col-12");
            divvv.classList.add("form-group");
            parentPreviews.appendChild(divvv);

            document.getElementById(`remove-image-main-slider-${MainSliderCount}`).addEventListener('click', (event) => {
                event.preventDefault();
                $(`#single-slider-main-image-${MainSliderCount}`).remove();
                $(`#image-slider-main-${MainSliderCount}-preview`).remove();
                MainSliderCount--;
                $("#sliderCount").val(MainSliderCount);
                console.log(MainSliderCount);

            });
            // image-slider-main-${MainSliderCount}-preview
            console.log(MainSliderCount);
        });
    </script>

@endpush