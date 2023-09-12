@props(['type','name','value','title','folder'])

<div class="my-2">
    @if($type=='file')
    <img width="100" src="{{asset($folder.'/'.$value)}}" alt="">
    @endif
    <input type="{{ $type }}" name={{ $name }} placeholder="{{ $title }}" class="form-control form-control-lg
            @error($name)
            is-invalid
            @enderror" value="{{ old($name,$value)}}">
    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror

</div>
