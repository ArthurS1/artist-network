<template>
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 vw-100">
        <div class="container d-flex flex-column p-lg-5 p-2 m-2">
            <b-form @submit="handleLogin">
                <h1 class="title">Connectez-vous</h1>
                <img src="@/assets/logo.artist.network.svg" class="mx-auto d-block my-5">
                <b-form-input type="email" placeholder="email" class="my-3" v-model="form.email"></b-form-input>
                <b-form-input type="password" placeholder="mot de passe" class="my-3" v-model="form.password"></b-form-input>
                <div class="d-flex justify-content-center mt-5">
                    <b-button pill variant="primary" type="submit">Connexion</b-button>
                </div>
            </b-form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            form: {
                email: '',
                password: '',
            }
        }
    },
    methods: {
        handleLogin(event) {
            event.preventDefault()
            this.axios.get('sanctum/csrf-cookie').then(() => {
                this.axios.post('login', this.from).then(() => {
                    console.log('User signed in!');
                }).catch(error => console.log(error));
            });
        }
    }
}
</script>

<style scoped>

.title{
    font-weight: 700;
    text-align: center;
}

.container {
    background-color: white;
    border-radius: 0.5rem;
    width: 25%;
}


</style>