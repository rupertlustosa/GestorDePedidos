import VueLoading from "vuejs-loading-plugin";

const orderTypeRoutes = [
    {
        path: "/order_types",
        name: "order_types.list",
        component: () => ({
            component: import("../components/OrderTypeListComponent" /* webpackChunkName: "js/async/order-type-list-component" */),
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
        path: '/order_types/create',
        name: "order_types.create",
        component: () => ({
            component: import("../components/OrderTypeFormComponent" /* webpackChunkName: "js/async/order-type-form-component" */),
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
        path: '/order_types/:id/edit',
        name: "order_types.edit",
        component: () => ({
            component: import("../components/OrderTypeFormComponent" /* webpackChunkName: "js/async/order-type-form-component" */),
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

export default orderTypeRoutes

/**
 * Adicione na seção de imports do seu arquivo de rotas:
 * import orderTypeRoutes from "../../Modules/Order/Resources/views/js/orderTypeRouter";
 *
 * Dentro das rotas do VueRouter adicione:
 * ...orderTypeRoutes,
 */
