<template>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2>categories</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link to="/">Painel</router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link to="/categories">Listar</router-link>
                </li>
                <li class="breadcrumb-item active">
                    <strong>categories</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">
                <router-link class="btn btn-white" :to="{ name: 'categories.list'}"><i class="fa fa-pencil"></i> Listar</router-link>&nbsp;
                <router-link class="btn btn-primary" :to="{ name: 'categories.create'}">Novo</router-link>
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
