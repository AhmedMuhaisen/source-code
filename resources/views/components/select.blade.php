@props(['array','name','value','title'])

<div class="my-2">
  
    <select name='{{$name}}' id="" class="form-select js-example-basic-single form-select-lg
    @error($name)
    is-invalid
    @enderror" multiple='multiple'>
        <option value="" id="skills" selected disabled hidden>{{$title}}</option>
      
        @foreach ($array as $item)
        
        <option value="{{$item->id}}" @selected(old($name,$value)==$item->id)>{{$item->name}}</option>
        @endforeach

    </select>
    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror

</div>
