@extends('backend.layouts.master')
@section('title', @$data['title'])
@push('plugin-styles')
    <link href="{{ asset('public/theme/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
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
                                <a href="{{ route('trainer.create') }}" type="button"
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
                                        
                                        <th>{{ _trans('file.User Name') }}</th>
                                      
                                     
                                        <th>{{ _trans('file.location') }}</th>
                                     
                                        <th>{{ _trans('file.Rewards') }}</th>
                                        <th>{{ _trans('file.Actions') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($trainers as $key => $trainer)
                                        <tr class="align-middle">
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if ($trainer->image)
                                                        <img class="img-xs rounded-circle"
                                                        src="{{ asset('public/'.$trainer->image) }}">
                                                    @else
                                                        <img class="img-xs rounded-circle"
                                                            src="{{ url('public/static/blank_small.png') }}">
                                                    @endif

                                                    <div class="ms-2">
                                                        <p> {{ $trainer->user->name }}</p>
                                                        <span class="tx-11 text-muted">ID {{ $trainer->code }}</span>
                                                    </div>
                                                </div>


                                            </td>
                                            <td>{{$trainer->user->country.' '.$trainer->user->city}}</td>
                                           
                                     
                                            <td>
                                                {{$trainer->rewards}}
                                            </td>
                                            <td>
                                                <a href="{{ route('trainer.edit',$trainer->id)}}" class="btn btn btn-link btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>
                                                <a class="btn btn btn-link btn-icon"
                                                    onclick="showSwal('{{ route('trainer.destroy',$trainer->id) }}')">
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
    <script>
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
