<template>
    <table class="table table-striped table-hover">
        <caption>List of Countries</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Full name</th>
                <th>Continent</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="country in countries">
                <td>{{ }}</td>
                <td>{{ country.code }}</td>
                <td>{{ country.name }}</td>
                <td>{{ country.full_name }}</td>
                <td>{{ country.continent.name }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            countries: []
        }
    },
    mounted() {
        this.fetchCountries()
    },
    methods: {
        fetchCountries() {
            axios.get('/api/countries')
                .then(response => this.countries = response.data.data)
                .catch(error => console.log(error))
        }
    }
}
</script>

<style scoped>

</style>
