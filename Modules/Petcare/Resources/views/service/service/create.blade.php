@extends('backend.layouts.master')
@section('title', @$data['title'])
@push('plugin-styles')
    <link href="{{ asset('public/theme/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}"
        rel="stylesheet" />
@endpush
@section('content')
    {!! breadcrumb([
        'title' => @$data['title'],
        route('admin.dashboard') => _trans('common.Dashboard'),
        '#' => @$data['title'],
    ]) !!}


    <form id="service-form" method="POST" action="{{ route('service.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card ot-card">
                    <div class="card-body">

                        <div class="row mb-3">
                            <input type="text" name="name" class="form-control ot-form-control ot-input"
                                id="name" aria-describedby="name" required
                                placeholder="{{ _trans('file.Service Name') }}">
                            <span class="validation-msg name text-danger" id="name-error"></span>
                        </div>
                        <div class="row mb-3">
                            <select name="type" required
                                class="select2-input ot-input mb-3 modal_select2 form-control form-control-lg"
                                id="type">
                                <option>{{ _trans('file.Service Type') }} *</option>
                                <option value="trainig">{{ _trans('common.Trainig') }}</option>
                                <option value="caycare">{{ _trans('common.Daycare') }}</option>

                            </select>
                        </div>



                        <div class="row mb-3">

                            <label class="form-label">{{ _trans('file.Service Details') }}</label>
                            <textarea class="form-control h-100 p-0 border-0 rounded-0 ckeditor" id="editor" name="service_details"
                                style="width: 100%"></textarea>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ _trans('file.Service Image') }}</label>

                            <input type="file" id="myDropify" />
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" name="code" class="form-control" id="code"
                                placeholder="{{ _trans('file.Service Code') }}"
                                aria-label="{{ _trans('file.Service Code') }}" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="service-code"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="{{ _trans('file.Generate') }}"> <i data-feather="refresh-ccw"></i>
                            </button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ _trans('file.Additional Services') }}</label>
                            <div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ _trans('file.No Additional Service') }}
                                    </label>
                                </div>



                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ _trans('file.Additional Outside play time') }}
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ _trans('file.Bath after Boarding') }}
                                    </label>
                                </div>


                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ _trans('file.NO scented cream rinse with bath (FREE)') }}
                                    </label>
                                </div>


                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ _trans('file.Bath after Boarding') }}
                                    </label>
                                </div>


                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ _trans('file.Nail Trim') }}
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="mb-3">
                            <select name="tax_id"
                                class="form-select form-select-lg select2-input ot-input mb-3 modal_select2">
                                <option>{{ _trans('file.Service Tax') }}</option>

                                <option value="">No Tax</option>
                                @foreach ($tax_list as $tax)
                                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="number" name="price" required
                                class="form-control form-control-lg ot-form-control ot-input"
                                placeholder="{{ _trans('file.Service Price') }}" step="any">
                            <span class="validation-msg price text-danger"></span>

                            <div class="form-group">
                                <input type="hidden" name="qty" value="0.00">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    {{ _trans('common.Featured') }}
                                </label>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="row mt-3 mx-1">
                    <button type="submit" class="btn btn-primary btn-lg">{{ _trans('file.Create Service') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('plugin-scripts')
    <script src="{{ asset('public/theme/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}">
    </script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('public/theme/assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/select2.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/dropify.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('public/theme/assets/js/timepicker.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        CKEDITOR.replace('editor', {
            width: '100%'

        });
    </script>
@endpush


@section('script')

{{-- 
    <script>
        function generateRandomInput() {
            // You can customize this part to generate the input as needed
            // In this example, we generate a random number between 1 and 100
            const randomInput = Math.floor(Math.random() * 100) + 1;

            // Set the generated input as the value of the input field with id "randomInput"
            document.getElementById("code").value = randomInput;
        }

        // Add a click event listener to the button
        document.getElementById("service-code").addEventListener("click", generateRandomInput);


        //dropzone portion
        Dropzone.autoDiscover = false;

        $("#myDropify").sortable({
            items: '.dz-preview',
            cursor: 'grab',
            opacity: 0.5,
            containment: '#myDropify',
            distance: 20,
            tolerance: 'pointer',
            stop: function() {
                var queue = myDropzone.getAcceptedFiles();
                newQueue = [];
                $('#imageUpload .dz-preview .dz-filename [data-dz-name]').each(function(count, el) {
                    var name = el.innerHTML;
                    queue.forEach(function(file) {
                        if (file.name === name) {
                            newQueue.push(file);
                        }
                    });
                });
                myDropzone.files = newQueue;
            }
        });

        myDropzone = new Dropzone('div#imageUpload', {
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFilesize: 12,
            paramName: 'image',
            clickable: true,
            method: 'POST',
            url: '{{ route('service.store') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            init: function() {
                var myDropzone = this;
                $('#submit-btn').on("click", function(e) {
                    e.preventDefault();
                    tinyMCE.triggerSave();
                    if (myDropzone.getAcceptedFiles().length) {
                        myDropzone.processQueue();
                    } else {


                        $('.name').text("")
                        $('.code').text("")
                        $('.category').text("")
                        $('.brand').text("")
                        $('.price').text("")
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('service.store') }}',
                            data: $("#service-form").serialize(),
                            success: function(response) {
                                location.href = '{{ route('service.index') }}';
                            },
                            error: function(error) {

                                if (error.responseJSON.errors.name) {
                                    $('.name').text(error.responseJSON.errors.name[0])
                                }
                                if (error.responseJSON.errors.code) {
                                    $('.code').text(error.responseJSON.errors.code[0])
                                }
                                if (error.responseJSON.errors.category_id) {
                                    $('.category').text(error.responseJSON.errors
                                        .category_id[0])
                                }
                                if (error.responseJSON.errors.brand_id) {
                                    $('.brand').text(error.responseJSON.errors.brand_id[0])
                                }
                                if (error.responseJSON.errors.price) {
                                    $('.price').text(error.responseJSON.errors.price[0])
                                }
                            }
                        });



                    }
                });

                this.on('sending', function(file, xhr, formData) {
                    var data = $("#service-form").serializeArray();
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });
                });
            },
            error: function(file, response) {
                if (response.errors.name) {
                    $("#name-error").text(response.errors.name);
                    this.removeAllFiles(true);
                } else if (response.errors.code) {
                    $("#code-error").text(response.errors.code);
                    this.removeAllFiles(true);
                } else {
                    try {
                        var res = JSON.parse(response);
                        if (typeof res.message !== 'undefined' && !$modal.hasClass('in')) {
                            $("#success-icon").attr("class", "fas fa-thumbs-down");
                            $("#success-text").html(res.message);
                            $modal.modal("show");
                        } else {
                            if ($.type(response) === "string")
                                var message = response; //dropzone sends it's own error messages in string
                            else
                                var message = response.message;
                            file.previewElement.classList.add("dz-error");
                            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                            _results = [];
                            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                                node = _ref[_i];
                                _results.push(node.textContent = message);
                            }
                            return _results;
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }
            },
            successmultiple: function(file, response) {
                location.href = '{{ route('service.index') }}';
            },
            completemultiple: function(file, response) {
                console.log(file, response, "completemultiple");
            },
            reset: function() {
                this.removeAllFiles(true);
            }
        });

        $('.dropzone .dz-message span').append("<i class='fa fa-upload' aria-hidden='true'></i>");
        $(document).ready(function() {
            var baseUrl = $('meta[name="base-url"]').attr('content');
        })
    </script> --}}
@endsection
