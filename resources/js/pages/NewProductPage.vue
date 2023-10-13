<template>
    <div class="container m-auto">
        <div class="px-4 md:px-12 py-8">
            <h1 class="text-2xl md:text-4xl mb-12">Create new product</h1>
            <div>
                <product-form/>
            </div>
        </div>
    </div>
</template>

<script>
import productForm from "../components/editing/ProductForm.vue";

export default {
    name: "NewProductPage",
    components: { productForm }
}
</script>
