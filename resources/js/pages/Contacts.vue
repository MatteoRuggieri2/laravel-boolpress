<template>
    <section>
        <div class="container">

            <h1>Contattaci</h1>

            <form>

                <!-- Name and Lastname -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome e Cognome</label>
                    <input type="text" class="form-control" id="name">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>

                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Messaggio</label>
                    <textarea id="message" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary">Invia email</button>
            </form>

        </div>
    </section>
</template>

<script>
export default {
    name: 'Contacts'
}
</script>