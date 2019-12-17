<template>
    <div>
        <user-nav-bar-component></user-nav-bar-component>

        <!--<div class="wrapper wrapper-content">
            <div class="middle-box text-center animated fadeInRightBig">
                <h3 class="font-bold">Este é o conteudo da página</h3>
                <div class="error-desc">
                    You can create here any grid layout you want. And any variation layout you imagine:) Check out
                    main dashboard and other site. It use many different layout.
                    <br/>
                    <router-link to="/" class="btn btn-primary m-t">Painel</router-link>
                </div>
            </div>
        </div>-->

        <div class="wrapper wrapper-content  animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <!--<div class="ibox-title">
                            <h5>Listagem de usuários</h5>
                            <div class="ibox-tools">
                                <a href="javascript:" class="btn btn-primary btn-xs right-sidebar-toggle">
                                    Exibir busca
                                </a>
                            </div>
                        </div>-->
                        <div class="ibox-content">

                            <div class="ibox-content m-b-sm border-bottom">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Nome do usuário</label>
                                            <input class="form-control" v-model="form.name" placeholder="Nome do usuário"
                                                   type="text" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="col-form-label" for="price">Price</label>
                                            <input class="form-control" id="price" name="price" placeholder="Price"
                                                   type="text"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="col-form-label" for="quantity">Quantity</label>
                                            <input class="form-control" id="quantity" name="quantity"
                                                   placeholder="Quantity"
                                                   type="text"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option selected value="1">Enabled</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-white btn-xs float-right" href="javascript:">
                                            Pesquisar
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <!--<div class="m-b-lg">

                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search issue by name...">
                                    <div class="input-group-append">
                                        <button class="btn btn-white" type="button">Pesquisar</button>
                                    </div>
                                </div>

                                <div class="m-t-md">

                                    <div class="float-right">
                                        <button type="button" class="btn btn-sm btn-white">
                                            <i class="fa fa-comments"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-white">
                                            <i class="fa fa-user"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-white">
                                            <i class="fa fa-list"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-white">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-white">
                                            <i class="fa fa-print"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-white">
                                            <i class="fa fa-cogs"></i>
                                        </button>
                                    </div>
                                    <strong>Encontrado 5 registros.</strong>
                                </div>
                            </div>-->

                            <div class="table-responsive">
                                <table class="table table-hover issue-tracker">
                                    <thead>
                                    <tr>
                                        <th class="issue-info">
                                            Nome
                                        </th>
                                        <th>
                                            Tipo
                                        </th>
                                        <th>
                                            Último Acesso
                                        </th>
                                        <th class="text-right">
                                            Ações
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items">
                                        <td class="issue-info">
                                            <a href="#">
                                                {{ item.name }}
                                            </a>

                                            <small>
                                                {{ item.email }}
                                            </small>
                                        </td>
                                        <td>
                                            <span class="label label-warning">Usuário</span>
                                        </td>
                                        <td>
                                            {{ new Date(item.created_at) | dateFormat('DD/MM/YYYY') }}<br>
                                            {{ '10.10.1989' | dateParse('DD.MM.YYYY') | dateFormat('dd, DD MMM YYYY') }}
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-white btn-xs"> Editar</button>
                                            <button class="btn btn-white btn-xs"> Remover</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <paginate-component
                                :page-count="10"
                                :page-range="3"
                                :margin-pages="2"
                                :click-handler="getData"
                                :prev-text="'Prev'"
                                :next-text="'Next'"
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
    import UserNavBarComponent from "./UserNavBarComponent";

    export default {
        name: "UserListComponent",
        components: {UserNavBarComponent},
        data() {
            return {
                items: [],
                form: {}
            }
        },
        methods: {

            getData(pageNum = 1) {

                this.$loading(true);

                axios.get("/api/users?page=" + pageNum)
                    .then((response) => {

                        let data = response.data.data;
                        this.items = [...data];
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
            this.getData();
        }
    }
</script>

<style scoped>

</style>
