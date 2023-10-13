<template>
    <nav class="px-8 md:px-36 py-2 flex items-center border-b">
        <a href="/" class="mr-8">
            <img src="https://www.freepnglogos.com/uploads/coffee-logo-png/coffee-logo-design-creative-idea-logo-elements-2.png"
                 class="w-20" alt="Logo">
        </a>
        <head-menu />
    </nav>
</template>

<script>
import headMenu from "./HeadMenu.vue";
export default {
    name: "HeaderView",
    components: { headMenu }

}
</script>
