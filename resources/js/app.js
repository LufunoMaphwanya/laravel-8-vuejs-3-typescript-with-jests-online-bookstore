require('./bootstrap');

import router from './router';

import BookIndex from './components/books/BookIndex.vue';

import { createApp } from "vue";
const app = createApp({
    components: {
        BookIndex,
    },
}).use(router).mount('#app')
