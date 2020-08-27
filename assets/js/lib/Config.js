const DEFAULT_CONFIG = {
  pageSelector: "[data-page]",
  componentSelector: "[data-component]",
};

class Config {
  constructor() {
    this.config = DEFAULT_CONFIG;
  }

  merge(config) {
    this.config = {
      ...this.config,
      config,
    };
  }

  get(key) {
    return this.config[key];
  }

  set(key, value) {
    this.config[key] = value;
  }
}

export default new Config();
