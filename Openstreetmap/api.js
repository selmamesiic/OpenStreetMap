const KEY ='AIzaSyCY6P5P6CP8nHmjKTMcAN--lN53IpW7H8s'


  map2 = new OpenLayers.Map("mapdiv");
  map2.addLayer(new OpenLayers.Layer.OSM());
  map2.setCenter([0,0]);

function getinfo(){
  

    var location = document.querySelector('#location').value;

    fetch("https://maps.googleapis.com/maps/api/geocode/json?address="+location+"&key="+KEY).
    then(result=> result.json()).
    then(json=>{
        lon = json.results[0].geometry.location.lng;
        lat = json.results[0].geometry.location.lat;
        
        

    var lonLat = new OpenLayers.LonLat( lon ,lat )
          .transform(
            new OpenLayers.Projection("EPSG:4326"), 
            map2.getProjectionObject() 
          );
          
    var zoom=12;

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map2.addLayer(markers);
    
    markers.addMarker(new OpenLayers.Marker(lonLat));
    
    map2.setCenter (lonLat, zoom);
        console.log("lonlat",lon);
    }).catch(error=>console.log("ERROR"));

    

    }
    