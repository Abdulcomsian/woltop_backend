<label for="attribute-value" class="form-label">Attribute Value</label>
<select class="form-select attribute-value" multiple>
    <option value="">Select Attribute Value</option>
    @isset($data)
        @foreach($data as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    @endisset
</select>