import OrderPointListComponent from "../components/OrderPointListComponent";
import OrderPointFormComponent from "../components/OrderPointFormComponent";

const orderPointRoutes = [
    {
        path: "/order_points",
        name: "order_points.list",
        component: OrderPointListComponent,
        meta: {
            auth: true
        },
        children: [

        ]
    },
    {
        path: '/order_points/create',
        name: "order_points.create",
        component: OrderPointFormComponent,
        meta: {
            auth: true
        }
    },
    {
        path: '/order_points/:id/edit',
        name: "order_points.edit",
        component: OrderPointFormComponent,
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
