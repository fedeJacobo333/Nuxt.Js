<template>
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col" @submit.prevent="register">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
        Nombre
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="name" type="text" placeholder="Nombre" v-model="name">
    </div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
        Email
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" type="email" placeholder="Email" v-model="email">
    </div>
    <div class="mb-6">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Contraseña
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************" v-model="password">
      <!--<p class="text-red text-xs italic">Please choose a password.</p>-->
    </div>
    <div class="flex items-center justify-between">
      <button class="text-indigo-600 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Registrarse</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "register",

  data() {
    return {
      name: '',
      email: '',
      password: ''
    }
  },

  methods: {
    async register(){
      await this.$axios.post('/register', {
        name: this.name,
        email: this.email,
        password: this.password,
      }, {withCredentials: false});
      await this.$auth.loginWith('local', {date: {email: this.email, password: this.password }});

    }
  },
}
</script>

<style scoped>

</style>
