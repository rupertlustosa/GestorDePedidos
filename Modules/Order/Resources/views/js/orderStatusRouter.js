import VueLoading from "vuejs-loading-plugin";

const orderStatusRoutes = [
    {
        path: "/order_statuses",
        name: "order_statuses.list",
        component: () => ({
            component: import("../components/OrderStatusListComponent" /* webpackChunkName: "js/async/order-status-list-component" */),
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
        path: '/order_statuses/create',
        name: "order_statuses.create",
        component: () => ({
            component: import("../components/OrderStatusFormComponent" /* webpackChunkName: "js/async/order-status-form-component" */),
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
        path: '/order_statuses/:id/edit',
        name: "order_statuses.edit",
        component: () => ({
            component: import("../components/OrderStatusFormComponent" /* webpackChunkName: "js/async/order-status-form-component" */),
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

export default orderStatusRoutes

/**
 * Adicione na seção de imports do seu arquivo de rotas:
 * import orderStatusRoutes from "../../Modules/Order/Resources/views/js/orderStatusRouter";
 *
 * Dentro das rotas do VueRouter adicione:
 * ...orderStatusRoutes,
 */
