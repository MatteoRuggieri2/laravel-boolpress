<template>
    <div class="container">
        <h1>{{ post.title }}</h1>
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