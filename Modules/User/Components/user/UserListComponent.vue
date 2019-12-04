<template>
    <div>
        <div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-8">
                    <h2>Usuários</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link to="/">Painel</router-link>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Forms</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Usuários</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-4">
                    <div class="title-action">
                        <router-link to="/" class="btn btn-white"><i class="fa fa-pencil"></i> Editar</router-link>&nbsp;
                        <router-link to="/" class="btn btn-primary">Novo</router-link>&nbsp;
                        <router-link to="/" class="btn btn-white"><i class="fa fa-check "></i> Save</router-link>
                    </div>
                </div>
            </div>

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
                                                <label class="col-form-label" for="product_name">Nome do usuário</label>
                                                <input type="text" id="product_name" name="product_name" value=""
                                                       placeholder="Nome do usuário" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="price">Price</label>
                                                <input type="text" id="price" name="price" value="" placeholder="Price"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="quantity">Quantity</label>
                                                <input type="text" id="quantity" name="quantity" value=""
                                                       placeholder="Quantity"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" selected>Enabled</option>
                                                    <option value="0">Disabled</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="javascript:" class="btn btn-white btn-xs float-right">
                                                Exibir busca
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
                                        <tbody>
                                        <tr>
                                            <td class="issue-info">
                                                <a href="#">
                                                    Rupert Brasil Lustosa
                                                </a>

                                                <small>
                                                    rupertlustosa@gmail.com
                                                </small>
                                            </td>
                                            <td>
                                                <span class="label label-warning">Usuário</span>
                                            </td>
                                            <td>
                                                12.02.2015 10:00 am
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-white btn-xs"> Editar</button>
                                                <button class="btn btn-white btn-xs"> Remover</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
    export default {
        name: "UserListComponent",
        data() {
            return {
                items: [],
            }
        },
        methods: {
            getData() {

                axios.get("/panel/attendances/drugs/" + this.attendanceId)
                    .then((response) => {

                        let data = response.data.data;
                        console.log(data);
                        this.columns = [...data.columns];
                        this.items = [...data.items];
                    })
                    .catch(err => {
                        console.log(err);
                        showMessage('w', 'Erro ao recuperar informações');
                    });
            }
        }
    }
</script>

<style scoped>

</style>
