<!-- BEGIN VENDOR JS-->
<script src="<?= base_url('assets/') ?>vendors/js/vendors.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/switchery.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?= base_url('assets/') ?>vendors/js/select2.full.min.js"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="<?= base_url('assets/') ?>js/core/app-menu.min.js"></script>
<script src="<?= base_url('assets/') ?>js/core/app.min.js"></script>
<script src="<?= base_url('assets/') ?>js/notification-sidebar.min.js"></script>
<script src="<?= base_url('assets/') ?>js/customizer.min.js"></script>
<script src="<?= base_url('assets/') ?>js/scroll-top.min.js"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="<?= base_url('assets/') ?>js/select2.min.js"></script>
<!-- END PAGE LEVEL JS-->
<!-- BEGIN: Custom CSS-->
<script>
    $(document).ready(function(){
      $('#provinsi').change(function(){
        var id = $(this).val();
        $.ajax({
          url : "<?= site_url('auth/get_city');?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
              html += '<option value='+data[i].city_id+'>'+data[i].city_name+'</option>';
            }
            $('#kota').html(html);
          }
        });
        return false;
      });
    });
</script>
<!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>
