import Page from "~/lib/Page.js";

class Gallery extends Page {
  constructor(datas) {
    super({
      ...datas,
    });
  }

  mounted() {
    this.bindEvents();
  }

  bindEvents() {
    this.$refs.contentButton.addEventListener(
      "click",
      this.onClickContentButton.bind(this)
    );
    this.$refs.backButton.addEventListener(
      "click",
      this.onClickBackButton.bind(this)
    );
  }

  onClickContentButton(e) {
    e.preventDefault();
    this.$refs.contentSection.classList.add("hidden");
    this.$refs.formSection.classList.remove("hidden");
    this.$refs.backButton.classList.remove("hidden");
  }

  onClickBackButton(e) {
    this.$refs.contentSection.classList.remove("hidden");
    this.$refs.formSection.classList.add("hidden");
    this.$refs.backButton.classList.add("hidden");
  }
}

export default Gallery;
