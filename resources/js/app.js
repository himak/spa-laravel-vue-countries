import './bootstrap';
import './../sass/app.scss';

import { createApp } from "vue";
const app = createApp({});

import CountriesIndex from './components/Countries/Index.vue';

app.component('countries-index', CountriesIndex);

app.mount('#app');
