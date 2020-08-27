import Component from "~/lib/Component.js";

import Vue from "vue";
import vSelect from "vue-select";
Vue.component("v-select", vSelect);

class Form extends Component {
  constructor(datas) {
    super({
      ...datas,
    });
  }

  mounted() {
    new Vue({
      el: this.$el,
      components: {
        vSelect,
      },
      data() {
        return {
          model: {
            country: {
              label: "France",
              value: "france",
            },
            object: {
              label: "France",
              value: "france",
            },
          },
        };
      },
    });
  }
}

export default Form;
