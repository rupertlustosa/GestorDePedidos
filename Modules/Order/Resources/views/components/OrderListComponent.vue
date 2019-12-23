<template>
    <div>

        <order-nav-bar-component></order-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="ibox-content m-b-sm border-bottom">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Atendente</label>
                                            <input class="form-control" type="text" v-model="form.attendant_id">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Cliente</label>
                                            <input class="form-control" type="text" v-model="form.client_id">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Entregador</label>
                                            <input class="form-control" type="text" v-model="form.deliveryman_id">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Tipo de pedido</label>
                                            <input class="form-control" type="text" v-model="form.order_type_id">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Status</label>
                                            <input class="form-control" type="text" v-model="form.order_status_id">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Mesa</label>
                                            <input class="form-control" type="text" v-model="form.order_point_id">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Início</label>
                                            <input class="form-control" type="text" v-model="form.start_date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Saída para entrega</label>
                                            <input class="form-control" type="text"
                                                   v-model="form.output_to_delivery_date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Fim</label>
                                            <input class="form-control" type="text" v-model="form.end_date">
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
                                        <th>Tipo de pedido</th>
                                        <th>Atendente</th>
                                        <th>Cliente</th>
                                        <th>Entregador</th>
                                        <th>Status</th>
                                        <th>Mesa</th>
                                        <th>Início</th>
                                        <th>Saída para entrega</th>
                                        <th>Fim</th>
                                        <th class="text-right">
                                            Ações
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items">
                                        <td>{{ item.order_type_id }}</td>
                                        <td>{{ item.attendant_id }}</td>
                                        <td>{{ item.client_id }}</td>
                                        <td>{{ item.deliveryman_id }}</td>
                                        <td>{{ item.order_status_id }}</td>
                                        <td>{{ item.order_point_id }}</td>
                                        <td>{{ item.start_date }}</td>
                                        <td>{{ item.output_to_delivery_date }}</td>
                                        <td>{{ item.end_date }}</td>
                                        <td class="text-right">

                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn btn-white dropdown-toggle"
                                                        data-toggle="dropdown" type="button">
                                                    Ações
                                                </button>
                                                <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                                    <router-link
                                                        :to="{ name: 'orders.edit', params: { id: item.id }}"
                                                        class="dropdown-item">
                                                        <i class="fa fa-pencil fa-fw"></i> Editar
                                                    </router-link>
                                                    <router-link
                                                        :to="{ name: 'orders.edit', params: { id: item.id }}"
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
    import OrderNavBarComponent from "./OrderNavBarComponent";

    export default {
        name: "OrderListComponent",
        components: {OrderNavBarComponent},
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

                axios.request("/api/orders", {
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
