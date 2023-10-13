<template>
    <div class=" ml-auto sm:mr-8 xl:mr-48 py-4">
        <template v-for="(item, key) in menuItems" :key="key">
            <router-link class="mr-8 sm:mr-24 hover:text-yellow-800" :to="item.href">
                {{ item.title }}
            </router-link>
        </template>
    </div>
</template>

<script>
export default {
    name: "HeaderMenu",
    data: () => ({
        menuItems: [
            {
                href: '/',
                title: 'List',
            },
            {
                href: '/editing',
                title: 'Editing',
            }
        ]
    })
}
</script>
