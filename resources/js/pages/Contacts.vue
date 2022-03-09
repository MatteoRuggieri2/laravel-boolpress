<template>
    <section>
        <div class="container">

            <h1>Contattaci</h1>

            <form>

                <!-- Form Sending Confirmation Message -->
                <span v-if="success" class="text-success">Il form è stato inviato con successo!</span>

                <!-- Name and Lastname -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome e Cognome</label>
                    <input v-model="name" type="text" class="form-control" id="name">

                    <!-- Error Message -->
                    <div v-if="errors.name" class="text-danger">
                        <div v-for="(error, index) in errors.name" :key="index" class="text-danger">{{ error }}</div>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input v-model="email" type="email" class="form-control" id="email">

                    <!-- Error Message -->
                    <div v-if="errors.email" class="text-danger">
                        <div v-for="(error, index) in errors.email" :key="index" class="text-danger">{{ error }}</div>
                    </div>
                </div>

                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Messaggio</label>
                    <textarea v-model="message" id="message" class="form-control" cols="30" rows="10"></textarea>

                    <!-- Error Message -->
                    <div v-if="errors.message" class="text-danger">
                        <div v-for="(error, index) in errors.message" :key="index" class="text-danger">{{ error }}</div>
                    </div>
                </div>

                <!-- Submit -->
                <button :disabled="disabled" type="submit" @click.prevent="sendMessage()" class="btn btn-primary">Invia email</button>
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
            message: '',
            success: false,
            errors: {},
            disabled: false
        }
    },
    methods: {
        sendMessage: function() {

            // Quando invio la mail disabilito il bottone per 
            // evitare spam e quindi l'invio di più email uguali.
            // quando sarà inviata correttaminte il bottone tornerà cliccabile.
            this.disabled = true;
            axios.post('/api/leads/store', {
                name: this.name,
                email: this.email,
                message: this.message
            })
            .then((response) => {
                
                // Se il form viene inviato correttamente, svuoto tutti
                // i campi, altrimenti mostro i messaggi di errore
                if(response.data.success) {
                    this.name = '',
                    this.email = '',
                    this.message = '',
                    this.success = true
                    this.errors = {}
                } else {
                    this.success = false,
                    this.errors = response.data.errors
                }

                // Quando ho terminato l'invio della email, il bottone torna cliccabile
                this.disabled = false;

            });
        }
    }
}
</script>