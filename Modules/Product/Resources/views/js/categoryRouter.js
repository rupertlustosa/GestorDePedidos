import VueLoading from "vuejs-loading-plugin";

const categoryRoutes = [
    {
        path: "/categories",
        name: "categories.list",
        component: () => ({
            component: import("../components/CategoryListComponent" /* webpackChunkName: "js/async/category-list-component" */),
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
        path: '/categories/create',
        name: "categories.create",
        component: () => ({
            component: import("../components/CategoryFormComponent" /* webpackChunkName: "js/async/category-form-component" */),
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
        path: '/categories/:id/edit',
        name: "categories.edit",
        component: () => ({
            component: import("../components/CategoryFormComponent" /* webpackChunkName: "js/async/category-form-component" */),
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

export default categoryRoutes

/**
 * Adicione na seção de imports do seu arquivo de rotas:
 * import categoryRoutes from "../../Modules/Product/Resources/views/js/categoryRouter";
 *
 * Dentro das rotas do VueRouter adicione:
 * ...categoryRoutes,
 */
