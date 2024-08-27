<template>
  <div class="arrows">
    <button
      class="hover:scale-125 transition-transform duration-500"
      :disabled="disabled"
      @click="$emit('click', 'prev')"
    >
      &lt;
    </button>
    <button
      class="hover:scale-125 transition-transform duration-500"
      :disabled="disabled"
      @click="$emit('click', 'next')"
    >
      &gt;
    </button>
  </div>
</template>

<script>
export default {
  props: {
    disabled: {
      type: Boolean,
      default: false,
    },
  },
};
</script>

<style scoped>
.arrows {
  display: flex;
  justify-content: space-between;
  width: 100px;
  margin: auto;
}

.arrows button {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #ddd;
  border: none;
  color: #555;
  font-family: monospace;
  font-weight: bold;
  transition: 0.5s;
}

.arrows button:hover:enabled {
  background-color: #bbb;
}

body.dark-mode .arrows button {
  background-color: #555;
  color: #fff;
}

.arrows button:disabled {
  background-color: #aaa;
  color: #555;
  cursor: not-allowed;
}
</style>
