import { createApp } from 'vue';
import Slider from './components/Slider.vue';
// import MobileNavButton from './components/MobileNavButton.vue';

// App instance for Slider
const sliderApp = createApp(Slider);
sliderApp.mount('#slider');

// App instance for Mobile Navigation Button
// const mobileNavApp = createApp(MobileNavButton);
// mobileNavApp.mount('#mobile-nav-button');

// Add more instances as needed for other components
