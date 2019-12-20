<template>
    <div>

        <category-nav-bar-component></category-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="ibox-content m-b-sm border-bottom">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Categoria pai</label>
                                            <input type="text" value="" class="form-control"
                                                   v-model="form.parent_id">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Nome</label>
                                            <input type="text" value="" class="form-control"
                                                   v-model="form.name">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title-action">
                                            <a class="btn btn-white" href="javascript:"
                                               v-on:click="clearSearch()">
                                                <i class="fa fa-home"></i> Limpar
                                            </a>&nbsp;
                                            <a class="btn btn-primary" href="javascript:"
                                               v-on:click="getData()">
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
                                        <th>Categoria pai</th>
                                        <th>Nome</th>
                                        <th>Imagem</th>
                                        <th class="text-right">
                                            Ações
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items">
                                        <td>{{ item.parent_id }}</td>
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.imagem }}</td>
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
                                                        :to="{ name: 'categories.edit', params: { id: item.id }}">
                                                        <i class="fa fa-pencil fa-fw"></i> Editar {{ item.id }}
                                                    </router-link>
                                                    <router-link
                                                        class="dropdown-item"
                                                        :to="{ name: 'categories.edit', params: { id: item.id }}">
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
                                :page-count="form.page"
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
    import CategoryNavBarComponent from "./CategoryNavBarComponent";

    export default {
        name: "CategoryListComponent",
        components: {CategoryNavBarComponent},
        data() {
            return {
                items: [],
                form: {
                    page: 1
                }
            }
        },
        methods: {

            clearSearch() {

                this.form = {
                    page: 1
                };
                this.getData();
            },
            getData() {

                this.$loading(true);

                console.log(this.form);
                axios.request("/api/categories", {
                    method: 'get',
                    params: this.form,
                })
                    //axios.get("/api/categories?page=" + pageNum)
                    .then((response) => {

                        let data = response.data.data;
                        this.items = [...data];
                        this.form.page = response.data.last_page;
                    })
                    .catch(error => {

                        if (_.has(error, 'response.data.errors')) {


                        } else {

                            this.alertText = '[' + error.response.status + '] Não foi possível realizar essa operação!';
                        }

                        console.log(error.response.status);
                        console.log(error.response.data);
                    })
                    .then(() => {

                        this.$loading(false);
                    });
            }
        },
        mounted() {
            this.pageCount = 1;
            this.getData();

            console.info('App this router:', this.$router);
            console.info('App currentRoute:', this.$router.currentRoute.name);
        }
    }
</script>

<style scoped>

</style>
