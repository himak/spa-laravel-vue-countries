import './bootstrap';
import './../sass/app.scss';

import { createApp } from "vue";
const app = createApp({});

import CountriesIndex from './components/Countries/Index.vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

app.component('countries-index', CountriesIndex);
app.component('Bootstrap5Pagination', Bootstrap5Pagination)

app.mount('#app');
