<template>
    <div class="home">
        <b-navbar :sticky="true" toggleable="lg" class="main_navbar">
            <img
                class="logo mr-3"
                alt="Vue logo"
                src="../assets/logo.artist.network.svg"
            />
            <b-navbar-brand class="d-none d-md-block"
                >Artist-network</b-navbar-brand
            >
            <b-navbar-toggle target="toggle"></b-navbar-toggle>
            <b-collapse is-nav id="toggle">
                <b-navbar-nav class="ml-auto">
                    <b-button
                        pill
                        variant="primary"
                        type="submit"
                        class="mx-sm-2 my-sm-0 m-2"
                        @click="showPublish = !showPublish"
                    >
                        Publier
                    </b-button>
                    <b-button
                        pill
                        variant="light"
                        type="button"
                        class="mx-sm-2 my-sm-0 m-2"
                        @click="showAccount = !showAccount"
                        >Mon Compte</b-button
                    >
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <b-modal v-model="showAccount" :hide-footer="true" :hide-header="true">
            <h3 class="title">Mon Compte</h3>
            <div class="d-flex flex-column mt-5">
                <b-button pill variant="warning m-2" @click="handleLogout"
                    >Logout</b-button
                >
                <b-button pill variant="danger m-2" @click="handleDelete"
                    >Delete account</b-button
                >
            </div>
        </b-modal>
        <b-modal v-model="showPublish" :hide-footer="true" :hide-header="true">
            <h3 class="title">Publier</h3>
            <p class="text-center w-100 mt-5">aucune image sélectionnée</p>
            <div class="d-flex flex-column mt-2">
                <b-button pill variant="light m-2"
                    >Sélectionner une image</b-button
                >
                <b-button pill variant="primary m-2" :disabled="true"
                    >Publier</b-button
                >
            </div>
        </b-modal>
        <div class="d-flex flex-column align-items-center">
            <div class="form-container d-flex flex-column p-lg-3 p-2 m-2">
                <div class="">
                    <div class="d-flex justify-content-between">
                        <p>ArthurS</p>
                        <p>02/03/21 22:11</p>
                    </div>
                    <h3>Titre.</h3>
                    <div class="d-flex flex-column align-content-center">
                        <b-img
                            rounded
                            class="my-2"
                            src="https://picsum.photos/250/250/?image=54"
                        ></b-img>
                    </div>
                    <div class="d-flex align-content-center">
                        <div class="mr-2">
                            <b-icon-suit-heart-fill
                                class="mr-2"
                                variant="danger"
                            ></b-icon-suit-heart-fill>
                            <small>20</small>
                        </div>
                        <div>
                            <b-icon-binoculars
                                class="mr-2"
                                variant="primary"
                            ></b-icon-binoculars>
                            <small>20</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-container d-flex flex-column p-lg-3 p-2 m-2">
                <div class="">
                    <div class="d-flex justify-content-between">
                        <p>ArthurS</p>
                        <p>02/03/21 22:11</p>
                    </div>
                    <h3>Titre.</h3>
                    <div class="d-flex flex-column align-content-center">
                        <b-img
                            rounded
                            class="my-2"
                            src="https://picsum.photos/250/250/?image=54"
                        ></b-img>
                    </div>
                    <div class="d-flex align-content-center">
                        <div class="mr-2">
                            <b-icon-suit-heart-fill
                                class="mr-2"
                                variant="danger"
                            ></b-icon-suit-heart-fill>
                            <small>20</small>
                        </div>
                        <div>
                            <b-icon-binoculars
                                class="mr-2"
                                variant="primary"
                            ></b-icon-binoculars>
                            <small>20</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",
    beforeCreate: function () {
        document.body.className = "background";
    },
    data() {
        return {
            showAccount: false,
            showPublish: false,
        };
    },
    methods: {
        handleLogout() {
            this.axios.get("logout").then((response) => {
                if (response.data.logout == "ok") this.$router.push("/login");
            });
        },
        handleDelete() {},
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

.form-container {
    background-color: white;
    border-radius: 0.5rem;
    width: 35%;
}

@media (max-width: 1500px) {
    .form-container {
        background-color: white;
        border-radius: 0.5rem;
        width: 95%;
    }
}
</style>