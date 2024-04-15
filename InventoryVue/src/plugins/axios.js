import axios from 'axios';
axios.defaults.baseURL = 'http://localhost:8000/api';
// Interceptors pour les requêtes sortantes
axios.interceptors.request.use(config => {
    // Vous pouvez ajouter des en-têtes personnalisés, un jeton d'authentification, etc.
    return config;
  }, error => {
    return Promise.reject(error);
  });
  
  // Interceptors pour les réponses entrantes
  axios.interceptors.response.use(response => {
    // Traitez les données de réponse globalement ici
    return response;
  }, error => {
    // Traitez les erreurs globalement ici
    return Promise.reject(error);
  });
  
  export default axios;