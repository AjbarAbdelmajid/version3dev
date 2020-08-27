// import { TweenMax } from 'gsap'
import EventBus from '~/lib/helpers/event-bus';

export default () => {
  // TweenMax.ticker.addEventListener('tick', () => {
  //   EventBus.emit('tick')
  // })

  const loop = () => {
    EventBus.emit('tick');
    window.requestAnimationFrame(loop);
  };

  loop();
};
