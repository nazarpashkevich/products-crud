<template>
    <div class="container m-auto">
        <div class="px-4 md:px-12 py-8">
            <h1 class="text-2xl md:text-4xl mb-12">Editing of products</h1>
            <div>
                <products-table/>
            </div>
        </div>
    </div>
</template>

<script>
import productsTable from "../components/editing/ProductsTable.vue";

export default {
    name: "ProductEditingPage",
    components: { productsTable }
}
</script>

<style scoped>

</style>
