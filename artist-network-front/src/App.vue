<template>
    <transition appear name="fade">
    <div id="app">
        <transition name="fade" mode="out-in">
            <router-view/>
        </transition>
        </div>
    </transition>
</template>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

body {
    font-family: 'Montserrat', sans-serif;
}

body.background {
    background-color: #f2f2f2ff; 
}

body.image {
    margin:0;
    padding:0;
    background:  url("./assets/background.jpg") no-repeat center fixed; 
    -webkit-background-size: cover;
    background-size: cover;    
}

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.2s;
}

.fade-enter-to, .fade-leave {
    opacity: 1;
}

.fade-enter, .fade-leave-to {
    opacity: 0;
}

</style>
