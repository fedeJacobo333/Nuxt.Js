<template>
  <div>
    <h1>Articulos</h1>
    <div v-for="article in articles" :key="article.id"></div>
      <div>
        <h2>{{ article.title }}</h2>
        <h3>{{ article.date }}</h3>
      </div>
      <div><p>{{ article.description }}</p></div>
  </div>
</template>

<script>

import {mapState, mapActions, mapGetters} from 'vuex'

export default {
  methods:{
    ...mapActions(['loadArticles', 'createArticle']),
    /*create(){
      createArticle(article);
    }*/
  },

  computed: {
    ...mapGetters({
        articles: 'articles/getArticles'
    }),
    ...mapState(['articles'])
  }
}
</script>

<style scoped>

</style>
