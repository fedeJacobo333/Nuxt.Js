<template>
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col" @submit.prevent="edit">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
        Título
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="title" type="text" v-model="title">
    </div>
    <div class="mb-6">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="description">
        Descripción
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="description" type="text" v-model="description">
      <!--<p class="text-red text-xs italic">Please choose a password.</p>-->
    </div>
    <div class="flex items-center justify-between">
      <button class="text-indigo-600 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Editar</button>
    </div>
  </form>
</template>

<script>
import {mapActions} from "vuex";

export default {
  name: "edit_id",

  data() {
    return {
      title: '',
      description: ''
    }
  },

  mounted() {
    this.title = this.$route.params.article.title;
    this.description = this.$route.params.article.description;
  },

  methods: {
    ...mapActions(['editArticle']),
    async edit(){
      await this.$store.dispatch('editArticle', { article: this.tit });
    }
  },
}
</script>

<style scoped>

</style>
