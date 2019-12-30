import RoleListComponent from "../components/RoleListComponent";
import RoleFormComponent from "../components/RoleFormComponent";

const roleRoutes = [
    {
        path: "/roles",
        name: "roles.list",
        component: RoleListComponent,
        meta: {
            auth: true
        },
        children: [

        ]
    },
    {
        path: '/roles/create',
        name: "roles.create",
        component: RoleFormComponent,
        meta: {
            auth: true
        }
    },
    {
        path: '/roles/:id/edit',
        name: "roles.edit",
        component: RoleFormComponent,
        meta: {
            auth: true
        }
    }
];

export default roleRoutes

/**
* Adicione na seção de imports do seu arquivo de rotas:
* import roleRoutes from "../../Modules/Authentication/Resources/views/js/roleRouter";
*
* Dentro das rotas do VueRouter adicione:
* ...roleRoutes,
*/
