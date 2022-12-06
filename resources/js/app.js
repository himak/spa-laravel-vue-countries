import './bootstrap';
import './../sass/app.scss';

import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import App from './layouts/App.vue';
import CountriesIndex from './components/Countries/Index.vue';
import CountriesCreate from './components/Countries/Create.vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

const routes = [
	{
		path: '/',
		component: CountriesIndex,
		meta: { title: 'List of Countries' }
	},
	{
		path: '/countries/create',
		component: CountriesCreate,
		meta: { title: 'Add new Country' }
	},
]

const router = createRouter({
	history: createWebHistory(),
	routes
})

const app = createApp(App);
app.use(router)
app.component('countries-index', CountriesIndex);
app.component('countries-create', CountriesCreate);
app.component('Bootstrap5Pagination', Bootstrap5Pagination)

app.mount('#app');
