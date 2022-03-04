<template>
    <div class="container">
        <h1>{{ post.title }}</h1>
        <h3 v-if="post.category">Categoria: {{ post.category.name }}</h3>
        <h5 v-if="post.tags.length > 0">
            <span>Tags: </span>
            <a v-for="tag in post.tags" :key="tag.id" href="#" class="badge rounded-pill bg-light text-dark">{{ tag.name }}</a>
        </h5>
        <p>{{ post.content }}</p>
    </div>
</template>

<script>

export default {
    name: 'PostDetails',
    data: function() {
        return {
            post: false
        };
    },
    methods: {
        getPost() {
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                this.post = response.data.results;
            });
        },
    },
    created: function() {
        this.getPost();
    }
}
</script>