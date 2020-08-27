import Component from "~/lib/Component.js";

import Vue from "vue";
import vSelect from "vue-select";
Vue.component("v-select", vSelect);

import Datepicker from "vuejs-datepicker";
import { en, fr } from "vuejs-datepicker/dist/locale";

class BaseInputSelect extends Component {
  constructor(datas) {
    super({
      ...datas,
    });
  }

  mounted() {
    const type = this.$el.dataset.type;
    if (type === "select") {
      this.initInputSelect();
    } else if (
      type === "text" ||
      type === "email" ||
      type === "tel" ||
      type === "textarea" ||
      type === "number"
    ) {
      this.initInputText();
    } else if (type === "date") {
      this.initInputDate();
    } else if (type === "file") {
      this.initInputFile();
    }
  }

  initInputSelect() {
    const refs = this.$refs;
    new Vue({
      el: this.$el,
      components: {
        vSelect,
      },
      data() {
        return {
          selected: JSON.parse(refs.input.dataset.options)[0],
        };
      },
      created() {},
    });
  }

  initInputDate() {
    const lang = this.$el.dataset.lang;
    const refs = this.$refs;

    new Vue({
      el: this.$el,
      components: {
        Datepicker,
      },
      data() {
        return {
          datePickerLang: fr,
        };
      },
      mounted: function() {
        this.datePickerLang = refs.input.dataset.lang === "fr" ? fr : en;
      },
      methods: {},
    });
  }

  initInputText() {
    this.onChangeInputText();
    this.$refs.input.addEventListener(
      "change",
      this.onChangeInputText.bind(this)
    );
  }

  onChangeInputText() {
    if (this.$refs.input.value === "") {
      this.$el.classList.add("empty");
    } else {
      this.$el.classList.remove("empty");
    }
    if (this.$refs.counter) {
      this.countChar(this.$refs.input);
    }
  }

  countChar(val) {
    var len = val.value.length;
    this.$refs.counter.innerHTML = len;
  }

  initInputFile() {
    this.$refs.input.addEventListener(
      "change",
      this.onChangInputFile.bind(this)
    );
    // input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
    // input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
  }

  onChangInputFile() {
    let fileName = "";
    fileName = this.$refs.input.value.split("\\").pop();

    if (fileName.length > 0) {
      this.$refs.labelValue.innerHTML = fileName;
      this.$refs.labelPlaceholder.classList.add("hidden");
    } else {
      this.$refs.labelPlaceholder.classList.remove("hidden");
    }
  }
}

export default BaseInputSelect;
