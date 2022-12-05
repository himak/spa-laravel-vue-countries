import { ref } from 'vue'

export default function useContinents() {

	const continents = ref({})

	const getContinents = async () => {

		axios.get('/api/continents')
				.then(response => {
						continents.value = response.data.data;
				})
	}

	return { continents, getContinents }
}
