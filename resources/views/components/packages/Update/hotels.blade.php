<div class="form-group col-12">
    <label for="standard_hotels">Standard Hotels</label>
    <select class="select2" multiple name="standard_hotels[]" required
            data-placeholder="Select Standard Hotels"
            style="width: 100%;">
        @foreach(\App\Models\Hotel::all() as $hotel)
            <option
                    {{ $package->standard_hotels->contains($hotel->id) ? 'selected' : '' }}
                    value="{{$hotel->id}}">{{$hotel->name}}</option>
        @endforeach
    </select>
    @if($errors->has('standard_hotels'))
        <p class="text-danger">
            {{ $errors->first('standard_hotels') }}
        </p>
    @endif
</div>
<div class="form-group col-12">
    <label for="comfort_hotels">Comfort Hotels</label>
    <select class="select2" multiple name="comfort_hotels[]" required
            data-placeholder="Select Comfort Hotels"
            style="width: 100%;">
        @foreach(\App\Models\Hotel::all() as $hotel)
            <option
                    {{ $package->comfort_hotels->contains($hotel->id) ? 'selected' : '' }}
                    value="{{$hotel->id}}">{{$hotel->name}}</option>
        @endforeach
    </select>
    @if($errors->has('comfort_hotels'))
        <p class="text-danger">
            {{ $errors->first('comfort_hotels') }}
        </p>
    @endif
</div>
<div class="form-group col-12">
    <label for="deluxe_hotels">Deluxe Hotels</label>
    <select class="select2" multiple name="deluxe_hotels[]" required
            data-placeholder="Select Deluxe Hotels"
            style="width: 100%;">
        @foreach(\App\Models\Hotel::all() as $hotel)
            <option
                    {{ $package->deluxe_hotels->contains($hotel->id) ? 'selected' : '' }}
                    value="{{$hotel->id}}">{{$hotel->name}}</option>
        @endforeach
    </select>
    @if($errors->has('deluxe_hotels'))
        <p class="text-danger">
            {{ $errors->first('deluxe_hotels') }}
        </p>
    @endif
</div>