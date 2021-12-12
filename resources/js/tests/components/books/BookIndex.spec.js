// resources/assets/js/test/index.spec.js

import { mount } from '@vue/test-utils';
import BookIndex from '../../../components/books/BookIndex.vue';

test('should mount without crashing', () => {
  const wrapper = mount(BookIndex)

  expect(wrapper).toMatchSnapshot()
})
