import Factory from "./Factory";
import Config from "./Config";

class App {
  constructor() {
    this.Config = Config;
    this.Factory = Factory;
  }

  init({
    config: userConfig = {},
    pages = {},
    components = {},
    plugins = [],
  } = {}) {
    this.components = components;
    this.pages = pages;
    this.plugins = plugins;

    Config.merge(userConfig);

    Factory.matchPages(this.pages);
    Factory.matchComponents(this.components);
  }

  async start() {
    const page = await Factory.createPage(
      document.querySelector(Config.get("pageSelector")),
      {
        root: document.body,
      }
    );
    await page.createElement();
    page.init();
    page.traverse("mounted");
  }
}

export default new App();
