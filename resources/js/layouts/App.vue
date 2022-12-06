<template>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <router-link to="/" class="navbar-brand">SPA</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/" active-class="nav-link active" class="nav-link">
                            Countries
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/countries/create" active-class="nav-link active" class="nav-link">
                            Create country
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-primary py-4 px-2">
        <div class="container">
            <h2 class="display-5 text-white mb-0">{{ currentPageTitle }}</h2>
        </div>
    </header>

    <router-view></router-view>
</template>

<script>
export default {
    computed: {
        currentPageTitle() {
            return this.$route.meta.title
        }
    }
}
</script>
