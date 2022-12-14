@extends('layouts.app')
@section('content')



    <br>
    @include('flash_message')
    <main id="main" class="main">

        <div class="pagetitle">

            <div class="card">
                <div class="card-body">
                            <div class="" style="height: 103px">

                                <h3 class="card-title" style="margin-top:-10px"><b style="font-size: 30px;">@lang('messages.Transfer')</b></h3>


                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">

                                        </div>&nbsp;&nbsp;
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn fa-sm" value="Create PDF" onclick="Export()" style="background-color: #4154f1; left: 828px;width: 93px; height: 39px; margin-top: -93px">
                                                <div style="color: white">@lang('messages.PDF')</div></button>
                                            <button type="submit" class="btn btn fa-sm"  style="background-color: #4154f1; left: 930px;width: 93px; height: 39px; margin-top: -134px;">
                                                <a href="{{route('transfer/create')}}" style="color: white">@lang('messages.Add New')</a></button>
                                        </div>
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
                                            <th>@lang('messages.From Account')</th>
                                            <th>@lang('messages.To Account')</th>
                                            <th>@lang('messages.Date')</th>
                                            <th>@lang('messages.Transfer Amount')</th>
                                            <th>@lang('messages.Remark')</th>
                                            <th>@lang('messages.Action')</th>


                                        </tr>
                                        </thead>
                                        <tbody id="myTable">

                                        @foreach($value as $data)
                                            <tr>

                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->User->name}}</td>
                                                <td>{{$data->from_account->name}}</td>
                                                <td>{{$data->to_account->name}}</td>
                                                <td>{{$data->date}}</td>
                                                <td style="color: green">{{$data->amount}}</td>
                                                <td>{{$data->remark}}</td>

                                                <td>
                                                    <a href="{{route('transfer/edit',$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('transfer/destroy',$data->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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


