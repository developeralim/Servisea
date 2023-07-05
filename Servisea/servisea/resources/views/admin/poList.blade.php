@extends('admin.admin_master')

@section('admin-style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

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



        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Active Gig</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Inactive Gig</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="content">
        <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                @if(isset($user))
                                    @if($user == "PO")
                                    <strong class="card-title">List of Project Owners</strong>
                                    @elseif($user == "Freelancer")
                                    <strong class="card-title">List of Freelancers</strong>
                                    @elseif($user == "Employee")
                                    <strong class="card-title">List of Employees</strong>
                                    @endif
                                @endif
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                @if(isset($user))
                                                    @if($user == "PO")
                                                    <th>User Since</th>
                                                    @elseif($user == "Freelancer")
                                                    <th>Freelancer Since</th>
                                                    @elseif($user == "Employee")
                                                    <th>Employee Since</th>
                                                    @endif
                                                @endif
                                                <th>Account Status</th>
                                                <th>Freeze/Unfreeze</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($po_List))
                                            @foreach($po_List as $po)
                                            <tr>
                                                <td>{{$po->USER_ID}}</td>
                                                <td><a href="" class="button">{{$po->USERNAME}}</a></td>
                                                <td>{{$po->USER_EMAIL}}</td>
                                                @if(isset($user))
                                                    @if($user == "PO")
                                                        <td>{{$po->created_at}}</td>
                                                    @elseif($user == "Freelancer")
                                                        <td>{{$po->F_SINCE}}</td>
                                                    @elseif($user == "Employee")
                                                        <td>{{$po->EMP_SINCE}}</td>
                                                    @endif
                                                @endif
                                                @if($po->ACCOUNT_STATUS == 1)
                                                    <td>
                                                        <button type="button" class="btn btn-success" id="edit_btn">ACTIVE</button>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-warning" id="edit_btn" href="{{route('admin_update_user',[$user,Crypt::encryptString($po->USER_ID)])}}">Freeze</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <button type="button" class="btn btn-danger" id="edit_btn">INACTIVE</button>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-warning" id="edit_btn" href="{{route('admin_update_user',[$user,Crypt::encryptString($po->USER_ID)])}}">Re-Activate</a>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a class="btn btn-danger" id="edit_btn" href="{{route('admin_delete_user',[$user,Crypt::encryptString($po->USER_ID)])}}" >Delete</a>
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
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
    </div>



        </div><!-- .content -->


        <div class="clearfix"></div>

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach

    </div><!-- /#right-panel -->
    @stop
    <!-- Right Panel -->

    <!-- Scripts -->


    @section('admin-script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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

    </script>

    @stop

