<template>
    <div v-show="show" class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ text }} {{ cssClass }} {{ show }}
    </div>
</template>

<script>
    export default {
        name: "BootstrapAlertComponent",
        props: {
            text: {
                type: String,
                required: true
            },
            show: {
                type: Boolean,
                required: true
            },
            cssClass: {
                required: true,
                validator: function (value) {
                    return ['success', 'info', 'warning', 'danger'].indexOf(value) !== -1
                }
            }
        }
    }
</script>

<style scoped>

</style>
