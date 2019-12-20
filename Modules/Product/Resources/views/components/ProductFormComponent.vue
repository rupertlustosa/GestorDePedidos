<template>
    <div>

        <product-nav-bar-component></product-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <bootstrap-alert-component
                            v-bind:text="alertText"
                            v-bind:show="alertShow"
                            v-bind:css-class="alertClass">
                        </bootstrap-alert-component>
                        <div class="ibox-title">
                            <h5>{{ typeof(this.$route.params.id) === "undefined" ? 'Cadastro' : 'Edição' }}</h5>
                        </div>
                        <div class="ibox-content">


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Categoria</label>
                                    <input type="text" v-model="form.category_id" class="form-control">
                                    <form-error-component v-if="errors.category_id" :errors="errors">
                                        {{ errors.category_id[0] }}
                                    </form-error-component>
                                </div>            
            
                            </div>        
        

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
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Imagem</label>
                                    <input type="text" v-model="form.image" class="form-control">
                                    <form-error-component v-if="errors.image" :errors="errors">
                                        {{ errors.image[0] }}
                                    </form-error-component>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Resumo</label>
                                    <input type="text" v-model="form.summary" class="form-control">
                                    <form-error-component v-if="errors.summary" :errors="errors">
                                        {{ errors.summary[0] }}
                                    </form-error-component>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Disponível?</label>
                                    <input type="text" v-model="form.available" class="form-control">
                                    <form-error-component v-if="errors.available" :errors="errors">
                                        {{ errors.available[0] }}
                                    </form-error-component>
                                </div>            
            
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Preço</label>
                                    <input type="text" v-model="form.price" class="form-control">
                                    <form-error-component v-if="errors.price" :errors="errors">
                                        {{ errors.price[0] }}
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
    import ProductNavBarComponent from "./ProductNavBarComponent";
    import FormErrorComponent from "../../../../../resources/js/components/layout/bootstrap/FormErrorComponent";

    export default {
        name: "ProductFormComponent",
        components: {FormErrorComponent, ProductNavBarComponent},
        data() {
            return {
                showDismissibleAlert: true,
                routeToSave: "/api/products",
                routeNameToRedirect: "products.list",
                method: 'post',
                form: {},
                errors: {},
            }
        },
        methods: {
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
            }
        }
    }
</script>

<style scoped>

</style>
