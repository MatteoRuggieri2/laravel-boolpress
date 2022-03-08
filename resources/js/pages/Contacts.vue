<template>
    <section>
        <div class="container">

            <h1>Contattaci</h1>

            <form>

                <!-- Name and Lastname -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome e Cognome</label>
                    <input v-model="name" type="text" class="form-control" id="name">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input v-model="email" type="email" class="form-control" id="email">
                </div>

                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Messaggio</label>
                    <textarea v-model="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit" @click.prevent="sendMessage()" class="btn btn-primary">Invia email</button>
            </form>

        </div>
    </section>
</template>

<script>
export default {
    name: 'Contacts',
    data: function() {
        return {
            name: '',
            email: '',
            message: ''
        }
    },
    methods: {
        sendMessage: function() {
            axios.post('/api/leads/store', {
                name: this.name,
                email: this.email,
                message: this.message
            })
            .then((response) => {

            });
        }
    }
}
</script>