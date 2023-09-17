<template>
  <div class="slideshow">
    <img :src="currentImage" alt="Slideshow Image" />
    <div class="controls">
      <button @click="prev">Previous</button>
      <button @click="next">Next</button>
    </div>
  </div>
</template>

<script>
export default {
    name:'slideshow',
  data() {
    return {
      imagePaths: [
        require('../assets/img/classroom.jpg'),
        require('../assets/img/childstudying.jpg'), 
        require('../assets/img/parentnchildlookingatlaptop.jpg'),
      ],
      currentIndex: 0,
    };
  },
  computed: {
    currentImage() {
      return this.imagePaths[this.currentIndex];
    },
  },
  methods: {
    prev() {
      this.currentIndex = (this.currentIndex - 1 + this.imagePaths.length) % this.imagePaths.length;
    },
    next() {
      this.currentIndex = (this.currentIndex + 1) % this.imagePaths.length;
    },
  },
};
</script>

<style scoped>
/* Add your CSS styles here */
</style>
