@extends('layouts.app')
@section('content')

    <br>
    @include('flash_message')
    <main id="main" class="main">

        <div class="pagetitle">

            <div class="row">
                <div class="container">
                    <div class="col-12">
                        <div class="">
                            <div class="" style="height: 103px">

                                <h3 class="card-title" style="margin-top:-10px"><b style="font-size: 30px;">@lang('messages.Income')</b></h3>


                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">

                                        </div>&nbsp;&nbsp;
                                        <div class="input-group-append">
                                            <button type="submit" onclick="Export()"  class="btn btn fa-sm" style="background-color: #4154f1; left: 828px;width: 93px; height: 39px; margin-top: -130px">
                                                <div style="color: white">@lang('messages.PDF')</div></button>
                                            <button type="submit" class="btn btn fa-sm"  style="background-color: #4154f1; left: 930px;width: 93px; height: 39px; margin-top: -171px;">
                                                <a href="{{route('income/create')}}" style="color: white">@lang('messages.Add New')</a></button>
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
                                            <th>@lang('messages.Account Name')</th>
                                            <th>@lang('messages.Category Name')</th>
                                            <th>@lang('messages.Date')</th>
                                            <th>@lang('messages.Income Amount')</th>
                                            <th>@lang('messages.Remark')</th>
                                            <th>@lang('messages.Action')</th>


                                        </tr>
                                        </thead>
                                        <tbody id="myTable">

                                        @foreach($value as $data)
                                            <tr>

                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->user->name}}</td>
                                                <td>{{$data->account->name}}</td>
                                                <td>{{$data->category->name}}</td>
                                                <td>{{$data->date}}</td>
                                                <td style="color: green">{{$data->amount}}</td>
                                                <td>{{$data->remark}}</td>

                                                <td>
                                                    <a href="{{route('income/edit',$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('income/destroy',$data->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>

                                </div>

                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>

            </div>
        </div>



    </main>

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


