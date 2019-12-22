import Vue from "vue";
import VueRouter from "vue-router";
import DashboardComponent from "./components/dashboard/DashboardComponent";
import NotFoundComponent from "./components/NotFoundComponent";
import LoginComponent from "../../Modules/Authentication/Resources/views/components/LoginComponent";
import CategoryRoutes from "../../Modules/Product/Resources/views/js/categoryRouter";
import ProductRoutes from "../../Modules/Product/Resources/views/js/productRouter";
import orderTypeRoutes from "../../Modules/Order/Resources/views/js/orderTypeRouter";
import orderStatusRoutes from "../../Modules/Order/Resources/views/js/orderStatusRouter";

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
        ...CategoryRoutes,
        ...ProductRoutes,
        ...orderTypeRoutes,
        ...orderStatusRoutes,
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
