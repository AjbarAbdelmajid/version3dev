import {
  addEvent,
  removeEvent,
  addClass,
  removeClass
} from '@qneyraud/q-utils';

export default class Slider {
  constructor({
    items,
    previousButton,
    nextButton,
    goTo = (_) => {},
    infinite = false
  }) {
    this.previousButton = previousButton;
    this.nextButton = nextButton;
    this.items = items;
    this.goTo = goTo;
    this.infinite = infinite;

    this.totalItems = this.items.length;
    this.currentItemIndex = 0;

    this.bindMethods();
    this.initEvents();
  }

  bindMethods() {
    this.onPreviousButtonClick = this.onPreviousButtonClick.bind(this);
    this.onNextButtonClick = this.onNextButtonClick.bind(this);
  }

  initEvents() {
    addEvent(this.previousButton, 'click', this.onPreviousButtonClick);
    addEvent(this.nextButton, 'click', this.onNextButtonClick);
  }

  destroy() {
    removeEvent(this.previousButton, 'click', this.onPreviousButtonClick);
    removeEvent(this.nextButton, 'click', this.onNextButtonClick);
  }

  onPreviousButtonClick() {
    if (!this.infinite && this.currentItemIndex === 0) return;

    const oldIndex = this.currentItemIndex;

    if (this.currentItemIndex > 0) {
      this.currentItemIndex--;
    } else if (this.infinite && this.currentItemIndex === 0) {
      this.currentItemIndex = this.totalItems - 1;
    }

    this.goTo({
      direction: -1,
      oldIndex,
      newIndex: this.currentItemIndex,
      oldElement: this.items[oldIndex],
      newElement: this.items[this.currentItemIndex]
    });

    if (!this.infinite) this.setButtonsClasses();
  }

  onNextButtonClick() {
    if (!this.infinite && this.currentItemIndex === this.totalItems - 1) return;

    const oldIndex = this.currentItemIndex;

    if (this.currentItemIndex < this.totalItems - 1) {
      this.currentItemIndex++;
    } else if (this.infinite && this.currentItemIndex === this.totalItems - 1) {
      this.currentItemIndex = 0;
    }

    this.goTo({
      direction: 1,
      oldIndex,
      newIndex: this.currentItemIndex,
      oldElement: this.items[oldIndex],
      newElement: this.items[this.currentItemIndex]
    });

    if (!this.infinite) this.setButtonsClasses();
  }

  setButtonsClasses() {
    removeClass([this.previousButton, this.nextButton], 'disabled');

    if (this.currentItemIndex === 0) {
      addClass(this.previousButton, 'disabled');
    }

    if (this.currentItemIndex === this.totalItems - 1) {
      addClass(this.nextButton, 'disabled');
    }
  }
}
