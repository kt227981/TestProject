@extends('layouts.app')
@section('content')

{{--    <style>--}}
{{--        h3::first-letter {--}}
{{--            font-size: 250%;--}}
{{--            /*color: #4154f1;*/--}}
{{--            font-weight: 900;--}}

{{--        }--}}
{{--    </style>--}}

    <br>
<main id="main" class="main">

    <div class="pagetitle">
@include('flash_message')
    <div class="row">
        <div class="container">
            <div class="col-12">
                <div class="">
                    <div class="" style="height: 103px">

                        <h3 class="card-title" style="margin-top:-10px"><b style="font-size: 30px;">@lang('messages.User')</b></h3>


                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <div class="input-group-append">

                                </div>&nbsp;&nbsp;
                                <div class="input-group-append">
                                    <button type="submit" onclick="Export()" class="btn btn fa-sm" style="background-color: #4154f1; left: 828px;width: 93px; height: 39px; margin-top: -130px">
                                        <div style="color: white">@lang('messages.PDF')</div></button>
                                    <button type="submit" class="btn btn fa-sm" style="background-color: #4154f1; left: 930px;width: 93px; height: 39px; margin-top: -171px;">
                                        <a href="{{route('user.create')}}" style="color: white">@lang('messages.Add')</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div id="tblCustomers">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="example1" border="1px">
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

                            @foreach($value as $data)
                                <tr>

                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->mobile_no}}</td>
                                    <td>{{$data->email}}</td>

                                    <td>
                                        <input data-id="{{$data->id}}" class="toggle-class statuss" type="checkbox"onclick="on();"
                                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                               data-on="Active" data-off="Block" {{ $data->status=='Active' ? 'checked' : '' }}>
                                    </td>


                                    <td>
                                        <a href="{{route('user/edit',$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('user.destroy',$data->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

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
        <script>
            $(function() {
                $('.toggle-class').change(function() {
                    var status = $(this).prop('checked') == true ? 'Active' : 'Block';
                    // alert(status)
                    var id = $(this).data('id');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '{{route('user/status')}}',
                        data: {'status': status, 'id': id},
                        success: function(data){
                            console.log(data.success)
                        }
                    });
                })
            });
        </script>
    </div>



</main>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script type="text/javascript">
        function Export() {

            html2canvas(document.getElementById('tblCustomers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        }


    </script>
@endsection



