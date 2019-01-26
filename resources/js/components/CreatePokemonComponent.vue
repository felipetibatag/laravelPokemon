<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input
                v-model="name"
                type="text"
                class="form-control"
                name="name"
                id="recipient-name"
                placeholder="Nombre"
              >
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Image:</label>
              <input
                v-model="image"
                type="text"
                class="form-control"
                name="image"
                id="recipient-name"
                placeholder="imagen"
              >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" @click="savePokemon" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      image: ""
    };
  },
  methods: {
    savePokemon: function() {
      axios
        .post("http://127.0.0.1:8000/pokemons", {
          name: this.name,
          image: this.image
        })
        .then(res => {
          console.log(res);
          $("#createModal").modal("hide");
          this.$emit("pokemon_added", res.data.pokemon);
          //console.log(res.data.pokemon);
        })
        .catch(err => {
          console.log("Error " + err);
        });
    }
  }
};
</script>

<style>
</style>