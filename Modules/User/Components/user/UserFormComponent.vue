<template>
    <div>

        <user-nav-bar-component></user-nav-bar-component>

        <div class="wrapper wrapper-content  animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <!--<div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                        </div>-->
                        <bootstrap-alert-component
                            v-bind:text="alertText"
                            v-bind:show="alertShow"
                            v-bind:css-class="alertClass">
                        </bootstrap-alert-component>
                        <div class="ibox-title">
                            <h5>Edição - {{ form.name }} {{ alertShow }}</h5>
                        </div>
                        <div class="ibox-content">

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="name">NAME</label>
                                    <input type="text" v-model="form.name" class="form-control">
                                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="email">EMAIL</label>
                                    <input type="text" v-model="form.email" class="form-control">
                                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="password">PASSWORD</label>
                                    <input type="text" v-model="form.password" class="form-control">
                                    <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
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
    </div>
</template>

<script>
    import UserNavBarComponent from "./UserNavBarComponent";
    import BootstrapAlertComponent from "../../../../resources/js/components/layout/bootstrap/BootstrapAlertComponent";

    export default {
        name: "UserFormComponent",
        components: {BootstrapAlertComponent, UserNavBarComponent},
        data() {
            return {
                showDismissibleAlert: true,
                form: {},
                errors: {},
                alertShow: false,
                alertClass: 'warning',
                alertText: '',
            }
        },
        methods: {
            save() {
                this.$loading(true);

                this.errors = {};

                axios.post("/api/users", this.form)
                    .then(response => {
                        this.$router.push({name: 'users'});
                    })
                    .catch(error => {

                        this.alertShow = true;

                        if (_.has(error, 'response.data.errors')) {

                            this.alertText = 'Verifique os erros abaixo:';
                            this.errors = error.response.data.errors;
                        } else {

                            this.alertText = '[' + error.response.status + '] Não foi possível realizar essa operação!';
                        }

                        console.log(error.response.status);
                        console.log(error.response.data);
                    })
                    .then(() => {

                        this.$loading(false);
                        let app = this;
                        setTimeout(function () {
                            app.alertShow = false;
                        }, 8000);
                    });
                //https://codesandbox.io/s/1y2loo164j
                /*.then(response => response.data, error => {
                    console.log('error A');
                    console.log(error);
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                })
                .then(data => {
                    console.log('Then 02');
                    console.log(data);
                    //this.$router.push({name: 'users'});
                }, error => {
                    console.log('error B');
                    console.log(error);
                })
                .then(() => {
                    console.log('Then 03');
                    this.$loading(false);
                });*/
            }
        }
    }
</script>

<style scoped>

</style>
