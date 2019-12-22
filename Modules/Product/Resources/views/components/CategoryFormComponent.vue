<template>
    <div>

        <category-nav-bar-component></category-nav-bar-component>

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
                                    <label>Categoria</label>

                                    <v-select :options="categoryOptions"
                                              :reduce="option => option.id"
                                              id="id"
                                              label="label"
                                              placeholder="Escolha uma categoria"
                                              v-model="form.parent_id">
                                    </v-select>

                                    <form-error-component :errors="errors" v-if="errors.parent_id">
                                        {{ errors.parent_id[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Nome</label>
                                    <input autofocus class="form-control" type="text" v-model="form.name">
                                    <form-error-component :errors="errors" v-if="errors.name">
                                        {{ errors.name[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-12">

                                    <div class="btn-group">
                                        <button @click.prevent="save" class="btn btn-primary" type="button">
                                            <i class="fa fa-check"></i> Salvar e voltar
                                        </button>
                                        <button aria-expanded="false"
                                                aria-haspopup="true"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" type="button">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:" v-on:click="saveAndNew">
                                                Salvar e adicionar novo
                                            </a>
                                        </div>
                                    </div>
                                    <router-link :to="{ name: 'categories.list' }" class="btn btn-white">
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
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';

    export default {
        name: "CategoryFormComponent",
        components: {FormErrorComponent, CategoryNavBarComponent, vSelect},
        data() {
            return {
                routeToSave: "/api/categories",
                routeNameToRedirect: "categories.list",
                method: 'post',
                form: {},
                errors: {},
                isCreateMode: true,
                categoryOptions: [],
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
            getCategoryOptions() {

                axios.get('/api/categories/list-of-choices')
                    .then(response => {

                        this.categoryOptions = response.data;
                        console.log(this.categoryOptions);
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar categorias!';
                        this.$awn.alert(message);
                        console.log(error);
                    });
            },
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
                                this.routeNameToRedirect = "categories.list";
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
                this.routeToSave = "/api/categories/" + this.$route.params.id;
                this.method = 'put';
                this.getData();
            }

            this.getCategoryOptions();
        }
    }
</script>

<style scoped>

</style>
