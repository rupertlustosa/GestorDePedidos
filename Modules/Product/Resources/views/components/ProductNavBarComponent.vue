<template>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2>Produtos</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link to="/">Painel</router-link>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name == 'products.list'">
                    <strong>Listagem</strong>
                </li>
                <li class="breadcrumb-item" v-if="this.$router.currentRoute.name !== 'products.list'">
                    <router-link :to="{ name: 'products.list' }">Listagem</router-link>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name === 'products.create'">
                    <strong>Novo</strong>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name === 'products.edit'">
                    <strong>Edição</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">
                <router-link
                    :to="{ name: 'products.list'}" class="btn btn-white"
                    v-if="this.$router.currentRoute.name !== 'products.list'">
                    <i class="fa fa-pencil"></i> Listar
                </router-link>&nbsp;
                <router-link
                    :to="{ name: 'products.create'}"
                    class="btn btn-primary">
                    <i class="fa fa-plus"></i> Novo
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProductNavBarComponent"
    }
</script>

<style scoped>

</style>
