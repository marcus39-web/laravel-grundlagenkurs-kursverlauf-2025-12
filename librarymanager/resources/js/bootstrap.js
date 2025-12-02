// Importiert die Bibliothek axios für HTTP-Anfragen
import axios from 'axios';
// Macht axios global unter window.axios verfügbar
window.axios = axios;

// Setzt einen Standard-Header für alle HTTP-Anfragen, damit Laravel sie als AJAX erkennt
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
