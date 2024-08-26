<template>
  <div class="bg-gradient-radial pb-8">
    <div id="slide" class="relative w-full h-[600px] overflow-hidden mb-8">
      <div
        v-for="(slide, index) in slides"
        :key="index"
        class="item absolute top-0 left-0 w-full h-full grid grid-cols-1 md:grid-cols-3 gap-4 items-center"
      >
        <!-- Left Section -->
        <div class="left hidden mx-auto">
          <h1 class="text-4xl font-medium mb-2.5 text-slate-300">
            {{ slide.title }}
          </h1>
          <div
            class="des text-sm font-light opacity-60 mb-5 text-slate-400"
            v-html="slide.description"
          ></div>
          <a
            href="#"
            class="text-slate-100 hover:text-slate-300 dark:hover:text-slate-100 dark:text-slate-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-amber-800 bg-blue-400 hover:bg-blue-800 dark:bg-amber-500 dark:hover:bg-amber-600 font-medium text-sm rounded-lg px-5 py-2.5 mr-2 mb-2"
          >
            Learn More
          </a>
        </div>
        <!-- Image Section -->
        <div class="image flex justify-center items-center h-3/4 relative">
          <img
            :src="slide.image"
            alt=""
            class="w-full max-w-full transition-transform duration-500 transform hover:scale-110"
          />
          <div
            class="absolute bottom-[-30px] h-[30px] w-100 bg-black content-[''] z-[-1] rounded-full filter blur-[30px]"
          ></div>
        </div>
        <!-- Right Section -->
        <div class="right hidden mx-auto">
          <h2 class="text-lg font-medium mb-2.5 text-slate-300">Features</h2>
          <ul class="list-none p-0 m-0">
            <li
              v-for="(config, idx) in slide.configurations"
              :key="idx"
              class="text-sm relative mt-5 text-slate-400"
            >
              <p class="font-medium m-0 text-slate-300">{{ config.label }}</p>
              <p class="font-light text-xs m-0 text-slate-300">
                {{ config.value }}
              </p>
              <span
                class="absolute left-[-40px] top-1/2 transform translate-y-[-50%] w-2 h-2 bg-[#8c0781] rounded-full shadow-[0_0_10px_#8c0781]"
              ></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ArrowButtons :disabled="isButtonsDisabled" @click="handleArrowClick" />
  </div>
</template>
  
  <script setup>
import { ref } from "vue";
import ArrowButtons from "./ArrowButtons.vue";

const slides = ref([
  {
    image: "/img/3.jpg",
    title: "Tailwind CSS",
    description: "Lorem isup klv s <br /> Lorem isup klv s da ma em da da anh",
    configurations: [
      { label: "Lorem isup klv s", value: "2022" },
      { label: "Lorem isup klv s", value: "2022" },
      { label: "Lorem isup klv s", value: "2022" },
    ],
  },
  {
    image: "/img/1.jpg",
    title: "PHP MVC Framework ",
    description:
      "Mattis potenti quisque elit consequat id. Lorem ipsum odor amet, consectetuer adipiscing elit.",
    configurations: [
      {
        label: "Lorem ipsum dolor sit amet",
        value:
          "Lorem ipsum odor amet, consectetuer adipiscing elit. Mattis potenti quisque elit consequat id.",
      },
      {
        label: "Duis aute irure dolor in reprehenderit",
        value:
          "Lacus praesent sapien lobortis porta consequat malesuada curabitur.",
      },
      {
        label: "Excepteur sint occaecat cupidatat",
        value:
          "TCurabitur leo per odio leo molestie consectetur tempus ligula.",
      },
    ],
  },
  {
    image: "/img/2.jpg",
    title: "Vue 3",
    description: "Lorem isup klv s <br /> Lorem isup klv s da ma em da da anh",
    configurations: [
      { label: "Lorem isup klv s", value: "2022" },
      { label: "Lorem isup klv s", value: "2022" },
      { label: "Lorem isup klv s", value: "2022" },
    ],
  },
]);

const isButtonsDisabled = ref(false);

const nextSlide = () => {
  let lists = document.querySelectorAll(".item");
  document.getElementById("slide").appendChild(lists[0]);
};

const prevSlide = () => {
  let lists = document.querySelectorAll(".item");
  document.getElementById("slide").prepend(lists[lists.length - 1]);
};

const handleArrowClick = (direction) => {
  if (direction === "prev") {
    prevSlide();
  } else if (direction === "next") {
    nextSlide();
  }
};
</script>
  
  <style>
#slide {
  position: relative;
  width: 100%;
  height: 600px;
  overflow: hidden;
}

.item {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 1rem;
  align-items: center;
  transition: opacity 1s, transform 1s;
}

.item .image {
  grid-column: 2 / span 1; /* Center the image in the middle column */
  display: flex;
  justify-content: center;
  align-items: center;
  height: 75%;
  opacity: 0;
  transform: scale(0.8);
  transition: 1.5s;
}

.item .image img {
  width: 100%;
  max-width: 100%;
  transition: 0.5s;
}

.item .image::before {
  position: absolute;
  bottom: -30px;
  height: 60px;
  width: 60%;
  background-color: #000;
  content: "";
  z-index: -1;
  border-radius: 50%;
  filter: blur(30px);
}

.item .image img:hover {
  transform: scale(1.1);
}

#slide .item:nth-child(1) .image {
  opacity: 0;
  transform: scale(0) translate(-100px);
}

#slide .item:nth-child(2) .image {
  opacity: 1;
  transform: scale(1);
}

#slide .item:nth-child(2) {
  z-index: 3;
}

@keyframes contentOut {
  from {
    opacity: 1;
    transform: translate(0, 0);
  }
  to {
    opacity: 0;
    transform: translate(0, -100%);
    filter: blur(113px);
  }
}

@keyframes contentIn {
  from {
    opacity: 0;
    transform: translate(0, 100%);
    filter: blur(33px);
  }
  to {
    opacity: 1;
    transform: translate(0, 0);
  }
}

#slide .item:nth-child(1) .left,
#slide .item:nth-child(1) .right,
#slide .item:nth-child(2) .left,
#slide .item:nth-child(2) .right {
  display: block;
}

#slide .item:nth-child(1) .left,
#slide .item:nth-child(1) .right {
  animation: contentOut 1s ease-in-out 1 forwards;
}

#slide .item:nth-child(2) .left,
#slide .item:nth-child(2) .right {
  animation: contentIn 1s ease-in-out 1 forwards;
}
</style>
  