<template>
  <div>
    <div v-for="article in this.$store.state.articles" :key="article.id" class="w-full mb-2 md:mx-4 border rounded shadow-sm">
      <div class="px-4 py-4">
        <div>
          <nuxt-link :to="{name: 'articles-id', params: {id: article.id, article: article}}" class="font-semibold leading-tight text-2xl text-gray-800 hover:text-gray-800">
            <h1 class="truncate ... ">{{ article.title }}</h1>
          </nuxt-link>
        </div>
        <hr class="border-gray-200 my-1 border-bottom-none" style="border-top-width:0">
        <p class="text-gray-900 truncate ...">
          {{ article.description }}
        </p>
        <div class='flex text-gray-700 text-sm '>
          <div class="pr-3">{{ article.date }}</div>
          <div>Posted by <span class="text-red-400">{{ article.user.name }}</span></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {mapState, mapActions} from 'vuex'

export default {
  computed: {
    ...mapState(['articles'])
  },

  methods: {
    ...mapActions(['loadArticles'])
  },

  mounted() {
    this.$store.dispatch('loadArticles');
  }
}
</script>

<style scoped>

</style>
