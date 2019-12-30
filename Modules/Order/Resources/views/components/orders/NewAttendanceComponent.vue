<template>
    <div class="row">
        <div class="col-lg-12">

            <!--<div class="ibox">
                <div class="ibox-content">
                    <h2>
                        Novo atendimento
                    </h2>
                    <p>
                        Masonry is a JavaScript grid layout library. It works by placing elements in optimal
                        position based on available vertical space, sort of like a mason fitting stones in a wall.
                        You’ve probably seen it in use all over the Internet.
                        <a href="http://masonry.desandro.com/" target="_blank">http://masonry.desandro.com/</a>
                    </p>
                </div>
            </div>-->


            <div class="ibox-content">
                <h2>
                    Novo atendimento
                </h2>

                <div class="ibox">
                    <div class="ibox-content">

                        <p class="font-bold">
                            Selecione a forma de atendimento
                        </p>
                        <div class="custom-radio">
                            <div class="form-row mt-2">
                                <template v-for="orderType in orderTypesOptions">
                                    <div class="custom-radio-success col-sm-12 col-md-3">
                                        <input type="radio" name="radio" :id="'radio'+orderType.id"
                                               :checked="order.order_type_id == orderType.id"
                                               :value="orderType.id"
                                               v-model="order.order_type_id"/>
                                        <label :for="'radio'+orderType.id">{{ orderType.label }}</label>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="form-row mt-2" v-if="order.order_type_id == 1 || order.order_type_id == 2">
                            <div class="form-group col-md-12 col-lg-12">
                                <label class="font-bold">Qual o atendente? *</label>
                                <v-select :options="attendantsOptions"
                                          :reduce="option => option.id"
                                          id="id"
                                          label="label"
                                          placeholder="Escolha o atendente"
                                          v-model="order.attendant_id">
                                </v-select>
                                <form-error-component :errors="errors" v-if="errors.attendant_id">
                                    {{ errors.attendant_id[0] }}
                                </form-error-component>
                            </div>
                        </div>

                        <div class="form-row mt-2" v-if="order.order_type_id == 1">
                            <div class="form-group col-md-12 col-lg-12">
                                <label class="font-bold">Qual a mesa? *</label>
                                <v-select :options="orderPointOptions"
                                          :reduce="option => option.id"
                                          id="id"
                                          label="label"
                                          placeholder="Escolha a mesa"
                                          v-model="order.order_point_id">
                                </v-select>
                                <form-error-component :errors="errors" v-if="errors.order_point_id">
                                    {{ errors.order_point_id[0] }}
                                </form-error-component>
                            </div>
                        </div>

                        <div class="form-row mt-2" v-if="order.order_type_id == 3 || order.order_type_id == 4">
                            <div class="form-group col-md-12 col-lg-12">
                                <label class="font-bold">Qual o cliente?</label>
                                <v-select :options="clientOptions"
                                          :reduce="option => option.id"
                                          id="id"
                                          label="label"
                                          placeholder="Escolha o cliente"
                                          v-model="order.client_id">
                                </v-select>
                                <form-error-component :errors="errors" v-if="errors.client_id">
                                    {{ errors.client_id[0] }}
                                </form-error-component>
                            </div>
                        </div>

                        <div class="form-row mt-2" v-if="order.order_type_id == 3 || order.order_type_id == 4">
                            <div class="form-group col-md-12 col-lg-12">
                                <div class="ibox-content">
                                    <p>
                                        Selecione os produtos do pedido:
                                    </p>

                                    <form id="form" action="#" class="wizard-big">
                                        <select class="form-control dual_select" multiple>
                                            <option value="United States">United States</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Australia">Australia</option>
                                            <option selected value="Austria">Austria</option>
                                            <option selected value="Bahamas">Bahamas</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </form>
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

    import 'jquery.steps/dist/jquery-steps.css';
    import 'jquery.steps/dist/jquery-steps';
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';
    import OrderModel from '../../js/OrderModel';
    import FormErrorComponent from "../../../../../../resources/js/components/layout/bootstrap/FormErrorComponent";

    $(document).ready(function () {

        $('#demo').steps({
            onFinish: function () {
                alert('complete');
            }
        });
    });

    export default {
        name: "NewAttendanceComponent",
        components: {FormErrorComponent, vSelect},
        data() {
            return {
                errors: {},
                orderTypesOptions: [],
                categoryOptions: [],
                attendantsOptions: [],
                orderPointOptions: [],
                clientOptions: [],
                order: new OrderModel(),
                message: 'Aaaaaaa',
            }
        },
        methods: {
            getCategoryOptions() {

                axios.get('/api/categories/list-of-choices')
                    .then(response => {

                        this.categoryOptions = response.data;
                        //console.log(this.categoryOptions);
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar categorias!';
                        this.$awn.alert(message);
                        console.log(error);
                    });
            },
            getOrderTypesOptions() {

                axios.get('/api/order_types/list-of-choices')
                    .then(response => {

                        this.orderTypesOptions = response.data;
                        //console.log(this.orderTypesOptions);
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar tipos de atendimento!';
                        this.$awn.alert(message);
                        console.log(error);
                    });
            },
            getAttendantsOptions() {

                axios.get('/api/attendants/list-of-choices')
                    .then(response => {

                        this.attendantsOptions = response.data;
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar os atendentes!';
                        this.$awn.alert(message);
                        console.log(error);
                    });
            },
            getClientOptions() {

                axios.get('/api/clients/list-of-choices')
                    .then(response => {

                        this.clientOptions = response.data;
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar os clientes!';
                        this.$awn.alert(message);
                        console.log(error);
                    });
            },
            getOrderPointOptions() {

                axios.get('/api/order_points/list-of-choices')
                    .then(response => {

                        this.orderPointOptions = response.data;
                    })
                    .catch(error => {

                        let message = 'Erro ao carregar as mesas!';
                        this.$awn.alert(message);
                        console.log(error);
                    });
            },
            setOrderType(orderTypeId) {

                this.order.order_type_id = orderTypeId;
                this.test = orderTypeId;
                console.log(this.order);
                //console.log(this.order.order_type_id);
            }
        },
        mounted() {
            this.getCategoryOptions();
            this.getOrderTypesOptions();
            this.getAttendantsOptions();
            this.getClientOptions();
            this.getOrderPointOptions();
        }
    }
</script>

<style scoped>

</style>
