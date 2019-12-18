<template>
    <div>

        <category-nav-bar-component></category-nav-bar-component>

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
                                    <input type="text" v-model="form.imagem" class="form-control" 
                                           placeholder="Imagem">
                                    <div v-if="errors && errors.imagem" class="text-danger">
                                        {{ errors.imagem[0] }}
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
    import CategoryNavBarComponent from "./CategoryNavBarComponent";
    import BootstrapAlertComponent from "../../../../../resources/js/components/layout/bootstrap/BootstrapAlertComponent";

    export default {
        name: "CategoryFormComponent",
        components: {BootstrapAlertComponent, CategoryNavBarComponent},
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

                let route = typeof (this.$route.params.id) === "undefined" ? "/api/categories" : "/api/categories/" + this.$route.params.id;

                axios.post(route, this.form)
                    .then(response => {
                        this.$router.push({name: 'categories.list'});
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
