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
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Categoria</label>
                                    <input type="text" v-model="form.category_id" class="form-control" 
                                           placeholder="Categoria">
                                    <div v-if="errors && errors.category_id" class="text-danger">
                                        {{ errors.category_id[0] }}
                                    </div>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Nome</label>
                                    <input type="text" v-model="form.name" class="form-control" 
                                           placeholder="Nome">
                                    <div v-if="errors && errors.name" class="text-danger">
                                        {{ errors.name[0] }}
                                    </div>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Imagem</label>
                                    <input type="text" v-model="form.image" class="form-control" 
                                           placeholder="Imagem">
                                    <div v-if="errors && errors.image" class="text-danger">
                                        {{ errors.image[0] }}
                                    </div>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Resumo</label>
                                    <input type="text" v-model="form.summary" class="form-control" 
                                           placeholder="Resumo">
                                    <div v-if="errors && errors.summary" class="text-danger">
                                        {{ errors.summary[0] }}
                                    </div>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">Disponível?</label>
                                    <input type="text" v-model="form.available" class="form-control" 
                                           placeholder="Disponível?">
                                    <div v-if="errors && errors.available" class="text-danger">
                                        {{ errors.available[0] }}
                                    </div>
                                </div>            
            
                            </div>        
        

                            <div class="form-row">
                                <div class="form-group col-sm-12 col-6">
                                    <label for="name">PRICE</label>
                                    <input type="text" v-model="form.price" class="form-control" 
                                           placeholder="PRICE">
                                    <div v-if="errors && errors.price" class="text-danger">
                                        {{ errors.price[0] }}
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
    import ProductNavBarComponent from "./ProductNavBarComponent";
    import BootstrapAlertComponent from "../../../../../resources/js/components/layout/bootstrap/BootstrapAlertComponent";

    export default {
        name: "ProductFormComponent",
        components: {BootstrapAlertComponent, ProductNavBarComponent},
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

                let route = typeof (this.$route.params.id) === "undefined" ? "/api/products" : "/api/products/" + this.$route.params.id;

                axios.post(route, this.form)
                    .then(response => {
                        this.$router.push({name: 'products.list'});
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
            }
        }
    }
</script>

<style scoped>

</style>
