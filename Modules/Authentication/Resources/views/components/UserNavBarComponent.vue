<template>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2>Usuários</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link to="/">Painel</router-link>
                </li>
                <li v-if="this.$router.currentRoute.name == 'users.list'" class="breadcrumb-item active">
                    <strong>Listagem</strong>
                </li>
                <li v-if="this.$router.currentRoute.name !== 'users.list'" class="breadcrumb-item">
                    <router-link :to="{ name: 'users.list' }">Listagem</router-link>
                </li>
                <li v-if="this.$router.currentRoute.name === 'users.create'" class="breadcrumb-item active">
                    <strong>Novo</strong>
                </li>
                <li v-if="this.$router.currentRoute.name === 'users.edit'" class="breadcrumb-item active">
                    <strong>Edição</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">
                <router-link
                    v-if="this.$router.currentRoute.name !== 'users.list'" class="btn btn-white"
                    :to="{ name: 'users.list'}">
                    <i class="fa fa-pencil"></i> Listar
                </router-link>&nbsp;
                <router-link
                    :to="{ name: 'users.create'}"
                    class="btn btn-primary">
                    <i class="fa fa-plus"></i> Novo
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserNavBarComponent"
    }
</script>

<style scoped>

</style>
