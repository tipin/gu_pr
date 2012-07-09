// Průvodce lezením na Jesenicku

var center = SMap.Coords.fromWGS84(lng, lat);
var m = new SMap(JAK.gel("maparea"), center, 12);
m.addDefaultLayer(SMap.DEF_TURIST).enable();
m.addDefaultControls();


m.addDefaultLayer(SMap.DEF_OPHOTO);
m.addDefaultLayer(SMap.DEF_OPHOTO0203);
m.addDefaultLayer(SMap.DEF_OPHOTO0406);
m.addDefaultLayer(SMap.DEF_TURIST).enable();
m.addDefaultLayer(SMap.DEF_HISTORIC);
m.addDefaultLayer(SMap.DEF_BASE);

var layerSwitch = new SMap.Control.Layer();
layerSwitch.addDefaultLayer(SMap.DEF_BASE);
layerSwitch.addDefaultLayer(SMap.DEF_OPHOTO);
layerSwitch.addDefaultLayer(SMap.DEF_TURIST);
layerSwitch.addDefaultLayer(SMap.DEF_OPHOTO0406);
layerSwitch.addDefaultLayer(SMap.DEF_OPHOTO0203);
layerSwitch.addDefaultLayer(SMap.DEF_HISTORIC);
m.addControl(layerSwitch, {left:"8px", top:"9px"});


var layer = new SMap.Layer.Marker();
m.addLayer(layer);
layer.enable();

var card = new SMap.Card();
card.setSize(200, 50);
card.getHeader().innerHTML = "<strong>"+area_name+"</strong>";
//card.getBody().innerHTML = "";

var options = { 
    title: "Dobré ráno"
};
var marker = new SMap.Marker(center, "myMarker", options);
marker.decorate(SMap.Marker.Feature.Card, card);
layer.addMarker(marker);