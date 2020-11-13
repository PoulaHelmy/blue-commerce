<div class="row">
    <!---- Name --->
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Title*</label>
            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}"
                   title="title"
                   id="title"
                   required value="{{old('title')}}"
                   placeholder="Package title ">
            @if($errors->has('title'))
                <label class="col-form-label" for="title"><i
                            class="far fa-times-circle"></i> {{ $errors->first('title') }}
                </label>
            @endif
        </div>
    </div>
    <!---- DESTINATIONS  --->
    <div class="col-md-12">
        <div class="form-group ">
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
    </div>
    <!---- OverView  --->
    <div class="col-md-12">
        <div class="form-group">
            <label for="overview">Overview</label>
            <textarea name="overview" class="form-control {{$errors->has('overview') ? 'is-invalid' : ''}}"
                      id="overview">{{old('overview')}}</textarea>
            @if($errors->has('overview'))
                <label class="col-form-label" for="overview"><i
                            class="far fa-times-circle"></i> {{ $errors->first('overview') }}
                </label>
            @endif
        </div>
    </div>
    <!---- STATUS  --->
    <div class="col-md-12">
        <div class="form-group">
            <div class="float-right">
                <label for="status">Status</label>
                <input type="checkbox" class="ml-5" name="status" checked data-bootstrap-switch
                       data-off-color="danger"
                       data-on-color="success">
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        ClassicEditor.create(document.querySelector('#overview'));
    </script>
    <style>
        .ck-content {
            height: 300px !important;
        }
    </style>
@endpush