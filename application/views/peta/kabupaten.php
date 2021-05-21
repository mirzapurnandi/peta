<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Peta Mahasiswa <?= $result['nama'] ?></h2>
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
                            <h2 class="line_30">Total Mahasiswa di <?= $result['nama'] ?></h2>

                            <table class="countries_list">
                                <tbody>
                                    <?php foreach ($jumlah as $key => $val) { ?>
                                        <tr>
                                            <td><?= $val['nama']; ?></td>
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

    var mymap = L.map('mapid').setView([<?= $latlong; ?>], 9);

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
//console.log(props);
//var kode_ = KODE[props.kode] == 'undefined' ? 0 : KODE[props.kode];
this._div.innerHTML = '<h4>Jumlah Mahasiswa di</h4>' +  (props ?
    '<b>' + props.Kecamatan + '</b><br />' + KODE[props.ID_Kec] + ' Mahasiswa'
    : 'Dekatkan mouse untuk melihat');
};

info.addTo(mymap);

function getColor(d) {
    var warna = '';
    if(d >= 20){
        warna = '#800026';
    } else if(d >= 15){
           warna = '#BD0026';
    } else if(d >= 10){
           warna = '#E31A1C';
    } else if(d >= 5){
           warna = '#FC4E2A';
    } else if(d >= 3){
           warna = '#FD8D3C';
    } else if(d >= 1){
           warna = '#FEB24C';
    } else {
           warna = '#FED976';
    }
    return warna;
}

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
        fillColor: getColor(KODE[feature.properties.ID_Kec])
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
var jsonTest = new L.GeoJSON.AJAX(["<?= config_item('base_url')?>asset/geojsonkab/<?= $result['file']; ?>"],{
    style: style,
    onEachFeature: onEachFeature
}).addTo(mymap);

</script>