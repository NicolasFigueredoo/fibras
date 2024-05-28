<template>
  <div class="container">
    <div style="margin-top: 80px" class="row d-flex justify-content-between align-items-center">
             <div class="col-lg-6">
                 <div @click="descargarArchivo(5,'Políticas de calidad')" class="input-group mb-3 d-flex justify-content-start align-items-center">
                     <span class="input-group-text" id="basic-addon1">
                         <div class="imagenCertificado"></div>
                     </span>
                     <a  class="btn inputB">
                         <div class="d-flex justify-content-between align-items-center">
                             <p class="m-3 txtBoton">Políticas de calidad</p>
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path d="M12 17V3" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M6 11L12 17L18 11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M19 21H5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </a>
                 </div>
             </div>
 
             <div class="col-lg-6">
                 <div @click="descargarArchivo(6,'Certificado Anmat')" class="input-group mb-3 d-flex justify-content-start align-items-center">
                     <span class="input-group-text" id="basic-addon1">
                         <div class="imagenCertificadoAnmat"></div>
                     </span>
                     <a  class="btn inputB">
                         <div class="d-flex justify-content-between align-items-center">
                             <p class="m-3 txtBoton">Certificado Anmat</p>
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path d="M12 17V3" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M6 11L12 17L18 11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M19 21H5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </a>
                 </div>
             </div>
         </div>

  </div>
</template>

<script>
export default {

  
methods:{
  descargarArchivo(id, nameArchive) {
            axios.get(`/api/descargarArchive/${id}`, { responseType: 'blob' })
                .then(response => {
                    const blob = new Blob([response.data], { type: response.data.type });
                    const url = window.URL.createObjectURL(blob);
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', nameArchive);
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                })
                .catch(error => {
                    console.error(error);
                });
        },
}
}
</script>

<style>

</style>