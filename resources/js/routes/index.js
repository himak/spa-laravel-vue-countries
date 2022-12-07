// Initial Vue App and dependencies
import { createRouter, createWebHistory } from "vue-router";

// Views
import App from '../layouts/App.vue';
import CountriesIndex from '../components/Countries/Index.vue';
import CountriesShow from '../components/Countries/Show.vue';
import CountriesCreate from '../components/Countries/Create.vue';

// Routes
const routes = [
	{
		path: '/',
		name: 'countries.index',
		component: CountriesIndex,
		meta: { title: 'List of Countries' }
	},
	{
		path: '/countries/:country_id',
		name: 'countries.show',
		component: CountriesShow,
		meta: { title: 'Detail of Country' }
	},
	{
		path: '/countries/create',
		name: 'countries.create',
		component: CountriesCreate,
		meta: { title: 'Add new Country' }
	},
]

export default createRouter({
	history: createWebHistory(),
	routes
})
