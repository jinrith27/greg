<!-- jQuery 2.1.3 -->
{{ HTML::script('public/plugins/jQuery/jQuery-2.1.3.min.js', array('type' => 'text/javascript')) }}

<!-- Bootstrap 3.3.2 JS -->
{{ HTML::script('public/bootstrap/js/bootstrap.min.js', array('type' => 'text/javascript')) }}

<!-- iCheck -->
{{ HTML::script('public/plugins/iCheck/icheck.min.js', array('type' => 'text/javascript')) }}

{{ HTML::script('public/plugins/validation/jquery.validationEngine-en.js', array('type' => 'text/javascript')) }}
{{ HTML::script('public/plugins/validation/other-validations.js', array('type' => 'text/javascript')) }}
{{ HTML::script('public/plugins/validation/jquery.validationEngine.js', array('type' => 'text/javascript')) }}
{{ HTML::script('public/dist/js/common.js', array('type' => 'text/javascript')) }}

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>