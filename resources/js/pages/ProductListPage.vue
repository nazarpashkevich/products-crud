<template>
    <div class="container m-auto">
        <div class="px-4 md:px-12 py-8">
            <div class="mb-8 flex">
                <h1 class="text-2xl md:text-4xl">Our products</h1>
                <div class="ml-auto mr-4"></div>
                <div v-if="loading" class="text-stone-400">Wait...</div>
                <button class="px-2 sm:px-4 mr-4 py-2 rounded-md bg-green-700 text-white text-sm"
                        v-on:click="exportToCsv" v-else>
                    Export to CSV
                </button>
                <a v-show="exportFile !== null"
                   :href="exportFile"
                   class="px-2 sm:px-4 py-2 rounded-md bg-stone-500 text-white text-sm"
                   download>
                    Download Csv
                </a>
            </div>
            <div>
                <products-catalog/>
            </div>
        </div>
    </div>
</template>

<script>
import productsCatalog from "../components/products/ProductsCatalog.vue";
import { ProductService } from "../services/product.service.js";
import Pusher from 'pusher-js';
import { v4 as uuidv4 } from 'uuid';

export default {
    name: "ProductListPage",
    components: {productsCatalog},
    data: () => ({
        uuid: '',
        loading: false,
        exportFile: null
    }),
    methods: {
        async exportToCsv() {
            this.exportFile = null
            this.loading = true
            await ProductService.exportAll(this.uuid)
        },
        listenExportEvent() {
            const pusher = new Pusher(
                import.meta.env.VITE_PUSHER_APP_KEY,
                { cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER }
            );

            const channel = pusher.subscribe(`${import.meta.env.VITE_PUSHER_EXPORT_CHANNEL}.${this.uuid}`);

            channel.bind('App\\Events\\CsvReady', (data) => {
                this.exportFile = data.filePath
                this.loading = false
            });
        }
    },
    created() {
        this.uuid = uuidv4();

        this.listenExportEvent()
    }
}
</script>
