<div class="right_col" role="main">
  <!-- top tiles -->
  <?php if ($this->session->userdata('userid')) { ?>
    <div class="row" style="display: inline-block;">
      <div class="tile_count">
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Mahasiswa</span>
          <div class="count"><?= $total_mhs; ?></div>
          <span class="count_bottom">Mahasiswa</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-map-marker"></i> Geografis Mahasiswa</span>
          <div class="count"><?= $total_geo; ?></div>
          <span class="count_bottom">Mahasiswa</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-bank"></i> Total</span>
          <div class="count"><?= $total_prov; ?></div>
          <span class="count_bottom">Provinsi</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-bank"></i> Total</span>
          <div class="count"><?= $total_kab; ?></div>
          <span class="count_bottom">Kabupaten</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-bank"></i> Total</span>
          <div class="count"><?= $total_kec; ?></div>
          <span class="count_bottom">Kecamatan</span>
        </div>
      </div>
    </div>
    <!-- /top tiles -->
  <?php }
  if ($this->session->userdata('userid')) { ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="dashboard_graph">

          <div class="row x_title">
            <div class="col-md-12">
              <h3>DATA MAHASISWA <small>Universitas Ubudiyah Indonesia</small></h3>
            </div>
          </div>

          <div class="col-md-12 col-sm-12 ">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>J. Kelamin</th>
                  <th>Prodi</th>
                  <th>Kota Asal</th>
                  <th>Tahun Masuk</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($result as $key => $val) { ?>
                  <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $val['nim']; ?></td>
                    <td><?= $val['nama']; ?></td>
                    <td><?= $val['jenis_kelamin'] == "L" ? "Laki-laki" : "Wanita"; ?></td>
                    <td><?= $val['nama_prodi']; ?></td>
                    <td>
                      <?= $val['nama_kabupaten'] == "" ? "<i>== Masih Kosong ==</i>" : $val['nama_kabupaten']; ?>
                    </td>
                    <td><?= $val['tahun_masuk']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

    </div>
    <br />
  <?php } ?>

  <div class="row">

    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Peta Mahasiswa</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="dashboard-widget-content">
            <div id="mapid"></div>
          </div>
        </div>
        <div class="x_content">
          <div class="dashboard-widget-content">
            <div class="col-md-5 hidden-small">
              <h2 class="line_30">Total Mahasiswa di Aceh</h2>

              <table class="countries_list">
                <tbody>
                  <?php foreach ($jumlah as $key => $val) { ?>
                    <tr>
                      <td><?= $val['nama']; ?></td>
                      <td class="fs15 fw700 text-right"><?= $val['jumlah'] . ' Mahasiswa'; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-md-6 col-sm-6 ">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
        <div class="x_title">
          <h2>Grafik Mahasiswa berdasarkan Jenis Kelamin</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="" style="width:100%">
            <tr>
              <th style="width:50%;">
                <p>Detail</p>
              </th>
              <th>
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                  <p class="">Device</p>
                </div>
              </th>
            </tr>
            <tr>
              <td>
                <canvas class="canvasDoughnutjns" height="180" width="180" style="margin: 15px 10px 10px 0"></canvas>
              </td>
              <td>
                <table class="tile_info">
                  <tr>
                    <td>
                      <p><i class="fa fa-square blue"></i>Wanita </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square green"></i>Pria </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 ">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>Grafik Total Mahasiswa Berdasarkan Prodi</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="dashboard-widget-content">
            <!--ul class="quick-list">
              <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
              </li>
              <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
              </li>
              <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
              <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
              </li>
              <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
              <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
              </li>
              <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
              </li>
            </ul-->

            <div class="sidebar-widget">
              <h4>Total Per Prodi</h4>
              <canvas class="canvasDoughnutprodi" height="150" width="150" style="margin: 15px 10px 10px 0"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  var mymap = L.map('mapid').setView([4.5807774, 96.2584266], 8);

  <?php
  $arr_data = array();
  foreach ($jumlah as $key => $val) {
    $arr_data[$val['kode']] = $val['jumlah'];
  } ?>

  var KODE = <?= json_encode($arr_data, TRUE); ?>;

  var LayerKita = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
  });
  mymap.addLayer(LayerKita);

  // control that shows state info on hover
  var info = L.control();

  info.onAdd = function(map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
  };

  info.update = function(props) {
    //var kode_ = KODE[props.kode] == 'undefined' ? 0 : KODE[props.kode];
    this._div.innerHTML = '<h4>Jumlah Mahasiswa di</h4>' + (props ?
      '<b>' + props.Kabupaten_ + '</b><br />' + KODE[props.kode] + ' Mahasiswa' :
      'Dekatkan mouse untuk melihat');
  };

  info.addTo(mymap);

  function getColor(d) {
    return d > 50 ? '#800026' :
      d > 35 ? '#BD0026' :
      d > 25 ? '#E31A1C' :
      d > 20 ? '#FC4E2A' :
      d > 15 ? '#FD8D3C' :
      d > 9 ? '#FEB24C' :
      d > 4 ? '#FED976' :
      '#FFEDA0';
  }

  function style(feature) {
    return {
      weight: 2,
      opacity: 1,
      color: 'white',
      dashArray: '3',
      fillOpacity: 0.7,
      fillColor: getColor(KODE[feature.properties.kode])
    };
  }

  function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
      weight: 5,
      color: '#666',
      dashArray: '',
      fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
      layer.bringToFront();
    }

    info.update(layer.feature.properties);
  }

  function resetHighlight(e) {
    var layer = e.target;

    layer.setStyle({
      weight: 2,
      opacity: 1,
      color: 'white',
      dashArray: '3'
    });

    info.update();
  }

  function zoomToFeature(e) {
    mymap.fitBounds(e.target.getBounds());
  }

  function onEachFeature(feature, layer) {
    layer.on({
      mouseover: highlightFeature,
      mouseout: resetHighlight,
      click: zoomToFeature
    });
  }


  function popUp(f, l) {
    var out = [];
    if (f.properties) {
      out.push('Kabupaten:' + f.properties.Kabupaten_);
      out.push('Provinsi:' + f.properties.Provinsi);
      l.bindPopup(out.join("<br />"));
    }
  }
  var jsonTest = new L.GeoJSON.AJAX(["<?= config_item('base_url') ?>asset/geojson/11_ACEH.geojson"], {
    style: style,
    onEachFeature: onEachFeature
  }).addTo(mymap);

  var legend = L.control({
    position: 'bottomleft'
  });
  legend.onAdd = function(mymap) {
    var div = L.DomUtil.create('div', 'legend');
    var labels = [
      "lebih dari 50 Mahasiswa &nbsp; &nbsp; ",
      "lebih dari 35 Mahasiswa &nbsp; &nbsp; ",
      "lebih dari 25 Mahasiswa &nbsp; &nbsp; ",
      "lebih dari 20 Mahasiswa &nbsp; &nbsp; ",
      "lebih dari 15 Mahasiswa &nbsp; &nbsp; ",
      "lebih dari 9 Mahasiswa &nbsp; &nbsp; ",
      "lebih dari 4 Mahasiswa &nbsp; &nbsp; ",
      "dibawah 4 Mahasiswa &nbsp; &nbsp; "
    ];
    var grades = [51, 36, 27, 21, 16, 10, 5, 4];
    div.innerHTML = '<div><center><b> Keterangan Warna </b></center></div>';
    for (var i = 0; i < grades.length; i++) {
      div.innerHTML += '<i style="background:' + getColor(grades[i]) + '"> &nbsp; &nbsp; </i>&nbsp; &nbsp; ' + labels[i] + '<br/>';
    }
    return div;
  }
  legend.addTo(mymap);
</script>