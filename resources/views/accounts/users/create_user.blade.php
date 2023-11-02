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
                              <i class="fa fa-user"></i> Add User
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
                      <form name="form" action="{{route('user.add')}}" method="post" enctype="multipart/form-data" >
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
                                    <label class="control-label ">CNIC:  <span class="required"> * </span>
                                      </label>
                                          <input type="text" name="cnic" id="cnic" data-required="1" class="form-control validate[required]" placeholder="" value=""/>
                                      <span class="help-block">
                                        @error('cnic')
                                           {{$message}}
                                        @enderror
                                      </span>
                                  </div>

                                   <div class="form-group col-md-6">
                                      <label class="control-label">User Type: <span class="required"> * </span>
                                      </label>
                                      <select name="user_type" class="form-control validate[required]">
                                          <option value="">Select User Type</option>
                                          <option value="2">Admin</option>
                                          <option value="3">User</option>
                                      </select>
                                      <span class="help-block">
                                        @error('user_type')
                                           {{$message}}
                                        @enderror
                                      </span>
                                  </div>
                                   <div class="form-group col-md-6">
                                      <label class="control-label">Name: <span class="required"> * </span>
                                      </label>
                                          <input type="text" name="name" id="name" data-required="1" class="form-control validate[required]" value=""/>
                                          <span class="help-block">
                                            @error('name')
                                               {{$message}}
                                            @enderror
                                          </span>
                                  </div>
                                 <div class="form-group col-md-6">
                                      <label class="control-label">Email: <span class="required">
                                      * </span>
                                      </label>
                                      <input type="email" name="email" id="email" data-required="1" class="form-control validate[required]" value=""/>
                                      <span class="help-block">
                                        @error('email')
                                           {{$message}}
                                        @enderror
                                      </span>
                                  </div>
                                 <div class="form-group col-md-6">
                                      <label class="control-label">Password: <span class="required">
                                      * </span>
                                      </label>
                                          <input type="password" name="password" id="password" data-required="1" class="form-control" value=""/>
                                           <span class="help-block">
                                        @error('password')
                                           {{$message}}
                                        @enderror
                                      </span>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label class="control-label">Confirm Password: <span class="required">
                                      * </span>
                                      </label>
                                          <input type="password" name="cpassword" id="cpassword" data-required="1" class="form-control" value=""/>
                                           <span class="help-block">
                                        @error('cpassword')
                                           {{$message}}
                                        @enderror
                                      </span>
                                  </div>
                                    <div class="form-group">
                                          <label class="control-label"><span class="required">
                                          </span>
                                          </label>
                                              <textarea name="address" id="address"  class="form-control validate[required]" placeholder="Enter adress here"></textarea>
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
          </div>
			<!-- END DASHBOARD STATS -->


@endsection
