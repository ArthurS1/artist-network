<template>
    <div
        class="d-flex flex-column mt-md-0 justify-content-center align-items-center min-vh-100 vw-100"
    >
        <div class="form-container d-flex flex-column p-lg-5 p-2 m-2">
            <b-form @submit="handleLogin">
                <div
                    class="alert alert-warning"
                    role="alert"
                    v-if="connectionError"
                >
                    {{ connectionErrorMsg }}
                </div>
                <h1 class="title">Connectez-vous</h1>
                <img
                    src="@/assets/logo.artist.network.svg"
                    class="mx-auto d-block my-5"
                />
                <b-form-input
                    type="email"
                    placeholder="email"
                    class="my-3"
                    v-model="form.email"
                ></b-form-input>
                <b-form-input
                    type="password"
                    placeholder="mot de passe"
                    class="my-3"
                    v-model="form.password"
                ></b-form-input>
                <div class="d-flex justify-content-around mt-5">
                    <b-button
                        pill
                        variant="light"
                        type="button"
                        @click="$router.push('/register')"
                        >Créer un compte</b-button
                    >
                    <b-button pill variant="primary" type="submit"
                        >Connexion</b-button
                    >
                </div>
            </b-form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    beforeCreate: function () {
        document.body.className = "image";
    },
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
            connectionError: false,
            connectionErrorMsg: "",
        };
    },
    methods: {
        showConnectionError() {
            this.connectionError = true;
            this.connectionErrorMsg =
                "Impossible de se connecter au serveur, veuillez réessayer ultérieurement.";
        },
        showLoginError() {
            this.connectionError = true;
            this.connectionErrorMsg =
                "Le mot de passe et l'email entrés ne correspondent à aucuns de nos utilisateurs. Revérifiez vos informations et réessayez.";
        },
        handleLogin(event) {
            this.connectionError = false;
            event.preventDefault();

            this.axios
                .post("login", this.form)
                .then((response) => {
                    if (response.data.authentication == "ko")
                        this.showLoginError();
                    else if (response.data.authentication == "ok")   
                        this.$store.commit('switchState');
                        this.$router.push("/");
                })
                .catch(this.showConnectionError);
        },
    },
};
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
</style>