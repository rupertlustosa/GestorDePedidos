import VueLoading from "vuejs-loading-plugin";

const orderRoutes = [
    {
        path: "/orders",
        name: "orders.list",
        component: () => ({
            // O componente a carregar (deve ser uma Promise)
            component: import("../components/OrderListComponent" /* webpackChunkName: "js/async/order-list-component" */),
            // Um componente para usar enquanto o assíncrono é carregado
            loading: VueLoading,
            // Um componente para usar se o carregamento falhar
            //error: ErrorComponent,
            // Espera antes de exibir o componente de loading. Padrão: 200ms
            delay: 200,
            // O componente de erro será exibido se um timemout for
            // fornecido e excedido. Padrão: Infinity
            timeout: 3000
        }),
        meta: {
            auth: true
        },
        children: []
    },
    {
        path: '/orders/create',
        name: "orders.create",
        component: () => ({
            component: import("../components/OrderFormComponent" /* webpackChunkName: "js/async/order-form-component" */),
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
        path: '/orders/:id/edit',
        name: "orders.edit",
        component: () => ({
            component: import("../components/OrderFormComponent" /* webpackChunkName: "js/async/order-form-component" */),
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

export default orderRoutes

/**
 * Adicione na seção de imports do seu arquivo de rotas:
 * import orderRoutes from "../../Modules/Order/Resources/views/js/orderRouter";
 *
 * Dentro das rotas do VueRouter adicione:
 * ...orderRoutes,
 */
