<template>
  <div>
    <h2>Buscar Endereços por Localidade</h2>
    <form @submit.prevent="fetchAddresses">
      <label for="state">Estado (UF):</label>
      <input id="state" v-model="state" placeholder="Ex: SP" />

      <label for="city">Cidade:</label>
      <input id="city" v-model="city" placeholder="Ex: São Paulo" />

      <label for="street">Logradouro:</label>
      <input id="street" v-model="street" placeholder="Ex: Rua Lagoa Tai Grande" />

      <button type="submit">Buscar</button>
    </form>

    <div v-if="addresses">
      <h3>Resultados:</h3>
      <ul>
        <li v-for="(address, index) in addresses" :key="index">
          <pre>{{ address }}</pre>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      state: '',
      city: '',
      street: '',
      addresses: null,
    };
  },
  methods: {
    async fetchAddresses() {
      try {
        const response = await fetch(`http://localhost:8000/zip/${this.state}/${this.city}/${this.street}`);
        if (!response.ok) {
          throw new Error('Erro ao buscar os endereços');
        }
        this.addresses = await response.json();
      } catch (error) {
        console.error(error);
        alert('Não foi possível buscar os endereços. Verifique as informações e tente novamente.');
      }
    },
  },
};
</script>

<style scoped>
form {
  margin-bottom: 20px;
}
</style>
