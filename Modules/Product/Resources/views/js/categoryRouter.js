import CategoryListComponent from "../components/CategoryListComponent";
import CategoryFormComponent from "../components/CategoryFormComponent";

const categoryRoutes = [
    {
        path: "/categories",
        name: "categories.list",
        component: CategoryListComponent,
        meta: {
            auth: true
        },
        children: [

        ]
    },
    {
        path: '/categories/create',
        name: "categories.create",
        component: CategoryFormComponent,
        meta: {
            auth: true
        }
    },
    {
        path: '/categories/:id/edit',
        name: "categories.edit",
        component: CategoryFormComponent,
        meta: {
            auth: true
        }
    }
]

export default categoryRoutes

/**
* Adicione na seção de imports do seu arquivo de rotas:
* import categoryRoutes from "../../Modules/Category/Resources/views/js/categoryRouter";
*
* Dentro das rotas do VueRouter adicione:
* ...categoryRoutes,
*/
