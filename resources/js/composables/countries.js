import { ref } from 'vue'

export default function useCountries() {

	const countries = ref({})

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

	return { countries, getCountries }
}
