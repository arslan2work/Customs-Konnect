<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body" style="height: 650px">
                        
                        <div style="display: flex; align-items: center; justify-content: space-between">
                        <div>
                            <button @click="drawMarker"> Draw Marker</button>
                            <button @click="drawDirection"> Draw Direction</button>
                            <button @click="clearMap"> Clear Map</button>
                            
                        </div>
                        <div class="">
                        <small class="text-muted text-center">Night</small>
                            <label class="switch ">
                                <input type="checkbox" class="primary" @click="changeMapStyle">
                                <span class="slider round"></span>
                            </label>
                    </div>
                            
                        </div>
                        
                        
                                    <GmapMap
                                         ref="mapRef"
                                        :center="myCoordinates"
                                        :zoom="10"
                                        map-type-id="terrain"
                                        style="width: 800px; height: 500px; margin: 32px auto;"
                                        >
                                        <GmapMarker
                                            :key="index"
                                            v-for="(m, index) in markers"
                                            :position="m.position"
                                            :clickable="true"
                                            :draggable="true"
                                            @click="center=m.position"
                                        />
                                        <gmap-info-window
                                            opened = true,
                                            :position="myCoordinates"
                                            :options="{
                                                pixelOffset:{
                                                    width: 0,
                                                    height: -35,
                                                }
                                            }"
                                            >
                                            Current Location
                                            </gmap-info-window>
                                        </GmapMap>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import nightStyle from './json/nightStyle.json'
let marker;
    export default {
        data(){
            return{
                map: null,
                markers: [],
                mapStyle: [],
                carIcon: './img/pin-15jpg',
                dayStyle: {
                    styles: []
                },
                myCoordinates:{
                    lat: 0,
                    lng: 0
                },
                mapCoordinates: {
                    lat: 0,
                    lng: 0
                },
                nightOn: false
            }
        },
        mounted(){
            this.$refs.mapRef.$mapPromise.then(() => {
                this.initSlidingMarker( this.$refs.mapRef.mapObject)
            })
        },
        methods:{
            changeMapStyle(){
                    this.nightOn = !this.nightOn
                    this.mapStyle = this.nightOn ? nightStyle : this.dayStyle
            },
            drawMarker(){
                this.markers = [
                    {
                        position: this.myCoordinates
                    }
                ]
            },
            drawDirection(){
                console.log("map");
                
            },
            clearMap(){
                console.log("map");

            },
            initSlidingMarker(map){
                const SlidingMarker = require('marker-animate-unobtrusive')
                SlidingMarker.initializeGlobally()
                this.markers = new SlidingMarker({
                    position: this.myCoordinates,
                    map: map,
                    title: 'I am Sliding Marker',
                    icon: this.carIcon
                })
            }
        },
        created(){
            this.$getLocation({})
            .then(coordinates => {
                this.myCoordinates = coordinates;
            })
            .catch(error => alert(error));
        },
        
        
    }
</script>

<style scoped>
.switch {
  position: relative;
  display: inline-block;
  top:15px;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.text-muted{
    font-size: 25px;
}
</style>