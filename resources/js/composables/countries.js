import { ref } from 'vue'
import { useRouter} from "vue-router";

export default function useCountries() {

	const countries = ref({})
	const router = useRouter()
	const validationErrors = ref({})

	const getCountries = async (
		page = 1,
		continent = '',
		order_column = 'name',
		order_direction = 'asc'
	) => {

		axios.get('/api/countries?page=' + page +
					'&continent=' + continent +
					'&order_column=' + order_column +
					'&order_direction=' + order_direction
				)
				.then(response => {
						countries.value = response.data;
				})
	}

	const storeCountry = async (country) => {
		axios.post('/api/countries', country)
			.then(response => {
				router.push({ name: 'countries.index' })
			})
			.catch(error => {
				if(error.response?.data) {
					validationErrors.value = error.response.data.errors
				}
			})
	}

	return { countries, validationErrors, getCountries, storeCountry }
}
