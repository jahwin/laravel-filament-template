<template>

  <Head>
    <title>Home Page</title>
  </Head>

  <div class="home-page">
    <h1>Hello there</h1>
  </div>
</template>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';





</script>

<style lang="scss" scoped>
// Main page layout
.home-page {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: #f9fafb;
  padding-bottom: 50px;
}
</style>