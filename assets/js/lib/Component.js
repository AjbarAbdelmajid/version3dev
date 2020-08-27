import Element from "~/lib/Element";

export default class Component extends Element {
  constructor(datas) {
    super({
      ...datas,
      type: "component",
    });
  }
}
