<template>
    <div>

        <user-nav-bar-component></user-nav-bar-component>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">

                        <div class="ibox-title">
                            <h5>{{ isCreateMode ? 'Cadastro' : 'Edição' }}</h5>
                        </div>
                        <div class="ibox-content">


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>Nome *</label>
                                    <input type="text" v-model="user.name" class="form-control">
                                    <form-error-component v-if="errors.name" :errors="errors">
                                        {{ errors.name[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label>E-mail *</label>
                                    <input type="text" v-model="user.email" class="form-control">
                                    <form-error-component v-if="errors.email" :errors="errors">
                                        {{ errors.email[0] }}
                                    </form-error-component>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Senha <i v-if="isCreateMode">*</i></label>
                                    <input type="text" v-model="user.password" class="form-control">
                                    <form-error-component v-if="errors.password" :errors="errors">
                                        {{ errors.password[0] }}
                                    </form-error-component>
                                </div>
                                <div class="form-group col-md-12 col-lg-6">
                                    <label>Confirmação de Senha <i v-if="isCreateMode">*</i></label>
                                    <input type="text" v-model="user.password_confirmation" class="form-control">
                                    <form-error-component v-if="errors.password" :errors="errors">
                                        {{ errors.password[0] }}
                                    </form-error-component>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12 mt-4">
                                    <p class="font-bold">
                                        Selecione os papéis desse usuário
                                    </p>

                                    <form-error-component :errors="errors"
                                                          v-if="errors.roles">
                                        {{ errors.roles[0] }}
                                    </form-error-component>

                                    <div class="custom-radio">
                                        <div class="form-row mt-2">
                                            <template v-for="role in rolesOptions">
                                                <div class="custom-radio-success col-sm-12 col-md-3">
                                                    <input type="checkbox" name="rules" :id="'rule_'+role.id"
                                                           :checked="user.roles.includes(role.id)"
                                                           :value="role.id"
                                                           v-model="user.roles"/>
                                                    <label :for="'rule_'+role.id">{{ role.name }} {{ role.id }}</label>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-12">

                                    <div class="btn-group">
                                        <button class="btn btn-primary" type="button" @click.prevent="save">
                                            <i class="fa fa-check"></i> Salvar e voltar
                                        </button>
                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:" v-on:click="saveAndNew">
                                                Salvar e adicionar novo
                                            </a>
                                        </div>
                                    </div>
                                    <router-link class="btn btn-white" :to="{ name: 'users.list' }">
                                        <i class="fa fa-ban"></i> Cancelar
                                    </router-link>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UserNavBarComponent from "./UserNavBarComponent";
    import FormErrorComponent from "../../../../../resources/js/components/layout/bootstrap/FormErrorComponent";
    import UserModel from "../js/UserModel";
    import RoleModel from "../js/RoleModel";

    export default {
        name: "UserFormComponent",
        components: {FormErrorComponent, UserNavBarComponent},
        data() {
            return {
                routeToSave: "/api/users",
                routeNameToRedirect: "users.list",
                method: 'post',
                user: new UserModel(),
                errors: {},
                isCreateMode: true,
                rolesOptions: [],
            }
        },
        methods: {
            getData() {

                this.$loading(true);

                axios.request(this.routeToSave, {
                    method: 'get',
                    params: this.user,
                })
                    .then((response) => {

                        let user = new UserModel();
                        let data = response.data.data;
                        let roles = data.roles;
                        user = data;
                        user.roles = roles.map(function (rule) {

                            return rule.id;
                        });

                        this.user = user;
                    })
                    .catch(error => {

                        if (_.has(error, 'error.response.status')) {

                            const message = '[' + error.response.status + '] Não foi possível realizar essa operação!';
                            this.$awn.alert(message);

                        } else {

                            this.$awn.alert(error.message);
                        }

                    })
                    .then(() => {

                        this.$loading(false);
                    });
            },
            saveAndNew() {

                this.routeNameToRedirect = 'users.create';
                this.save();
            },
            save() {

                this.$loading(true);

                this.errors = {};

                axios.request(this.routeToSave, {
                    method: this.method,
                    params: this.user,
                })
                    .then(response => {

                        this.$router.push({name: this.routeNameToRedirect})
                            .catch(err => {
                            })
                            .then(() => {

                                this.user = new UserModel();
                                this.routeNameToRedirect = "users.list";
                            });

                        this.$awn.success('Salvo com sucesso!');
                    })
                    .catch(error => {

                        if (_.has(error, 'response.data.errors')) {

                            this.$awn.warning('Corrija os erros antes de salvar');
                            this.errors = error.response.data.errors;
                        } else {

                            let message = '[' + error.response.status + '] Não foi possível realizar essa operação!';
                            this.$awn.alert(message);
                        }

                        //console.log(error.response.data);
                    })
                    .then(() => {

                        this.$loading(false);
                    });
            },
            getRolesOptions() {

                axios.get('/api/roles/list-of-choices')
                    .then(response => {

                        let component = this;
                        response.data.forEach(function (item) {

                            let role = new RoleModel();
                            role.id = item.id;
                            role.name = item.label;

                            component.rolesOptions.push(role);
                        });
                        //this.rolesOptions = response.data;
                        //console.log(this.rolesOptions);
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar os papéis de um usuário!';
                        this.$awn.alert(message);
                        console.log(error);
                    });
            },
        },
        mounted() {

            if (typeof (this.$route.params.id) !== "undefined") {

                this.isCreateMode = false;
                this.routeToSave = "/api/users/" + this.$route.params.id;
                this.method = 'put';
                this.getData();
            }
            this.getRolesOptions();
        }
    }
</script>

<style scoped>

</style>
