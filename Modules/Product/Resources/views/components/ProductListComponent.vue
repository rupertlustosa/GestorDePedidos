<template>
    <div>

        <product-nav-bar-component></product-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="ibox-content m-b-sm border-bottom">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Nome</label>
                                            <input type="text" class="form-control" v-model="form.name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Resumo</label>
                                            <input type="text" class="form-control" v-model="form.summary">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Disponível?</label>
                                            <input type="text" class="form-control" v-model="form.available">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title-action">
                                            <a class="btn btn-white" href="javascript:"
                                               v-on:click="clearSearch">
                                                <i class="fa fa-home"></i> Limpar
                                            </a>&nbsp;
                                            <a class="btn btn-primary" href="javascript:"
                                               v-on:click="search">
                                                <i class="fa fa-search"></i> Pesquisar
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover issue-tracker">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th>Imagem</th>
                                        <th>Disponível?</th>
                                        <th>Preço</th>
                                        <th class="text-right">
                                            Ações
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items">
                                        <td>{{ item.name | capitalize }}</td>
                                        <td>{{ item.category_id }}</td>
                                        <td>{{ item.image }}</td>
                                        <td>{{ item.available | fromBoolean }}</td>
                                        <td>{{ item.price | currencydecimal }}</td>
                                        <td class="text-right">

                                            <div class="dropdown">
                                                <button class="btn btn-white dropdown-toggle" type="button"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    Ações
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <router-link
                                                        class="dropdown-item"
                                                        :to="{ name: 'products.edit', params: { id: item.id }}">
                                                        <i class="fa fa-pencil fa-fw"></i> Editar {{ item.id }}
                                                    </router-link>
                                                    <router-link
                                                        class="dropdown-item"
                                                        :to="{ name: 'products.edit', params: { id: item.id }}">
                                                        <i class="fa fa-trash-o fa-fw"></i> Remover
                                                    </router-link>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <paginate-component
                                :page-count="pageCount"
                                :click-handler="getData"
                                :container-class="'pagination'"
                                :page-class="'page-item'">
                            </paginate-component>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductNavBarComponent from "./ProductNavBarComponent";

    export default {
        name: "ProductListComponent",
        components: {ProductNavBarComponent},
        data() {
            return {
                items: [],
                form: {
                    page: 0
                },
                pageCount: 1
            }
        },
        methods: {

            search() {

                this.form.page = 0;
                this.getData();
            },
            clearSearch() {

                this.form = {
                    page: 0
                };
                this.getData();
            },
            getData() {

                this.$loading(true);
                this.form.page++;

                axios.request("/api/products", {
                    method: 'get',
                    params: this.form,
                })
                    .then((response) => {

                        let data = response.data.data;
                        this.items = [...data];
                        this.pageCount = response.data.last_page;

                        if (response.data.total === 0) {

                            this.$awn.info('Nenhum resultado encontrado');
                        }
                    })
                    .catch(error => {

                        let message = '[' + error.response.status + '] Não foi possível realizar essa operação!';
                        this.$awn.alert(message);
                    })
                    .then(() => {

                        this.$loading(false);
                    });
            }
        },
        mounted() {

            this.getData();
        }
    }
</script>

<style scoped>

</style>
