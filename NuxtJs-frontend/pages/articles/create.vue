<template>
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col" @submit.prevent="create">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
        Título
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="title" type="text" placeholder="Título" v-model="title">
    </div>
    <div class="mb-6">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="description">
        Descripción
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="description" type="text" placeholder="Descripción" v-model="description">
      <!--<p class="text-red text-xs italic">Please choose a password.</p>-->
    </div>
    <div class="flex items-center justify-between">
      <button class="text-indigo-600 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Crear</button>
    </div>
  </form>
</template>

<script>
import {mapActions} from "vuex";

export default {
  name: "create",
  data() {
    return {
      title: '',
      description: ''
    }
  },

  methods: {
    ...mapActions(['createArticle']),
    create(){
      this.$store.dispatch('createArticle', { title: this.title, description: this.description });
    }
  },
}
</script>

<style scoped>

</style>
