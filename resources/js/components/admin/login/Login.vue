<template>
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-3 formulario">
        <form>
          <div class="mb-3 justify-content-center align-items-center">
            <!-- <img style="width: 100%;" class="imgKotex" src="../../../../img/logoelroble.png" alt="" /> -->
          </div>
          <div class="mb-3">
            <label style="font-size: 14px" class="form-check-label"
              >Usuario</label
            >
            <input
              v-model="usuario"
              placeholder="Usuario"
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
          </div>
          <div class="mb-3">
            <label style="font-size: 14px" class="form-check-label"
              >Contraseña</label
            >
            <input
              v-model="contraseña"
              placeholder="Contraseña"
              type="password"
              class="form-control"
              id="exampleInputPassword1"
            />
          </div>
   
     
          <div class="mensaje"></div>

          <button
            type="button"
            class="btn btn-dark w-100"
            @click="verificarLogin()"
          >
            Entrar
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      usuario: null,
      contraseña: null,
    };
  },
  computed: {
    usuarioRecordar() {
      const user = this.$store.getters.getUsuarioRecordar;
      return user;
    },
  },

  methods: {

    verificarLogin() {
      if (this.usuario && this.contraseña) {
        axios
          .post("/api/verificarLogin", {
            usuario: this.usuario,
            contraseña: this.contraseña,
          })
          .then((response) => {
            if (typeof response.data === "number") {
                let recordarUsuario = {
                  usuario: this.usuario,
                  contraseña: this.contraseña,
                };
                this.$store.commit("setUsuarioRecordar", recordarUsuario);
        
              let mensaje = "Bienvenido " + this.usuario;
              this.$store.commit("setLoginId", response.data);
              this.$store.commit("setMostrarAlerta", true);
              this.$store.commit("setClaseAlerta", 1);
              this.$store.commit("setMensajeAlerta", mensaje);
              this.$router.push("/admin/panel");
            } else {
              $(".mensaje").html(
                `<p class="text-danger ">${response.data}</p>`
              );
            }
          })
          .catch((error) => {
            $(".mensaje").html(`<p class="text-danger ">${response.data}</p>`);
            console.error("Error ingresar Admin:", error);
          });
      } else {
        $(".mensaje").html(
          `<p class="text-danger ">Faltan rellenar campos</p>`
        );
      }
    },
  },
  mounted() {
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

* {
  font-family: "Montserrat", sans-serif;
  font-size: 16px;
  font-weight: 500;
}
.formulario {
  font-family: "Montserrat", sans-serif;
  font-size: 16px;
  font-weight: 400;
  margin-top: -300px;
}

.form-check-input:checked {
  background-color: rgb(187, 17, 28);
  border-color: rgb(187, 17, 28);
}
</style>
