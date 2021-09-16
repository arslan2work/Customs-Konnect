<template>
<div class="col-lg-12 control-section">
    <div class="control_wrapper calendar-default">
        <div id="container" style="">
              <ejs-calendar id="calendar" class="calender" :change="onValueChange"></ejs-calendar>
            <span id="date_label"> Selected Value: </span>

        </div>
    </div>
</div>
</template>

<script>

import Vue from "vue";
import { CalendarPlugin } from "@syncfusion/ej2-vue-calendars";

Vue.use(CalendarPlugin);
export default Vue.extend({
  methods: {
    onValueChange: function(args) {
      document.getElementById("date_label").textContent =
        "Selected Value: " + args.value.toLocaleDateString();
    }
  }
});
</script>


<style >

@import "~@syncfusion/ej2-base/styles/material.css";
@import "~@syncfusion/ej2-buttons/styles/material.css";
@import "~@syncfusion/ej2-vue-calendars/styles/material.css";
#date_label {
  display: block;
  width: 400px;
  color: rgba(0, 0, 0, 0.58);
  margin-left: 5px;
}
#container{
  width: 400px !important;
}

.control_wrapper.calendar-default {
  width: 400px !important;
  margin: 0 auto;
}
body.highcontrast #date_label {
  color: white;
}
.calender{
  width: 400px !important;
}
.e-calendar, .e-bigger.e-small .e-calendar {
  max-width: 500px;
}
</style>