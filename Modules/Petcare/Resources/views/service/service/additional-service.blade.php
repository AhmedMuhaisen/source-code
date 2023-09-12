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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#additionalServiceModel">
                                    <i data-feather="plus"></i>
                                    {{ _trans('Additional Service') }}
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ _trans('Service Name') }}</th>
                                        <th>{{ _trans('Price') }}</th>
                                        <th class="text-center" style="max-width: 150px">{{ _trans('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['services'] as $key => $service)
                                        <tr class="align-middle">
                                            <td>
                                                <p> {{ $service->name }}</p>
                                            </td>
                                         
                                            <td>{{ $service->price }} AED</td>

                                            <td class="text-center" >
                                                <a href="" class="btn btn btn-link btn-icon">
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
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="additionalServiceModel" tabindex="-1" aria-labelledby="additionalServiceModelLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="additionalServiceModelLabel">{{ _trans('file.Additional Service') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <form class="forms-sample">
                        <div class="modal-body">
                            <input type="hidden" name="is_additional" value="1">
                            <div class="mb-3">
                                <label for="service-name" class="form-label">{{ _trans('file.Service Name') }}</label>
                                <input type="text" class="form-control" id="service-name" name="name"
                                    autocomplete="off" placeholder="{{ _trans('file.Service Name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="service-price" class="form-label">{{ _trans('file.Service Pricce') }}</label>
                                <input type="number" class="form-control" name="price" id="service-price"
                                    autocomplete="off" placeholder="{{ _trans('file.Service Price') }}">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary"
                                onclick="sotre('{{ route('additional-services.store') }}')">{{ _trans('common.submit') }}</button>
                        </div>
                    </form>
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
        <script type="text/javascript">
            $(function() {
                sotre = function(route) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });



                    let name = $("input[name=name]").val();
                    let price = $("input[name=price]").val();
                    let is_additional = $("input[name=is_additional]").val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('additional-services.store') }}",
                        data: {
                            name: name,
                            price: price,
                            is_additional: is_additional
                        },
                        success: function(data) {
                            console.log(data);
                            $('#additionalServiceModel').modal('hide');
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            Toast.fire({
                                icon: 'success',
                                title: '{{ _trans('common.Add Successfully') }}'
                            })
                            window.location.reload();
                        }
                    });
                }
            });


            // $(".submit").click(function(e) {



            // });
        </script>
    @endpush
