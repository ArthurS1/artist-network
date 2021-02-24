<template>
    <form action="#" @submit.prevent="handleLogin">
            <input type="email" v-model="formData.email">
            <input type="password" v-model="formData.password">
            <button type="submit">Sign In</button>
    </form>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            formData: {
                email: '',
                password: '',
            }
        }
    },
    methods: {
        handleLogin() {
            this.axios.get('sanctum/csrf-cookie').then(() => {
                this.axios.post('login', this.formData).then(() => {
                    console.log('User signed in!');
                }).catch(error => console.log(error));
            });
        }
    }
}
</script>