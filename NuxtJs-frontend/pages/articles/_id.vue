<template>
  <div>
      <div class="px-4 py-4 w-full mb-2 md:mx-4 border rounded shadow-sm">
        <div v-if="$auth.loggedIn && $auth.user.id === this.$route.params.article.user_id" class="justify-content-between">
          <h1 class="font-semibold leading-tight text-2xl text-gray-800 hover:text-gray-800">
            {{ this.$route.params.article.title }}
          </h1>
          <div class="float-right">
            <nuxt-link :to="{name: 'articles-edit_id', params:{article: this.$route.params.article}}" class="text-indigo-600 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">Editar</nuxt-link>
            <button class="text-indigo-600 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" @click="deleteArticle()">Eliminar</button>
          </div>
        </div>
        <div v-else>
          <h1 class="font-semibold leading-tight text-2xl text-gray-800 hover:text-gray-800">
            {{ this.$route.params.article.title }}
          </h1>

        </div>
        <hr class="border-gray-200 my-1 border-bottom-none" style="border-top-width:0">
        <p class="text-gray-900">
          {{ this.$route.params.article.description }}
        </p>
        <div class='flex text-gray-700 text-sm '>
          <div class="pr-3">{{ this.$route.params.article.date }}</div>
          <div>Posted by <span class="text-red-400">{{ this.$route.params.article.user.name }}</span></div>
        </div>
      </div>
  </div>
</template>

<script>

import {mapActions} from "vuex";

export default {
  params: ['id', 'article'],

  mounted() {
    console.log('id:' + this.$route.params.article)
  },

  methods: {
    ...mapActions(['deleteArticle']),
    deleteArticle(){
      this.$store.dispatch('deleteArticle', { id: this.$route.params.article.id });
    }
  }
}
</script>

<style scoped>

</style>
