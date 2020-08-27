import Component from "~/lib/Component.js";
import "mapbox-gl/dist/mapbox-gl.css";

export default class Map extends Component {
  mounted() {
    this.initMapbox();
  }

  initMapbox() {
    const mapboxgl = require("mapbox-gl");
    const { latitude, longitude, zoom } = this.$el.dataset;
    const coord = [
      parseFloat(longitude.replace(/,/g, ".")),
      parseFloat(latitude.replace(/,/g, ".")),
    ];

    mapboxgl.accessToken =
      "pk.eyJ1IjoiYWthcnUiLCJhIjoiY2pwaWVpeXZsMTMwdzNwcGZpMzl5bDE5ZCJ9.J-zqOqBS3kThgO1g2CrsTw";

    const map = new mapboxgl.Map({
      container: this.$refs.map,
      style: "mapbox://styles/akaru/ckcbr5ahr0c811imq12ms68gm",
      center: coord,
      zoom: zoom,
      minZoom: 2,
      maxZoom: 20,
      pitchWithRotate: false,
      dragRotate: false,
      attributionControl: false,
      scrollZoom: false,
    });

    map.addControl(
      new mapboxgl.NavigationControl({
        showCompass: false,
      }),
      "bottom-right"
    );

    const marker = new mapboxgl.Marker({
      element: this.$refs.marker,
    })
      .setLngLat(coord)
      .addTo(map);
  }
}
