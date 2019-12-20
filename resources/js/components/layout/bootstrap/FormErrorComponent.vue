<template>
    <span class="text-warning">
        <slot></slot>
    </span>
</template>

<script>
    export default {
        name: "FormErrorComponent",
        props: ['errors'],
    }
</script>

<style scoped>

</style>
