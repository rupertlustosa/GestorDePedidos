import Vue from "vue";
import VueRouter from "vue-router";
import DashboardComponent from "./components/dashboard/DashboardComponent";
import UserListComponent from "../../Modules/User/Components/user/UserListComponent";
import LoginComponent from "../../Modules/User/Components/auth/LoginComponent";
import UserFormComponent from "../../Modules/User/Components/user/UserFormComponent";
import NotFoundComponent from "./components/NotFoundComponent";
import CategoryRoutes from "../../Modules/Product/Resources/views/js/categoryRouter";
import ProductRoutes from "../../Modules/Product/Resources/views/js/productRouter";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history", // hash history abstract
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
        ...CategoryRoutes,
        ...ProductRoutes,
        {
            name: 'login',
            path: '/login',
            component: LoginComponent,
        },
        {
            name: 'not-found',
            path: '/not-found',
            component: NotFoundComponent,
        },
        {
            path: '*',
            redirect: '/not-found',
        }
    ],
    scrollBehavior(to, from, savedPosition) {
        return {x: 0, y: 0};
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
