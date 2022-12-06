// Import JS and CSS
import './bootstrap';
import './../sass/app.scss';

// Initial Vue App and dependencies
import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

// Views
import App from './layouts/App.vue';
import CountriesIndex from './components/Countries/Index.vue';
import CountriesShow from './components/Countries/Show.vue';
import CountriesCreate from './components/Countries/Create.vue';

// Components
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

// Routes
const routes = [
	{
		path: '/',
		component: CountriesIndex,
		meta: { title: 'List of Countries' }
	},
	{
		path: '/countries/:country_id',
		component: CountriesShow,
		meta: { title: 'Detail of Country' }
	},
	{
		path: '/countries/create',
		component: CountriesCreate,
		meta: { title: 'Add new Country' }
	},
]

// Starting router
const router = createRouter({
	history: createWebHistory(),
	routes
})

// Starting and config App
const app = createApp(App);
app.use(router)
app.component('countries-index', CountriesIndex);
app.component('countries-show', CountriesShow);
app.component('countries-create', CountriesCreate);
app.component('Bootstrap5Pagination', Bootstrap5Pagination)

app.mount('#app');
