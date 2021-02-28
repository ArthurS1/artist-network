<template>
    <div class="d-flex flex-column mt-md-0 justify-content-center align-items-center min-vh-100 vw-100">
        <div class="form-container d-flex flex-column p-lg-5 p-2 m-2">
            <b-form>
                <div class="alert alert-warning" role="alert" v-if="error">
                    {{errorMsg}}                  
                </div>
                <h1 class="title">Créer un compte</h1>
                <b-form-input type="text" placeholder="nom" class="my-3" v-model="form.name" :class="{'is-valid': legalName}"></b-form-input>
                <b-form-input type="text" placeholder="pseudo" class="my-3" v-model="form.id" :class="{'is-valid': legalId}"></b-form-input>
                <b-form-input type="email" placeholder="email" class="my-3" v-model="form.email" :class="{'is-valid': legalEmail}"></b-form-input>
                <b-form-input type="password" placeholder="mot de passe" class="my-3" :class="{'is-valid': samePassword}" v-model="form.password"></b-form-input>
                <b-form-input type="password" placeholder="confirmer le mot de passe" class="my-3" :class="{'is-valid': samePassword}" v-model="passwordConfirmation"></b-form-input>
                <b-form-checkbox-group v-model="form.checkboxes">
                    <b-form-checkbox value="cgu"><small>J'accepte les conditions générales d'utilisation.</small></b-form-checkbox>
                    <b-form-checkbox value="promotion"><small>Je souhaite m'inscrire à la newletter et recevoir des informations promotionnelles et évenementielles.</small></b-form-checkbox>
                </b-form-checkbox-group>
                <div class="d-flex justify-content-around mt-5">
                    <b-button pill variant="light" type="button" @click="$router.push('/login')">Déjà inscrit</b-button>
                    <b-button pill variant="primary" type="button" :disabled="!canRegister" @click="handleRegister">Enregistrer</b-button>
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
                checkboxes: [],
            },
            passwordConfirmation: '',
            error: false,
            errorMsg: '',
        }
    },
    computed: {
        legalId: function() {
            return this.form.id != '';
        },
        legalName: function() {
            return this.form.name != '';
        },
        legalEmail: function() {
            const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.+[a-zA-Z0-9-]+)$/;
            return re.test(this.form.email);
        },
        samePassword: function() {
            return this.form.password == this.passwordConfirmation && this.form.password != '';
        },
        canRegister: function() {
            return this.legalId && this.legalName && this.legalEmail && this.samePassword && this.form.checkboxes.find((element) => element == 'cgu');
        }
    },
    methods: {
        handleRegister() {
            this.axios.post('register', this.form).then((response) =>{
                console.log(response);
            });
        }
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