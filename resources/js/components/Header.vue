<template>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">BOOLPRESS</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li v-for="(route, index) in pagesRoutes" :key="index" class="nav-item">
                        <router-link :to="{ name: route.name}" class="nav-link">{{ route.label }}</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

</template>

<script>
export default {
    name: 'Header',
    data: function() {
        return {
            pagesRoutes: [
                {
                    name: 'home',
                    label: 'Home'
                },
                {
                    name: 'about',
                    label: 'About'
                },
                {
                    name: 'blog',
                    label: 'Blog'
                }
            ]
        }
    }
}
</script>