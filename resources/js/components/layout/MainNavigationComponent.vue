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
                <li>
                    <router-link to="/users"><i class="fa fa-th-large"></i> <span class="nav-label">Usuários</span></router-link>
                </li>
                <li>
                    <router-link to="/about"><i class="fa fa-th-large"></i> <span class="nav-label">Mesas</span></router-link>
                </li>
                <li>
                    <router-link to="/users"><i class="fa fa-th-large"></i> <span class="nav-label">Pedidos</span></router-link>
                </li>
                <!--<li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i> Lateral
                    </a>
                </li>-->
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
