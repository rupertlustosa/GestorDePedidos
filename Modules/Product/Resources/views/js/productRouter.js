import ProductListComponent from "../components/ProductListComponent";
import ProductFormComponent from "../components/ProductFormComponent";

const productRoutes = [
    {
        path: "/products",
        name: "products.list",
        component: ProductListComponent,
        meta: {
            auth: true
        },
        children: [

        ]
    },
    {
        path: '/products/create',
        name: "products.create",
        component: ProductFormComponent,
        meta: {
            auth: true
        }
    },
    {
        path: '/products/:id/edit',
        name: "products.edit",
        component: ProductFormComponent,
        meta: {
            auth: true
        }
    }
]

export default productRoutes

/**
* Adicione na seção de imports do seu arquivo de rotas:
* import ProductRoutes from "../../Modules/Product/Resources/views/js/productRouter";
*
* Dentro das rotas do VueRouter adicione:
* ...productRoutes,
*/
