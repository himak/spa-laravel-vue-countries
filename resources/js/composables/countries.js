import { ref } from 'vue'

export default function useCountries() {

	const countries = ref({})

	const getCountries = async (page = 1) => {

		axios.get('/api/countries?page=' + page)
			   .then(response => {
						countries.value = response.data;
				})
	}

	return { countries, getCountries }
}
