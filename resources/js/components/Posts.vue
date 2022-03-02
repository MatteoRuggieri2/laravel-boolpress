<template>
    <section>
        <h1>Lista dei post</h1>
    </section>
</template>

<script>
export default {
    name:'Posts',
    data: function() {
        return {
            posts: [],
        }
    },
    methods: {
        getPosts() {
            axios.get('http://127.0.0.1:8000/api/posts')
            .then(function(response) {
                // this.posts = response;
                console.log(response);
            });
        }
    },
    create: {
        getPosts();
    }
}
</script>