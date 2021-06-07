export const state = () => ({
  articles: []
})

export const mutations = {
  setArticles(state, articles){
    state.articles.push(...articles)
  },
  deleteArticles(state, article){
    state.articles.splice(state.articles.indexOf(a => a.id === article.id), 1)
  },
  editArticles(state, article){
    state.articles.splice(state.articles.indexOf(a => a.id === article.id), 1);
    state.articles.push(article)
  }
}

export const actions = {
  async loadArticles({commit}) {
    const articles = await this.$axios.get('/articles', {withCredentials: false})
    commit('setArticles', articles.data)
    return articles
  },

  async createArticle({commit}, payload) {
    const article = await this.$axios.post('/articles', { title: payload.title, description: payload.description, userId: this.$auth.user.id})
    commit('setArticles', [article.data])
    return article
  },
  async editArticle({commit}, payload) {
    const article = await this.$axios.put('/articles/' + payload.article.id, { title: payload.article.title, description: payload.article.description });
    commit('editArticles', [article.data])
  },
  async deleteArticle({commit}, payload) {
    const article = await this.$axios.delete('/articles/' + payload.id, { id: payload.id });
    commit('deleteArticles', [payload.id])
  }
}

export const getters = {
  getArticles(state){
    return state.articles
  },

  getArticleById: (state) => (id) => {
    console.log("store: " + state + "/" + id)
    return state.articles.find(article => article.id === id)
  }
}

