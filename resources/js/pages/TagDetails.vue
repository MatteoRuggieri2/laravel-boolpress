<template>
    <section>

        <div class="container">
            <h1>Tag: {{ tag.name }}</h1>

            <div class="row row-cols-3">
                <!-- Single Post -->
                <div v-for="post in tag.posts" :key="post.id" class="col">
                        
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
                            <!-- <a href="#" class="card-link">Vai al post</a> -->
                            <router-link :to="{ name: 'post-details', params: { slug: post.slug } }" class="card-link">Vai al post</router-link>
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
    name: 'TagDetails',
    data: function(){ 
        return {
            tag: {}
        }
    },
    methods: {
        getTag() {
            axios.get('/api/tags/' + this.$route.params.slug)
            .then((response) => {
                
                if(response.data.success) {
                    this.tag = response.data.results;
                } else {
                    this.$router.push({ name: 'not-found' });
                }

            });
        }
    },
    created: function() {
        this.getTag();
    }
}
</script>