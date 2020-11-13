<!----INCLUDING --->
<div class="form-group col-12">
    <label for="included">Including *</label>
    <input type="text"
           class="form-control included {{$errors->has('included') ? 'is-invalid' : ''}}"
           name="included"
           id="included"
           style="height: 200px !important;"
           required value="{{old('included')}}"
           placeholder="Package Including... ">
    @if($errors->has('included'))
        <label class="col-form-label" for="included"><i
                    class="far fa-times-circle"></i> {{ $errors->first('included') }}
        </label>
    @endif
</div>
<!---- EXCLUDING --->
<div class="form-group col-12">
    <label for="excluded">Excluding *</label>
    <input type="text"
           class="form-control excluded {{$errors->has('excluded') ? 'is-invalid' : ''}}"
           name="excluded"
           id="excluded"
           required value="{{old('excluded')}}"
           placeholder="Package Including... ">
    @if($errors->has('excluded'))
        <label class="col-form-label" for="excluded"><i
                    class="far fa-times-circle"></i> {{ $errors->first('excluded') }}
        </label>
    @endif
</div>



@push('js')

    <script>
        $('.included').tagsInput({
            'defaultText': '+ includes',
            'height': '200px'
        });
        $('.excluded').tagsInput({
            'defaultText': '+ excludes',
            'height': '200px'
        });
    </script>
@endpush