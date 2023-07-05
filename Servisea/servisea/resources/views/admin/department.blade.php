@extends('admin.admin_master')
@section('admin-main-content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($department))
                                        @foreach($department as $dept)
                                        <tr>
                                            <td>{{$dept->DEPARTMENT_ID}}</td>
                                            <td>{{$dept->DEPARTMENT_NAME}}</td>
                                            <td>
                                            <button type="button" id="edit_btn"><a href="{{route('view_admin_department',Crypt::encryptString($dept->DEPARTMENT_NAME))}}">Edit</a></button>
                                            </td>
                                            <td>
                                            <button type="button"><a href="{{route('admin_delete_department',Crypt::encryptString($dept->DEPARTMENT_ID))}}">Delete</a></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">CRUD Department</div>
                        <div class="card-body card-block">

                            <form id="CRUD_FORM" action="{{route('view_admin_department',Crypt::encryptString($dept->DEPARTMENT_NAME))}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">DEPARTMENT ID</div>
                                        @if(isset($edit))
                                            @if(!$edit->isEmpty())
                                            <input class="form-control" value="{{$edit[0]->DEPARTMENT_ID}}" disabled>
                                            @endif
                                        @else
                                            <input class="form-control" value="" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">DEPARTMENT NAME</div>
                                        @if(isset($edit))
                                            @if(!$edit->isEmpty())
                                                <input name="Department_Name" value="{{$edit[0]->DEPARTMENT_NAME}}" class="form-control">
                                            @endif
                                        @else
                                        <input class="form-control" value="">
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="form-actions form-group">
                                @if(isset($edit))
                                    @if(!$edit->isEmpty())
                                        <button type="submit" id="update_btn" class="btn btn-primary btn-sm">Update</button>
                                        <button type="button" class="btn btn-primary btn-sm"><a href="{{route('view_admin_department')}}" >Cancel</a></button>
                                    @endif
                                @else
                                <button id="insert_btn" class="btn btn-primary btn-sm">Insert</button>
                                @endif
                            </div>


                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

    </div><!-- /#right-panel -->
    @stop
    <!-- Right Panel -->

    <!-- Scripts -->


    @section('admin-script')
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        });

        $('#insert_btn').click(function(){

            $('#CRUD_FORM').attr('action', '{{route("admin_insert_department")}}');
            document.getElementById("CRUD_FORM").submit();
        });

        $('#update_btn').click(function(){


            $('#CRUD_FORM').attr('action', '{{route("admin_update_department",Crypt::encryptString($dept->DEPARTMENT_ID))}}');
            document.getElementById("CRUD_FORM").submit();

        });


    </script>

    @stop

