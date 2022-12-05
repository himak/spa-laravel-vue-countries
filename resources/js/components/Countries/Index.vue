<template>
    <table class="table table-striped table-hover">
        <caption>List of Countries</caption>
        <thead>
            <tr>
                <th class="col-sm-1">Code</th>
                <th class="col-sm-3">Name</th>
                <th class="col-sm-5">Full name</th>
                <th class="col-sm-3">Continent</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(country) in countries.data" :key="country.code">
                <td>{{ country.code }}</td>
                <td>{{ country.name }}</td>
                <td>{{ country.full_name }}</td>
                <td>{{ country.continent }}</td>
            </tr>
        </tbody>
    </table>

    <Bootstrap5Pagination
        :data="countries"
        @pagination-change-page="getCountries"
    />
</template>

<script>
import { onMounted } from "vue";
import useCountries from "../../composables/countries";

export default {
    setup() {
        const { countries, getCountries } = useCountries()
        onMounted(getCountries)

        return { countries, getCountries }
    }
}
</script>

<style scoped>

</style>
