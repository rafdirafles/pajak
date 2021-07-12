<!-- BEGIN : Footer-->
<footer class="footer undefined undefined">
  <p class="clearfix text-muted m-0"><span>Copyright &copy; 2021 &nbsp;</span><a href="https://nusindo.co.id" id="pixinventLink" target="_blank">RAJAWALI NUSINDO</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
</footer>
<!-- End : Footer-->
<button class="btn btn-primary scroll-top" type="button" style="display: inline-block;"><i class="ft-arrow-up"></i></button>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="<?= base_url('assets/') ?>vendors/js/vendors.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/switchery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<!-- END PAGE LEVEL JS-->
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN PAGE VENDOR JS-->
<script src="<?= base_url('assets/') ?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/toastr.min.js"></script>
<!-- select2 -->
<script src="<?= base_url('assets/') ?>vendors/js/select2.full.min.js"></script>
<!-- Data table -->
<script src="<?= base_url('assets/') ?>vendors/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/datatable/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/datatable/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/datatable/buttons.print.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/datatable/jszip.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/datatable/pdfmake.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/datatable/vfs_fonts.js"></script>
<!-- END PAGE VENDOR JS-->
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN APEX JS-->
<script src="<?= base_url('assets/') ?>js/core/app-menu.min.js"></script>
<script src="<?= base_url('assets/') ?>js/core/app.min.js"></script>
<script src="<?= base_url('assets/') ?>js/notification-sidebar.min.js"></script>
<script src="<?= base_url('assets/') ?>js/customizer.min.js"></script>
<script src="<?= base_url('assets/') ?>js/scroll-top.min.js"></script>
<!-- END APEX JS-->
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN PAGE LEVEL JS-->
<!-- <script src="<?= base_url('assets/') ?>js/dashboard1.min.js"></script> -->
<script src="<?= base_url('assets/') ?>js/ex-component-sweet-alerts.min.js"></script>
<script src="<?= base_url('assets/') ?>js/components-toast.min.js"></script>
<script src="<?= base_url('assets/') ?>js/components-modal.min.js"></script>
<script src="<?= base_url('assets/') ?>js/ex-component-toastr.min.js"></script>
<!-- select2 -->
<script src="<?= base_url('assets/') ?>js/select2.min.js"></script>
<!-- Dt basic installiation -->
<script src="<?= base_url('assets/') ?>js/data-tables/dt-basic-initialization.js"></script>
<!-- Dt Advanced installiation -->
<script src="<?= base_url('assets/') ?>js/data-tables/dt-advanced-initialization.js"></script>
<!-- Print Invoice -->
<script src="<?= base_url('assets/') ?>js/page-invoice.min.js"></script>
<!-- <script src="<?= base_url('assets/') ?>js/charts-chartjs.min.js"></script> -->
<!-- END PAGE LEVEL JS-->
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN: Custom CSS-->
<script src="<?= base_url('assets/') ?>js/myscript.js"></script>
<script src="<?= base_url('assets/') ?>js/tabel-export.js"></script>
<!-- END: Custom CSS-->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<script type="text/javascript">
  //placeholder input type file poto
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  //Checbox untuk user-menu akses
  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('setting/changeaccess'); ?>",
      type: "post",
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= base_url('setting/roleaccess/'); ?>" + roleId;
      }
    });
  });

  //Checbox untuk user-active akses
  $('.form-check-active').on('click', function() {
    const username = $(this).data('user');

    $.ajax({
      url: "<?= base_url('super_admin/changeactive/'); ?>",
      type: "post",
      data: {
        username: username
      },
      success: function() {
        document.location.href = "<?= base_url('super_admin/tambah_user'); ?>";
      }
    });
  });
</script>

<script>
  $('#scan').change(function() {
    var id = $(this).val();
    <?php $url = "<script>document.write(id)</script>" ?>
    <?php $_SESSION['address'] = $url; ?>
    $.ajax({
      url: "<?= site_url('transaksi/scan'); ?>",
      method: "POST",
      data: {
        id: id
      },
      success: function(data) {
        $('#namaalamat').val(id);
      }
    });
    return false;
  });
</script>

<script>
  function save(id) {
    var table = document.getElementById(id);
    var trs = table.getElementsByTagName('tr'); // list of all rows

    var values = []; // will be a (potentially jagged) 2D array of all values
    for (var i = 0; i < trs.length; i++) {
      // loop through all rows, each will be one entrie in values
      var trValues = [];
      var tds = trs[i].getElementsByTagName('td'); // list of all cells in this row

      for (var j = 0; j < tds.length; j++) {
        trValues[j] = tds[j].innerText;
        // get the value of the cell (preserve newlines, if you don't want that use .textContent)
      }
      values[i] = trValues;
    }
    console.log(values);
    // save values
    var url_link = $('#linkAddress').val();
    $.ajax({
      url: "<?= site_url('transaksi/simpandata'); ?>",
      type: "post",
      dataType: 'html',
      data: {
        isi: values,
        link: url_link
      },
      success: function(data) {
        console.log(data);
        if (data == 'true') {
          Swal.fire({
            title: 'DATA FAKTUR',
            text: 'berhasil disimpan',
            type: 'success'
          }).then(function() {
            window.location = "<?= site_url('transaksi/scan'); ?>";
          });
        } else {
          Swal.fire({
            title: 'ERROR',
            text: data,
            type: 'error'
          });
        }
      }
    });
  }
</script>



<script>
  $('#sidebarToggle').click(function() {
    Cookies.set('sidebar-tipe', 'menu-expanded', {
      expires: 7
    });
    Cookies.set('a-class', 'is-active', {
      expires: 7
    });
    Cookies.set('ft-toogle', 'ft-toogle-right', {
      expires: 7
    });
    console.log("get cookies");
  });
  if (Cookies.get('sidebar-tipe') === 'menu-expanded') {
    $('#sidebarToggle').click(function() {
      Cookies.set('sidebar-tipe', 'nav-collapsed', {
        expires: 7
      });
      Cookies.set('a-class', '', {
        expires: 7
      });
      Cookies.set('ft-toogle', 'ft-toogle-left', {
        expires: 7
      });
    });
  }
</script>

<script>
  $('#active-tab').click(function() {
    Cookies.set('active', 'active', {
      expires: 7
    });
    Cookies.set('link', '', {
      expires: 7
    });
    Cookies.set('click', '', {
      expires: 7
    });
    Cookies.set('tab-pane-active', 'active show', {
      expires: 7
    });
    Cookies.set('tab-pane-link', '', {
      expires: 7
    });
    Cookies.set('tab-pane-click', '', {
      expires: 7
    });
    console.log("get cookies active-tab");
  });
  $('#link-tab').click(function() {
    Cookies.set('active', '');
    Cookies.set('link', 'active');
    Cookies.set('click', '');
    Cookies.set('tab-pane-active', '');
    Cookies.set('tab-pane-link', 'active show');
    Cookies.set('tab-pane-click', '');
    console.log("get cookies link-tab");
  });
  $('#click-tab').click(function() {
    Cookies.set('active', '');
    Cookies.set('link', '');
    Cookies.set('click', 'active');
    Cookies.set('tab-pane-active', '');
    Cookies.set('tab-pane-link', '');
    Cookies.set('tab-pane-click', 'active show');
    console.log("get cookies click-tab");
  });
</script>

<!-- scipt untuk scan qr code pajak di menu transaksi -->

</body>