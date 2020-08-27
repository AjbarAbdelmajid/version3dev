import Component from "~/lib/Component.js";

class BaseImage extends Component {
  constructor(datas) {
    super({
      ...datas,
    });
  }
  mounted() {}
}

export default BaseImage;
