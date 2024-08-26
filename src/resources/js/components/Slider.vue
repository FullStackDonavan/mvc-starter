<template>
  <div class="relative w-full max-w-lg mx-auto">
    <!-- Slider Images -->
    <div class="overflow-hidden relative">
      <div
        class="flex transition-transform duration-500"
        :style="{ transform: `translateX(-${currentIndex * 100}%)` }"
      >
        <img
          v-for="(image, index) in images"
          :key="index"
          :src="image"
          class="w-full h-auto object-cover"
        />
      </div>
    </div>

    <!-- Navigation Buttons -->
    <button
      @click="prevSlide"
      class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-md"
    >
      &lt;
    </button>
    <button
      @click="nextSlide"
      class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-md"
    >
      &gt;
    </button>

    <!-- Pagination Dots -->
    <div
      class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2"
    >
      <span
        v-for="(image, index) in images"
        :key="index"
        @click="goToSlide(index)"
        class="block w-3 h-3 bg-gray-500 rounded-full cursor-pointer"
        :class="{ 'bg-blue-500': currentIndex === index }"
      ></span>
    </div>
  </div>
</template>
  
  <script>
export default {
  name: "ImageSlider",
  data() {
    return {
      images: [
        "/img/q.jpg",
        "/img/w.jpg",
        "/img/e.jpg",
        // Add more image paths as needed
      ],
      currentIndex: 0,
    };
  },
  methods: {
    nextSlide() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },
    prevSlide() {
      this.currentIndex =
        (this.currentIndex - 1 + this.images.length) % this.images.length;
    },
    goToSlide(index) {
      this.currentIndex = index;
    },
  },
};
</script>
  
  <style scoped>
/* Optional: Add custom styles if needed */
</style>
  