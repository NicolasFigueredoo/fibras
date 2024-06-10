<template>
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100 mt-5">
      <div class="col-md-3 formulario">
        <form>
          <div class="mb-3 d-flex justify-content-center align-items-center">
            <div style="width: 280px; height: 70px;">
              <div style="
              background-image: url('../../../img/logo2.png');
              background-size: contain;

              background-repeat: no-repeat;
              width: 100%;
              height: 100%;
              ">
  
              </div>

            </div>
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
    getIdUsuario() {
      const user = this.$store.getters.getIdUsuario;
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

              let mensaje = "Bienvenido " + this.usuario;
              this.$store.commit("setLoginId", response.data);
              this.$store.commit("setMostrarAlerta", true);
              this.$store.commit("setClaseAlerta", 1);
              this.$store.commit("setMensajeAlerta", mensaje);
              this.$router.push("/panel");
            } else {
              $(".mensaje").html(
                `<p class="text-danger ">${response.data}</p>`
              );
            }
          })
          .catch((error) => {
            $(".mensaje").html(`<p class="text-danger ">Error ingresar Admin:</p>`);
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
