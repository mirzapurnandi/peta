<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Peta Mahasiswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <div class="col-md-4 hidden-small">
                            <h2 class="line_30">Total Mahasiswa di Aceh</h2>

                            <table class="countries_list">
                                <tbody>
                                    <?php foreach ($jumlah as $key => $val) { ?>
                                        <tr>
                                            <td><a href="<?= site_url('petas/kabupaten/'.$val['kabid']) ?>"> <?= $val['nama']; ?> </a></td>
                                            <td class="fs15 fw700 text-right"><?= $val['jumlah'].' Mahasiswa'; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="mapid"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript"> 

    var mymap = L.map('mapid').setView([4.5807774,96.2584266], 8);

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

info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};

info.update = function (props) {
//var kode_ = KODE[props.kode] == 'undefined' ? 0 : KODE[props.kode];
this._div.innerHTML = '<h4>Jumlah Mahasiswa di</h4>' +  (props ?
    '<b>' + props.Kabupaten_ + '</b><br />' + KODE[props.kode] + ' Mahasiswa'
    : 'Dekatkan mouse untuk melihat');
};

info.addTo(mymap);

function getColor(d) {
    return d > 50 ? '#800026' :
    d > 35  ? '#BD0026' :
    d > 25  ? '#E31A1C' :
    d > 20  ? '#FC4E2A' :
    d > 15   ? '#FD8D3C' :
    d > 9   ? '#FEB24C' :
    d > 4   ? '#FED976' :
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
    map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}


/*function popUp(f,l){
var out = [];
if (f.properties){
out.push('Kabupaten:'+f.properties.Kabupaten_);
out.push('Provinsi:'+f.properties.Provinsi);
l.bindPopup(out.join("<br />"));
}
}*/
var jsonTest = new L.GeoJSON.AJAX(["<?= config_item('base_url')?>asset/geojson/11_ACEH.geojson"],{
    style: style,
    onEachFeature: onEachFeature
}).addTo(mymap);

</script>