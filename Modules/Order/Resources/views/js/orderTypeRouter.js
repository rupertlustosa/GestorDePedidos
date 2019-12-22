import OrderTypeListComponent from "../components/OrderTypeListComponent";
import OrderTypeFormComponent from "../components/OrderTypeFormComponent";

const orderTypeRoutes = [
    {
        path: "/order_types",
        name: "order_types.list",
        component: OrderTypeListComponent,
        meta: {
            auth: true
        },
        children: [

        ]
    },
    {
        path: '/order_types/create',
        name: "order_types.create",
        component: OrderTypeFormComponent,
        meta: {
            auth: true
        }
    },
    {
        path: '/order_types/:id/edit',
        name: "order_types.edit",
        component: OrderTypeFormComponent,
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
