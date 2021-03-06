@extends('layouts.app')

@section('lscripts')
<!--for local scripts-->
  $(document).ready(function() {
    $("#frmRecord").validationEngine({
      promptPosition: "topLeft",
      onValidationComplete: function(frm, status) {
        //alert(status);
        submitForm(frm);
        return false;
      }
    });

    // styled checkboxes
    //Red color scheme for iCheck
    $('input[type="checkbox"].square-red, input[type="radio"].square-red').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'icheckbox_square-red'
    });


  });
@stop

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> My Account <small></small> </h1>
</section>

<!-- Main content -->
<section class="content">

  @include('includes.app.formalerts')

  <div class="row">
    <div class="col-md-12">

      {{ Form::model( $record, array('id' => 'frmRecord', 'route' => 'user.updatemyaccount', 'method' => 'post', 'autocomplete' => 'off') ) }}
        <input type="hidden" name="redirectroute" value=""/>

        <!-- general form elements disabled -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View/Edit User Account</h3> &nbsp; (<small><span class="fa fa-star red"> required field</span></small>)
          </div><!-- /.box-header -->
          <div class="box-body">

            <!-- text input -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Username </label>
                  <span class="form-control" disabled >{{ $record->username }}</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>RUK </label>
                  <span class="form-control" disabled >{{ $record->ruk }}</span>
              </div>
            </div>

            <div class="clr"></div>

        </div><!-- /.box-body -->
        <!-- / Billing -->

        <!-- Account Details -->
        <div class="box-header with-border">
          <h3 class="box-title">Account Details</h3>
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="col-md-6">
              <div class="form-group">
                <label>Name </label>
                  <span class="form-control" disabled >{{ $record->user_name }}</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Email </label>
                  <span class="form-control" disabled >{{ $record->user_email }}</span>
              </div>
            </div>

            <div class="clr"></div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Company Name </label>
                  <span class="form-control" disabled >{{ $record->customer->comp_name }}</span>
              </div>
            </div>

            <div class="clr"></div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Contact Name </label>
                  <span class="form-control" disabled >{{ $record->customer->con_name }}</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Contact Email </label>
                  <span class="form-control" disabled >{{ $record->customer->con_email }}</span>
              </div>
            </div>

            <div class="clr"></div>

            <div class="box-footer" style="padding: 15px 15px;">
              <input value=" Change Password " name="btnExit" class="btn bg-gray" type="button" onclick="window.location.href='{{ URL::route('user.changepassword') }}'" />
            </div>
          
          </div><!-- /.box-body -->
        </div><!-- /.box -->
        <!-- /search form -->
      {{ Form::close() }}
    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->


</section><!-- /.content -->

@stop