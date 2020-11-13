<div class="card card-success">
    <div class="card-header">
        <span class="h4 d-inline-block">All Days</span>
        <div class="btn btn-outline-light float-right text-bold" id="addDay">+ Add New Day</div>
        <div class="clearfix"></div>
    </div>
    <input type="hidden" id="daysCount" name="daysCount" value="{{$alldays->count()}}">
    <div class="card-body " id="days-card-body">
        @foreach($alldays as $dataIndex => $day)
            <div class="card card-dark" id="days-single-day-{{$dataIndex}}">
                <div class="card-header">
                    <span class="h4 d-inline-block">Day Data</span>
                    <div class="btn btn-outline-danger text-center mx-2 ml-4" id="remove-days-images-{{$dataIndex}}"> -
                        Remove
                        This
                        Day
                    </div>
                    <div class="btn btn-outline-light float-right mx-2" id="add-days-images-{{$dataIndex}}">+ Add New
                        Image
                    </div>
                </div>
                <div class="card-body">
                    <div class="row days">
                        <!---- DAY ORDER --->
                        <div class="form-group col-2">
                            <label for="order-1">Day Number</label>
                            <input type="number" class="form-control"
                                   name="days[{{$dataIndex}}][order]"
                                   min="1"
                                   id="order-1" value="{{$day->order}}"
                                   required
                                   placeholder="Day Number...">
                            @if($errors->has('order-1'))
                                <label class="col-form-label" for="order-1"><i
                                            class="far fa-times-circle"></i> {{ $errors->first('order-1') }}
                                </label>
                            @endif
                        </div>
                        <!---- DAY Title --->
                        <div class="form-group col-10">
                            <label for="day-1-title">Day Title*</label>
                            <input type="text" class="form-control" name="days[{{$dataIndex}}][title]"
                                   id="day-1-title"
                                   value="{{$day->title}}"
                                   placeholder="Day Title ">
                        </div>
                        <!---- DAY Summery --->
                        <div class="form-group col-12">
                            <label for="day-1-summery">Day Summery*</label>
                            <textarea name="days[{{$dataIndex}}][summery]" class="form-control"
                                      id="day-1-summery">{{$day->summery}}</textarea>
                        </div>
                        <!---- DAY Gallery --->
                        <div class="form-group col-12">
                            <div class="card card-dark">
                                <div class="card-header p-0">
                                </div>
                                <div class="card-body" id="single-days-gallery-{{$dataIndex}}">
                                    <input type="hidden" id="day-{{$dataIndex}}-Countss"
                                           name="day-{{$dataIndex}}-Countss"
                                           value="{{$day->gallery->count()}}">
                                    <script>
                                        var lfmGalleryyy = function (id, type, options) {
                                            let button = document.getElementById(id);
                                            button.addEventListener('click', function () {
                                                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                                                var target_input = document.getElementById(button.getAttribute('data-input'));

                                                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                                                window.SetUrl = function (items) {
                                                    var file_path = items.map(function (item) {
                                                        return item.url;
                                                    }).join(',');
                                                    // set the value of the desired input to image url
                                                    target_input.value = file_path;
                                                    target_input.dispatchEvent(new Event('change'));
                                                };
                                            });
                                        };
                                    </script>
                                    @foreach($day->gallery as $galleryIndex => $galllery)
                                        <div class="row" id="single-days-images-{{$dataIndex}}-{{$galleryIndex}}">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label for="exampleInputFile">Image </label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                               id="single-day-images-{{$dataIndex}}-{{$galleryIndex}}-image"
                                                               class="form-control"
                                                               name="days[{{$dataIndex}}][gallery][{{$galleryIndex}}][image]"
                                                               required
                                                               placeholder="Slider Image "
                                                               value="{{$galllery->image}}"
                                                               aria-describedby="button-slider">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                    id="button-single-day-images-{{$dataIndex}}-{{$galleryIndex}}-image"
                                                                    data-input="single-day-images-{{$dataIndex}}-{{$galleryIndex}}-image">
                                                                Select
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group ">
                                                    <label for="alt">Image Alternative Text</label>
                                                    <input type="text" class="form-control"
                                                           name="days[{{$dataIndex}}][gallery][{{$galleryIndex}}][alt]"
                                                           id="single-day-images-1-alt"
                                                           value="{{$galllery->alt}}"
                                                           placeholder="Thumb Alternative Text ">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <button class="btn btn-sm btn-danger float-right mt-2"
                                                            type="button"
                                                            id="remove-single-day-{{$dataIndex}}-image-{{$galleryIndex}}">
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <script>
                                            lfmGalleryyy(`button-single-day-images-{{$dataIndex}}-{{$galleryIndex}}-image`, 'image', '');
                                            // Remove Day BTN EVENT CLICK INDEX 0 in ADD NEW DAY
                                            document.getElementById(`remove-single-day-{{$dataIndex}}-image-{{$galleryIndex}}`).addEventListener('click', (event) => {
                                                event.preventDefault();
                                                document.getElementById(`single-days-images-{{$dataIndex}}-{{$galleryIndex}}`).remove();
                                                let daysMainCounttt = document.getElementById(`day-{{$dataIndex}}-Countss`).value;
                                                daysMainCounttt--;
                                                document.getElementById(`day-{{$dataIndex}}-Countss`).value = daysMainCounttt;
                                            });
                                        </script>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @push('js')
                <script>
                    $(`#add-days-images-{{$dataIndex}}`).click(function (e) {
                        e.preventDefault();
                        let daysMainCounttt = document.getElementById(`day-{{$dataIndex}}-Countss`).value;
                        daysMainCounttt++;
                        document.getElementById(`day-{{$dataIndex}}-Countss`).value = daysMainCounttt;
                        $(`#single-days-gallery-{{$dataIndex}}`).append(`
                                               <div class="row justify-content-around" id="single-days-images-{{$dataIndex}}-${daysMainCounttt}">
                            <div class="form-group col-6">
                                <label for="exampleInputFile">Image </label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" id="image-days-images-{{$dataIndex}}-${daysMainCounttt}" class="form-control"
                                               name="days[{{$dataIndex}}][gallery][${daysMainCounttt}][image]" required
                                               placeholder="Slider Image "
                                               aria-describedby="button-slider">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                    id="button-days-images-{{$dataIndex}}-${daysMainCounttt}" data-input="image-days-images-{{$dataIndex}}-${daysMainCounttt}">Select
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-5">
                                <label >Image Alternative Text</label>
                                <input type="text" class="form-control" name="days[{{$dataIndex}}][gallery][${daysMainCounttt}][alt]"
                                       id="alt-${daysMainCounttt}"
                                       placeholder="Thumb Alternative Text ">

                    </div>
                    <div class="col-1 my-auto">
                    <button class="btn btn-sm btn-danger float-right mt-2" id="remove-days-images-{{$dataIndex}}-${daysMainCounttt}"
                                                type="button"><i class="fa fa-trash"></i></button>
                                                                                                <div class="clearfix"></div>


                    </div>
                    </div>
        `);
                        lfmGallery(`button-days-images-{{$dataIndex}}-${daysMainCounttt}`, 'image', '');
                        document.getElementById(`remove-days-images-{{$dataIndex}}-${daysMainCounttt}`).addEventListener('click', (event) => {
                            event.preventDefault();
                            $(`#single-days-images-{{$dataIndex}}-${daysMainCounttt}`).remove();
                            let daysMainCountttrr = document.getElementById(`day-{{$dataIndex}}-Countss`).value;
                            daysMainCountttrr--;
                            document.getElementById(`day-{{$dataIndex}}-Countss`).value = daysMainCountttrr;
                        });
                    });
                    $(`#remove-days-images-{{$dataIndex}}`).click(function (e) {
                        $(`#days-single-day-{{$dataIndex}}`).remove();
                    });
                </script>
            @endpush
        @endforeach
    </div>
</div>
@push('js')
    <script>
        var lfmGallery = function (id, type, options) {
            let button = document.getElementById(id);
            button.addEventListener('click', function () {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));

                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');
                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));
                };
            });
        };
        $('#addDay').click(function (e) {
            e.preventDefault();
            let daysMainCount = parseInt($('#daysCount').val());
            daysMainCount++
            $("#daysCount").val(daysMainCount);
            localStorage.setItem(daysMainCount, '1');
            // ADD DAY
            $("#days-card-body").append(`
                            <div class="card card-success" id="days-single-day-${daysMainCount}">
                                <div class="card-header p-0" style="padding-top: 2px;">
                                </div>
                                <div class="card-body">
                                        <!---- ROW --->
                                        <div class="row">
                                            <!---- DAY ORDER --->
                                            <div class="form-group col-2">
                                                <label for="order-1">Day Number</label>
                                                <input type="number" class="form-control"
                                                       name="days[${daysMainCount}][order]"
                                                       min="1"
                                                       id="order-${daysMainCount}"
                                                       required
                                                       placeholder="Day Number...">

                                            </div>
                                            <!---- DAY Title --->
                                            <div class="form-group col-8">
                                                <label >Day Title*</label>
                                                <input type="text" class="form-control" name="days[${daysMainCount}][title]"
                                                       id="day-1-title"
                                                       placeholder="Day Title ">
                                            </div>
                                             <div class="col-2 my-auto">
                                            <button class="btn btn-sm btn-danger"
                                                    type="button" id="remove-days-single-day-${daysMainCount}">Remove This Day</button>
                                            </div>
                                            <!---- DAY Summery --->
                                            <div class="form-group col-12">
                                                <label for="day-${daysMainCount}-summery">Day Summery*</label>
                                                <textarea name="days[${daysMainCount}][summery]" class="form-control"
                                                          id="day-1-summery"></textarea>
                                            </div>
                                            <!---- DAY GALLERY --->
                                            <div class="form-group col-12">
                                                <div class="card card-dark" id="single-days-gallery-${daysMainCount}">
                                                    <div class="card-header">
                                                        <span class="h4 d-inline-block">Day Images</span>
                                                        <div class="btn btn-outline-light float-right" id="addimage-${daysMainCount}">+ Add New Image</div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="single-image" id="single-days-images-day-${daysMainCount}">
                                                             <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputFile">Image </label>
                                                                    <div class="input-group">
                                                                        <input type="text" id="single-day-images-${daysMainCount}-image-0" class="form-control"
                                                                               name="days[${daysMainCount}][gallery][1][image]" required
                                                                               placeholder="Slider Image "
                                                                               aria-describedby="button-slider">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-outline-secondary" type="button"
                                                                                    id="button-single-day-images-${daysMainCount}-image-0" data-input="single-day-images-${daysMainCount}-image-0">Select
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-5">
                                                                    <label for="alt">Image Alternative Text</label>
                                                                    <input type="text" class="form-control" name="days[${daysMainCount}][gallery][1][alt]"
                                                                           id="single-day-images-${daysMainCount}-alt"
                                                                           placeholder="Thumb Alternative Text ">
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
                                        <!---- END OF ROW --->
                                </div>
                           </div>
            `);

            // Remove Day BTN EVENT CLICK INDEX 0 in ADD NEW DAY
            document.getElementById(`remove-days-single-day-${daysMainCount}`).addEventListener('click', (event) => {
                event.preventDefault();
                $(`#days-single-day-${daysMainCount}`).remove();
                daysMainCount--;
                $("#daysCount").val(daysMainCount);
            });
            // ADD FILE MANAGER TO INDEX 0 in ADD NEW DAY
            lfmGallery(`button-single-day-images-${daysMainCount}-image-0`, 'image', '');

            $(`#addimage-${daysMainCount}`).click(function (e) {
                e.preventDefault();
                let galleryDayCounts = localStorage.getItem(daysMainCount);
                galleryDayCounts++;
                localStorage.setItem(daysMainCount, galleryDayCounts);
                $(`#single-days-images-day-${daysMainCount}`).append(`
                                        <div class="row" id="day-gallery-image-single-${galleryDayCounts}">
                                            <div class="form-group col-6">
                                                <label for="exampleInputFile">Image </label>
                                                <div class="input-group">
                                                    <input type="text" id="single-day-images-${daysMainCount}-image-${galleryDayCounts}" class="form-control"
                                                           name="days[${daysMainCount}][gallery][${galleryDayCounts}][image]" required
                                                           placeholder="Slider Image "
                                                           aria-describedby="button-slider">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                                id="button-single-day-images-${daysMainCount}-image-${galleryDayCounts}" data-input="single-day-images-${daysMainCount}-image-${galleryDayCounts}">Select
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-5">
                                                <label for="alt">Image Alternative Text</label>
                                                <input type="text" class="form-control" name="days[${daysMainCount}][gallery][${galleryDayCounts}][alt]"
                                                       id="single-day-images-${daysMainCount}-alt"
                                                       placeholder="Thumb Alternative Text ">
                                            </div>
                                             <div class="col-1 my-auto">
                                                  <button class="btn btn-sm btn-danger " id="remove-day-image-gallery-${galleryDayCounts}"
                                                             type="button"><i class="fa fa-trash"></i></button>
                                             </div>
                                        </div>
                `);

                // Remove Day BTN EVENT CLICK INDEX 0 in ADD NEW DAY
                document.getElementById(`remove-day-image-gallery-${galleryDayCounts}`).addEventListener('click', (event) => {
                    event.preventDefault();
                    $(`#day-gallery-image-single-${galleryDayCounts}`).remove();
                    galleryDayCounts--;
                    localStorage.setItem(daysMainCount, galleryDayCounts);
                });
                // ADD FILE MANAGER TO INDEX 0 in ADD NEW DAY
                lfmGallery(`button-single-day-images-${daysMainCount}-image-${galleryDayCounts}`, 'image', '');
            });

        });
    </script>
    <script>
        $('#add-days-images-1').click(function (e) {
            let dayOneCounts = parseInt($('#dayOneCountss').val());
            dayOneCounts++;
            $("#dayOneCountss").val(dayOneCounts);
            e.preventDefault();
            $("#single-days-gallery-1").append(`
                                               <div class="row justify-content-around" id="single-days-images-${dayOneCounts}">
                            <div class="form-group col-6">
                                <label for="exampleInputFile">Image </label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" id="image-days-imags-${dayOneCounts}" class="form-control"
                                               name="days[1][gallery][${dayOneCounts}][image]" required
                                               placeholder="Slider Image "
                                               aria-describedby="button-slider">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                    id="button-days-images-${dayOneCounts}" data-input="image-days-imags-${dayOneCounts}">Select
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-5">
                                <label >Image Alternative Text</label>
                                <input type="text" class="form-control" name="days[1][gallery][${dayOneCounts}][alt]"
                                       id="alt-${dayOneCounts}"
                                       placeholder="Thumb Alternative Text ">

                    </div>
                    <div class="col-1 my-auto">
                    <button class="btn btn-sm btn-danger " id="remove-days-images-${dayOneCounts}"
                                                type="button"><i class="fa fa-trash"></i></button>

                    </div>
                    </div>
        `);
            lfmGallery(`button-days-images-${dayOneCounts}`, 'image', '');
            document.getElementById(`remove-days-images-${dayOneCounts}`).addEventListener('click', (event) => {
                event.preventDefault();
                $(`#single-days-images-${dayOneCounts}`).remove();
                dayOneCounts--;
                $("#dayOneCountss").val(dayOneCounts);
            });
        });
    </script>
@endpush