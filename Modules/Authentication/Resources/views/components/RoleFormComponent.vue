<template>
    <div>

        <role-nav-bar-component></role-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">

                        <div class="ibox-title">
                            <h5>{{ isCreateMode ? 'Cadastro' : 'Edição' }}</h5>
                        </div>
                        <div class="ibox-content">


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Nome</label>
                                    <input type="text" v-model="form.name" class="form-control">
                                    <form-error-component v-if="errors.name" :errors="errors">
                                        {{ errors.name[0] }}
                                    </form-error-component>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-12">

                                    <div class="btn-group">
                                        <button class="btn btn-primary" type="button" @click.prevent="save">
                                            <i class="fa fa-check"></i> Salvar e voltar
                                        </button>
                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:" v-on:click="saveAndNew">
                                                Salvar e adicionar novo
                                            </a>
                                        </div>
                                    </div>
                                    <router-link class="btn btn-white" :to="{ name: 'roles.list' }">
                                        <i class="fa fa-ban"></i> Cancelar
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
    import RoleNavBarComponent from "./RoleNavBarComponent";
    import FormErrorComponent from "../../../../../resources/js/components/layout/bootstrap/FormErrorComponent";

    export default {
        name: "RoleFormComponent",
        components: {FormErrorComponent, RoleNavBarComponent},
        data() {
            return {
                routeToSave: "/api/roles",
                routeNameToRedirect: "roles.list",
                method: 'post',
                form: {},
                errors: {},
                isCreateMode: true,
            }
        },
        methods: {
            getData() {

                this.$loading(true);

                axios.request(this.routeToSave, {
                    method: 'get',
                    params: this.form,
                })
                    .then((response) => {

                        this.form = response.data.data;
                    })
                    .catch(error => {

                        if (_.has(error, 'error.response.status')) {

                            const message = '[' + error.response.status + '] Não foi possível realizar essa operação!';
                            this.$awn.alert(message);

                        } else {

                            this.$awn.alert(error.message);
                        }

                    })
                    .then(() => {

                        this.$loading(false);
                    });
            },
            saveAndNew() {

                this.routeNameToRedirect = 'roles.create';
                this.save();
            },
            save() {

                this.$loading(true);

                this.errors = {};

                axios.request(this.routeToSave, {
                    method: this.method,
                    params: this.form,
                })
                    .then(response => {

                        this.$router.push({name: this.routeNameToRedirect})
                            .catch(err => {
                            })
                            .then(() => {

                                this.form = {};
                                this.routeNameToRedirect = "roles.list";
                            });

                        this.$awn.success('Salvo com sucesso!');
                    })
                    .catch(error => {

                        if (_.has(error, 'response.data.errors')) {

                            this.$awn.warning('Corrija os erros antes de salvar');
                            this.errors = error.response.data.errors;
                        } else {

                            let message = '[' + error.response.status + '] Não foi possível realizar essa operação!';
                            this.$awn.alert(message);
                        }

                        //console.log(error.response.data);
                    })
                    .then(() => {

                        this.$loading(false);
                    });
            }
        },
        mounted() {

            if (typeof (this.$route.params.id) !== "undefined") {

                this.isCreateMode = false;
                this.routeToSave = "/api/roles/" + this.$route.params.id;
                this.method = 'put';
                this.getData();
            }
        }
    }
</script>

<style scoped>

</style>
