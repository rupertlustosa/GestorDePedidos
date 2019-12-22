<template>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2>Categorias</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link to="/">Painel</router-link>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name == 'categories.list'">
                    <strong>Listagem</strong>
                </li>
                <li class="breadcrumb-item" v-if="this.$router.currentRoute.name !== 'categories.list'">
                    <router-link :to="{ name: 'categories.list' }">Listagem</router-link>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name === 'categories.create'">
                    <strong>Novo</strong>
                </li>
                <li class="breadcrumb-item active" v-if="this.$router.currentRoute.name === 'categories.edit'">
                    <strong>Edição</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">
                <router-link
                    :to="{ name: 'categories.list'}" class="btn btn-white"
                    v-if="this.$router.currentRoute.name !== 'categories.list'">
                    <i class="fa fa-pencil"></i> Listar
                </router-link>&nbsp;
                <router-link
                    :to="{ name: 'categories.create'}"
                    class="btn btn-primary">
                    <i class="fa fa-plus"></i> Novo
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CategoryNavBarComponent"
    }
</script>

<style scoped>

</style>
