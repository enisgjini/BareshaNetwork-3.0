<?php include 'partials/header.php';
include('conn-d.php');
if (isset($_POST["submit_file"])) {
  $file = $_FILES["file"]["tmp_name"];
  $file_open = fopen($file, "r");
  while (($csv = fgetcsv($file_open, 0, ",")) !== false) {
    $ReportingPeriod = str_replace("'", "\'", isset($csv[0]) ? $csv[0] : "");
    $AccountingPeriod = str_replace("'", "\'", isset($csv[1]) ? $csv[1] : "");
    $Artist = str_replace("'", "\'", isset($csv[2]) ? $csv[2] : "");
    $rel = str_replace("'", "\'", isset($csv[3]) ? $csv[3] : "");
    $Track = str_replace("'", "\'", isset($csv[4]) ? $csv[4] : "");
    $UPC = str_replace("'", "\'", isset($csv[5]) ? $csv[5] : "");
    $ISRC = str_replace("'", "\'", isset($csv[6]) ? $csv[6] : "");
    $Partner = str_replace("'", "\'", isset($csv[7]) ? $csv[7] : "");
    $Country = str_replace("'", "\'", isset($csv[8]) ? $csv[8] : "");
    $Type = str_replace("'", "\'", isset($csv[9]) ? $csv[9] : "");
    $Units = str_replace("'", "\'", isset($csv[10]) ? $csv[10] : "");
    $RevenueUSD = str_replace("'", "\'", isset($csv[11]) ? $csv[11] : "");
    $RevenueShare = str_replace("'", "\'", isset($csv[12]) ? $csv[12] : "");
    $SplitPayShare = str_replace("'", "\'", isset($csv[13]) ? $csv[13] : "");



    $query = "insert platformat (ReportingPeriod, AccountingPeriod, Artist, rel, Track, UPC, ISRC, Partner, Country, Type, Units, RevenueUSD, RevenueShare, SplitPayShare) values('$ReportingPeriod', '$AccountingPeriod', '$Artist', '$rel', '$Track', '$UPC', '$ISRC', '$Partner', '$Country', '$Type', '$Units', '$RevenueUSD', '$RevenueShare', '$SplitPayShare')";
    $conn->query($query);
  }
}


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="shtochannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ngarko CSV</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Ngarko File (CSV):</label>
            <input type="file" name="file" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hiqe</button>
        <input type="submit" name="submit_file" class="btn btn-primary" value="Ngarko" />
        </form>
      </div>
    </div>
  </div>
</div>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">
        <div class="p-5 mb-4 card rounded-5 shadow-sm">
          <h4 class="font-weight-bold text-gray-800 mb-4">Platformat tjera</h4>
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Financat</a>
              <span>/</span>
              <a href="faturat2.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Platformat tjera</u></a>
            </h6>
          </nav>
        </div>


        <div class="card rounded-5 shadow-sm my-2 py-5 px-3 mb-4">
          <div class="form-group row">
            <div class="col">
              <form method="POST">






                <label>Zgjedh artistin</label>
                <select name="artistii" class="form-select border shadow-2  text-dark " data-live-search="true" id="my-select">
                  <?php
                  $merrarti = $conn->query("SELECT DISTINCT Artist FROM platformat");
                  while ($merrart = mysqli_fetch_array($merrarti)) {
                  ?>
                    <option value="<?php echo $merrart['Artist']; ?>"><?php echo $merrart['Artist']; ?></option>
                  <?php
                  }
                  ?>
                </select>
            </div>
            <div class="col">
              <label>Zgjedh perioden</label>
              <select name="perioda" class="form-select border shadow-2  text-dark w-100" data-live-search="true">
                <?php
                $merrarti = $conn->query("SELECT DISTINCT AccountingPeriod FROM platformat;");
                while ($merrart = mysqli_fetch_array($merrarti)) {
                ?>
                  <option value="<?php echo $merrart['AccountingPeriod']; ?>"><?php echo $merrart['AccountingPeriod']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col">
            <button type="submit" class="btn btn-primary">
              <i class="fi fi-rr-filter fa-lg"></i>&nbsp;&nbsp; Filtro
            </button>

          </div>
          </form>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="col">
              <div class="card rounded-5 shadow-sm my-2 p-5 mb-4 text-center">
                <?php

                if (isset($_POST['artistii']) && isset($_POST['perioda'])) {
                  $artistii = $_POST['artistii'];
                  $perioda = $_POST['perioda'];
                  $kueri = $conn->query("SELECT * FROM platformat WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                  $q4 = $conn->query("SELECT SUM(`RevenueUSD`) as `sum` FROM `platformat` WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                  $qq4 = mysqli_fetch_array($q4);
                  echo "<p class=''>Totali i fitimeve</p>";
                  echo "<h3 class=''>" . $qq4['sum'] . " USD</h3>";
                } else {
                }
                ?>
              </div>
            </div>

            <div class="col">
              <div class="card rounded-5 shadow-sm my-2 p-5 mb-4 text-center">
                <?php

                if (isset($_POST['artistii']) && isset($_POST['perioda'])) {
                  $artistii = $_POST['artistii'];
                  $perioda = $_POST['perioda'];
                  $kueri = $conn->query("SELECT * FROM platformat WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                  if ($k = mysqli_fetch_array($kueri)) {
                    echo "<p class=''>Artist-i/ja qe zgjedhet</p>";
                    echo "<h3 class=''>" .  $k['Artist']  . " </h3>";
                  }
                } else {
                }
                ?>
              </div>
            </div>
            <div class="col">
              <div class="card rounded-5 shadow-sm my-2 p-5 mb-4 text-center">
                <?php

                if (isset($_POST['artistii']) && isset($_POST['perioda'])) {
                  $artistii = $_POST['artistii'];
                  $perioda = $_POST['perioda'];
                  $kueri = $conn->query("SELECT * FROM platformat WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                  if ($k = mysqli_fetch_array($kueri)) {

                    echo "<p class=''>Reporting Period: <b>" . $k['ReportingPeriod'] . "</b> | Accounting Period: <b>" . $k['AccountingPeriod'] . "</b></p>";
                  }
                } else {
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card rounded-5 shadow-sm my-2 p-5 mb-4">
              <form id="currencyForm">
                <div class="form-group">
                  <label for="fromCurrency">Nga valuta</label>
                  <select class="form-select" id="fromCurrency">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="JPY">JPY</option>
                    <option value="AUD">AUD</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="toCurrency">Tek valuta</label>
                  <select class="form-select" id="toCurrency">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="JPY">JPY</option>
                    <option value="AUD">AUD</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="amount">Shuma</label>
                  <input type="number" class="form-control" id="amount" placeholder="Enter amount">
                </div>
                <button type="submit" class="btn btn-primary">Konverto</button>
              </form>
              <br>
              <h5>Rezultati:</h5>
              <div class="rounded-5 shadow-sm p-3 text-bold">
                <p id="result"></p>
              </div>

            </div>
          </div>

          <script>
            const apiKey = "WVrG8fyiCIO6ZoNxxVG9zdkJlEVVlAVj";

            const form = document.querySelector('#currencyForm');
            const result = document.getElementById('result');

            form.addEventListener('submit', (event) => {
              event.preventDefault();

              const fromCurrency = document.getElementById('fromCurrency').value;
              const toCurrency = document.getElementById('toCurrency').value;
              const amount = document.getElementById('amount').value;

              fetch(`https://api.apilayer.com/fixer/convert?to=${toCurrency}&from=${fromCurrency}&amount=${amount}&apikey=${apiKey}`)
                .then(response => response.json())
                .then(data => {
                  if (data.success) {
                    const convertedAmount = Math.round(data.result);
                    result.textContent = `${amount} ${fromCurrency} is equal to ${convertedAmount} ${toCurrency}`;
                  } else {
                    result.textContent = "Ju nuk keni specifikuar një shumë për t'u konvertuar. [Shembull: Shuma=5]";
                  }
                })
                .catch(error => console.log('error', error));
            });
          </script>

        </div>




        <div class="card rounded-5 shadow-sm">
          <div class="card-body">
            <h4 class="card-title">Platformat tjera</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" data-ordering="false" class="table w-100 table-bordered">
                    <thead class="bg-light">
                      <tr>
                        <th>Artist(s)</th>
                        <th>Reporting Period</th>
                        <th>Accounting Period</th>
                        <th>Release</th>
                        <th>Track</th>
                        <th>Country</th>
                        <th>Revenue (USD)</th>
                        <th>Revenue Share (%)</th>
                        <th>Split Pay Share (%)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['artistii']) && isset($_POST['perioda'])) {
                        $artistii = $_POST['artistii'];
                        $perioda = $_POST['perioda'];
                        $kueri = $conn->query("SELECT * FROM platformat WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                        $q4 = $conn->query("SELECT SUM(`RevenueUSD`) as `sum` FROM `platformat` WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                        $qq4 = mysqli_fetch_array($q4);
                        if (mysqli_num_rows($kueri) > 0) {
                          while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                            <tr>
                              <td>
                                <?php echo $k['Artist']; ?>
                              </td>
                              <td>
                                <?php echo $k['ReportingPeriod']; ?>
                              </td>
                              <td>
                                <?php echo $k['AccountingPeriod']; ?>
                              </td>
                              <td>
                                <?php echo $k['rel']; ?>
                              </td>
                              <td>
                                <?php echo $k['Track']; ?>
                              </td>
                              <td>
                                <?php echo $k['Country']; ?>
                              </td>
                              <td>
                                <?php echo $k['RevenueUSD']; ?>
                              </td>
                              <td>
                                <?php echo $k['RevenueShare']; ?>
                              </td>
                              <td>
                                <?php echo $k['SplitPayShare']; ?>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                          <!-- <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Totali:</b>
                              <?php echo $qq4['sum']; ?>
                            </td>
                            <td></td>
                            <td></td>
                          </tr> -->
                      <?php
                        }
                      } else {
                        // handle empty result set
                      }
                      ?>
                    </tbody>
                    <tfoot class="bg-light">
                      <tr>
                        <th>Artist(s)</th>
                        <th>Reporting Period</th>
                        <th>Accounting Period</th>
                        <th>Release</th>
                        <th>Track</th>
                        <th>Country</th>
                        <th>Revenue (USD)</th>
                        <th>Revenue Share (%)</th>
                        <th>Split Pay Share (%)</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card rounded-5 shadow-sm my-2 p-5 mb-4">
            <?php
            if (isset($_POST['artistii']) && isset($_POST['perioda'])) {
              $artistii = $_POST['artistii'];
              $perioda = $_POST['perioda'];
              $kueri = $conn->query("SELECT * FROM platformat WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
              $q4 = $conn->query("SELECT Country as `shtetet` FROM `platformat` WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
              $shuma = $conn->query("SELECT SUM(`RevenueUSD`) as `sum` FROM `platformat` WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
              $qq4 = mysqli_fetch_array($q4);

              // Create arrays to store chart data
              $labels = array();
              $data = array();

              // Loop through result set and populate arrays
              // while ($row = mysqli_fetch_array($kueri)) {
              //   array_push($labels, $row['Country']);
              //   array_push($data, $row['RevenueUSD']);
              // }

              while ($row = mysqli_fetch_array($kueri)) {
                // Check if the label already exists in the array
                if (!in_array($row['Country'], $labels)) {
                  array_push($labels, $row['Country']);
                  array_push($data, $row['RevenueUSD']);
                }
              }

              // Output canvas element for chart
              echo "
            <canvas id='myChart'></canvas>
          ";

              // Output JavaScript to create chart using Charts.js
              // Output JavaScript to create chart using Charts.js
              echo "<script>
              var ctx = document.getElementById('myChart');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: " . json_encode($labels) . ",
                      datasets: [{
                          label: 'Fitimi i bazuar ne shtetet',
                          data: " . json_encode($data) . ",
                          backgroundColor: 'rgba(255, 99, 132, 0.2)',
                          borderColor: 'rgba(255, 99, 132, 1)',
                          borderWidth: 1,
                          fill:true,
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero: true
                              }
                          }]
                      }
                  }
              });
          </script>";
            } else {
              // Handle case where form data is not set
            }
            ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
<script>
  $('#example').DataTable({
    responsive: true,
    search: {
      return: true,
    },
    dom: 'Bfrtip',
    buttons: [{
      text: '<i class="fi fi-rr-upload fa-lg"></i>&nbsp;&nbsp; Ngarko CSV',
      className: 'btn btn-light border shadow-2 me-2',
      action: function(e, node, config) {
        $('#shtochannel').modal('show')
      }
    }, {
      extend: 'pdfHtml5',
      text: '<i class="fi fi-rr-file-pdf fa-lg"></i>&nbsp;&nbsp; PDF',
      titleAttr: 'Eksporto tabelen ne formatin PDF',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      extend: 'copyHtml5',
      text: '<i class="fi fi-rr-copy fa-lg"></i>&nbsp;&nbsp; Kopjo',
      titleAttr: 'Kopjo tabelen ne formatin Clipboard',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      extend: 'excelHtml5',
      text: '<i class="fi fi-rr-file-excel fa-lg"></i>&nbsp;&nbsp; Excel',
      titleAttr: 'Eksporto tabelen ne formatin CSV',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      extend: 'print',
      text: '<i class="fi fi-rr-print fa-lg"></i>&nbsp;&nbsp; Printo',
      titleAttr: 'Printo tabelën',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      text: 'Print',
      action: function(e, dt, node, config) {
        var data = dt.data();
        var jsonData = JSON.stringify(data, function(key, val) {
          if (key == '_buttons' || key == 'context') {
            return undefined;
          }
          return val;
        });
        window.location.href = "newPage.php?data=" + jsonData;
      }
    }],
    initComplete: function() {
      var btns = $('.dt-buttons');
      btns.addClass('');
      btns.removeClass('dt-buttons btn-group');

    },
    fixedHeader: true,
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/sq.json",
    },

  })
</script>