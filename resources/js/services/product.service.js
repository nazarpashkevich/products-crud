import axios from "axios";

export class ProductService {
    static async getProductList() {
        const response = await axios.get(`${import.meta.env.VITE_API_URL}/api/products`)

        return response.data
    }

    static async getProduct(id) {
        const response = await axios.get(`${import.meta.env.VITE_API_URL}/api/products/${id}`)

        return response.data
    }

    static async createProduct(data) {
        const response = await axios.post(`${import.meta.env.VITE_API_URL}/api/products`, data)

        return response.data
    }

    static async updateProduct(id, data) {
        const response = await axios.put(`${import.meta.env.VITE_API_URL}/api/products/${id}`, data)

        return response.data
    }

    static async deleteProduct(id) {
        const response = await axios.delete(`${import.meta.env.VITE_API_URL}/api/products/${id}`)

        return response.data
    }

    static async exportAll(uuid) {
        await axios.get(`${import.meta.env.VITE_API_URL}/api/products/export-to-csv?uuid=${uuid}`)
    }
}
