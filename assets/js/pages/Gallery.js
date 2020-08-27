import Page from "~/lib/Page.js";

class Gallery extends Page {
  constructor(datas) {
    super({
      ...datas,
    });

    this.activeItemId = null;
  }

  mounted() {
    this.bindEvents();
  }

  bindEvents() {
    this.$refs.navItem.forEach((el) => {
      el.addEventListener("click", this.onClickNavItem.bind(this));
    });
  }

  onClickNavItem(e) {
    const item = e.currentTarget;
    const { id } = item.dataset;

    this.desactiveItem(this.activeItemId);
    this.activeItem(id);
  }

  activeItem(id) {
    const elSliderToActive = this.getSlider(id);
    const elNavToActive = this.getNavItem(id);

    this.activeItemId = elNavToActive ? id : null;

    if (elSliderToActive) elSliderToActive.classList.add("active");
    if (elNavToActive) elNavToActive.classList.add("active");
  }

  desactiveItem() {
    const elSliderToDesactive = this.getSlider(this.activeItemId);
    const elNavToActive = this.getNavItem(this.activeItemId);

    if (elSliderToDesactive) elSliderToDesactive.classList.remove("active");
    if (elNavToActive) elNavToActive.classList.remove("active");
  }

  getSlider(id) {
    return this.$refs.sliderItem.find((el) => el.dataset.id === id);
  }

  getNavItem(id) {
    return this.$refs.navItem.find((el) => el.dataset.id === id);
  }
}

export default Gallery;
