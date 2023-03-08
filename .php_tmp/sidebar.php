<nav class="sidebar sidebar-offcanvas">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="fi fi-rr-home menu-icon pe-3"></i>
        <span class="menu-title">Shtëpia</span>
      </a>
    </li>
    <?php if ($_SESSION['acc'] == '1') {
      ?>
      <li class="nav-item">
        <a class="nav-link" href="logs.php">
          <i class="fi fi-rr-time-past menu-icon pe-3"></i>
          <!-- <i class="fa-solid fa-clock-rotate-left menu-icon pe-3"></i> -->
          <span class="menu-title">Logs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stafi.php">
          <i class="fi fi-rr-users-alt menu-icon pe-3"></i>
          <span class="menu-title">Stafi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="takimet.php">
          <i class="fi fi-rr-video-camera-alt menu-icon pe-3"></i>
          <span class="menu-title">Takimet</span>
        </a>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#klienti" aria-expanded="false" aria-controls="klienti">
        <i class="fi fi-rr-handshake menu-icon pe-3"></i>
        <span class="menu-title">Klient&euml;t</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="klienti">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="klient.php">Lista e klient&euml;ve</a></li>
          <li class="nav-item"><a class="nav-link" href="klient2.php">Lista e klient&euml;ve tjer</a></li>
          <li class="nav-item"><a class="nav-link" href="kategorit.php">Lista e kategorive</a></li>
          <li class="nav-item"><a class="nav-link" href="ads.php">Llogaritë e ADS</a></li>
          <li class="nav-item"><a class="nav-link" href="emails.php">Lista e email-ave</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#video" aria-expanded="false" aria-controls="video">
        <i class="fi fi-rr-cloud-upload-alt menu-icon pe-3"></i>
        <span class="menu-title">Videot / Ngarkimi</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="video">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="shtoy.php">Regjistro nj&euml; k&euml;ng&euml;</a></li>
          <li class="nav-item"><a class="nav-link" href="listang.php">Lista e k&euml;ng&euml;ve</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tiketat" aria-expanded="false" aria-controls="tiketat">
        <i class="fi fi-rr-ticket menu-icon pe-3"></i>
        <span class="menu-title">Tiketat</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="tiketat">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="tiketa.php">Tiket e re</a></li>
          <li class="nav-item"><a class="nav-link" href="listat.php">Lista e tiketave</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#content" aria-expanded="false" aria-controls="content">
        <i class="fi fi-rr-photo-video menu-icon pe-3"></i>
        <span class="menu-title">Content ID</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="content">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="claim.php">Recent Claim</a></li>
          <li class="nav-item"><a class="nav-link" href="whitelist.php">Whitelist</a></li>
        </ul>
      </div>
    </li>
    <?php if ($_SESSION['acc'] == '3') { ?>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#financat" aria-expanded="false" aria-controls="financat">
          <i class="fi fi-rr-chart-histogram menu-icon pe-3"></i>
          <span class="menu-title">Financat</span>
          <i class="menu-arrow pe-3"></i>
        </a>
        <div class="collapse" id="financat">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="rrogat.php">Pagat</a></li>
            <li class="nav-item"><a class="nav-link" href="tatimi.php">Tatimi</a></li>
            <li class="nav-item"><a class="nav-link" href="yinc.php">Shpenzimet</a></li>
            <li class="nav-item"><a class="nav-link" href="shpenzimep.php">Shpenzimet Personale</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat.php">Pagesat YouTube</a></li>
            <li class="nav-item"><a class="nav-link" href="pagesat.php">Pagesat e kryera</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat2.php">Platformat tjera</a></li>
          </ul>
        </div>
      </li>
    <?php } ?>
    <?php if ($_SESSION['acc'] == '1') {
      ?>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#financat" aria-expanded="false" aria-controls="financat">
          <i class="fi fi-rr-chart-histogram menu-icon pe-3"></i>
          <span class="menu-title">Financat</span>
          <i class="menu-arrow  pe-3"></i>
        </a>
        <div class="collapse" id="financat">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="rrogat.php">Pagat</a></li>
            <li class="nav-item"><a class="nav-link" href="tatimi.php">Tatimi</a></li>
            <li class="nav-item"><a class="nav-link" href="yinc.php">Shpenzimet</a></li>
            <li class="nav-item"><a class="nav-link" href="shpenzimep.php">Shpenzimet Personale</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat.php">Pagesat YouTube</a></li>

            <li class="nav-item"><a class="nav-link" href="pagesat_Youtube_Perfunduara.php">Pagesat YouTube te kryera</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="pagesat.php">Pagesat e kryera</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat2.php">Platformat Tjera</a></li>
          </ul>
        </div>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="filet.php">
        <i class="fi fi-rr-folders menu-icon pe-3"></i>
        <span class="menu-title">Dokumente Tjera</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dataYT.php">
        <i class="fi fi-rr-dashboard menu-icon pe-3"></i>
        <span class="menu-title">Statistikat nga YouTube</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#kontratat" aria-expanded="false" aria-controls="kontratat">
        <i class="fi fi-rr-document-signed menu-icon pe-3"></i>
        <span class="menu-title">Kontrata</span>
        <i class="menu-arrow  pe-3"></i>
      </a>
      <div class="collapse" id="kontratat">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="kontrata_2.php">Kontrate e re</a></li>
          <li class="nav-item"><a class="nav-link" href="lista_kontratave.php">Lista e kontratave</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="notes.php">
        <i class="fi fi-rr-notes menu-icon pe-3"></i>
        <span class="menu-title">Shenime</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="todo_list.php">
        <i class="fi fi-rr-checkbox menu-icon pe-3"></i>
        <span class="menu-title">To do</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="klient_CSV.php">
        <i class="fi fi-rr-file-chart-line menu-icon pe-3"></i>
        <span class="menu-title">Klient CSV</span>
      </a>
    </li>
  </ul>
</nav>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Shkurtesat</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body text-center">

    <br>
    <p class="border rounded shadow-sm p-3">
      <i class="fi fi-rr-keyboard fa-lg"></i> <br>
      Të gjitha shkurtimet për t'ju kursyer kohë! Disa mund të përdoren kudo në
      app, ndërsa të tjerë punojnë vetëm kur
      shtojnë ose redaktojnë detyra.
    </p><br>
    <table class="table table-bordered text-center">

      <thead class="bg-light">
        <tr>
          <th>Veprimi</th>
          <th>Shkurtore tastiere</th>
          <th>Ikona</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Shtëpia</td>
          <td><kbd>Shift + H</kbd></td>
          <td><i class="fi fi-rr-home"></i></td>
        </tr>
        <tr>
          <td>Logs</td>
          <td><kbd>Shift + L</kbd></td>
          <td><i class="fi fi-rr-time-past"></i></td>
        </tr>
        <tr>
          <td>Stafi</td>
          <td><kbd>Shift + S</kbd></td>
          <td><i class="fi fi-rr-users-alt"></i></td>
        </tr>
        <tr>
          <td>Takimet</td>
          <td><kbd>Shift + T</kbd></td>
          <td><i class="fi-rr-video-camera-alt"></i></td>
        </tr>
        <tr>
          <td>Lista e klientëve</td>
          <td colspan="2"><kbd>Ctrl + Alt + 1</kbd></td>

        </tr>
        <tr>
          <td>Lista e klientëve tjer</td>
          <td colspan="2"><kbd>Ctrl + Alt + 2</kbd></td>

        </tr>
        <tr>
          <td>Lista e kategorive</td>
          <td colspan="2"><kbd>Ctrl + Alt + 3</kbd></td>

        </tr>
        <tr>
          <td>Lista e ADS</td>
          <td colspan="2"><kbd>Ctrl + Alt + 4</kbd></td>

        </tr>
        <tr>
          <td>Lista e email-ave</td>
          <td colspan="2"><kbd>Ctrl + Alt + 5</kbd></td>

        </tr>
        <tr>
          <td>Regjistro një këngë</td>
          <td colspan="2"><kbd>Ctrl + Alt + 6</kbd></td>

        </tr>
        <tr>
          <td>Lista e këngëve</td>
          <td colspan="2"><kbd>Ctrl + Alt + 7</kbd></td>

        </tr>
        <tr>
          <td>Tiketat</td>
          <td colspan="2"><kbd>Ctrl + Alt + 8</kbd></td>

        </tr>
        <tr>
          <td>Lista e tiketave</td>
          <td colspan="2"><kbd>Ctrl + Alt + 9</kbd></td>

        </tr>
        <tr>
          <td>Recent Claim</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + R</kbd></td>

        </tr>
        <tr>
          <td>Whitelist</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + W</kbd></td>

        </tr>
        <tr>
          <td>Pagat</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + P</kbd></td>

        </tr>
        <tr>
          <td>Tatimi</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + T</kbd></td>

        </tr>
        <tr>
          <td>Shpenzime</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + S</kbd></td>

        </tr>
        <tr>
          <td>Shpenzime Personale</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + E </kbd></td>

        </tr>
        <tr>
          <td>Pagesat Youtube</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + F </kbd></td>

        </tr>
        <tr>
          <td>Pagesat e kryera</td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + K </kbd></td>

        </tr>
        <tr>
          <td>Platformat tjera
          </td>
          <td colspan="2"><kbd>Ctrl + Alt + Shift + G </kbd></td>
        </tr>
        <tr>
          <td>Dokumente tjera</td>
          <td><kbd>Shift + D</kbd></td>
          <td><i class="fi fi-rr-folders"></i></td>
        </tr>
        <tr>
          <td>Statistikat nga YouTube</td>
          <td><kbd>Shift + Y</kbd></td>
          <td><i class="fi fi-rr-dashboard"></i></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php include('./ip_address.php'); ?>