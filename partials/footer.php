</div>
</div>
<footer class="footer">


  <div class="d-sm-flex justify-content-between justify-content-sm-between">
    <span class="text-muted">Copyright ©
      <?php echo date("Y"); ?> <a href="" target="_blank">BareshaNetwork</a>. All rights reserved.
    </span>
    <span><b>Version: </b> 3.0 </span>
  </div>
</footer>
<script src="plugins/dark-reader/darkreader.js"></script>
<script>
  // Select the buttons and the toggle icon
  const systemThemeButton = document.querySelector('#system-theme');
  const lightThemeButton = document.querySelector('#light-theme');
  const darkThemeButton = document.querySelector('#dark-theme');
  const toggleIcon = document.querySelector('#toggle-icon');

  // Add the click event listeners to the buttons
  systemThemeButton.addEventListener('click', () => {
    DarkReader.auto({
      brightness: 100,
      contrast: 90,
      sepia: 10
    });
    toggleIcon.classList.remove('fa-sun', 'fa-moon');
  });

  lightThemeButton.addEventListener('click', () => {
    DarkReader.disable();
    toggleIcon.classList.remove('fa-moon');
    toggleIcon.classList.add('fa-sun');
  });

  darkThemeButton.addEventListener('click', () => {
    DarkReader.enable({
      brightness: 100,
      contrast: 90,
      sepia: 10
    });
    toggleIcon.classList.remove('fa-sun');
    toggleIcon.classList.add('fa-moon');
  });

  // Open the dropdown when the cog button is clicked
  const dropdownToggle = document.querySelector('.dropdown-toggle');
  dropdownToggle.addEventListener('click', () => {
    dropdownToggle.nextElementSibling.classList.toggle('show');
  });
</script>
<script>
  // DarkReader.enable({
  //   brightness: 100,
  //   contrast: 90,
  //   sepia: 10
  // });

  // const toggleButton = document.querySelector('#toggle-dark-mode');

  // toggleButton.addEventListener('click', () => {
  //   if (DarkReader.isEnabled()) {
  //     DarkReader.disable();
  //   } else {
  //     DarkReader.enable({
  //       brightness: 100,
  //       contrast: 90,
  //       sepia: 10
  //     });
  //   }
  // });
  // const toggleIcon = document.querySelector('#toggle-icon');
  // const systemThemeButton = document.querySelector('#system-theme');
  // const lightThemeButton = document.querySelector('#light-theme');
  // const darkThemeButton = document.querySelector('#dark-theme');

  // systemThemeButton.addEventListener('click', () => {
  //   DarkReader.auto({
  //     brightness: 100,
  //     contrast: 90,
  //     sepia: 10
  //   });
  //   toggleIcon.classList.remove('fi', 'fi-rr-brightness', 'fi-rr-moon-stars');
  // });

  // lightThemeButton.addEventListener('click', () => {
  //   DarkReader.disable();
  //   toggleIcon.classList.remove('fi-rr-moon-stars');
  //   toggleIcon.classList.add('fi', 'fi-rr-brightness');
  // });

  // darkThemeButton.addEventListener('click', () => {
  //   DarkReader.enable({
  //     brightness: 100,
  //     contrast: 90,
  //     sepia: 10
  //   });
  //   toggleIcon.classList.remove('fi-rr-brightness');
  //   toggleIcon.classList.add('fi', 'fi-rr-moon-stars');
  // });

  // Get the dropdown menu
  const dropdownMenu = document.querySelector('#dropdown-menu');

  // Get the menu items
  const systemThemeItem = document.querySelector('#system-theme-item');
  const lightThemeItem = document.querySelector('#light-theme-item');
  const darkThemeItem = document.querySelector('#dark-theme-item');

  // Add event listener to toggle button to show/hide dropdown menu
  toggleButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('show');
  });

  // Add event listener to close dropdown menu when user clicks outside of it
  window.addEventListener('click', (event) => {
    if (!event.target.matches('#toggle-button')) {
      dropdownMenu.classList.remove('show');
    }
  });

  // Add event listeners to menu items to apply themes
  systemThemeItem.addEventListener('click', () => {
    DarkReader.auto({
      brightness: 100,
      contrast: 90,
      sepia: 10
    });
    toggleIcon.classList.remove('fi fi-rr-brightness', 'fi fi-rr-moon-stars');
    dropdownMenu.classList.remove('show');
  });

  lightThemeItem.addEventListener('click', () => {
    DarkReader.disable();
    toggleIcon.classList.remove('fi fi-rr-moon-stars');
    toggleIcon.classList.add('fi-rr-brightness');
    dropdownMenu.classList.remove('show');
  });

  darkThemeItem.addEventListener('click', () => {
    DarkReader.enable({
      brightness: 100,
      contrast: 90,
      sepia: 10
    });
    toggleIcon.classList.remove('fi fi-rr-brightness');
    toggleIcon.classList.add('fi fi-rr-moon-stars');
    dropdownMenu.classList.remove('show');
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<!--
<script src="vendors/simplemde/simplemde.min.js"></script>
<scmoript src="vendors/jquery-file-upload/jquery.uploadfile.min.js"></scmoript>
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>s
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<script src="js/editorDemo.js"></script>
<script src="js/file-upload.js"></script>
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/file-upload.js"></script>
<script src="js/typeahead.js"></script>
<script src="js/select2.js"></script>
<script src="vendors/select2/select2.min.js"></script> -->

<!--
<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script type="text/javascript" src="datatables/AutoFill-2.5.1/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="datatables/AutoFill-2.5.1/js/autoFill.bootstrap5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="datatables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="datatables/AutoFill-2.5.1/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="datatables/AutoFill-2.5.1/js/autoFill.bootstrap5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="datatables/DateTime-1.2.0/js/dataTables.dateTime.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.5.1/css/autoFill.bootstrap5.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.6.1/css/colReorder.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.2.1/css/fixedColumns.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.8.0/css/keyTable.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.3.0/css/rowGroup.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.3.1/css/rowReorder.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.4.0/css/searchBuilder.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.5.0/css/select.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/staterestore/1.2.0/css/stateRestore.bootstrap5.min.css" />



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="vendors/base/vendor.bundle.base.js"></script>
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script> 
<script type="text/javascript" src="datatables/datatables.min.js"></script> -->



<!-- Local Files -->
<!-- <script src="vendors/base/vendor.bundle.base.js"></script>
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/data-table.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script> -->

<!-- plugins:js -->
<script src="vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/data-table.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->

<script src="js/jquery.cookie.js" type="text/javascript"></script>


<!-- Datatables Files  CDN -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.5.1/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.5.1/js/autoFill.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.6.1/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.8.0/js/dataTables.keyTable.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.3.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.4.0/js/dataTables.searchBuilder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.4.0/js/searchBuilder.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.1.0/js/searchPanes.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/staterestore/1.2.0/js/dataTables.stateRestore.min.js"></script>
 -->
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.13.1/i18n/sq.json"></script>
<!-- Datatables Files Local -->

<!-- <script type="text/javascript" src="datatables/AutoFill-2.5.1/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="datatables/AutoFill-2.5.1/js/autoFill.bootstrap5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="datatables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="datatables/AutoFill-2.5.1/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="datatables/AutoFill-2.5.1/js/autoFill.bootstrap5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="datatables/DateTime-1.2.0/js/dataTables.dateTime.min.js"></script>  -->

<!-- <script type="text/javascript" src="jQuery-3.6.0/jquery-3.6.0.min.js"></script> -->
<script type="text/javascript" src="./datatables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="./datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="./datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="./datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="./datatables/DataTables-1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="./datatables/AutoFill-2.5.1/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="./datatables/AutoFill-2.5.1/js/autoFill.bootstrap5.min.js"></script>
<script type="text/javascript" src="./datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="./datatables/Buttons-2.3.3/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="./datatables/Buttons-2.3.3/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="./datatables/Buttons-2.3.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="./datatables/Buttons-2.3.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="./datatables/ColReorder-1.6.1/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="./datatables/DateTime-1.2.0/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="./datatables/FixedColumns-4.2.1/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="./datatables/FixedHeader-3.3.1/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="./datatables/KeyTable-2.8.0/js/dataTables.keyTable.min.js"></script>
<script type="text/javascript" src="./datatables/Responsive-2.4.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="./datatables/Responsive-2.4.0/js/responsive.bootstrap5.js"></script>
<script type="text/javascript" src="./datatables/RowGroup-1.3.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="./datatables/RowReorder-1.3.1/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="./datatables/Scroller-2.0.7/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="./datatables/SearchBuilder-1.4.0/js/dataTables.searchBuilder.min.js"></script>
<script type="text/javascript" src="./datatables/SearchBuilder-1.4.0/js/searchBuilder.bootstrap5.min.js"></script>
<script type="text/javascript" src="./datatables/SearchPanes-2.1.0/js/dataTables.searchPanes.min.js"></script>
<script type="text/javascript" src="./datatables/SearchPanes-2.1.0/js/searchPanes.bootstrap5.min.js"></script>
<script type="text/javascript" src="./datatables/Select-1.5.0/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="./datatables/StateRestore-1.2.0/js/dataTables.stateRestore.min.js"></script>
<script type="text/javascript" src="./datatables/StateRestore-1.2.0/js/stateRestore.bootstrap5.min.js"></script>




</body>

</html>


<!-- <script>
  document.addEventListener('keydown', function (event) {
    if (event.shiftKey && event.key === 'H') {
      event.preventDefault();
      window.location.href = 'index.php';
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.shiftKey && event.key === 'L') {
      window.location.href = 'logs.php';
    }
  });
  document.addEventListener('keydown', function (event) {
    if (event.shiftKey && event.key === 'S') {
      window.location.href = 'stafi.php';
    }
  });
  document.addEventListener('keydown', function (event) {
    if (event.shiftKey && event.key === 'T') {
      window.location.href = 'takimet.php';
    }
  });
  document.addEventListener('keydown', function (event) {
    if (event.ctrlKey && event.altKey && !event.shiftKey && !event.metaKey) {
      if (event.key === '1') {
        window.location.href = 'klient.php';
      } else if (event.key === '2') {
        window.location.href = 'klient2.php';
      } else if (event.key === '3') {
        window.location.href = 'kategorit.php';
      }
      else if (event.key === '4') {
        window.location.href = 'ads.php';
      }
      else if (event.key === '5') {
        window.location.href = 'emails.php';
      }
      else if (event.key === '6') {
        window.location.href = 'shtoy.php';
      }
      else if (event.key === '7') {
        window.location.href = 'listang.php';
      }
      else if (event.key === '8') {
        window.location.href = 'tiketa.php';
      }
      else if (event.key === '9') {
        window.location.href = 'listat.php';
      }
    }

    document.addEventListener('keydown', function (event) {
      if (event.ctrlKey && event.altKey && event.shiftKey && !event.metaKey) {
        if (event.key === 'R') {
          window.location.href = 'claim.php';
        } else if (event.key === 'W') {
          window.location.href = 'whitelist.php';
        }
        else if (event.key === 'P') {
          window.location.href = 'rrogat.php';
        }
        else if (event.key === 'T') {
          window.location.href = 'tatimi.php';
        }
        else if (event.key === 'S') {
          window.location.href = 'yinc.php';
        }
        else if (event.key === 'E') {
          window.location.href = 'shpenzimep.php';
        }
        else if (event.key === 'F') {
          window.location.href = 'faturat.php';
        }
        else if (event.key === 'K') {
          window.location.href = 'pagesat.php';
        }
        else if (event.key === 'G') {
          window.location.href = 'faturat2.php';
        }

      }
    });

  });
  document.addEventListener('keydown', function (event) {
    if (event.shiftKey && event.key === 'D') {
      window.location.href = 'filet.php';
    }
    else if (event.shiftKey && event.key === 'Y') {
      window.location.href = 'filet.php';
    }
  });

</script> -->