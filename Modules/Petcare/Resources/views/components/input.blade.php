@props(['type','name','value','title','folder'])
<div class="col-sm-6">
<div class="">
    @if($type=='file')
    <img width="100" src="{{asset($folder.'/'.$value)}}" alt="">
    @endif
    <input type="{{ $type }}" name={{ $name }} class="form-control form-control-lg
            @error($name)
            is-invalid
            @enderror" value="{{ old($name,$value)}}">
    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
</div>
