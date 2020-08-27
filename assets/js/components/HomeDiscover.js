import Component from '~/lib/Component.js';
import gsap from 'gsap';

class Header extends Component {
  constructor(datas) {
    super({
      ...datas
    });

    this.activeItemId = null;
    this.cptIndex = 1;
  }

  mounted() {
    this.bindEvents();
  }

  bindEvents() {
    this.$refs.content.addEventListener('mouseleave', this.hideItem.bind(this));

    this.$refs.item.forEach((el) => {
      el.addEventListener('mouseenter', (e) => {
        this.onMouseEnterItem(e, { el });
      });
    });
  }

  hideItem(e) {
    this.desactiveItem(this.activeItemId);

    this.animateEnter();
    this.activeItemId = null;
    this.$refs.content.classList.remove('is-active');
  }

  onMouseEnterItem(e, { el }) {
    const { id } = el.dataset;

    this.desactiveItem(this.activeItemId);
    this.activeItem(id);
  }

  activeItem(id) {
    const elImageToActive = this.getImage(id);
    const elItemToActive = this.getItem(id);
    if (elImageToActive) elImageToActive.classList.add('active');
    if (elItemToActive) elItemToActive.classList.add('active');

    this.animateLeave(elImageToActive);

    this.activeItemId = elImageToActive ? id : null;
    if (this.activeItemId) this.$refs.content.classList.add('is-active');
  }

  desactiveItem() {
    const elImageToDesactive = this.getImage(this.activeItemId);
    const elItemToActive = this.getItem(this.activeItemId);
    if (elImageToDesactive) elImageToDesactive.classList.remove('active');
    if (elItemToActive) elItemToActive.classList.remove('active');
  }

  getImage(id) {
    return this.$refs.image.find((el) => el.dataset.id === id);
  }

  getItem(id) {
    return this.$refs.item.find((el) => el.dataset.id === id);
  }

  animateEnter() {
    const elImageToInactive = this.getImage(this.activeItemId);

    elImageToInactive.classList.add('move');
    gsap.set(
      [
        elImageToInactive,
        elImageToInactive.querySelector('.BaseImage'),
        elImageToInactive.querySelector('img')
      ],
      { clearProps: 'x', delay: 0.2 }
    );
    gsap.delayedCall(0.5, () => {
      elImageToInactive.classList.remove('move');
    });
    gsap.set(
      [
        this.$refs.content.querySelectorAll('.HomeDiscover-wrapImage'),
        this.$refs.content.querySelectorAll(
          '.HomeDiscover-wrapImage .BaseImage'
        ),
        this.$refs.content.querySelectorAll('.HomeDiscover-wrapImage img')
      ],
      { clearProps: 'x' }
    );
  }

  animateLeave(elImageToActive) {
    this.cptIndex++;
    gsap.set(elImageToActive, { zIndex: this.cptIndex });

    if (this.activeItemId) {
      gsap.fromTo(
        elImageToActive,
        { opacity: 0 },
        { opacity: 1, duration: 0.5 }
      );
      gsap.set(
        [
          this.$refs.content.querySelectorAll('.HomeDiscover-wrapImage'),
          this.$refs.content.querySelectorAll(
            '.HomeDiscover-wrapImage .BaseImage'
          ),
          this.$refs.content.querySelectorAll('.HomeDiscover-wrapImage img')
        ],
        { x: 0, duration: 0.5 }
      );
    } else {
      elImageToActive.classList.add('move');
      gsap.set(
        [
          elImageToActive,
          elImageToActive.querySelector('.BaseImage'),
          elImageToActive.querySelector('img')
        ],
        { x: 0 }
      );
      gsap.delayedCall(0.5, () => {
        elImageToActive.classList.remove('move');
      });
    }
  }
}

export default Header;
