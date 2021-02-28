<template>
    <div class="d-flex flex-column mt-md-0 justify-content-center align-items-center min-vh-100 vw-100">
        <div class="form-container d-flex flex-column p-lg-5 p-2 m-2">
            <b-form @submit="console.log('test')">
                <div class="alert alert-warning" role="alert" v-if="connectionError">
                    {{errorMsg}}                  
                </div>
                <h1 class="title">Créer un compte</h1>
                <b-form-input type="text" placeholder="nom" class="my-3" v-model="form.password"></b-form-input>
                <b-form-input type="text" placeholder="pseudo" class="my-3" v-model="form.password"></b-form-input>
                <b-form-input type="email" placeholder="email" class="my-3" v-model="form.email"></b-form-input>
                <b-form-input type="password" placeholder="mot de passe" class="my-3" v-model="form.password"></b-form-input>
                <b-form-input type="password" placeholder="confirmer le mot de passe" class="my-3" v-model="form.password"></b-form-input>
                <b-form-checkbox value="me"><small>J'accepte les conditions générales d'utilisation.</small></b-form-checkbox>
                <b-form-checkbox value="that"><small>Je souhaite m'inscrire à la newletter et recevoir des informations promotionnelles et évenementielles.</small></b-form-checkbox>
                <div class="d-flex justify-content-around mt-5">
                    <b-button pill variant="light" type="submit" @click="$router.push('/login')">Déjà inscrit</b-button>
                    <b-button pill variant="primary" type="submit">Enregistrer</b-button>
                </div>
            </b-form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            form: {
                name: '',
                id: '',
                email: '',
                password: '',
            },
            error: false,
            errorMsg: '',
        }
    },
    methods: {
    }
}
</script>

<style lang="scss" scoped>

.form-container {
    background-color: white;
    border-radius: 0.5rem;
    width: 25%;
}

@media (max-width: 1200px) {
    .form-container {
        background-color: white;
        border-radius: 0.5rem;
        width: auto;
    }
}

.title {
    font-weight: 700;
    text-align: center;
}

</style>