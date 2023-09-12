@extends('backend.layouts.master')
@section('title', @$data['title'])
@push('plugin-styles')
    <link href="{{ asset('public/theme/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')

    {!! breadcrumb([
        'title' => @$data['title'],
        route('admin.dashboard') => _trans('common.Dashboard'),
        '#' => @$data['title'],
    ]) !!}


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('service.create') }}" type="button"
                                    class="btn btn-primary btn-icon ms-2">
                                    <i data-feather="check-square"></i>
                                </a>
                                <a href="" type="button" class="btn btn-danger btn-icon ms-2">
                                    <i data-feather="trash-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ _trans('file.Service Name') }}</th>
                                        <th>{{ _trans('file.Service Type') }}</th>
                                        <th>{{ _trans('file.Price') }}</th>
                                        <th>{{ _trans('file.Description') }}</th>
                                        <th>{{ _trans('file.Add By') }}</th>
                                        <th>{{ _trans('file.Status') }}</th>
                                        <th>{{ _trans('file.Actions') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data['services'] as $key => $service)
                                        <tr class="align-middle">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($service->image)
                                                        <img class="img-xs rounded-circle"
                                                            src="{{ asset('public/images/service/' . $service->image) }}">
                                                    @else
                                                        <img class="img-xs rounded-circle"
                                                            src="{{ url('public/static/blank_small.png') }}">
                                                    @endif

                                                    <div class="ms-2">
                                                        <p> {{ $service->name }}</p>
                                                        <span class="tx-11 text-muted">ID {{ $service->code }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $service->type }}</td>
                                            <td>{{ $service->price }} AED</td>
                                            <td class="text-truncate" style="max-width: 300px">{!! $service->service_details !!}</td>
                                            <td>{{ isset(App\Models\User::find($service->created_by)->name) ? App\Models\User::find($service->created_by)->name : 'Admin' }}
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-2">
                                                    <input type="checkbox" class="form-check-input" id="formSwitch1"
                                                        @if ($service->is_active == 1) checked 
                                                        @endif Onchange="change_check(event,{{$service->id}})">

                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('service.edit',$service->id) }}" class="btn btn btn-link btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>

                                                <a class="btn btn btn-link btn-icon"
                                                    onclick="showSwal('{{ route('service.destroy', [$service->id]) }}')">
                                                   
                                                    <i data-feather="trash-2"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('public/theme/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('public/theme/assets/js/data-table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>



function change_check(e,id){
    var status =0 ;
   
        if (e.target.checked) {
            status =1;
          
        } else {
            status =0;
        }
        console.log(status)

        axios.post('service/change_check/'+id,{
            'status':status
        })
                .then(function (response) {
                    console.log(response.data);
                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            Toast.fire({
                                icon: 'info',
                                title: response.data.status
                            })
  })
  .catch(function (error) {
    console.log(error);
  });
}

        $(function() {
            var redirect = "{{ route('service.index') }}";

            showSwal = function(route) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger me-2'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'me-2',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {

                    if (result.value) {
                        $.ajax({
                            url: route,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                );
                                window.location =
                                redirect; // You can also redirect or update the UI here if needed
                            },
                            error: function(xhr) {
                                swal("Error!", "Something went wrong.", "error");
                            }
                        });

                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })
            };
        })
    </script>
@endpush
