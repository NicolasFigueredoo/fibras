import { createStore } from 'vuex';

export default createStore({
  state: {
    idLogin: JSON.parse(localStorage.getItem('idLogin')) || null,
    usuarioRecordar: JSON.parse(localStorage.getItem('usuarioRecordar')) || null,
    mostrarComponente: 0,
    mensajeAlerta: null,
    mostrarAlerta: null,
    alertaClase: null,
    idSlider: null,
    idProducto: null,
    idNovedad:null,
    idValor: null,
    idServicio: null,
    selectedProductId: null,
    descargaId: null,
    idMetadato:null,
    videoId:null,
    idUsuario: null,
    idCategoria: null,
    idSector:null,
    idLitro: null,
    idClienteEmpresa: null,
    inputValue: localStorage.getItem('inputValue') || false,
    summer: null,

  },
  mutations: {
    setClienteEmpresaId(state,idClienteEmpresa){
      state.idClienteEmpresa = idClienteEmpresa

    },
    setLitroId(state,idLitro){
      state.idLitro = idLitro
    },
    setSectorId(state,idSector){
      state.idSector = idSector
    },
    setCategoriaId(state,idCategoria){
      state.idCategoria = idCategoria
    },
    setUsuarioId(state,idUsuario){
      state.idUsuario = idUsuario
    },
    setMetadatoId(state,idMetadato){
      state.idMetadato = idMetadato
    },
    setVideoId(state, videoId) {
      state.videoId = videoId;
  },
    setDescargaId(state, descargaId) {
      state.descargaId = descargaId;
  },
    setServicioId(state, idServicio) {
      state.idServicio = idServicio;
  },
    setSelectedProductId(state, productId) {
      state.selectedProductId = productId;
  },
    setValorId(state,idValor){
      state.idValor = idValor
    },
    setNovedadId(state,idNovedad){
      state.idNovedad = idNovedad
    },
    setProductoId(state,idProducto){
      state.idProducto = idProducto
    },
    setSliderIdComponent(state,idSliderHome){
      state.idSliderHome = idSliderHome
    },
    setSummer(state,bool){
      state.summer = bool
    },
    setInputValue(state,bool){
      state.inputValue = localStorage.setItem('inputValue', bool)
    },
    setUsuarioRecordar(state, usuario){
      state.usuarioRecordar = localStorage.setItem('usuarioRecordar', JSON.stringify(usuario));

    },
    setLoginId(state,idLogin){
      state.idLogin = idLogin
      localStorage.setItem('idLogin', JSON.stringify(state.idLogin));

    },

    mostrarComponente(state,idComponente){
      state.mostrarComponente = idComponente
    },

    setClaseAlerta(state,alertaClase){
      state.alertaClase = alertaClase
    },
    setMostrarAlerta(state,mostrarAlerta){
      state.mostrarAlerta = mostrarAlerta
    },
    setMensajeAlerta(state,mensajeAlerta){
      state.mensajeAlerta = mensajeAlerta
    },
    
  },
 
  getters: {
    getIdClienteEmpresa(state) {
      return state.idClienteEmpresa;
    },
    getIdLitro(state) {
      return state.idLitro;
    },
    getIdSector(state) {
      return state.idSector;
    },
    getIdCategoria(state) {
      return state.idCategoria;
    },
    getIdUsuario(state) {
      return state.idUsuario;
    },
    getIdMetadato(state){
      return state.idMetadato;
    },
    getIdVideo(state) {
      return state.videoId;
    },
    getIdDescarga(state) {
      return state.descargaId;
    },
    getIdServicio(state) {
      return state.idServicio;
    },
    getSelectedProductId(state) {
      return state.selectedProductId;
    },
    getIdValor(state){
      return state.idValor;
    },
    getIdNovedad(state){
      return state.idNovedad;
    },
    getIdProducto(state){
      return state.idProducto;
    },
    getidSlider(state) {
      return state.idSliderHome;
    },
    getSummer(state){
      return state.summer;

    },
    getInputValue(state) {
      return state.inputValue;
    },
    getUsuarioRecordar(state) {
      return state.usuarioRecordar;
    },
    getAlertaClase(state) {
      return state.alertaClase;
    },
    getMostrarAlerta(state) {
      return state.mostrarAlerta;
    },
    getMensajeAlerta(state) {
      return state.mensajeAlerta;
    },
    getIdLogin(state){
      return state.idLogin;
    },
    getMostrarComponente(state) {
      return state.mostrarComponente;
    },
    
  
  }
});
