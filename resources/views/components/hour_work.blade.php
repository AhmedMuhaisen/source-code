@props(['day','from','to'])


<div class="row my-2">
<div class="row d-flex my-2" style="width: 88%;" id="container_{{$day}}">
    <div class="col-sm-3 position-relative">
        <label for="">day</label>
        <p style="position: absolute;
        top: 62%;
        align-items: center;
        display: flex;
        justify-content: center;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 2px solid gray;
        width: 100%;
        height: 50%;">{{ $day }}</p>
    </div>
    <div class="time_worke d-flex" style="width:75%;">
        {{-- @foreach ($times as $time) --}}
    <div class="col-sm-6">
        <label for="">from</label>
        <x-input type="time" title="from" name="day[{{$day}}][0][from]" value="{{ $from }}" />
    </div>
    <div class="col-sm-6">
        <label for="">to</label>
        <x-input type="time" title="to" name="day[{{$day}}][0][to]" value="{{ $to }}" />
</div>
{{-- @endforeach --}}
</div>
<div id="time_worke_container{{$day}}" style="width:90%;">
    
</div>

</div>
<button type="button" style="border: 0;
width: 51px;
margin-top: 29px;
background: none;
height: 32px;
/* position: absolute; */
/* right: 50px; */
height: 40px;" onclick="add_new_work_time('{{ $day }}')">
<svg xmlns="http://www.w3.org/2000/svg" style="font-size: 23px;"
 height="1em" viewBox="0 0 512 512">
<path
    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
</svg>
</button>

<button type="button" style="border: 0;
        width: 51px;
        margin-top: 29px;
        background: none;
        height: 32px;
        height: 40px;" onclick="delete_last_work_time('{{ $day }}')">
    <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 23px;" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM184 232H328c13.3 0 24 10.7 24 24s-10.7 24-24 24H184c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
</button>

    {{-- <x-availabilitiy-hour></x-availabilitiy-hour> --}}
</div>