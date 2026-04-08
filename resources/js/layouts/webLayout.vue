<template>
  <div class="main-wrapper">
    <Navibar />
    <main>
      <slot />
    </main>
    <Footer />
  </div>
</template>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Navibar from './navibar.vue'
import Footer from './footer.vue'

const page = usePage()



</script>

<style lang="scss" scoped>
.main-wrapper {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
</style>