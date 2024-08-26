import { createApp } from 'vue';

const App = {
  data() {
    return {
      message: 'Hello from Vue!'
    };
  },
  template: `<div>{{ message }}</div>`,
  mounted() {
    console.log(`Vue component mounted. ${this.message}`);
    const appElement = document.querySelector('#app');
    if (!appElement) {
      console.error('Element with id "app" not found');
    }else{
        console.error('Element with id "app" found');
    }
  }
};

createApp(App).mount('#app');
