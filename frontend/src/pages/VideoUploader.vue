<template>

<!-- upload videos here -->
<div>
   <div> <h2>Upload Video</h2></div>
    <br>
   <div> <input type="file" @change="uploadVideo" accept="video/*"></div>
    <br> &nbsp;
    <br>
    <label>Grade</label>&nbsp;
    <select v-model="grade">
      <option value="grade">Grade</option>
      <option value="Subject">Subject</option>
      <option value="Topic">Topic</option>
      <!-- Add more categories as needed -->
    </select>&nbsp;&nbsp;
    
    <label>Subject</label>&nbsp;
    <select v-model="subject">
      <option value="grade">Grade</option>
      <option value="Subject">Subject</option>
      <option value="Topic">Topic</option>
      <!-- Add more categories as needed -->
    </select>&nbsp;
    
    <label>Topic</label>&nbsp;
    <select v-model="topic">
      <option value="grade">Grade</option>
      <option value="Subject">Subject</option>
      <option value="Topic">Topic</option>
      <!-- Add more categories as needed -->
    </select>
  </div>
</template>

<script>

export default{
  name: 'AddVideos',
  data() {
    return {
      grade: '', // Holds the selected category
      subject: '', // Holds the selected category
      topic: '', // Holds the selected category
    };
  },
  methods: {
    uploadVideo(event) {
      const file = event.target.files[0];
      // Use FormData to send the file and category to the backend
      const formData = new FormData();
      formData.append('video', file);
      formData.append('category', this.selectedCategory);

      // Make an API call to upload the video
      // Example using axios library
      // axios.post('/api/upload', formData)
      //   .then(response => {
      //     // Handle response
      //   })
      //   .catch(error => {
      //     // Handle error
      //   });
    },
  },
};

</script>

<style>

</style>