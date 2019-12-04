<template>
    <div>

        <user-nav-bar-component></user-nav-bar-component>

        <div class="wrapper wrapper-content  animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Edição - {{ form.name }}</h5>
                        </div>
                        <div class="ibox-content">

                            <div class="form-group col-6">
                                <label for="name">NAME</label>
                                <input type="text" v-model="form.name" class="form-control">
                            </div>

                            <div class="form-group col-6">
                                <label for="email">EMAIL</label>
                                <input type="text" v-model="form.email" class="form-control">
                            </div>

                            <div class="form-group col-6">
                                <label for="password">PASSWORD</label>
                                <input type="text" v-model="form.password" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                    <button class="btn btn-primary" type="button" @click.prevent="save">
                                        <i class="fa fa-check"></i> Salvar
                                    </button>
                                    <router-link class="btn btn-white" to="/">
                                        <i class="fa fa-times-circle"></i> Cancelar
                                    </router-link>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UserNavBarComponent from "./UserNavBarComponent";

    export default {
        name: "UserFormComponent",
        components: {UserNavBarComponent},
        data() {
            return {
                form: {},
                errors: {},
            }
        },
        methods: {
            save() {

                this.errors = {};
                axios.post("/api/users", this.form).then(response => {
                    //window.location.href = this.target
                    this.$router.push({name: 'users'});
                }).catch(error => {

                    console.log(error);
                });
            }

        }
    }
</script>

<style scoped>

</style>
