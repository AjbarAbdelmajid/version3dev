// import VueSelect from "~/components/VueSelect.vue";

import Component from "~/lib/Component.js";
import Datepicker from "vuejs-datepicker";
import { en, fr } from "vuejs-datepicker/dist/locale";

import Vue from "vue";
import vSelect from "vue-select";
Vue.component("v-select", vSelect);

class FilterBar extends Component {
  constructor(datas) {
    super({
      ...datas,
    });
  }

  mounted() {
    const { lang, options } = this.$el.dataset;
    new Vue({
      el: this.$el,
      components: {
        vSelect,
        Datepicker,
      },
      data() {
        return {
          datePickerLang: fr,
          options_list: JSON.parse(options),
          options: {},
          selected_options: {},
          datepicker_value: null,
        };
      },
      created() {
        this.options.type = Object.values(this.options_list.type)[0];
        this.options.duration = Object.values(this.options_list.duration)[0];
        this.options.program = Object.values(this.options_list.program)[0];

        this.selected_options.type = this.options.type[0];
        this.selected_options.duration = this.options.duration[0];
        this.selected_options.program = this.options.program[0];
        // this.selected_options.type = null;
        // this.selected_options.duration = null;
        // this.selected_options.program = null;
      },
      mounted: function() {
        this.datePickerLang = lang === "fr" ? fr : en;
      },
      methods: {
        customFormatter(date) {
          const dateTimeFormat = new Intl.DateTimeFormat("en", {
            year: "numeric",
            month: "numeric",
            day: "2-digit",
          });
          const [
            { value: month },
            ,
            { value: day },
            ,
            { value: year },
          ] = dateTimeFormat.formatToParts(date);

          return `${day}.${this.minTwoDigits(month)}.${year}`;
        },

        minTwoDigits(n) {
          return (n < 10 ? "0" : "") + n;
        },

        onChange(e) {
          if (e.duration) {
            this.options.duration = this.options_list.duration[e.duration];

            this.selected_options.duration = this.options.duration[0];
            // this.selected_options.duration = null;
            this.options.program = this.options_list.program[
              this.options.duration[0].program
            ];
            this.selected_options.program = this.options.program[0];
            // this.selected_options.program = null;
          } else if (e.program) {
            this.options.program = this.options_list.program[e.program];

            this.selected_options.program = this.options.program[0];

            // this.selected_options.program = null;
          }
          this.datepicker_value = null;
          this.$forceUpdate();
        },
      },
    });
  }
}

export default FilterBar;
