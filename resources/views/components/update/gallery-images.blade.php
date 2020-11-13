<!---- SLIDER  --->
<div class="row">
    <input type="hidden" id="sliderCount" name="sliderCount" value="{{$model->count()}}">
    <!---- SLIDER  --->
    <div class="form-group col-12">
        <div class="card card-success">
            <div class="card-header">
                <span class="h4 d-inline-block">Gallery Images</span>
                <div class="btn btn-outline-light float-right" id="add-image-main-slider">Add Image</div>
                <div class="clear-fix"></div>
            </div>
            <div class="card-body">
                <script>
                    var lfm333 = function (id) {
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
                </script>
                <div class="row justify-content-center align-items-start" id="single-image-slider">
                    @foreach($model as $dataIndex => $gallery)
                        <div class="col-md-4" id="single-image-slider-gallllery-{{$dataIndex}}">
                            <div class="card card-teal ">
                                <div class="card-header py-0">
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="exampleInputFile">Image </label>
                                                <div class="input-group">
                                                    <input type="text" id="image-slider-main-defalut-{{$dataIndex}}"
                                                           class="form-control"
                                                           name="slider[{{$dataIndex}}][image]" required
                                                           value="{{$gallery->image}}"
                                                           aria-label="slider[{{$dataIndex}}][image]"
                                                           placeholder="Slider Image "
                                                           aria-describedby="button-slider">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                                id="button-slider-main-{{$dataIndex}}"
                                                                data-input="image-slider-main-defalut-{{$dataIndex}}"
                                                                data-preview="image-slider-main-preview-{{$dataIndex}}">
                                                            Select
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="thumb-alt">Image Alternative Text</label>
                                                <input type="text" class="form-control"
                                                       name="slider[{{$dataIndex}}][alt]"
                                                       id="thumb-alt-{{$dataIndex}}"
                                                       value="{{$gallery->alt}}"
                                                       placeholder="Alternative Text ">
                                                @if($errors->has('alt'))
                                                    <p class="text-danger">
                                                        {{ $errors->first('alt') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group" id="image-slider-main-preview-{{$dataIndex}}">
                                                <img src="{{$gallery->image}}" alt="{{$gallery->alt}}"
                                                     class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <button class="btn btn-sm btn-danger w-100"
                                                        id="remove-data-gallery-single-image-{{$dataIndex}}"
                                                        type="button"><i class="fa fa-trash mx-2"></i> Remove This Image
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.getElementById(`remove-data-gallery-single-image-{{$dataIndex}}`).addEventListener('click', (event) => {
                                event.preventDefault();
                                document.getElementById(`single-image-slider-gallllery-{{$dataIndex}}`).remove();
                                document.getElementById(`image-slider-main-preview-{{$dataIndex}}`).remove();
                                let newslidercountt = document.getElementById('sliderCount').value;
                                newslidercountt--;
                                $("#sliderCount").val(newslidercountt);
                                console.log(newslidercountt);
                            });
                            lfm333('button-slider-main-{{$dataIndex}}');
                        </script>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        var lfm2 = function (id) {
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
                    img.setAttribute('src', items[0].url)
                    img.classList.add('img-fluid')
                    target_preview.appendChild(img);

                    // // set or change the preview image src
                    // items.forEach(function (item) {
                    //     let img = document.createElement('img')
                    //     console.log(item);
                    //     img.setAttribute('style', 'height: 250px')
                    //     img.setAttribute('src', item.thumb_url)
                    //     target_preview.appendChild(img);
                    // });

                    // trigger change event
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };
    </script>
    <script>
        $('#add-image-main-slider').click(function (e) {
            let MainSliderCount = parseInt($('#sliderCount').val());
            MainSliderCount++
            $("#sliderCount").val(MainSliderCount);
            e.preventDefault();
            $("#single-image-slider").append(`
         <div class="col-md-4" id="single-slider-main-image-${MainSliderCount}">
                <div class="card card-teal">
  <div class="card-header py-0">
                                </div>
                       <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group ">
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
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                 <label for="thumb-alt">Image Alternative Text</label>
                                              <input type="text" class="form-control" name="slider[${MainSliderCount}][alt]"
                                                   id="alt-${MainSliderCount}"
                                                   placeholder="Alternative Text ">
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group " id="main-image-previews-${MainSliderCount}">

                                            </div>
                                        </div>
                                       <div class="col-md-12">
                                            <div class="form-group ">
                                              <button class="btn btn-sm btn-danger w-100" id="remove-image-main-slider-${MainSliderCount}"
                                                                                type="button"><i class="fa fa-trash mx-2"></i> Remove This Image</button>
                                                </div>
                                        </div>


                                </div>
                </div>
                </div>
                </div>
            `);
            lfm2(`button-slider-main-${MainSliderCount}`, 'image');
            let divvv = document.createElement('div')
            divvv.setAttribute("id", `image-slider-main-${MainSliderCount}-preview`);
            divvv.classList.add("col-md-10");
            divvv.classList.add("form-group");
            document.getElementById(`main-image-previews-${MainSliderCount}`).appendChild(divvv);

            document.getElementById(`remove-image-main-slider-${MainSliderCount}`).addEventListener('click', (event) => {
                event.preventDefault();
                $(`#single-slider-main-image-${MainSliderCount}`).remove();
                $(`#image-slider-main-${MainSliderCount}-preview`).remove();
                MainSliderCount--;
                $("#sliderCount").val(MainSliderCount);
            });
        });
    </script>
@endpush