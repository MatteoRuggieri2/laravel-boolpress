<template>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">BOOLPRESS</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <router-link :to="{ name: 'home'}" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'about'}" class="nav-link">Chi Siamo</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'blog'}" class="nav-link">Blog</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

</template>

<script>
export default {
    name: 'Header'
}
</script>