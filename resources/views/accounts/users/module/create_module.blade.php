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
			Dashboard <small>dashboard & statistics</small>
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
			<div class="row">
                <div class="col-md-12">
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
                  <div class="portlet box green-haze">
                      <div class="portlet-title">
                          <div class="caption">
                              <i class="fa fa-user"></i> Add Module
                          </div>
                          <!--<div class="tools">
                              <a href="javascript:;" class="collapse">
                              </a>
                              <a href="#portlet-config" data-toggle="modal" class="config">
                              </a>
                              <a href="javascript:;" class="reload">
                              </a>
                              <a href="javascript:;" class="remove">
                              </a>
                          </div>-->
                      </div>

                  <!--body area-->
                  <div class="portlet-body form">
                  <!---  Form Start -->
                      <form name="form" action="{{route('module.add')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                          <div class="form-body">
                                  <div class="alert alert-danger display-hide">
                                      <button class="close" data-close="alert"></button>
                                      You have some form errors. Please check below.
                                  </div>
                                  <div class="alert alert-success display-hide">
                                      <button class="close" data-close="alert"></button>
                                      Your form validation is successful!
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label class="control-label ">Module Name:  <span class="required"> * </span>
                                      </label>
                                          <input type="text" name="module_title" id="module_title" data-required="1" class="form-control validate[required]" placeholder="" value=""/>
                                      <span class="help-block">
                                        @error('module_title')
                                           {{$message}}
                                        @enderror
                                      </span>
                                  </div>
                                   <div class="form-group col-md-6">
                                      <label class="control-label">Module URL: <span class="required"> * </span>
                                      </label>
                                          <input type="text" name="module_url" id="module_url" data-required="1" class="form-control validate[required]" value=""/>
                                          <span class="help-block">
                                            @error('module_url')
                                               {{$message}}
                                            @enderror
                                          </span>
                                  </div>
                                    <div class="form-group">
                                          <label class="control-label"><span class="required">
                                          </span>
                                          </label>
                                          <span class="help-block">
                                        @error('address')
                                           {{$message}}
                                        @enderror
                                      </span>
                                    </div>

                                  <div class="form-actions">
                                  <div class="btn-set pull-left">
                                      <button type="submit" class="btn green">Save</button>
                                      <button type="reset" class="btn blue">Reset</button>
                                  </div>
                                  <!--<div class="btn-set pull-right">
                                      <button type="button" class="btn default">Action 1</button>
                                      <button type="button" class="btn red">Action 2</button>
                                      <button type="button" class="btn yellow">Action 3</button>
                                  </div>-->
                              </div>
                          </form>
                          <!-- END FORM-->
                      </div>

                  </div>
              </div>
              <!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-madison">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>View Modules
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
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>URL Title</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr_no = 1;
                        @endphp
                    @foreach($GetModule as $row_module)
                        <tr>
                            <td>{{$sr_no++}}</td>
                            <td>{{$row_module->module_title}}</td>
                            <td>{{$row_module->module_url}}</td>
                            <td>
                                {{-- <a href="{{url('update/'.$row_module->module_id)}}">Update</a> | --}}
                                <a href="{{url('module/delete/'.$row_module->module_id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
          </div>
			<!-- END DASHBOARD STATS -->



@endsection
