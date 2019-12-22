<template>
    <div>

        <product-nav-bar-component></product-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">

                        <div class="ibox-title">
                            <h5>{{ typeof(this.$route.params.id) === "undefined" ? 'Cadastro' : 'Edição' }}</h5>
                        </div>
                        <div class="ibox-content">


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Categoria</label>
                                    <input class="form-control" type="text" v-model="form.category_id">
                                    <form-error-component :errors="errors" v-if="errors.category_id">
                                        {{ errors.category_id[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Nome</label>
                                    <input class="form-control" type="text" v-model="form.name">
                                    <form-error-component :errors="errors" v-if="errors.name">
                                        {{ errors.name[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Imagem</label>
                                    <input class="form-control" type="text" v-model="form.image">
                                    <form-error-component :errors="errors" v-if="errors.image">
                                        {{ errors.image[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Resumo</label>
                                    <input class="form-control" type="text" v-model="form.summary">
                                    <form-error-component :errors="errors" v-if="errors.summary">
                                        {{ errors.summary[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Disponível?</label>
                                    <input class="form-control" type="text" v-model="form.available">
                                    <form-error-component :errors="errors" v-if="errors.available">
                                        {{ errors.available[0] }}
                                    </form-error-component>
                                </div>

                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Preço</label>
                                    <input class="form-control" type="text" v-model="form.price">
                                    <form-error-component :errors="errors" v-if="errors.price">
                                        {{ errors.price[0] }}
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
                                    <router-link :to="{ name: 'products.list' }" class="btn btn-white">
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
    import ProductNavBarComponent from "./ProductNavBarComponent";
    import FormErrorComponent from "../../../../../resources/js/components/layout/bootstrap/FormErrorComponent";

    export default {
        name: "ProductFormComponent",
        components: {FormErrorComponent, ProductNavBarComponent},
        data() {
            return {
                routeToSave: "/api/products",
                routeNameToRedirect: "products.list",
                method: 'post',
                form: {},
                errors: {},
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

                this.routeNameToRedirect = 'products.create';
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

                this.routeToSave = "/api/products/" + this.$route.params.id;
                this.method = 'put';
                this.getData();
            }
        }
    }
</script>

<style scoped>

</style>
