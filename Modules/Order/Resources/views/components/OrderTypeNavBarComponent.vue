<template>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2>Tipos de pedidos</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link to="/">Painel</router-link>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name == 'order_types.list'">
                    <strong>Listagem</strong>
                </li>
                <li class="breadcrumb-item" v-if="this.$router.currentRoute.name !== 'order_types.list'">
                    <router-link :to="{ name: 'order_types.list' }">Listagem</router-link>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name === 'order_types.create'">
                    <strong>Novo</strong>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name === 'order_types.edit'">
                    <strong>Edição</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">
                <router-link
                    :to="{ name: 'order_types.list'}" class="btn btn-white"
                    v-if="this.$router.currentRoute.name !== 'order_types.list'">
                    <i class="fa fa-pencil"></i> Listar
                </router-link>&nbsp;
                <router-link
                    :to="{ name: 'order_types.create'}"
                    class="btn btn-primary">
                    <i class="fa fa-plus"></i> Novo
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OrderTypeNavBarComponent"
    }
</script>

<style scoped>

</style>
