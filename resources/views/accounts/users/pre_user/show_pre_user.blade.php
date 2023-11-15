@extends('account_layout/index')
@section('title', 'Dashboard')
@section('container')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->

			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			FMS <small>Financial Management System</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>

			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                @if(session()->has('fail'))
                    <div class="alert alert-danger">
                        {{session('fail')}}
                    </div>
                @endif
				<!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>View Users
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                            <a href="javascript:;" class="remove">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                        <tr>
                            <th width="20%">Sr.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CNIC No</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $sr_no = 1;
                        @endphp
                        @foreach ($getUsers as $row_user)
                        @if($row_user->user_type !='1')
                        <tr>
                            <td>{{$sr_no++}}</td>
                            <td>{{$row_user->name}}</td>
                            <td>{{$row_user->email}}</td>
                            <td>{{$row_user->cnic}}</td>
                            @if($row_user->user_type=='2')
                            <td>Admin</td>
                            @else
                            <td>User</td>
                            @endif

                            <td><a href="{{url('user/delete').'/'.$row_user->user_id}}">Delete</a></td>
                        </tr>
                        @endif
                        @endforeach

                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
			</div>

@endsection
