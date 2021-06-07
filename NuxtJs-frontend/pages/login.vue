<template>
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col" @submit.prevent="login">
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
      <button class="text-indigo-600 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Entrar</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "login",

  data() {
    return {
      email: '',
      password: ''
    }
  },

  methods: {
    async login(){
      try {
        let response = await this.$auth.loginWith('local', {data: {email: this.email, password: this.password, grant_type: "password",
            client_id: 2,
            client_secret: "0N8xbZfwgdH6iIJ9BV86SvV3zc2vPIV0PBLd7X4w"}})
        console.log(response)
      } catch (err) {
        console.log(err)
      }
    }
  },
}
</script>

