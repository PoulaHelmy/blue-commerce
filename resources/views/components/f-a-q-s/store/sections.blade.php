<div class="card card-dark " style="box-shadow: none;">
    <div class="card-header">
        <span class="h4 d-inline-block">All Sections</span>
        <div class="btn btn-outline-light float-right text-bold" id="addSection">+ Add New Section</div>
        <div class="clearfix"></div>
    </div>
    <input type="hidden" id="sectionsCount" name="sectionsCount" value="1">
    <div class="card-body " id="sections-card-body">
        <div class="card card-success" id="sections-single-day-1">
            <div class="card-header">
                <span class="h4 d-inline-block">Section</span>
            </div>
            <div class="card-body">
                <div class="row sections">
                    <!---- SECTION Title --->
                    <div class="form-group col-10">
                        <label for="section-1-title">Section Title*</label>
                        <input type="text" class="form-control" name="sections[1][title]"
                               id="section-1-title"
                               value="{{old('sections[1][title]')}}">
                    </div>
                    <!---- SECTION Summery --->
                    <div class="form-group col-12">
                        <label for="section-1-summery">Section Summery*</label>
                        <textarea name="sections[1][summery]" class="form-control"
                                  id="section-1-summery">{{old('sections[1][summery]')}}</textarea>
                    </div>
                    <!---- SECTION Image --->
                    <div class="form-group col-lg-6">
                        <label for="exampleInputFile">Image </label>
                        <div class="input-group">
                            <input type="text" id="single-section-images-1-image"
                                   class="form-control"
                                   name="sections[1][data][photo]" required
                                   aria-describedby="button-slider">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"
                                        id="button-single-section-images-1-image"
                                        data-input="single-section-images-1-image">Select
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-5">
                        <label for="single-section-images-1-alt">Image Alternative Text</label>
                        <input type="text" class="form-control" name="sections[1][data][alt]"
                               id="single-section-images-1-alt">
                    </div>
                    <div class="col-lg-1 my-auto">
                        <button class="btn btn-sm btn-danger disabled cursor-not-allowed"
                                type="button"><i class="fa fa-trash"></i></button>
                    </div>
                    <!---- SECTION Questions --->
                    <div class="form-group col-12">
                        <div class="card card-dark" style="box-shadow: none;">
                            <div class="card-header">
                                <span class="h4 d-inline-block">Sub Sections</span>
                                <div class="btn btn-outline-light float-right" id="add-days-images-1">+ Add New
                                    Sub Section
                                </div>
                            </div>
                            <div class="card-body" id="single-days-gallery-1">
                                <input type="hidden" id="sectionOneCountss" name="sectionOneCountss" value="1">
                                <div class="row" id="single-sections-1">
                                    <!---- SECTION Title --->
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="sections-questions-1-title">Title*</label>
                                            <input type="text" class="form-control" name="sections[1][data][title]"
                                                   id="sections-questions-1-title">
                                        </div>
                                    </div>
                                    <!---- SECTION Title --->
                                    <div class="col-12">
                                        <div class="card card-dark" style="box-shadow: none;">
                                            <div class="card-header">
                                                <span class="h4 d-inline-block">Questions</span>
                                                <div class="btn btn-outline-light float-right"
                                                     id="add-days-images-1">+ Add
                                                    New
                                                    Question
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row" id="single-sections-questions-1">
                                                    <div class="col-md-4">
                                                        <div class="row border p-2">
                                                            <!---- Question --->
                                                            <div class="col-12">
                                                                <div class="form-group ">
                                                                    <label for="section-1-questions-1-question">Question*</label>
                                                                    <input type="text" class="form-control"
                                                                           name="sections[1][data][questions][1][question]"
                                                                           id="sections-questions-1-question">
                                                                </div>
                                                            </div>
                                                            <!---- SECTION Summery --->
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="section-1-questions-1-answer">Answer</label>
                                                                    <textarea
                                                                            name="sections[1][data][questions][1][answer]"
                                                                            class="form-control"
                                                                            id="section-1-questions-1-answer"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 my-auto">
                                                                <button class="btn btn-sm btn-danger w-100"
                                                                        type="button"><i class="fa fa-trash"> Remove
                                                                        This Question </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        lfmGallery('button-single-day-images-1-image', 'image', '');
    </script>
    <script>
        $('#addSection').click(function (e) {
            e.preventDefault();
            let sectionsMainCount = parseInt($('#sectionsCount').val());
            sectionsMainCount++
            $("#daysCount").val(sectionsMainCount);
            localStorage.setItem(sectionsMainCount, '1');
            // ADD DAY
            $("#days-card-body").append(`
                            <div class="card card-success" id="days-single-day-${sectionsMainCount}">
                                <div class="card-header p-0" style="padding-top: 2px;">
                                </div>
                                <div class="card-body">
                                        <!---- ROW --->
                                        <div class="row">
                                            <!---- DAY ORDER --->
                                            <div class="form-group col-2">
                                                <label for="order-1">Day Number</label>
                                                <input type="number" class="form-control"
                                                       name="days[${sectionsMainCount}][order]"
                                                       min="1"
                                                       id="order-${sectionsMainCount}"
                                                       required
                                                       placeholder="Day Number...">

                                            </div>
                                            <!---- DAY Title --->
                                            <div class="form-group col-8">
                                                <label >Day Title*</label>
                                                <input type="text" class="form-control" name="days[${sectionsMainCount}][title]"
                                                       id="day-1-title"
                                                       placeholder="Day Title ">
                                            </div>
                                             <div class="col-2 my-auto">
                                            <button class="btn btn-sm btn-danger"
                                                    type="button" id="remove-days-single-day-${sectionsMainCount}">Remove This Day</button>
                                            </div>
                                            <!---- DAY Summery --->
                                            <div class="form-group col-12">
                                                <label for="day-${sectionsMainCount}-summery">Day Summery*</label>
                                                <textarea name="days[${sectionsMainCount}][summery]" class="form-control"
                                                          id="day-1-summery"></textarea>
                                            </div>
                                            <!---- DAY GALLERY --->
                                            <div class="form-group col-12">
                                                <div class="card card-dark" id="single-days-gallery-${sectionsMainCount}">
                                                    <div class="card-header">
                                                        <span class="h4 d-inline-block">Day Images</span>
                                                        <div class="btn btn-outline-light float-right" id="addimage-${sectionsMainCount}">+ Add New Image</div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="single-image" id="single-days-images-day-${sectionsMainCount}">
                                                             <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputFile">Image </label>
                                                                    <div class="input-group">
                                                                        <input type="text" id="single-day-images-${sectionsMainCount}-image-0" class="form-control"
                                                                               name="days[${sectionsMainCount}][gallery][1][image]" required
                                                                               placeholder="Slider Image "
                                                                               aria-describedby="button-slider">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-outline-secondary" type="button"
                                                                                    id="button-single-day-images-${sectionsMainCount}-image-0" data-input="single-day-images-${sectionsMainCount}-image-0">Select
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-5">
                                                                    <label for="alt">Image Alternative Text</label>
                                                                    <input type="text" class="form-control" name="days[${sectionsMainCount}][gallery][1][alt]"
                                                                           id="single-day-images-${sectionsMainCount}-alt"
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
            document.getElementById(`remove-days-single-day-${sectionsMainCount}`).addEventListener('click', (event) => {
                event.preventDefault();
                $(`#days-single-day-${sectionsMainCount}`).remove();
                sectionsMainCount--;
                $("#daysCount").val(sectionsMainCount);
            });
            // ADD FILE MANAGER TO INDEX 0 in ADD NEW DAY
            lfmGallery(`button-single-day-images-${sectionsMainCount}-image-0`, 'image', '');

            $(`#addimage-${sectionsMainCount}`).click(function (e) {
                e.preventDefault();
                let galleryDayCounts = localStorage.getItem(sectionsMainCount);
                galleryDayCounts++;
                localStorage.setItem(sectionsMainCount, galleryDayCounts);
                $(`#single-days-images-day-${sectionsMainCount}`).append(`
                                        <div class="row" id="day-gallery-image-single-${galleryDayCounts}">
                                            <div class="form-group col-6">
                                                <label for="exampleInputFile">Image </label>
                                                <div class="input-group">
                                                    <input type="text" id="single-day-images-${sectionsMainCount}-image-${galleryDayCounts}" class="form-control"
                                                           name="days[${sectionsMainCount}][gallery][${galleryDayCounts}][image]" required
                                                           placeholder="Slider Image "
                                                           aria-describedby="button-slider">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                                id="button-single-day-images-${sectionsMainCount}-image-${galleryDayCounts}" data-input="single-day-images-${sectionsMainCount}-image-${galleryDayCounts}">Select
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-5">
                                                <label for="alt">Image Alternative Text</label>
                                                <input type="text" class="form-control" name="days[${sectionsMainCount}][gallery][${galleryDayCounts}][alt]"
                                                       id="single-day-images-${sectionsMainCount}-alt"
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
                    localStorage.setItem(sectionsMainCount, galleryDayCounts);
                });
                // ADD FILE MANAGER TO INDEX 0 in ADD NEW DAY
                lfmGallery(`button-single-day-images-${sectionsMainCount}-image-${galleryDayCounts}`, 'image', '');
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