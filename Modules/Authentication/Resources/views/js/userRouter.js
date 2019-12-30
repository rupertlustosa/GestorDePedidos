import UserListComponent from "../components/UserListComponent";
import UserFormComponent from "../components/UserFormComponent";

const userRoutes = [
    {
        path: "/users",
        name: "users.list",
        component: UserListComponent,
        meta: {
            auth: true
        },
        children: [

        ]
    },
    {
        path: '/users/create',
        name: "users.create",
        component: UserFormComponent,
        meta: {
            auth: true
        }
    },
    {
        path: '/users/:id/edit',
        name: "users.edit",
        component: UserFormComponent,
        meta: {
            auth: true
        }
    }
];

export default userRoutes

/**
* Adicione na seção de imports do seu arquivo de rotas:
* import userRoutes from "../../Modules/Authentication/Resources/views/js/userRouter";
*
* Dentro das rotas do VueRouter adicione:
* ...userRoutes,
*/
