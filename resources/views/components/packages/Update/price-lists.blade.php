<div class="card card-dark">
    <input type="hidden" id="seasons" name="seasons" value=" {{$package->prices->count()}}">
    <div class="card-header">
        <span class="h4 d-inline-block">All Price Lists</span>
        <div class="btn btn-outline-light float-right" id="add-season">Add Price List</div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body " id="season-card-body">
        @foreach($package->prices as $index => $price)
            <div class="card card-dark" id="season-card-main-body-{{$index}}">
                <div class="card-header p-0" style="padding-top: 2px;">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Season Price List</label>
                        </div>
                        <div class="form-group col-6">
                            <button class="btn btn-sm btn-danger float-right"
                                    id="remove-season-card-main-body-{{$index}}"
                                    type="button"><i class="fa fa-trash"></i></button>
                        </div>
                        <!---- Start --->
                        <div class="form-group col-6">
                            <label for="start">Start From*</label>
                            <input type="text"
                                   class="form-control {{$errors->has('start') ? 'is-invalid' : ''}}"
                                   name="seasons[{{$index}}][start]"
                                   id="start"
                                   required
                                   value="{{$price->start}}"
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
                                   name="seasons[{{$index}}][end]"
                                   id="end"
                                   required value="{{$price->end}}"
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
                                   name="seasons[{{$index}}][standard_price_single]"
                                   id="standard_price_single"
                                   value="{{$price->standard_price_single}}"
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
                                   name="seasons[{{$index}}][standard_price_double]"
                                   id="standard_price_double"
                                   value="{{$price->standard_price_double}}"
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
                                   name="seasons[{{$index}}][comfort_price_single]"
                                   id="comfort_price_single" value="{{$price->comfort_price_single}}"
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
                                   name="seasons[{{$index}}][comfort_price_double]"
                                   id="comfort_price_double" value="{{$price->comfort_price_double}}"
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
                                   name="seasons[{{$index}}][deluxe_price_single]"
                                   id="deluxe_price_single" value="{{$price->deluxe_price_single}}"
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
                                   name="seasons[{{$index}}][deluxe_price_double]"
                                   id="deluxe_price_double"
                                   value="{{$price->deluxe_price_double}}"
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
            <script>
                document.getElementById('remove-season-card-main-body-{{$index}}').addEventListener('click', function () {
                    document.getElementById('season-card-main-body-{{$index}}').remove();
                    let priceListsValue = document.getElementById('seasons').value;
                    priceListsValue--;
                    document.getElementById('seasons').value = priceListsValue;
                })
            </script>
        @endforeach
    </div>

</div>


@push('js')
    <script>
        $('#add-season').click(function (e) {
            e.preventDefault();
            let seasonsCount = parseInt($('#seasons').val());
            seasonsCount++
            $("#seasons").val(seasonsCount);
            $('#season-card-body').append(`
                <div class="card card-dark" id="season-card-main-body-news-${seasonsCount}">
                                    <div class="card-header p-0" style="padding-top: 2px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-6">
                            <label>Season Price List</label>
                        </div>
                        <div class="form-group col-6">
                            <button class="btn btn-sm btn-danger float-right" id="remove-season-card-main-body-${seasonsCount}"
                                    type="button"><i class="fa fa-trash"></i></button>
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
            document.getElementById(`remove-season-card-main-body-${seasonsCount}`).addEventListener('click', function () {
                $(`#season-card-main-body-news-${seasonsCount}`).remove();
                let priceListsValue = parseInt($('#seasons').val());
                priceListsValue--;
                $("#seasons").val(priceListsValue);
            })
        });
    </script>
@endpush