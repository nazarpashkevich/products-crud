<template>
    <header>
        <header-view/>
    </header>
    <main>
        <div class="min-h-screen bg-stone-100">
        <router-view/>
        </div>
    </main>
    <footer>
        <footer-view/>
    </footer>
</template>

<script>
import { defineComponent } from 'vue'
import headerView from './general/HeaderView.vue'
import footerView from './general/FooterView.vue'

export default defineComponent({
    name: 'App',
    components: {
        headerView,
        footerView,
    }
})
</script>
