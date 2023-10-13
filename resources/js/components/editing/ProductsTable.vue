<template>
    <div class="overflow-x-auto">
    <table class="table-auto w-full text-sm">
           <thead class="bg-stone-200">
           <tr class="text-left text-slate-400 font-medium border-b">
               <th v-for="(column, key) in this.columns" :key="key" class="p-4 pb-3 pl-8">{{ column }}</th>
               <th class="p-4 pb-3 text-center">
                   <router-link to="/editing/0" class="rounded-lg bg-stone-500 hover:bg-stone-600 px-6 py-2 text-white">
                       New
                   </router-link>
               </th>
           </tr>
           </thead>
           <tbody class="bg-white">
           <tr class="border-b border-slate-100 text-slate-500" v-for="product in productList">
               <td v-for="(column, key) in this.columns" :key="`${key}-${product.id}`" class="p-4 pl-8">
                   {{ product[key] }}</td>
               <td class="p-4 text-slate-800 text-center">
                   <router-link :to="`/editing/${product.id}`" class="mr-2">Edit</router-link>
                   <a href="#" v-on:click.prevent="deleteProduct(product.id)" class="text-red-600">Delete</a>
               </td>
           </tr>
           </tbody>
       </table>
    </div>
</template>

<script>
import { ProductService } from "../../services/product.service.js";

export default {
    name: "ProductsTable",
    data: () => ({
        productList: [],
        columns: {
            title: 'Title',
            description: 'Description',
            price: 'Price',
        }
    }),
    methods: {
        deleteProduct(id) {
            ProductService.deleteProduct(id).then(res => this.initProductList())
        },
        initProductList() {
            ProductService.getProductList().then(result => this.productList = result)
        }
    },
    created() {
        this.initProductList()
    }
}
</script>
