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
  <h1> Company Information <small></small> </h1>
</section>

<!-- Main content -->
<section class="content">

  @include('includes.app.formalerts')

  <div class="row">
    <div class="col-md-12">

      {{ Form::model( $record, array('id' => 'frmRecord', 'route' => 'customer.updatecompany', 'method' => 'post', 'autocomplete' => 'off') ) }}
        <input type="hidden" name="redirectroute" value=""/>

        <!-- general form elements disabled -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View/Edit Company Information</h3> &nbsp; (<small><span class="fa fa-star red"> required field</span></small>)
          </div><!-- /.box-header -->
          <div class="box-body">

            <!-- text input -->
            <div class="col-md-12">
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


            <div class="col-md-12">
              <div class="form-group">
                <label>Company Name &nbsp; <small><span class="fa fa-star red"></span></small></label>
                  {{ Form::text('comp_name', null, ['id' => 'comp_name', 'placeholder' => 'Company Name', 'class' => 'form-control']) }}
                  <span name="emsg-comp_name" class="validation-error hideme"></span>
              </div>
            </div>

            <div class="clr"></div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Contact Name &nbsp; <small><span class="fa fa-star red"></span></small></label>
                  {{ Form::text('con_name', null, ['id' => 'con_name', 'placeholder' => 'Contact Name', 'class' => 'form-control']) }}
                  <span name="emsg-con_name" class="validation-error hideme"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Contact Email &nbsp; <small><span class="fa fa-star red"></span></small></label>
                  {{ Form::text('con_email', null, ['id' => 'con_email', 'placeholder' => 'Contact Email', 'class' => 'form-control']) }}
                  <span name="emsg-con_email" class="validation-error hideme"></span>
              </div>
            </div>

            <div class="clr"></div>

            <div class="box-footer" style="padding: 15px 15px;">
              {{ Form::submit('  Save  ', ['id' => 'btnSave', 'name' => 'btnSave', 'class' => 'btn btn-primary']) }} &nbsp; 
            </div>
          
          </div><!-- /.box-body -->
        </div><!-- /.box -->
        <!-- /search form -->
      {{ Form::close() }}
    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->


</section><!-- /.content -->

@stop