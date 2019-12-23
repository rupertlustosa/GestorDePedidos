import VueLoading from "vuejs-loading-plugin";

const orderPointRoutes = [
    {
        path: "/order_points",
        name: "order_points.list",
        component: () => ({
            component: import("../components/OrderPointListComponent" /* webpackChunkName: "js/async/order-point-list-component" */),
            loading: VueLoading,
            //error: ErrorComponent,
            delay: 200,
            timeout: 3000
        }),
        meta: {
            auth: true
        },
        children: []
    },
    {
        path: '/order_points/create',
        name: "order_points.create",
        component: () => ({
            component: import("../components/OrderPointFormComponent" /* webpackChunkName: "js/async/order-point-form-component" */),
            loading: VueLoading,
            //error: ErrorComponent,
            delay: 200,
            timeout: 3000
        }),
        meta: {
            auth: true
        }
    },
    {
        path: '/order_points/:id/edit',
        name: "order_points.edit",
        component: () => ({
            component: import("../components/OrderPointFormComponent" /* webpackChunkName: "js/async/order-point-form-component" */),
            loading: VueLoading,
            //error: ErrorComponent,
            delay: 200,
            timeout: 3000
        }),
        meta: {
            auth: true
        }
    }
];

export default orderPointRoutes

/**
 * Adicione na seção de imports do seu arquivo de rotas:
 * import orderPointRoutes from "../../Modules/Order/Resources/views/js/orderPointRouter";
 *
 * Dentro das rotas do VueRouter adicione:
 * ...orderPointRoutes,
 */
