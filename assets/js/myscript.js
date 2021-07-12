// ---------------------------------------------------------------------------------------------------------- //
// Change Profile
const profile = $('.flash-profile').data('flashdata');
if (profile)
{
  if (profile == 'updated!')
  {
    Swal.fire({
      title: 'Your Profile',
      text : 'has been ' + profile,
      type : 'success'
    });
  }
  else if (profile == 'gagalupload')
  {
    Swal.fire({
      title: 'ERROR',
      text : 'The filetype you are attempting to upload is not allowed or too maximum size.' ,
      type : 'error'
    });
  }

}

// ---------------------------------------------------------------------------------------------------------- //
// Change Password
const password = $('.flash-password').data('flashdata');
if (password)
{
  if (password == 'changed!')
  {
    Swal.fire({
      title: 'Your Password',
      text : 'has been ' + password,
      type : 'success'
    });
  }
  else if (password == 'current password!')
  {
    Swal.fire({
      title: 'ERROR',
      text : 'Your New Password is same with ' + password,
      type : 'error'
    });
  }
  else if (password == 'is wrong!')
  {
    Swal.fire({
      title: 'ERROR',
      text : 'Your Current Password ' + password,
      type : 'error'
    });
  }
}

// ------------------------------------------------------------------------------------------ //
// SETTING - MENU
const menu = $('.flash-menu').data('flashmenu');
if (menu)
{
  // Add Menu
  if (menu == 'add!')
  {
    Swal.fire({
      title: 'Menu',
      text : 'has been add!',
      type : 'success'
    });
  }
  // Update Menu
  else if (menu == 'updated!')
  {
    Swal.fire({
      title: 'Menu',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted Menu
  else if (menu == 'deleted!')
  {
    Swal.fire({
      title: 'Menu',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}
// tombol hapus menu
$('.tombol-hapus').on('click', function (e)
{
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
  title: 'Are you sure want to delete?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
    }
  })
});

// ------------------------------------------------------------------------------------------ //
// SETTING - Sub menu
const sub = $('.flash-submenu').data('flashsubmenu');
if (sub)
{
  // Add Sub menu
  if (sub == 'add!')
  {
    Swal.fire({
      title: 'Sub menu',
      text : 'has been add!',
      type : 'success'
    });
  }
  // Update Sub menu
  else if (sub == 'updated!')
  {
    Swal.fire({
      title: 'Sub menu',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted Sub menu
  else if (sub == 'deleted!')
  {
    Swal.fire({
      title: 'Sub menu',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}
// tombol hapus submenu
$('.tombol-hapus-submenu').on('click', function (e)
{
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
  title: 'Are you sure want to delete?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
    }
  })
});

// ---------------------------------------------------------------------------------------------------------- //
// SETTING - Role
const role = $('.flash-role').data('flashrole');
if (role)
{
  // Add Role
  if (role == 'add!')
  {
    Swal.fire({
      title: 'Role',
      text : 'has been add!',
      type : 'success'
    });
  }
  // Update Role
  else if (role == 'updated!')
  {
    Swal.fire({
      title: 'Role',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted Role
  else if (role == 'deleted!')
  {
    Swal.fire({
      title: 'Role',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}
// tombol hapus role
$('.tombol-hapus-role').on('click', function (e)
{
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
  title: 'Are you sure want to delete?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
    }
  })
});

// ---------------------------------------------------------------------------------------------------------- //
// Role access
const access = $('.flash-roleaccess').data('flashroleaccess');
if (access)
{
  Swal.fire({
    title: 'Role Access',
    text : 'has been changed!',
    type : 'success'
  });
}

// ---------------------------------------------------------------------------------------------------------- //
// user activation
const active = $('.flash-useractive').data('flashuseractive');
if (active)
{
  Swal.fire({
    title: 'User Activation ',
    text : 'has been changed!',
    type : 'success'
  });
}

// ---------------------------------------------------------------------------------------------------------- //
// SUPER ADMIN - users
const users = $('.flash-datausers').data('flashdatausers');
if (users)
{
  // Add users
  if (users == 'add!')
  {
    Swal.fire({
      title: 'Data User',
      text : 'berhasil ditambahkan!',
      type : 'success'
    });
  }
  // Update users
  else if (users == 'changed!')
  {
    Swal.fire({
      title: 'User Activation',
      text : 'berhasil diupdated!',
      type : 'success'
    });
  }
}

// ---------------------------------------------------------------------------------------------------------- //
// Monitoring Admin - Divisi
const divisi = $('.flash-divisi').data('flashdivisi');
if (divisi)
{
  // Add divisi
  if (divisi == 'add!')
  {
    Swal.fire({
      title: 'divisi',
      text : 'has been add!',
      type : 'success'
    });
  }
  // Update divisi
  else if (divisi == 'updated!')
  {
    Swal.fire({
      title: 'divisi',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted divisi
  else if (divisi == 'deleted!')
  {
    Swal.fire({
      title: 'divisi',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}

// ---------------------------------------------------------------------------------------------------------- //
// Monitoring Admin - Divisi
const jadwal = $('.flash-jadwal').data('flashjadwal');
if (jadwal)
{
  // Add jadwal
  if (jadwal == 'add!')
  {
    Swal.fire({
      title: 'Jadwal Kunjungan',
      text : 'has been add!',
      type : 'success'
    });
  }
  // Update jadwal
  else if (jadwal == 'updated!')
  {
    Swal.fire({
      title: 'Jadwal Kunjungan',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted jadwal
  else if (jadwal == 'deleted!')
  {
    Swal.fire({
      title: 'Jadwal Kunjungan',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}
// ---------------------------------------------------------------------------------------------------------- //
// Monitoring Emergency Visit - Customer
const emergency = $('.flash-emergency').data('flashemergency');
if (emergency)
{
  // Add emergency
  if (emergency == 'add!')
  {
    Swal.fire({
      title: 'Emergency Call',
      text : 'has been add!',
      type : 'success'
    });
  }
  // Update emergency
  else if (emergency == 'updated!')
  {
    Swal.fire({
      title: 'Emergency Call',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted emergency
  else if (emergency == 'deleted!')
  {
    Swal.fire({
      title: 'Emergency Call',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}
// ---------------------------------------------------------------------------------------------------------- //
// Menu teknisi - troubleshoot
const update = $('.flash-troubleshoot').data('flashtroubleshoot');
if (update)
{
  // Add update
  if (update == 'add!')
  {
    Swal.fire({
      title: 'Troubleshoot',
      text : 'on process!',
      type : 'success'
    });
  }
  // Finish troubleshoot
  else if (update == 'finish!')
  {
    Swal.fire({
      title: 'Troubleshoot',
      text : 'Finish!',
      type : 'success'
    });
  }
  // Update update
  else if (update == 'updated!')
  {
    Swal.fire({
      title: 'Troubleshoot',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted update
  else if (update == 'deleted!')
  {
    Swal.fire({
      title: 'Troubleshoot',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}

// ---------------------------------------------------------------------------------------------------------- //
// Menu teknisi - schedule
const scheduling = $('.flash-schedule').data('flashschedule');
if (scheduling)
{
  // Add update
  if (scheduling == 'add!')
  {
    Swal.fire({
      title: 'Jadwal',
      text : 'Berhasil Ditambahkan Cek Monitoring Visit!',
      type : 'success'
    });
  }
  // Finish troubleshoot
  else if (scheduling == 'finish!')
  {
    Swal.fire({
      title: 'Troubleshoot',
      text : 'Finish!',
      type : 'success'
    });
  }
  // Update update
  else if (scheduling == 'updated!')
  {
    Swal.fire({
      title: 'Troubleshoot',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted update
  else if (scheduling == 'deleted!')
  {
    Swal.fire({
      title: 'Troubleshoot',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}
// ---------------------------------------------------------------------------------------------------------- //
// Monitoring Jadwal visit
const jadwalvisit = $('.flash-jadwalvisit').data('flashjadwalvisit');
if (jadwalvisit)
{
  // Add jadwalvisit
  if (jadwalvisit == 'add!')
  {
    Swal.fire({
      title: 'Jadwal Visit',
      text : 'has been add!',
      type : 'success'
    });
  }
  // Update jadwalvisit
  else if (jadwalvisit == 'updated!')
  {
    Swal.fire({
      title: 'Jadwal Visit',
      text : 'has been updated!',
      type : 'success'
    });
  }
  // Deleted jadwalvisit
  else if (jadwalvisit == 'deleted!')
  {
    Swal.fire({
      title: 'Jadwal Visit',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}

// ---------------------------------------------------------------------------------------------------------- //
// Monitoring Jadwal visit
const finish = $('.flash-finishvisit').data('flashfinishvisit');
if (finish)
{
  // Add finish
  if (finish == 'finishvisit!')
  {
    Swal.fire({
      title: 'Schedule Visit',
      text : 'telah selesai Dikerjakan!',
      type : 'success'
    });
  }
  // Deleted finish
  else if (finish == 'deleted!')
  {
    Swal.fire({
      title: 'Jadwal Visit',
      text : 'has been deleted!',
      type : 'success'
    });
  }
}
