<template>
    <div>

        <orderPoint-nav-bar-component></orderPoint-nav-bar-component>

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
                                            <input class="form-control" type="text" v-model="form.name">
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
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class="text-right">
                                            Ações
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items">
                                        <td>{{ item.name }}</td>
                                        <td class="text-right">

                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn btn-white dropdown-toggle"
                                                        data-toggle="dropdown" type="button">
                                                    Ações
                                                </button>
                                                <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                                    <router-link
                                                        :to="{ name: 'order_points.edit', params: { id: item.id }}"
                                                        class="dropdown-item">
                                                        <i class="fa fa-pencil fa-fw"></i> Editar
                                                    </router-link>
                                                    <router-link
                                                        :to="{ name: 'order_points.edit', params: { id: item.id }}"
                                                        class="dropdown-item">
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
                                :click-handler="getData"
                                :container-class="'pagination'"
                                :page-class="'page-item'"
                                :page-count="pageCount"
                                v-if="this.items.length">
                            </paginate-component>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import OrderPointNavBarComponent from "./OrderPointNavBarComponent";

    export default {
        name: "OrderPointListComponent",
        components: {OrderPointNavBarComponent},
        data() {
            return {
                items: [],
                form: {
                    page: null
                },
                pageCount: 1
            }
        },
        methods: {

            search() {

                this.getData(1);
            },
            clearSearch() {

                this.form = {};
                this.getData(1);
            },
            getData(page) {

                this.$loading(true);
                this.form.page = page;

                axios.request("/api/order_points", {
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

            this.getData(1);
        }
    }
</script>

<style scoped>

</style>
