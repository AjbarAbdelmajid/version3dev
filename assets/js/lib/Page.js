import Element from '~/lib/Element';
// import { removeClass, addClass, gebc } from "@qneyraud/q-utils/umd/q-utils.js";
// import observe from "~/lib/helpers/observer";

export default class Page extends Element {
  constructor(datas) {
    super({
      ...datas,
      type: 'page'
    });
  }

  beforeEnter() {
    super.beforeEnter();
    // removeClass(this.root, "loading");
    window.scrollTo(0, 0);
  }

  afterEnter() {
    super.afterEnter();
    // observe(this.page);
  }

  beforeLeave() {
    super.beforeLeave();
    // addClass(this.root, "loading");
  }

  afterLeave() {
    super.afterLeave();
    // removeClass(gebc(this.page, "in-view", true), "in-view");
  }

  hide(done) {
    const transitionDuration = 0.5;

    this.$el.style.transitionDuration = `${transitionDuration}s`;
    this.$el.style.opacity = 0;

    window.setTimeout(() => {
      this.$el.style.display = 'none';
      done();
    }, transitionDuration * 1000);
  }

  show(done) {
    const transitionDuration = 0.5;

    this.$el.style.display = 'block';
    window.setTimeout(() => {
      this.$el.style.transitionDuration = `${transitionDuration}s`;
      this.$el.style.opacity = 1;
    }, 100);

    window.setTimeout(() => {
      done();
    }, transitionDuration * 1000);
  }
}
