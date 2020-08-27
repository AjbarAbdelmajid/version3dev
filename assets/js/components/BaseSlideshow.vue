<template>
  <div class="Slideshow">
    <transition-group
      class="Slideshow-list"
      :class="listClass"
      tag="ul"
      name="slideshow-item"
      @before-enter="beforeEnter"
      @enter="enter"
      @leave="leave"
    >
      <li
        v-for="(slide, index) in slides"
        v-show="index === currentIndex"
        :key="index"
        class="Slideshow-item"
      >
        <slot :slide="slide" :index="index"></slot>
      </li>
    </transition-group>
    <slot name="nav" :prev="prev" :next="next"></slot>
  </div>
</template>

<script>
// import { nanoid } from 'nanoid';

export default {
  props: {
    slides: {
      type: Array,
      required: true
    },
    startIndex: {
      type: Number,
      default: 0
    },
    listClass: { type: [String, Array], default: null }
  },
  data() {
    return {
      previousIndex: null,
      currentIndex: 0,
      lastAction: null,
      canMove: true
    };
  },
  computed: {
    // formatedSlides() {
    //   return this.slides.map((slide) => ({
    //     ...slide,
    //     uid: nanoid(6)
    //   }));
    // }
  },
  created() {
    this.currentIndex = this.startIndex;
  },
  methods: {
    prev() {
      if (!this.canMove) return;
      this.lastAction = 'prev';
      this.goTo(this.currentIndex - 1);
    },

    next() {
      if (!this.canMove) return;
      this.lastAction = 'next';
      this.goTo(this.currentIndex + 1);
    },

    goTo(index) {
      const count = this.slides.length;

      const nextIndex = index >= count ? 0 : index < 0 ? count - 1 : index;

      this.previousIndex = this.currentIndex;
      this.currentIndex = nextIndex;
    },

    beforeEnter(el, done) {
      this.canMove = false;
      this.$emit('before-enter', { el, ...this.getData() });
    },

    enter(el, done) {
      this.canMove = false;
      this.$emit('enter', { el, ...this.getData() }, () => {
        this.canMove = true;
        done();
      });
    },

    leave(el, done) {
      this.$emit('leave', { el, ...this.getData() }, done);
    },

    getData() {
      const { currentIndex, previousIndex, lastAction } = this;

      return {
        currentIndex,
        previousIndex,
        lastAction
      };
    }
  }
};
</script>

<style lang="scss" scoped>
.Slideshow {
  height: 100%;
  margin-top: 0;
  margin-bottom: 0;
  padding-left: 0;
  list-style: none;
}

.Slideshow-list {
  position: relative;
}

.Slideshow-list,
.Slideshow-item {
  height: 100%;
}

.slideshow-item-leave-active {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
</style>
