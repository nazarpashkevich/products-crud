import { createRouter, createWebHistory } from 'vue-router'
import ProductList from "../pages/ProductListPage.vue";
import ProductEditing from "../pages/ProductEditingPage.vue";
import NewProduct from "../pages/NewProductPage.vue";
import EditProduct from "../pages/EditProductPage.vue";

const routes = [
    { path: '/', component: ProductList },
    { path: '/editing', component: ProductEditing },
    { path: '/editing/0', component: NewProduct },
    { path: '/editing/:id', component: EditProduct },
]

export const router = createRouter({
    history: createWebHistory(),
    routes
})
