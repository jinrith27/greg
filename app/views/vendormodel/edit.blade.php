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
    applychkradiostyles();

    $('#vendor_id').on('change', function() {
      var url = '{{ URL::route('vendormodel.customers') }}';
      var vid = $(this).val();
      showActivity();
      $.get(url, { vid:vid }, function(data) {
        $('#custvis').html(data);
        applychkradiostyles();
      });
    });

  });

  function applychkradiostyles() {
    // styled checkboxes
    //Red color scheme for iCheck
    $('input[type="checkbox"].square-red, input[type="radio"].square-red').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'icheckbox_square-red'
    });
  }

@stop

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> Vendor Model <small></small> </h1>
</section>

<!-- Main content -->
<section class="content">

  @include('includes.app.formalerts')

  <div class="row">
    <div class="col-md-12">

      {{ Form::model( $record, array('id' => 'frmRecord', 'route' => ['vendormodel.update', $record->_id], 'method' => 'post', 'autocomplete' => 'off') ) }}
        <input type="hidden" name="redirectroute" value="{{ URL::route('vendormodel.index') }}"/>

        <!-- search form -->
        <!-- general form elements disabled -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Model</h3> &nbsp; (<small><span class="fa fa-star red"> required field</span></small>)
          </div><!-- /.box-header -->
          <div class="box-body">

            <!-- text input -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Select Vendor &nbsp; <small><span class="fa fa-star red"></span></small></label>
                  {{ Form::select('vendor_id', $vendors, null, ['id' => 'vendor_id', 'class' => 'form-control']) }}
                  <span name="emsg-vendor_id" class="validation-error hideme"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Model Name &nbsp; <small><span class="fa fa-star red"></span></small></label>
                  {{ Form::text('model_name', null, ['id' => 'model_name', 'placeholder' => 'Model Name', 'class' => 'form-control']) }}
                  <span name="emsg-model_name" class="validation-error hideme"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Active? &nbsp; <small><span class="fa fa-star red"></span></small></label><br/>
                {{ Form::radio('is_active', 'Yes', null, [ 'class' => 'square-red' ]) }} Yes &nbsp;  &nbsp; 
                {{ Form::radio('is_active', 'No', null, [ 'class' => 'square-red' ]) }} No
                <span name="emsg-is_active" class="validation-error hideme"></span>
              </div>
            </div>

          <div class="clr"></div>

        </div><!-- /.box-body -->
        <!-- / Billing -->

        <!-- Invoicing -->
        <div class="box-header with-border">
          <h3 class="box-title">Customer Visibility</h3>  &nbsp; 
        </div><!-- /.box-header -->

            <div class="col-md-12" id="custvis">

              @include('vendormodel._customers')

            </div>

            <div class="clr"></div>


        <!-- Invoicing -->
        <div class="box-header with-border">
          <h3 class="box-title">Vendor Model Features</h3>  &nbsp; 
        </div><!-- /.box-header -->


            <div class="col-md-12">
              <div class="form-group">
                <!-- <label>Industries Served <small>(Check all that apply)</small> </label> <br />
                <span class="form-control">&nbsp;</span> -->

                <br />
                @foreach($features as $id => $nm)
                  <?php $chk = is_array($selfeatures) && in_array($id, $selfeatures) ? true : false; ?>

                  <div class="col-md-3">
                    <div class="form-group">
                      {{ Form::checkbox('feature_ids[]', $id, $chk, [ 'class' => 'square-red' ]) }} {{ $nm }}
                    </div>
                  </div>

                @endforeach

              </div>
            </div>


            <div class="clr"></div>


        <div class="box-body">

            <div class="box-footer" style="padding: 15px 15px;">

              {{ Form::submit('  Save  ', ['id' => 'btnSave', 'name' => 'btnSave', 'class' => 'btn btn-primary']) }} &nbsp; 
              <input value=" Back " name="btnExit" class="btn bg-gray" type="button" onclick="window.location.href='{{ URL::route('vendormodel.index') }}'" />

            </div>

          
          </div><!-- /.box-body -->
        </div><!-- /.box -->
        <!-- /search form -->
      {{ Form::close() }}
    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->


</section><!-- /.content -->

@stop