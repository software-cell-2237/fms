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
			Level Three <small>Financial Management System</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Add</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">View</a>
					</li>
				</ul>

			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="portlet box green ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> Enter Level Three Data
                    </div>
                    <div class="tools">
                        <a href="" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                        <a href="" class="reload">
                        </a>
                        <a href="" class="remove">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Main Code</label>
                                <div class="col-md-6">
                                    <select name="main_code" id="main_code" class="form-control">
                                        <option>Main Code...</option>
                                            @foreach ($getMainCode as $MainCodeRow)
                                                <option value="{{ $MainCodeRow->account_name }}">{{ $MainCodeRow->account_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Control Code</label>
                                <div class="col-md-6">
                                    <select name="control_code" id="control_code" class="form-control">
                                        <option>Select Control Code....</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">HEC Code</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Default Input">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Account Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Default Input">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn default">Cancel</button>
                            <button type="submit" class="btn green">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
			<!-- END DASHBOARD STATS -->

<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-madison">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>View Level Three Data
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
                            <th>Complete Code</th>
                            <th>Account Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#main_code').on('change', function() {
        var selectedValue = $(this).val();
        // Send the selected value to the controller using Ajax
        $.ajax({
            url: "{{ url('/levelThree/getControlCode') }}", // Update the URL with your controller route
            type: 'GET',
            data: {
                selectedValue: selectedValue
            },
            success: function(response) {
                var dropdown = $('#control_code');
                dropdown.empty();  // Clear existing options

                $.each(response, function(index, item) {
                    dropdown.append('<option value="' + item.account_name + '">' + item.account_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Ajax error:', error);
            }
        });
    });


    $('#control_code').on('change', function() {
        //alert();
        var selectedValue1 = $(this).val();
        var selectedValue = $('#main_code').val();

        // Send the selected value to the controller using Ajax
        $.ajax({
            url: "{{ url('/levelThree/list') }}", // Update the URL with your controller route
            type: 'GET',
            data: {
                selectedValue: selectedValue,
                selectedValue1: selectedValue1
            },
            success: function(response) {
                // Update the table content with the received data
                var tableBody = $('#sample_6 tbody');
                tableBody.empty();

                // Iterate over the response data and populate the table
                $.each(response, function(index, row) {
                    var newRow = $('<tr>');
                    newRow.append('<td>' + row.account_code + '</td>');
                    newRow.append('<td>' + row.account_name + '</td>');
                    newRow.append('<td><a href="">Update</a> | <a href="">Delete</a></td>');
                    tableBody.append(newRow);
                });
            },
            error: function(xhr, status, error) {
                console.error('Ajax error:', error);
            }
        });
    });
});

</script>
