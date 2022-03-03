<template>
    <div class="container">
        <h1>ERRORE 404</h1>
        <h2>Non abbiamo trovato ciò che cercavi.<router-link :to="{ name: 'home'}" class="nav-link d-inline-block">Ritorna alla Home</router-link></h2>
    </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>