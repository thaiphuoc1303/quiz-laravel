@foreach ($chuongs as $item)
    <option value="{{$item->id}}"> {{ $item->ten }} </option>
@endforeach