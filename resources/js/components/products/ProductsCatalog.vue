<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">
        <template v-for="product in productList">
            <product-card :product="product"/>
        </template>
    </div>
</template>

<script>
import { ref } from "vue";
import { ProductService } from "../../services/product.service.js";
import productCard from "./ProductCard.vue";

export default {
    name: "ProductsCatalog",
    components: { productCard },
    setup() {
        const productList = ref([])

        const initProductList = function (productList) {
            ProductService.getProductList().then(result => productList.value = result)
        }

        initProductList(productList)

        return {
            productList
        }
    }
}
</script>
