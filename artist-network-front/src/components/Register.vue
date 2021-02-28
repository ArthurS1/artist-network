<template>
    <div class="d-flex flex-column mt-5 mt-md-0 justify-content-center align-items-center vh-100 vw-100">
        <div class="container d-flex flex-column p-lg-5 p-2 m-2">
            <b-form @submit="console.log('test')">
                <div class="alert alert-warning" role="alert" v-if="connectionError">
                    {{errorMsg}}                  
                </div>
                <h1 class="title">Créer un compte</h1>
                <b-form-input type="email" placeholder="email" class="my-3" v-model="form.email"></b-form-input>
                <b-form-input type="password" placeholder="mot de passe" class="my-3" v-model="form.password"></b-form-input>
                <div class="d-flex justify-content-center mt-5">
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

.container {
    background-color: white;
    border-radius: 0.5rem;
    width: 25%;
}

@media (max-width: 767.98px) {
    .container {
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