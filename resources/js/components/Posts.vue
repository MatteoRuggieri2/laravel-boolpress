<template>
    <section>
        <div class="container">

            <!-- Posts List -->
            <h1 class="mt-5 mb-4">Lista dei post</h1>
            <div class="row row-cols-3">

                <!-- Single Post -->
                <div v-for="post in posts" :key="post.id" class="col">
                    
                    <div class="card mb-4">
                        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                        <div class="card-body">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text">{{ post.content }}</p>
                        </div>
                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                        </ul> -->
                        <div class="card-body">
                            <a href="#" class="card-link">Vai al post</a>
                            <!-- <a href="#" class="card-link">Another link</a> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
export default {
    name:'Posts',
    data: function() {
        return {
            posts: [],
        };
    },
    methods: {
        getPosts: function() {
            axios.get('http://127.0.0.1:8000/api/posts')
            .then((response) => {
                this.posts = response.data.results;
            });
        }
    },
    created: function() {
        this.getPosts();
    }
}
</script>