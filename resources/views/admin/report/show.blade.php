@extends('layouts.app')
@section('content')



    <br>
    <main id="main" class="main">

        <div class="pagetitle">
            @include('flash_message')
            <div class="card">
                <div class="card-body">
                    <div class="" style="height: 103px">

                        <h3 class="card-title" style="margin-top:-10px"><b style="font-size: 30px;">@lang('messages.Report')</b></h3>


                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <div class="input-group-append">

                                </div>&nbsp;&nbsp;

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div id="tblCustomers">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered" id="example1" border="1px">
                                <thead>
                                <tr>

                                    <th>@lang('messages.Id')</th>
                                    <th>@lang('messages.User Name')</th>
                                    <th>@lang('messages.User Mobile Number')</th>
                                    <th>@lang('messages.Email')</th>
                                    <th>@lang('messages.Status')</th>
                                    <th>@lang('messages.Action')</th>


                                </tr>
                                </thead>
                                <tbody id="myTable">

                                @foreach($total as $data)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
{{--                                        <td>{{$data->user->name}}</td>--}}



                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

            <script>
                $(function () {
                    $("#example1").DataTable({
                        "responsive": true, "lengthChange": true, "autoWidth": true,
                        "responsive": true,
                        "scrollX": false,
                        // "buttons": ["copy", "csv", "excel", "pdf",]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
            </script>

        </div>



    </main>



@endsection



