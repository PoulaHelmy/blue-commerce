<div class="row">
    <!---- Name --->
    <div class="form-group col-6">
        <label for="name">Excursion Name*</label>
        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
               name="name"
               id="name"
               required value="{{old('name')}}"
               placeholder="Excursion name ">
        @if($errors->has('name'))
            <label class="col-form-label" for="name"><i
                        class="far fa-times-circle"></i> {{ $errors->first('name') }}
            </label>
        @endif
    </div>
    <!---- Slug --->
    <div class="form-group col-6">
        <label for="slug">Excursion slug*</label>
        <input type="text" class="form-control {{$errors->has('slug') ? 'is-invalid' : ''}}"
               name="slug"
               id="slug" value="{{old('slug')}}"
               required
               placeholder="Excursion slug ">
        @if($errors->has('slug'))
            <label class="col-form-label" for="slug"><i
                        class="far fa-times-circle"></i> {{ $errors->first('slug') }}
            </label>
        @endif
    </div>
    <!---- RUN --->
    <div class="form-group col-4">
        <label for="run">Run *</label>
        <input type="text" class="form-control {{$errors->has('run') ? 'is-invalid' : ''}}"
               name="run"
               id="run" value="{{old('run')}}"
               required
               placeholder="Excursion run ">
        @if($errors->has('run'))
            <label class="col-form-label" for="run"><i
                        class="far fa-times-circle"></i> {{ $errors->first('run') }}
            </label>
        @endif
    </div>
    <!---- Type --->
    <div class="form-group col-4">
        <label for="type">Type *</label>
        <input type="text" class="form-control {{$errors->has('type') ? 'is-invalid' : ''}}"
               name="type"
               id="type" value="{{old('type')}}"
               required
               placeholder="Excursion type ">
        @if($errors->has('type'))
            <label class="col-form-label" for="type"><i
                        class="far fa-times-circle"></i> {{ $errors->first('type') }}
            </label>
        @endif
    </div>
{{--    <!---- Places --->--}}
{{--    <div class="form-group col-4">--}}
{{--        <label for="places">Places *</label>--}}
{{--        <input type="number" class="form-control {{$errors->has('places') ? 'is-invalid' : ''}}"--}}
{{--               name="places"--}}
{{--               id="places" value="{{old('places')}}"--}}
{{--               required--}}
{{--               min="0"--}}
{{--               placeholder="Excursion Places ">--}}
{{--        @if($errors->has('places'))--}}
{{--            <label class="col-form-label" for="places"><i--}}
{{--                        class="far fa-times-circle"></i> {{ $errors->first('places') }}--}}
{{--            </label>--}}
{{--        @endif--}}
{{--    </div>--}}
<!---- Travellers --->
    <div class="form-group col-4">
        <label for="travellers">Travellers *</label>
        <input type="number"
               class="form-control {{$errors->has('travellers') ? 'is-invalid' : ''}}"
               name="travellers"
               min="0"
               id="travellers" value="{{old('travellers')}}"
               required
               placeholder="Excursion Travellers ">
        @if($errors->has('travellers'))
            <label class="col-form-label" for="travellers"><i
                        class="far fa-times-circle"></i> {{ $errors->first('travellers') }}
            </label>
        @endif
    </div>
    <!---- From  --->
    <div class="form-group col-4">
        <label for="from">From (Starting Price) *</label>
        <input type="number" class="form-control {{$errors->has('from') ? 'is-invalid' : ''}}"
               name="from"
               id="from" value="{{old('from')}}"
               required
               placeholder="Excursion Prices Starting From... ">
        @if($errors->has('from'))
            <label class="col-form-label" for="from"><i
                        class="far fa-times-circle"></i> {{ $errors->first('from') }}
            </label>
        @endif
    </div>
    <!---- Discount --->
    <div class="form-group col-4">
        <label for="discount">Discount *</label>
        <input type="number"
               class="form-control {{$errors->has('discount') ? 'is-invalid' : ''}}"
               name="discount"
               min="0"
               id="discount" value="{{old('discount')}}"
               required
               placeholder="Excursion Discount ">
        @if($errors->has('discount'))
            <label class="col-form-label" for="discount"><i
                        class="far fa-times-circle"></i> {{ $errors->first('discount') }}
            </label>
        @endif
    </div>
    <!---- Duration --->
    <div class="form-group col-4">
        <label for="duration">Duration in Hours *</label>
        <input type="number"
               class="form-control {{$errors->has('duration') ? 'is-invalid' : ''}}"
               name="duration"
               id="duration" value="{{old('duration')}}"
               required
               min="0"
               placeholder="Excursion Duration in days ">
        @if($errors->has('duration'))
            <label class="col-form-label" for="duration"><i
                        class="far fa-times-circle"></i> {{ $errors->first('duration') }}
            </label>
        @endif
    </div>
    <!---- Destination  --->
    <div class="form-group col-8">
        <label for="destination_id">Destination</label>
        <select class="select2" name="destination_id" data-placeholder="Select Destination"
                style="width: 100%;">
            @foreach(\App\Models\Destination::where('status',1)->get() as $destination)
                <option value="{{$destination->id}}">{{$destination->name}}</option>
            @endforeach
        </select>
        @if($errors->has('destination_id'))
            <label class="col-form-label" for="destination_id"><i
                        class="far fa-times-circle"></i> {{ $errors->first('destination_id') }}
            </label>
        @endif
    </div>
    <!---- Label --->
    <div class="form-group col-12">
        <label for="label">Label </label>
        <input type="text" class="form-control {{$errors->has('label') ? 'is-invalid' : ''}}"
               name="label"
               id="label" value="{{old('label')}}"
               required
               placeholder="Excursion label For Offers,Featured etc... ">
        @if($errors->has('label'))
            <label class="col-form-label" for="label"><i
                        class="far fa-times-circle"></i> {{ $errors->first('label') }}
            </label>
        @endif
    </div>
    <!---- Categories  --->
    <div class="form-group col-12">
        <label for="categories">Categories</label>
        <select class="select2" multiple="multiple" name="categories[]"
                data-placeholder="Select Excursion Categories" style="width: 100%;">
            @foreach(\App\Models\Category::where('status',1)->get() as $category)
                <option
                        value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

    </div>
    <!---- Status And Featured  --->
    <div class="form-group col-12">

        <div class="float-left">
            <label for="featured">Featured</label>
            <input type="checkbox" name="featured" checked data-bootstrap-switch data-off-color="danger"
                   data-on-color="success">
        </div>
        <div class="float-right">
            <label for="status">Status</label>
            <input type="checkbox" class="ml-5" name="status" checked data-bootstrap-switch
                   data-off-color="danger"
                   data-on-color="success">
        </div>
    </div>
    {{--                <div class="form-group col-12">--}}
    {{--                    <label for="frequently">Frequently Booked Together</label>--}}
    {{--                    <select class="select2" multiple name="frequently"--}}
    {{--                            data-placeholder="Select Frequently Booked Together"--}}
    {{--                            style="width: 100%;">--}}
    {{--                        @foreach(\App\Models\Excursion::where(['status'=>1,'is_excursion'=>0])->get() as $Excursion)--}}
    {{--                            <option--}}
    {{--                                    value="{{$Excursion->id}}">{{$Excursion->name}}</option>--}}
    {{--                        @endforeach--}}
    {{--                    </select>--}}
    {{--                    @if($errors->has('frequently'))--}}
    {{--                        <p class="text-danger">--}}
    {{--                            {{ $errors->first('frequently') }}--}}
    {{--                        </p>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
</div>
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('.select2').select2()
        });
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    </script>


@endpush