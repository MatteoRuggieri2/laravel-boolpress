<template>
    <section>
        <div class="container">

            <!-- Posts List -->
            <h1 class="mt-5 mb-4">Lista dei post</h1>
            <div class="row row-cols-3">

                <!-- Single Post -->
                <div v-for="post in posts" :key="post.id" class="col">
                    
                    <div class="card mb-4">
                        <img v-if="post.cover" class="card-img-top" :src="post.cover" :alt="post.title">
                        <div class="card-body">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text">{{ stringTroncate(post.content, 110) }}</p>
                        </div>
                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                        </ul> -->
                        <div class="card-body">
                            <!-- <a href="#" class="card-link">Vai al post</a> -->
                            <router-link :to="{ name: 'post-details', params: { slug: post.slug } }" class="card-link">Vai al post</router-link>
                            <!-- <a href="#" class="card-link">Another link</a> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination">

                    <li class="page-item" :class="{ 'disabled' : currentPage == 1 }">
                        <button @click="getPosts(currentPage - 1)" class="page-link">Previous</button>
                    </li>

                    <li v-for="n in lastPage" :key="n" class="page-item" :class="{ 'active' : currentPage == n }">
                        <button @click="getPosts(n)" class="page-link">{{ n }}</button>
                    </li>

                    <li class="page-item" :class="{ 'disabled': currentPage == lastPage }">
                        <button @click="getPosts(currentPage + 1)" class="page-link">Next</button>
                    </li>

                </ul>
            </nav>

        </div>
    </section>
</template>

<script>
export default {
    name:'Posts',
    data: function() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: null
        };
    },
    methods: {

        /*
        Questa funzione effettua una chiamata API e prende i post derivanti dal database
        */
        getPosts: function(pageNumber) {
            axios.get('/api/posts', {
                params: {
                    page: pageNumber
                }
            })
            .then((response) => {
                this.posts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            });
        },

        /*
        Questa funzione serve a tagliare una stringa dopo un numero di caratteri.
        arguments:  string-> La stringa da controllare
                    stringLength-> La lunghezza desiderata della stringa finale.
        */
        stringTroncate: function(string, stringLength) {

            if (string.length > stringLength) {
                return string.slice(0, stringLength) + '...';
            }

            return string;
        }
    },
    created: function() {
        this.getPosts(1);
    }
}
</script>