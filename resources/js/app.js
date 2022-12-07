// Import JS and CSS
import './bootstrap';
import './../sass/app.scss';

// Initial Vue App and dependencies
import { createApp } from "vue";

// Layouts
import App from './layouts/App.vue';

// Components
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

// Router
import router from './routes/index';


// Starting and config App
const app = createApp(App);
app.use(router)
app.component('Bootstrap5Pagination', Bootstrap5Pagination)

app.mount('#app');
