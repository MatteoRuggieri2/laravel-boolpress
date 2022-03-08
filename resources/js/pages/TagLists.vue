<template>
    <section>
        <div class="container">

            <!-- Tag List -->
            <ul class="list-group">

                <!-- Single Tag -->
                <li v-for="tag in tags" :key="tag.id" class="list-group-item d-flex justify-content-between align-items-center">
                    <router-link :to="{ name: 'tag-details', params: { slug: tag.slug } }">{{ tag.name }}</router-link>
                    <span class="badge badge-primary badge-pill">{{ tag.related_posts_number }}</span>
                </li>

            </ul>

        </div>
    </section>
</template>

<script>
export default {
    name: 'TagLists',
    data: function() {
        return {
            tags: []
        }
    },
    methods: {
        getTags() {
            axios.get('/api/tags')
            .then((response) => {
                
                if (response.data.success) {
                    this.tags = response.data.results;
                } else {
                    this.$router.push({ name: 'not-found' })
                }

            });
        }
    },
    created: function() {
        this.getTags();
    }
}
</script>