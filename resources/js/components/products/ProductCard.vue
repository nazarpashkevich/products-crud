<template>
    <div class="bg-white rounded-md border p-8">
        <div class="mb-8">
            <img src="https://springbreakisland-de.ams3.digitaloceanspaces.com/woocommerce-placeholder.png"
            class="w-96"/>
        </div>
        <div class="flex mb-2">
            <span class="text-xl mr-auto">{{ product.title }}</span>
            <span class="ml-2 self-center whitespace-nowrap">{{ product.price_formatted }}</span>
        </div>
        <div>
            <span class="text-xs color-g">{{ truncateText(product.description, 110) }}</span>
        </div>
    </div>
</template>

<script>

export default {
    name: "ProductsCatalog",
    components: {},

    data: () => ({
    }),
    props: ({
        product: {
            type: Object,
            required: true
        }
    }),
    methods: {
        truncateText(text, length) {
            if (text.length > length) {
                return text.slice(0, length) + '...';
            } else {
                return text;
            }
        },
    }
}
</script>
