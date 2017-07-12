<script src="/js/jquery.js"></script>
<script src="/js/jquery.datetimepicker.full.min.js"></script>
<script src="/js/bootstrap3-typeahead.js"></script>

<script type="text/javascript" src="/js/parsley.min.js"></script>

<script type="text/javascript" src="{{ asset('js/tableExport/tableExport.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tableExport/jquery.base64.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/tableExport/jspdf/libs/sprintf.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tableExport/jspdf/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tableExport/jspdf/libs/base64.js') }}"></script>




{{--  <script src="/jpeg_camera/swfobject.min.js" type="text/javascript"></script>
<script src="/jpeg_camera/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="/jpeg_camera/jpeg_camera.min.js" type="text/javascript"></script>
<script src="/jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script src="/js/camera.js"></script> --}}
<script src="/js/utilities.js"></script>
 <!-- load our application -->

<script src="/js/main.js"></script>

<script src="/js/app.js"></script>

    <script type="text/javascript">
    var path = "{{ route('autocomplete/vN') }}";


    $('input.visitorName').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>

<script>

jQuery(function(){
 jQuery('#meetStartDate').datetimepicker({
     
  format:'Y/m/d H:i',
  minDate:0,
    step: 30,
  onShow:function( ct ){
   this.setOptions({
    maxDate:jQuery('#meetEndDate').val()?jQuery('#meetEndDate').val():false
   })
  },
  beforeShowDay: function(date) {
        var day = date.getDay();
        return [(day != 0), ''];
    }
 });
 
 jQuery('#meetEndDate').datetimepicker({
  format:'Y/m/d H:i',
  minDate:0,
  step: 30,
  onShow:function( ct ){
   this.setOptions({
    minDate:jQuery('#meetStartDate').val()?jQuery('#meetStartDate').val():false,
    maxDate:jQuery('#meetStartDate').val()?jQuery('#meetStartDate').val():false,
   })
  },
  beforeShowDay: function(date) {
        var day = date.getDay();
        return [(day != 0), ''];
    }
 });
});
</script>