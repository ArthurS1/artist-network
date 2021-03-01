<template>
    <div class="home">
        <b-navbar toggleable="lg" class="main_navbar">
            <img
                class="logo mr-3"
                alt="Vue logo"
                src="../assets/logo.artist.network.svg"
            />
            <b-navbar-brand class="d-none d-md-block">Artist-network</b-navbar-brand>
            <b-navbar-toggle target="toggle"></b-navbar-toggle>
            <b-collapse is-nav id="toggle">
                <b-navbar-nav class="ml-auto">
                    <b-button
                        pill
                        variant="primary"
                        type="submit"
                        class="mx-sm-2 my-sm-0 m-2"
                        @click="$router.push('/')"
                    >
                        Publier
                    </b-button>
                    <b-button
                        pill
                        variant="light"
                        type="button"
                        class="mx-sm-2 my-sm-0 m-2"
                        @click="$router.push('/')"
                        >Mon Compte</b-button
                    >
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: "Home",
    beforeCreate: function () {
        document.body.className = "background";
    },
};
</script>

<style lang="scss" scoped>

.logo {
    width: 4rem;
    height: auto;
}

@media (max-width: 1200px) {
    .logo {
        width: 3rem;
        height: auto;
    }
}

.main_navbar {
    background-color: white;
}
</style>