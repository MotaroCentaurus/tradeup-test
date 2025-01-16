<template>
  <div id="app">
    <header>
      <h1>ViaCEP Consulta</h1>
    </header>

    <main>
      <SearchByZip />
      <hr />
      <SearchByLocation />
    </main>
  </div>
</template>

<script>
import SearchByZip from "./components/SearchByZip.vue";
import SearchByLocation from "./components/SearchByLocation.vue";

export default {
  components: {
    SearchByZip,
    SearchByLocation,
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

header {
  background-color: #42b983;
  color: white;
  padding: 20px 0;
}

main {
  padding: 20px;
}
</style>
