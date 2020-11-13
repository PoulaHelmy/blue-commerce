<div class="card card-dark">
    <div class="card-header ">
        <span class="h4 d-inline-block">All Price Lists</span>
        <div class="btn btn-outline-light float-right" id="add-season">Add Price List</div>
        <div class="clearfix"></div>
    </div>

    <div class="card-body " id="season-card-body">
        <div class="card card-dark">
            <div class="card-body">
                <div class="row">
                    <input type="hidden" id="seasons" name="seasons" value="1">

                    <div class="form-group col-12">
                        <label>Season Price List</label>
                    </div>
                    <!---- Start --->
                    <div class="form-group col-6">
                        <label for="start">Start From*</label>
                        <input type="text"
                               class="form-control {{$errors->has('start') ? 'is-invalid' : ''}}"
                               name="seasons[1][start]"
                               id="start"
                               required value="{{old('start')}}"
                               placeholder="Package start ">
                        @if($errors->has('start'))
                            <label class="col-form-label" for="start"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('start') }}
                            </label>
                        @endif
                    </div>
                    <!---- END --->
                    <div class="form-group col-6">
                        <label for="end">Ends in*</label>
                        <input type="text"
                               class="form-control {{$errors->has('end') ? 'is-invalid' : ''}}"
                               name="seasons[1][end]"
                               id="end"
                               required value="{{old('end')}}"
                               placeholder="Package end ">
                        @if($errors->has('end'))
                            <label class="col-form-label" for="end"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('end') }}
                            </label>
                        @endif
                    </div>
                    <!---- Standard Price Single  --->
                    <div class="form-group col-2">
                        <label for="standard_price_single">Standard Price Single *</label>
                        <input type="number"
                               min="0"
                               class="form-control {{$errors->has('standard_price_single') ? 'is-invalid' : ''}}"
                               name="seasons[1][standard_price_single]"
                               id="standard_price_single"
                               value="{{old('standard_price_single')}}"
                               required
                               placeholder="S.Price Single...">
                        @if($errors->has('standard_price_single'))
                            <label class="col-form-label" for="standard_price_single"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('standard_price_single') }}
                            </label>
                        @endif
                    </div>
                    <!---- Standard Price Double  --->
                    <div class="form-group col-2">
                        <label for="standard_price_double">Standard Price Double *</label>
                        <input type="number"
                               min="0"
                               class="form-control {{$errors->has('standard_price_double') ? 'is-invalid' : ''}}"
                               name="seasons[1][standard_price_double]"
                               id="standard_price_double"
                               value="{{old('standard_price_double')}}"
                               required
                               placeholder="S.Price Double... ">
                        @if($errors->has('standard_price_double'))
                            <label class="col-form-label" for="standard_price_double"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('standard_price_double') }}
                            </label>
                        @endif
                    </div>
                    <!---- Comfort Price Single  --->
                    <div class="form-group col-2">
                        <label for="comfort_price_single">Comfort Price Single *</label>
                        <input type="number"
                               min="0"
                               class="form-control {{$errors->has('comfort_price_single') ? 'is-invalid' : ''}}"
                               name="seasons[1][comfort_price_single]"
                               id="comfort_price_single" value="{{old('comfort_price_single')}}"
                               required
                               placeholder="C.Price Single...">
                        @if($errors->has('comfort_price_single'))
                            <label class="col-form-label" for="comfort_price_single"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('comfort_price_single') }}
                            </label>
                        @endif
                    </div>
                    <!---- Comfort Price Double  --->
                    <div class="form-group col-2">
                        <label for="comfort_price_double">Comfort Price Double *</label>
                        <input type="number"
                               min="0"
                               class="form-control {{$errors->has('comfort_price_double') ? 'is-invalid' : ''}}"
                               name="seasons[1][comfort_price_double]"
                               id="comfort_price_double" value="{{old('comfort_price_double')}}"
                               required
                               placeholder="C.Price Double... ">
                        @if($errors->has('comfort_price_double'))
                            <label class="col-form-label" for="comfort_price_double"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('comfort_price_double') }}
                            </label>
                        @endif
                    </div>
                    <!---- Deluxe Price Single  --->
                    <div class="form-group col-2">
                        <label for="deluxe_price_single">Deluxe Price Single *</label>
                        <input type="number"
                               min="0"
                               class="form-control {{$errors->has('deluxe_price_single') ? 'is-invalid' : ''}}"
                               name="seasons[1][deluxe_price_single]"
                               id="deluxe_price_single" value="{{old('deluxe_price_single')}}"
                               required
                               placeholder="D.Price Single...">
                        @if($errors->has('deluxe_price_single'))
                            <label class="col-form-label" for="deluxe_price_single"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('deluxe_price_single') }}
                            </label>
                        @endif
                    </div>
                    <!---- Deluxe Price Double  --->
                    <div class="form-group col-2">
                        <label for="deluxe_price_double">Deluxe Price Double *</label>
                        <input type="number"
                               min="0"
                               class="form-control {{$errors->has('deluxe_price_double') ? 'is-invalid' : ''}}"
                               name="seasons[1][deluxe_price_double]"
                               id="deluxe_price_double" value="{{old('deluxe_price_double')}}"
                               required
                               placeholder="D.Price Double... ">
                        @if($errors->has('deluxe_price_double'))
                            <label class="col-form-label" for="deluxe_price_double"><i
                                        class="far fa-times-circle"></i> {{ $errors->first('deluxe_price_double') }}
                            </label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('js')
    <script>
        $('#add-season').click(function (e) {
            let seasonsCount = parseInt($('#seasons').val());
            e.preventDefault();
            seasonsCount++
            $("#seasons").val(seasonsCount);
            $('#season-card-body').append(`
   <div class="card card-dark" id="single-season-price-list-${seasonsCount}">
                                    <div class="card-header p-0" style="padding-top: 2px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
 <label>Season Price List</label>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <button class="btn btn-sm btn-danger float-right"
                                                type="button" id="btn-remove-season-${seasonsCount}"><i class="fa fa-trash"></i></button>
                                                </div>
                                        </div>

                                            <!---- Start --->
                                            <div class="form-group col-6">
                                                <label for="start">Start From*</label>
                                                <input type="text"
                                                       class="form-control {{$errors->has('start') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][start]"
                                                       id="start"
                                                       required value="{{old('start')}}"
                                                       placeholder="Package start ">
                                                @if($errors->has('start'))
            <label class="col-form-label" for="start"><i
                        class="far fa-times-circle"></i> {{ $errors->first('start') }}
            </label>
@endif
            </div>
            <!---- END --->
            <div class="form-group col-6">
                <label for="end">Ends in*</label>
                <input type="text"
                       class="form-control {{$errors->has('end') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][end]"
                                                       id="end"
                                                       required value="{{old('end')}}"
                                                       placeholder="Package end ">
                                                @if($errors->has('end'))
            <label class="col-form-label" for="end"><i
                        class="far fa-times-circle"></i> {{ $errors->first('end') }}
            </label>
@endif
            </div>
            <!---- Standard Price Single  --->
            <div class="form-group col-2">
                <label for="standard_price_single">Standard Price Single *</label>
                <input type="number"
                       min="0"
                       class="form-control {{$errors->has('standard_price_single') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][standard_price_single]"
                                                       id="standard_price_single"
                                                       value="{{old('standard_price_single')}}"
                                                       required
                                                       placeholder="S.Price Single...">
                                                @if($errors->has('standard_price_single'))
            <label class="col-form-label" for="standard_price_single"><i
                        class="far fa-times-circle"></i> {{ $errors->first('standard_price_single') }}
            </label>
@endif
            </div>
            <!---- Standard Price Double  --->
            <div class="form-group col-2">
                <label for="standard_price_double">Standard Price Double *</label>
                <input type="number"
                       min="0"
                       class="form-control {{$errors->has('standard_price_double') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][standard_price_double]"
                                                       id="standard_price_double"
                                                       value="{{old('standard_price_double')}}"
                                                       required
                                                       placeholder="S.Price Double... ">
                                                @if($errors->has('standard_price_double'))
            <label class="col-form-label" for="standard_price_double"><i
                        class="far fa-times-circle"></i> {{ $errors->first('standard_price_double') }}
            </label>
@endif
            </div>
            <!---- Comfort Price Single  --->
            <div class="form-group col-2">
                <label for="comfort_price_single">Comfort Price Single *</label>
                <input type="number"
                       min="0"
                       class="form-control {{$errors->has('comfort_price_single') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][comfort_price_single]"
                                                       id="comfort_price_single" value="{{old('comfort_price_single')}}"
                                                       required
                                                       placeholder="C.Price Single...">
                                                @if($errors->has('comfort_price_single'))
            <label class="col-form-label" for="comfort_price_single"><i
                        class="far fa-times-circle"></i> {{ $errors->first('comfort_price_single') }}
            </label>
@endif
            </div>
            <!---- Comfort Price Double  --->
            <div class="form-group col-2">
                <label for="comfort_price_double">Comfort Price Double *</label>
                <input type="number"
                       min="0"
                       class="form-control {{$errors->has('comfort_price_double') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][comfort_price_double]"
                                                       id="comfort_price_double" value="{{old('comfort_price_double')}}"
                                                       required
                                                       placeholder="C.Price Double... ">
                                                @if($errors->has('comfort_price_double'))
            <label class="col-form-label" for="comfort_price_double"><i
                        class="far fa-times-circle"></i> {{ $errors->first('comfort_price_double') }}
            </label>
@endif
            </div>
            <!---- Deluxe Price Single  --->
            <div class="form-group col-2">
                <label for="deluxe_price_single">Deluxe Price Single *</label>
                <input type="number"
                       min="0"
                       class="form-control {{$errors->has('deluxe_price_single') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][deluxe_price_single]"
                                                       id="deluxe_price_single" value="{{old('deluxe_price_single')}}"
                                                       required
                                                       placeholder="D.Price Single...">
                                                @if($errors->has('deluxe_price_single'))
            <label class="col-form-label" for="deluxe_price_single"><i
                        class="far fa-times-circle"></i> {{ $errors->first('deluxe_price_single') }}
            </label>
@endif
            </div>
            <!---- Deluxe Price Double  --->
            <div class="form-group col-2">
                <label for="deluxe_price_double">Deluxe Price Double *</label>
                <input type="number"
                       min="0"
                       class="form-control {{$errors->has('deluxe_price_double') ? 'is-invalid' : ''}}"
                                                       name="seasons[${seasonsCount}][deluxe_price_double]"
                                                       id="deluxe_price_double" value="{{old('deluxe_price_double')}}"
                                                       required
                                                       placeholder="D.Price Double... ">
                                                @if($errors->has('deluxe_price_double'))
            <label class="col-form-label" for="deluxe_price_double"><i
                        class="far fa-times-circle"></i> {{ $errors->first('deluxe_price_double') }}
            </label>
@endif
            </div>
        </div>
    </div>
</div>

`);
            document.getElementById(`btn-remove-season-${seasonsCount}`).addEventListener('click', (event) => {
                event.preventDefault();
                $(`#single-season-price-list-${seasonsCount}`).remove();
                seasonsCount--;
                $("#seasons").val(seasonsCount);
            });
        });


    </script>
@endpush