<template>
    <div class="bg-white max-w-2xl rounded-lg py-8 p-4 xs:p-8">
        <form v-on:submit.prevent="submitForm">
            <div class="grid grid-cols-1 sm:grid-cols-2 mb-4">
                <div class="flex flex-col sm:pr-4">
                    <label for="title" class="text-sm">Title</label>
                    <input type="text"
                           id="title"
                           required
                           class="border rounded-sm px-4 py-2 mt-2 focus:border-stone-400"
                           placeholder="Title"
                        v-model="product.title">
                </div>
                <div class="flex flex-col">
                    <label for="title" class="text-sm">Price</label>
                    <input type="number"
                           id="price"
                           min="1"
                           step="0.01"
                           required
                           class="border rounded-sm px-4 py-2 mt-2 focus:border-stone-400"
                           placeholder="Price"
                           v-model="product.price">
                </div>
            </div>
            <div class="form-row w-full flex flex-col mb-6">
                <label for="title" class="text-sm">Description</label>
                <textarea id="description"
                          class="border rounded-sm px-4 py-2 mt-2 focus:border-stone-400 h-36"
                          required
                          v-model="product.description"/>
            </div>
            <button type="submit" class="px-6 py-2 bg-stone-500 hover:bg-stone-600 text-white rounded-md ml-2">
                Save
            </button>
        </form>
    </div>
</template>

<script>
import { ProductService } from "../../services/product.service.js";
import { ref } from "vue";

export default {
    name: "ProductForm",
    props: ({
        productId: {
            type: Number,
            required: false
        }
    }),
    methods: {
        async submitForm() {
            if (typeof this.productId === 'undefined') {
                await ProductService.createProduct(this.product).then()
            } else {
                await ProductService.updateProduct(this.productId, this.product)
            }
            this.$router.push('/editing')
        }
    },
    setup: (props) => {
        const product = ref({
            title: '',
            price: null,
            description: '',
        })

        if (props.productId) {
            ProductService.getProduct(props.productId).then(result => product.value = result)
        }

        return {
            product
        }
    }
}
</script>
