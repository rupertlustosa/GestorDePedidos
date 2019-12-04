import Vue from "vue";
import VueRouter from "vue-router";
import DashboardComponent from "./components/dashboard/DashboardComponent";
import UserListComponent from "../../Modules/User/Components/user/UserListComponent";
import LoginComponent from "../../Modules/User/Components/auth/LoginComponent";
import UserFormComponent from "../../Modules/User/Components/user/UserFormComponent";
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "dashboard",
            component: DashboardComponent,
            meta: {
                auth: true
            }
        },
        {
            path: "/users",
            name: "users",
            component: UserListComponent,
            meta: {
                auth: true
            }
        },
        {
            path: "/users/create",
            name: "users.create",
            component: UserFormComponent,
            meta: {
                auth: true
            }
        },
        {
            name: 'login',
            path: '/login',
            component: LoginComponent,
        },
        {
            path: '*',
            redirect: '/login'
        }
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    }
});

router.beforeEach((to, from, next) => {
    console.info(to.meta.auth ? 'Precisa estar logado' : 'Não Precisa estar logado');
    /*if (to.meta.auth) {
        return router.push({name: 'login'});
    }*/
    next();
});

export default router;
