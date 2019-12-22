import OrderStatusListComponent from "../components/OrderStatusListComponent";
import OrderStatusFormComponent from "../components/OrderStatusFormComponent";

const orderStatusRoutes = [
    {
        path: "/order_statuses",
        name: "order_statuses.list",
        component: OrderStatusListComponent,
        meta: {
            auth: true
        },
        children: []
    },
    {
        path: '/order_statuses/create',
        name: "order_statuses.create",
        component: OrderStatusFormComponent,
        meta: {
            auth: true
        }
    },
    {
        path: '/order_statuses/:id/edit',
        name: "order_statuses.edit",
        component: OrderStatusFormComponent,
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
