<template>
    <div>
        <div class="text-center p-md">
            <button type="button" class="btn btn-success m-r-sm">Novo Atendimento</button>
            <button type="button" class="btn btn-danger m-r-sm">Atendimentos de balcão</button>
            <button type="button" class="btn btn-info m-r-sm">Atendimentos de pedido</button>
            <button type="button" class="btn btn-warning m-r-sm">Visão Geral</button>
            <button type="button" class="btn btn-primary m-r-sm">Novos itens</button>
            <button type="button" class="btn btn-default m-r-sm">Preparação</button>
            <button type="button" class="btn btn-default m-r-sm">Disponível para o cliente</button>
            <button type="button" class="btn btn-default m-r-sm">Saiu para entrega</button>
            <button type="button" class="btn btn-default m-r-sm">Finalizados</button>
        </div>

        <div class="row">
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-3">
                            <i class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h2 class="font-bold">217</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-3">
                            <i class="fa fa-thumbs-up fa-3x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h2 class="font-bold">400</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-3">
                            <i class="fa fa-rss fa-3x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h2 class="font-bold">10</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 lazur-bg">
                    <div class="row vertical-align">
                        <div class="col-3">
                            <i class="fa fa-phone fa-3x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h2 class="font-bold">120</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 lazur-bg">
                    <div class="row vertical-align">
                        <div class="col-3">
                            <i class="fa fa-euro fa-3x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h2 class="font-bold">462</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 yellow-bg">
                    <div class="row vertical-align">
                        <div class="col-3">
                            <i class="fa fa-shield fa-3x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h2 class="font-bold">610</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <new-attendance-component></new-attendance-component>

    </div>
</template>

<script>
    import NewAttendanceComponent from "./orders/NewAttendanceComponent";
    export default {
        name: "OrderDashboardComponent",
        components: {NewAttendanceComponent}
    }
</script>

<style scoped>

</style>
