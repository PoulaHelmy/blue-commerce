<!---- Departure_location --->
<div class="form-group col-12">
    <label for="departure_location">Departure Location *</label>
    <input type="text"
           class="form-control {{$errors->has('departure_location') ? 'is-invalid' : ''}}"
           name="departure_location"
           id="departure_location" value="{{old('departure_location')}}"
           required
           placeholder="Package Departure Location ">
    @if($errors->has('departure_location'))
        <label class="col-form-label" for="departure_location"><i
                    class="far fa-times-circle"></i> {{ $errors->first('departure_location') }}
        </label>
    @endif
</div>
<!---- Departure_location --->
<div class="form-group col-12">
    <label for="return_location">Return Location *</label>
    <input type="text"
           class="form-control {{$errors->has('return_location') ? 'is-invalid' : ''}}"
           name="return_location"
           id="return_location" value="{{old('return_location')}}"
           required
           placeholder="Package Return Location ">
    @if($errors->has('return_location'))
        <label class="col-form-label" for="return_location"><i
                    class="far fa-times-circle"></i> {{ $errors->first('return_location') }}
        </label>
    @endif
</div>
<!---- Location --->
<div class="form-group col-12">
    <location for="location">Location *</location>
    <input type="text" class="form-control {{$errors->has('location') ? 'is-invalid' : ''}}"
           name="location"
           id="location" value="{{old('location')}}"
           required
           placeholder="Package Location">
    @if($errors->has('location'))
        <location class="col-form-location" for="location"><i
                    class="far fa-times-circle"></i> {{ $errors->first('location') }}
        </location>
    @endif
</div>
<!---- Location Description --->
<div class="form-group col-12">
    <label for="location_description">Location Description</label>
    <textarea name="location_description"
              class="form-control {{$errors->has('location_description') ? 'is-invalid' : ''}}"
              id="location_description">{{old('location_description')}}</textarea>
    @if($errors->has('location_description'))
        <label class="col-form-label" for="location_description"><i
                    class="far fa-times-circle"></i> {{ $errors->first('location_description') }}
        </label>
    @endif
</div>