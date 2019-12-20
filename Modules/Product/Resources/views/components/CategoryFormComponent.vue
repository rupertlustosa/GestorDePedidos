<template>
    <div>

        <category-nav-bar-component></category-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>{{ typeof(this.$route.params.id) === "undefined" ? 'Cadastro' : 'Edição' }}</h5>
                        </div>
                        <div class="ibox-content">


                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Categoria pai</label>
                                    <input type="text" v-model="form.parent_id" class="form-control"
                                           placeholder="Categoria pai">
                                    <div v-if="errors && errors.parent_id" class="text-danger">
                                        {{ errors.parent_id[0] }}
                                    </div>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Nome</label>
                                    <input type="text" v-model="form.name" class="form-control" autofocus="autofocus"
                                           placeholder="Nome">
                                    <div v-if="errors.name" class="text-warning">
                                        {{ errors.name[0] }}
                                    </div>
                                    <form-error-component v-if="errors.name" :errors="errors">
                                        {{ errors.name[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Imagem</label>
                                    <input type="text" v-model="form.imagem" class="form-control"
                                           placeholder="Imagem">
                                    <div v-if="errors && errors.imagem" class="text-danger">
                                        {{ errors.imagem[0] }}
                                    </div>
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
                                    <router-link class="btn btn-white" :to="{ name: 'categories.list' }">
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
    import CategoryNavBarComponent from "./CategoryNavBarComponent";
    import FormErrorComponent from "../../../../../resources/js/components/layout/bootstrap/FormErrorComponent";

    export default {
        name: "CategoryFormComponent",
        components: {FormErrorComponent, CategoryNavBarComponent},
        data() {
            return {
                showDismissibleAlert: true,
                routeToSave: "/api/categories",
                routeNameToRedirect: "categories.list",
                method: 'post',
                form: {},
                errors: {},
            }
        },
        methods: {
            saveAndNew() {

                this.routeNameToRedirect = 'categories.create';
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
                            });

                        let message = 'Salvo com sucesso!';
                        this.$awn.success(message);
                    })
                    .catch(error => {

                        if (_.has(error, 'response.data.errors')) {

                            let message = 'Corrija os erros antes de salvar';
                            this.$awn.warning(message);
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

                this.routeToSave = "/api/categories/" + this.$route.params.id;
                this.method = 'put';
            }
        }
    }
</script>

<style scoped>

</style>
