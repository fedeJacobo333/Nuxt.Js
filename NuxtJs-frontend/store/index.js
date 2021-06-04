export const state = () => ({
  state
})

export const mutations = {
  setArticles(state, data) {
    state.articles = data
  }
}

export const actions = () => ({
  async nuxtServerInit({commit}, context){
    const { data } = await this.$axios.get('/articles')
    commit('setArticles', data)
  }
})

export const getters = () => ({

})

