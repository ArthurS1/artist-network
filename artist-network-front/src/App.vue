<template>
    <login />
</template>

<script>
import Login from "./components/Login.vue";

export default {
    name: "App",
    components: {
        Login,
    },
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

body {
    font-family: 'Montserrat', sans-serif;
    margin:0;
    padding:0;
    background: url("./assets/background.jpg") no-repeat center fixed; 
    -webkit-background-size: cover;
    background-size: cover;
}
</style>
