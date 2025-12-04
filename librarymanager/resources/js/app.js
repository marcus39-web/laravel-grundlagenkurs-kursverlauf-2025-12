// Importiert die Datei bootstrap.js, die globale JS-Einstellungen und Bibliotheken lädt
import './bootstrap';
import { createApp } from 'vue';
import Navigation from './components/Navigation.vue';
import Content from './components/Content.vue';

const App = {
  components: { Navigation, Content },
  data() {
    return { view: 'welcome' };
  },
  template: `
    <div>
      <h1>LibraryManager</h1>
      <Navigation @navigate="view = $event" />
      <Content :view="view" />
    </div>
  `
};

createApp(App).mount('#app');
