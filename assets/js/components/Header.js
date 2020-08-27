import Component from "~/lib/Component.js";

class Header extends Component {
  constructor(datas) {
    super({
      ...datas,
    });

    this.activeSubnavId = null;
  }

  mounted() {
    this.bindEvents();
  }

  bindEvents() {
    this.$el.addEventListener("mouseleave", this.hideSubnav.bind(this));

    this.$refs.navItem.forEach((el) => {
      el.addEventListener("mouseenter", (e) => {
        this.onMouseEnterItem(e, { el });
      });
    });

    this.$refs.hideSubnavEl.forEach((el) => {
      el.addEventListener("mouseenter", this.hideSubnav.bind(this));
    });
  }

  hideSubnav(e) {
    this.desactiveSubnav(this.activeSubnavId);
    this.$refs.wrapSubnav.classList.remove("visible");

    this.activeSubnavId = null;
  }

  onMouseEnterItem(e, { el }) {
    const { id } = el.dataset;

    this.desactiveSubnav(this.activeSubnavId);
    this.activeSubnav(id);
  }

  activeSubnav(id) {
    const elSubnavToActive = this.getSubnav(id);
    if (elSubnavToActive) {
      elSubnavToActive.classList.add("visible");
      this.$refs.wrapSubnav.classList.add("visible");
    } else {
      this.$refs.wrapSubnav.classList.remove("visible");
    }

    this.activeSubnavId = elSubnavToActive ? id : null;
  }

  desactiveSubnav() {
    const elSubnavToDesactive = this.getSubnav(this.activeSubnavId);
    if (elSubnavToDesactive) elSubnavToDesactive.classList.remove("visible");
  }

  getSubnav(id) {
    return this.$refs.subnavItem.find((el) => el.dataset.id === id);
  }
}

export default Header;
