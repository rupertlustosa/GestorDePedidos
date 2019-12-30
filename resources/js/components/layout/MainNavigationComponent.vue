<template>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">Example user</span>
                            <span class="text-muted text-xs block">menu <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <router-link to="/">Dashboard</router-link>
                </li>
                <!--<li>
                    <router-link to="/users"><i class="fa fa-th-large"></i> <span class="nav-label">Usuários</span></router-link>
                </li>
                <li>
                    <router-link to="/categories"><i class="fa fa-th-large"></i> <span class="nav-label">Categories</span></router-link>
                </li>
                <li>
                    <router-link to="/products"><i class="fa fa-th-large"></i> <span class="nav-label">Produtos</span></router-link>
                </li>-->
                <li>
                    <a href="#">
                        <i class="fa fa-picture-o"></i>
                        <span class="nav-label">Autenticação</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <router-link :to="{ name: 'roles.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Papéis</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'users.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Usuários</span>
                            </router-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-picture-o"></i>
                        <span class="nav-label">Configurações</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <router-link :to="{ name: 'roles.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Papéis</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'order_types.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Tipos de pedidos</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'order_statuses.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Status dos pedidos</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'order_points.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Mesas</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'categories.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Categories</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'products.list'}">
                                <i class="fa fa-th-large"></i> <span class="nav-label">Produtos</span>
                            </router-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <router-link :to="{ name: 'orders.list'}">
                        <i class="fa fa-th-large"></i> <span class="nav-label">Pedidos</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'orders.dashboard'}">
                        <i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span>
                    </router-link>
                </li>
            </ul>

        </div>
    </nav>
</template>

<script>
    export default {
        name: "MainNavigationComponent.vue"
    }
</script>

<style scoped>

</style>
