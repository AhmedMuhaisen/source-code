@extends('backend.layouts.master')

@section('content')
{!! breadcrumb([
'title' => @$data['title'],
route('admin.dashboard') => _trans('common.Dashboard'),
'#' => @$data['title'],
]) !!}
<div class="row">
    <div class="col-md-12">
        <div class="card ot-card">
            <div class="card-body">

                {!! Form::open(['route' => ['trainer.update', $trainer->id], 'method' => 'put', 'files' => true ,
                'id'=>"edit-trainer"]) !!}

                <div class="row">
                    <div class="col-md-4 text-center">
                        <div
                            class="w-30 h-30 rounded-circle border border-4 mt-2 image-upload @error('image') error @enderror">
                            @if($trainer->image)
                            <img  class="old-image"  src="{{ asset('public/'.$trainer->image) }}" alt="" >
                            @endif
                         
                            <input type="file" class="x-input-file-upload" name="image">
                            <svg class="@error('image') error @enderror" xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 640 512">
                                <path
                                    d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z" />
                            </svg>
                            @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="old_image" value="{{ $trainer->image }}">

                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-6">

                                <x-input type="text" title="Trainer Full Name" name="name"
                                    value="{{ $trainer->user->name }}" />
                                <!-- Col -->
                            </div>
                            <div class="col-sm-6">
                                <x-input type="email" title="Email address" name="email"
                                    value="{{ $trainer->user->email }}" />
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">

                            <div class="col-sm-6">
                                <x-input type="number" name="phone" title="phone" value="{{ $trainer->user->phone }}" />
                            </div>


                            <div class="col-sm-6">
                                <x-input type="text" title="Country" name="country"
                                    value="{{ $trainer->user->country }}" />
                            </div> <!-- Col -->
                        </div><!-- Row -->


                        <div class="row">

                            <div class="col-sm-6">
                                <x-input type="text" title="State/Region" name="state"
                                    value="{{ $trainer->user->state }}" />
                            </div> <!-- Col -->

                            <div class="col-sm-6">
                                <x-input type="text" title="City" name="city" value="{{ $trainer->user->city }}" />
                            </div> <!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <x-input type="text" title="Address" name="address"
                                    value="{{ $trainer->user->address }}" />
                            </div> <!-- Col -->
                            <div class="col-sm-6">
                                <x-input type="text" title="Zip/Postal Code" name="postal_code"
                                    value="{{ $trainer->zip_code }}" />
                            </div> <!-- Col -->
                        </div><!-- Row -->



                        <div class="row">


                            <div class="multi-selector">

                                <div class="select-field form-control form-control-lg">
                                    <input type="text" name="" placeholder="Choose tasks" id="" class="input-selector">
                                    <span class="down-arrow">&blacktriangledown;</span>
                                </div>
                                <!---------List of checkboxes and options----------->
                                
                                <div class="list">
                                    @foreach ($skills as $skill)
                                    <label for="{{ 'skill' . $skill->id }}" class="task">
                                        <input type="checkbox" onchange="counterSelected()" name="skills[]"
                                            class="skills_checkbox"
                                            @if(is_array(old('skills',json_decode($trainer->skills))) &&
                                        in_array($skill->id, old('skills',json_decode($trainer->skills) ))) checked
                                        @endif id="{{ 'skill' . $skill->id }}" value="{{ $skill->id }}">
                                        {{ $skill->name}}
                                    </label>
                                    @endforeach


                                </div>


                            </div>


                        </div>

                        <div class="row">

                            <x-input type="text" title="Year Of Expirinace" name="expirinace"
                                value="{{ $trainer->year_of_experience}}" />

                        </div>

                        <div class="row">

                            <x-input type="password" title="Password" name="password" value="" />

                        </div>

                        <div class="row">
                            <div class="my-2">
                                <input type="password" class="form-control form-control-lg"
                                    placeholder=" Confirm Password" name="password_confirmation" value="" />

                            </div>
                        </div>


 



                        <div class="row">
                            <div class="my-2">
                                <textarea
                                    class="ckeditor form-control form-control-lg @error('description') is-invalid @enderror"
                                    name='description' placeholder="Description">{{ $trainer->description}}</textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <h3>houre works</h3>

                        <div class="row">
                            @if(is_array(json_decode($trainer->hour_work)))
                        @foreach (json_decode($trainer->hour_work) as $item)
               
                   <x-hour_work day="{{ $item->day }}" from="{{ get_object_vars($item->intervals[0][0])['from']}}" to="{{ get_object_vars($item->intervals[0][0])['to']}}" />
                        @endforeach
                        @endif
                        {{-- <x-availabilitiy-hour></x-availabilitiy-hour> --}}

                    </div>
                        <button type="submit" class="btn btn-inverse-primary btn-lg float-end">Create Trainer </a>


                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script>
    function counterSelected(){
        var checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        var count = checkedCheckboxes.length;
        var input = document.querySelector('.input-selector');
            input.placeholder = count + ' skills selected';
    }
    document.querySelector('.select-field').addEventListener('click',()=>{
            document.querySelector('.list').classList.toggle('show');
            document.querySelector('.down-arrow').classList.toggle('rotate180');
    
        });

        var checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        var count = checkedCheckboxes.length;
        var input = document.querySelector('.input-selector');
            input.placeholder = count + ' skills selected';
    
</script>
<script>
    var num_row =0;
    function add_new_work_time(day){

        var container=document.querySelector('#container_' + day);
        num_row++;
        console.log(num_row);
       
        container.querySelector('#time_worke_container' +day).innerHTML += `
        
        <div class="time_worke d-flex" style="width:84%;">
        <div class="col-sm-4"></div>
        <div class="col-sm-6">
            <label for="">from</label>
            <x-input type="time" title="from" name="day[${day}][${num_row}]['from']" value="" />
        </div>
        <div class="col-sm-6">
            <label for="">to</label>
            <x-input type="time" title="to" name="day[${day}][${num_row}]['to']" value="" />
        </div>
    </div>
    `;
    }
    function delete_last_work_time(day) {
    // Get the container element for the work hours
    const container = document.querySelector('#time_worke_container' + day);

    // Get all the work hour elements inside the container
    const workHourElements = container.querySelectorAll('.time_worke');

    // Check if there are work hour elements to delete
    if (workHourElements.length > 0) {
        // Remove the last work hour element
        const lastWorkHour = workHourElements[workHourElements.length - 1];
        container.removeChild(lastWorkHour);
    }
}

   

 
</script>
@endsection


@section('script')


<script type="text/javascript">
    $("ul#people").siblings('a').attr('aria-expanded','true');
    $("ul#people").addClass("show");
    $("ul#people #supplier-create-menu").addClass("active");
    $(".customer-group-section").hide();

    $('x-input[name="both"]').on('change', function() {
        if ($(this).is(':checked')) {
            $('.customer-group-section').show(300);
            $('select[name="customer_group_id"]').prop('required',true);
        }
        else{
            $('.customer-group-section').hide(300);
            $('select[name="customer_group_id"]').prop('required',false);
        }
    });
</script>
@endsection