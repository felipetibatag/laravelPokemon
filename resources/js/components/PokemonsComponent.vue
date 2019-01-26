<template>
  <div class="row pt-2">
    <spinner-component v-show="loading"></spinner-component>
    <div class="col-md-3" style="width:18rem" v-for="pokemon of pokemons" :key="pokemon.id">
      <div class="card">
        <img
          class="card-img-top rounded-circle mx-auto pt-2"
          :src="pokemon.image"
          alt="Card image cap"
          style="height:100px;width:100px"
        >
        <div class="card-body">
          <h5 class="card-title">{{pokemon.name}}</h5>
          <p class="card-text text-center">.....</p>
          <a href="/trainers/" class="btn btn-primary">Ver más..</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pokemons: [],
      loading: true
    };
  },
  mounted: function() {
    axios.get("http://127.0.0.1:8000/pokemons").then(response => {
      this.pokemons = response.data;
      this.loading = false;
    });
  },
  methods: {
    agregarPokemon: function(pokemon) {
      console.log("Entrando a agregarPokemon");
      this.pokemons.push(pokemon);
    }
  }
};
</script>

<style>
</style>
