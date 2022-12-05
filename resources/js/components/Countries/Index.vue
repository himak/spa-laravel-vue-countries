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
            <tr v-for="(country, index) in countries" :key=index>
                <td>{{ index+1 }}</td>
                <td>{{ country.code }}</td>
                <td>{{ country.name }}</td>
                <td>{{ country.full_name }}</td>
                <td>{{ country.continent }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { onMounted } from "vue";
import useCountries from "../../composables/countries";

export default {
    setup() {
        const { countries, getCountries } = useCountries()
        onMounted(getCountries)

        return { countries }
    }
}
</script>

<style scoped>

</style>
