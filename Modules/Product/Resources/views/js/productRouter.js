import VueLoading from "vuejs-loading-plugin";

const productRoutes = [
    {
        path: "/products",
        name: "products.list",
        component: () => ({
            component: import("../components/ProductListComponent" /* webpackChunkName: "js/async/product-list-component" */),
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
        path: '/products/create',
        name: "products.create",
        component: () => ({
            component: import("../components/ProductFormComponent" /* webpackChunkName: "js/async/product-form-component" */),
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
        path: '/products/:id/edit',
        name: "products.edit",
        component: () => ({
            component: import("../components/ProductFormComponent" /* webpackChunkName: "js/async/product-form-component" */),
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

export default productRoutes

/**
 * Adicione na seção de imports do seu arquivo de rotas:
 * import productRoutes from "../../Modules/Product/Resources/views/js/productRouter";
 *
 * Dentro das rotas do VueRouter adicione:
 * ...productRoutes,
 */
