<template>
    <div class="container mt-4">
        <div class="col-sm-4">
            <form @submit.prevent="storeCountry(country)" class="row g-3">
                <div class="col-4">
                    <label for="code" class="form-label">Code</label>
                    <input v-model="country.code" type="text" class="form-control" id="code" name="code" placeholder="e.g. AB">
                </div>
                <div class="col-8">
                    <label for="name" class="form-label">Name</label>
                    <input v-model="country.name" type="text" class="form-control" id="name" name="name" placeholder="e.g. Slovakia">
                </div>
                <div class="col-12">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input v-model="country.full_name" type="text" class="form-control" id="full_name" name="full_name" placeholder="e.g. Slovak republic">
                </div>
                <div class="col-6">
                    <label for="iso3" class="form-label">ISO 3</label>
                    <input v-model="country.iso3" type="text" class="form-control" id="iso3" name="iso3" placeholder="e.g. SVK">
                </div>
                <div class="col-6">
                    <label for="number" class="form-label">Number</label>
                    <input v-model="country.number" type="text" class="form-control" id="number" name="number">
                </div>
                <div class="col-12">
                    <label for="continent_code" class="form-label">Continent</label>
                    <select v-model="country.continent_code" id="continent_code" name="continent_code" class="form-select">
                        <option value="" selected>-- Filter by Continent --</option>
                        <option v-for="continent in continents" :value="continent.code">
                            {{ continent.name }}
                        </option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="display_order" class="form-label">Display Order</label>
                    <input v-model.number="country.display_order" type="number" class="form-control" id="display_order" name="display_order">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import {onMounted, reactive} from "vue";
import useContinents from "../../composables/continents";
import useCountries from "../../composables/countries";

export default {
    setup() {
        const country = reactive({
            code: '',
            name: '',
            full_name: '',
            iso3: '',
            number: '',
            continent_code: '',
            display_order: ''
        })

        const { continents, getContinents } = useContinents()
        const { storeCountry } = useCountries()

        onMounted( () => {
            getContinents()
        })

        return { continents, country, storeCountry }
    },
}
</script>

