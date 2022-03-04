<template>
    <section>

        <div class="container">
        
            <!-- Title -->
            <h1>{{ post.title }}</h1>

            <!-- Category -->
            <h3 v-if="post.category">Categoria: {{ post.category.name }}</h3>
            
            <!-- Tag badges -->
            <h5 v-if="post.tags && post.tags.length > 0">
                <span>Tags: </span>
                <a v-for="tag in post.tags" :key="tag.id" href="#" class="badge rounded-pill bg-light text-dark">{{ tag.name }}</a>
            </h5>

            <!-- Content -->
            <p>{{ post.content }}</p>

        </div>

    </section>
</template>

<script>

export default {
    name: 'PostDetails',
    data: function() {
        return {
            post: {}
        };
    },
    methods: {

        // Questa funzione ha il compito di effettuare una chiamata API
        // al caricamento della pagina per prendere il singolo post e i relativi dati.
        // Per funzionare prende automaticamente da '$route' lo slug della pagina corrente.
        getPost() {
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success) {
                    this.post = response.data.results;
                } else {
                    this.$router.push({ name: 'not-found' })
                }
            });
        },
    },
    created: function() {
        this.getPost();
    }
}
</script>