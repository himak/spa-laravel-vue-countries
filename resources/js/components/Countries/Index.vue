<template>
    <table class="table table-striped table-hover">
        <caption>List of Countries</caption>
        <thead>
            <tr>
                <th class="col-sm-1">
                    <a class="d-flex text-decoration-none text-black" @click="updateOrdering('code')">
                        <div :class="{ 'text-primary': orderColumn === 'code' }">Code</div>
                        <div class="ms-2">
                            <span :class="{
                                'visually-hidden': orderDirection === 'asc' && orderColumn === 'code',
                                'text-primary': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'code',
                            }">&uarr;</span>
                                <span :class="{
                                'visually-hidden': orderDirection === 'desc' && orderColumn === 'code',
                                'text-primary': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'code',
                            }">&darr;</span>
                        </div>
                    </a>
                </th>
                <th class="col-sm-3">
                    <a class="d-flex text-decoration-none text-black" @click="updateOrdering('name')" >
                        <div :class="{ 'text-primary': orderColumn === 'name' }">Name</div>
                        <div class="ms-2">
                            <span :class="{
                                'visually-hidden': orderDirection === 'asc' && orderColumn === 'name',
                                'text-primary': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'name',
                            }">&uarr;</span>
                            <span :class="{
                                'visually-hidden': orderDirection === 'desc' && orderColumn === 'name',
                                'text-primary': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'name',
                            }">&darr;</span>
                        </div>
                    </a>
                </th>
                <th class="col-sm-5">Full name</th>
                <th class="col-sm-3">
                    <label for="continent"></label>
                    <select v-model="selectedContinent" id="continent" name="continent" class="form-select mb-3">
                        <option value="" selected>-- Filter by Continent --</option>
                        <option v-for="continent in continents" :value="continent.code">
                            {{ continent.name }}
                        </option>
                    </select>

                    Continent
                </th>
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
        @pagination-change-page="page => getCountries(page, selectedContinent, orderColumn, orderDirection)"
    />
</template>

<script>
import {ref, onMounted, watch} from "vue";
import useCountries from "../../composables/countries";
import useContinents from "../../composables/continents";

export default {
    setup() {
        const selectedContinent = ref('')
        const orderColumn = ref('name')
        const orderDirection = ref('asc')
        const { countries, getCountries } = useCountries()
        const { continents, getContinents } = useContinents()
        onMounted( () => {
            getCountries()
            getContinents()
        })

        watch(selectedContinent, (current, previous) => {
            getCountries(1, current)
        })

        const updateOrdering = (column) => {
            orderColumn.value = column;
            orderDirection.value = (orderDirection.value === 'desc') ? 'asc' : 'desc';
            getCountries(1, selectedContinent.value, orderColumn.value, orderDirection.value);
        }

        return { countries, getCountries, continents, selectedContinent, orderColumn, orderDirection, updateOrdering }
    }
}
</script>

<style scoped>

</style>
