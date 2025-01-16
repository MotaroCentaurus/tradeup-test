<template>
  <div>
    <h2>Buscar Endereço por CEP</h2>
    <form @submit.prevent="fetchAddress">
      <label for="cep">Digite o CEP:</label>
      <input id="cep" v-model="cep" placeholder="Ex: 08295305" />
      <button type="submit">Buscar</button>
    </form>

    <div v-if="address">
      <h3>Resultado:</h3>
      <pre>{{ address }}</pre>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cep: "",
      address: null,
    };
  },
  methods: {
    async fetchAddress() {
      try {
        const response = await fetch(`http://localhost:8000/zip/${this.cep}`);
        if (!response.ok) {
          throw new Error("Erro ao buscar o endereço");
        }
        this.address = await response.json();
      } catch (error) {
        console.error(error);
        alert(
          "Não foi possível buscar o endereço. Verifique o CEP e tente novamente."
        );
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
