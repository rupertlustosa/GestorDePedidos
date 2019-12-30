<template>
    <div>

        <product-nav-bar-component></product-nav-bar-component>

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
                                              v-model="form.category_id">
                                    </v-select>
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


                            <div class="form-row" v-show="false">
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
                                    <label>Observações</label>
                                    <textarea class="form-control" rows="7" v-model="form.notes"></textarea>
                                    <form-error-component :errors="errors" v-if="errors.notes">
                                        {{ errors.notes[0] }}
                                    </form-error-component>
                                </div>

                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="row">
                                <div class="col-sm-12" style="border-left: 5px solid #dee2e6 !important;">
                                    <h3 class="m-t-none m-b">Variações do Produto</h3>
                                    <p>
                                        Personalize marcando se está ou não disponível, nome, código, e valor
                                    </p>

                                    <form-error-component :errors="errors"
                                                          v-if="errors.variations">
                                        {{ errors.variations[0] }}
                                    </form-error-component>

                                    <template v-if="form.variations && form.variations.length">

                                        <div class="form-row" v-for="(product_variation, index) in form.variations">

                                            <div class="form-group col-md-12 col-lg-6">
                                                <label>Nome</label>
                                                <div class="input-group m-b">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-addon">
                                                            <input type="checkbox"
                                                                   v-model="form.variations[index]['available']">
                                                        </span>
                                                    </div>
                                                    <input class="form-control" type="text"
                                                           v-model="form.variations[index]['name']">
                                                </div>
                                                <form-error-component :errors="errors"
                                                                      v-if="errors['variations.'+index+'.name']">
                                                    {{ errors['variations.'+index+'.name'] }}
                                                </form-error-component>
                                            </div>

                                            <div class="form-group col-md-12 col-lg-3">
                                                <label>Código</label>
                                                <input class="form-control" type="text"
                                                       v-model="form.variations[index]['code']">
                                                <form-error-component :errors="errors"
                                                                      v-if="errors['variations.'+index+'.code']">
                                                    {{ errors['variations.'+index+'.code'] }}
                                                </form-error-component>
                                            </div>

                                            <div class="form-group col-md-12 col-lg-2">
                                                <label>Valor</label>
                                                <money class="form-control" v-bind="money"
                                                       v-model="form.variations[index]['price']"></money>
                                                <form-error-component :errors="errors"
                                                                      v-if="errors['variations.'+index+'.price']">
                                                    {{ errors['variations.'+index+'.price'] }}
                                                </form-error-component>

                                            </div>

                                            <div class="form-group col-md-12 col-lg-1 text-right">
                                                <label v-show="false">Remover?</label><br>
                                                <button class="btn btn-default btn-circle mt-2" type="button"
                                                        v-on:click="removeVariation(product_variation)">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <input type="hidden" v-model="form.variations[index]['id']">
                                            </div>

                                        </div>
                                    </template>
                                    <div class="form-row">
                                        <div class="form-group col-12 text-right">
                                            <button class="btn btn-outline btn-rounded btn-primary" type="button"
                                                    v-on:click="addVariation">
                                                Adicionar variação
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 mt-5">

                                    <div class="btn-group">
                                        <button @click.prevent="save" class="btn btn-primary" type="button">
                                            <i class="fa fa-check"></i> Salvar e voltar
                                        </button>
                                        <button aria-expanded="false"
                                                aria-haspopup="true"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" type="button">
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
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';
    import {Money} from 'v-money';
    import ProductModel from '../js/Models/ProductModel';
    import VariationModel from '../js/Models/VariationModel';

    export default {
        name: "ProductFormComponent",
        components: {FormErrorComponent, ProductNavBarComponent, vSelect, Money},
        data() {
            return {
                routeToSave: "/api/products",
                routeNameToRedirect: "products.list",
                method: 'post',
                form: new ProductModel(),
                errors: {},
                isCreateMode: true,
                categoryOptions: [],
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: '',
                    suffix: '',
                    precision: 2,
                    masked: false
                }
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
                        for (const [key, value] of Object.entries(this.form.variations)) {

                            let variation = new VariationModel();
                            variation.id = value.id;
                            variation.code = value.code;
                            variation.name = value.name;
                            variation.price = value.price;
                            variation.available = value.available;

                            this.form.variations[key] = variation;
                        }
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
                        //console.log(this.categoryOptions);
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar categorias!';
                        this.$awn.alert(message);
                        console.log(error);
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

                                console.log('A', this.form);
                                this.form = new ProductModel();
                                console.log('B', this.form);
                                this.routeNameToRedirect = "products.list";
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
            },
            removeVariation(variation) {
                if (variation instanceof VariationModel) {
                    console.log(variation);
                    this.form.variations = this.form.variations.filter((x) => x !== variation);
                }
            },
            addVariation() {
                let variation = new VariationModel();
                variation.available = true;
                this.form.variations.push(variation);
            }
        },
        mounted() {

            if (typeof (this.$route.params.id) !== "undefined") {

                this.isCreateMode = false;
                this.routeToSave = "/api/products/" + this.$route.params.id;
                this.method = 'put';
                this.getData();
            }

            this.getCategoryOptions();
        }
    }
</script>

<style scoped>

</style>
