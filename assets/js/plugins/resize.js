import EventBus from '~/lib/helpers/event-bus';
import { debounce } from 'lodash-es';

const debounced = debounce(() => {
  EventBus.emit('resize-debounced');
}, 300);

export default () => {
  window.addEventListener('resize', () => {
    EventBus.emit('resize');
    debounced();
  });
};
