<template>
    <div class="container mt-4">
        <div class="col-sm-4">
            <table class="table">
                <caption>Detail of Country</caption>
                <thead>
                <tr>
                    <th class="text-uppercase">Atribute</th>
                    <th class="text-uppercase">Value</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Code</td>
                        <td><strong>{{ country.code }}</strong></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><strong>{{ country.name }}</strong></td>
                    </tr>
                    <tr>
                        <td>Full name</td>
                        <td><strong>{{ country.full_name }}</strong></td>
                    </tr>
                    <tr>
                        <td>Continent</td>
                        <td><strong>{{ country.continent }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            country: {}
        }
    },
    created() {
        axios.get('/api/countries/' + this.$route.params.country_id)
            .then(response => {
                this.country = response.data.data;
            })
    }
}
</script>
