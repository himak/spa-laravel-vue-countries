<template>
    <div class="container mt-4">
        <div class="col-sm-4">
            <form @submit.prevent="storeCountry(country)" class="row g-3 _needs-validation">
                <div class="col-4">
                    <label for="code" class="form-label">Code</label>
                    <input v-model="country.code"
                           :class="{ 'is-invalid': validationErrors?.code }"
                           type="text" class="form-control" id="code" name="code" placeholder="e.g. AB" _required>
                    <div v-for="message in validationErrors?.code" class="invalid-feedback">
                        {{ message }}
                    </div>
                </div>
                <div class="col-8">
                    <label for="name" class="form-label">Name</label>
                    <input v-model="country.name"
                           :class="{ 'is-invalid': validationErrors?.name }"
                           type="text" class="form-control" id="name" name="name" placeholder="e.g. Slovakia" _required>
                    <div v-for="message in validationErrors?.name" class="invalid-feedback">
                        {{ message }}
                    </div>
                </div>
                <div class="col-12">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input v-model="country.full_name"
                           :class="{ 'is-invalid': validationErrors?.full_name }"
                           type="text" class="form-control" id="full_name" name="full_name" placeholder="e.g. Slovak republic" _required>
                    <div v-for="message in validationErrors?.full_name" class="invalid-feedback">
                        {{ message }}
                    </div>
                </div>
                <div class="col-6">
                    <label for="iso3" class="form-label">ISO 3</label>
                    <input v-model="country.iso3"
                           :class="{ 'is-invalid': validationErrors?.iso3 }"
                           type="text" class="form-control" id="iso3" name="iso3" placeholder="e.g. SVK" _required>
                    <div v-for="message in validationErrors?.iso3" class="invalid-feedback">
                        {{ message }}
                    </div>
                </div>
                <div class="col-6">
                    <label for="number" class="form-label">Number</label>
                    <input v-model="country.number"
                           :class="{ 'is-invalid': validationErrors?.number }"
                           type="text" class="form-control" id="number" name="number" _required>
                    <div v-for="message in validationErrors?.number" class="invalid-feedback">
                        {{ message }}
                    </div>
                </div>
                <div class="col-12">
                    <label for="continent_code" class="form-label">Continent</label>
                    <select v-model="country.continent_code"
                            :class="{ 'is-invalid': validationErrors?.continent_code }"
                            id="continent_code" name="continent_code" class="form-select" _required>
                        <option value="" selected>-- Filter by Continent --</option>
                        <option v-for="continent in continents" :value="continent.code">
                            {{ continent.name }}
                        </option>
                    </select>
                    <div v-for="message in validationErrors?.continent_code" class="invalid-feedback">
                        {{ message }}
                    </div>
                </div>
                <div class="col-4">
                    <label for="display_order" class="form-label">Display Order</label>
                    <input v-model.number="country.display_order"
                           :class="{ 'is-invalid': validationErrors?.display_order }"
                           type="number" class="form-control" id="display_order" name="display_order" min="1" max="900" step="1" _required>
                    <div v-for="message in validationErrors?.display_order" class="invalid-feedback">
                        {{ message }}
                    </div>
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
        const { storeCountry, validationErrors } = useCountries()

        onMounted( () => {
            getContinents()
        })

        return { continents, country, validationErrors, storeCountry }
    },
}
</script>

