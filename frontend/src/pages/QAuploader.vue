<template>
    <div class="form-group">
        <form @submit.prevent="upload" id="QAform"  >
  
        <h2>Upload Questions </h2><br>

        <div class="form-group">
  <label for="myTextarea">Question</label>
  <textarea v-model="question" rows="4" cols="50" placeholder="Type Question here" class="form-control custom-input" required></textarea>
</div><br>

<div class="d-flex justify-content-between align-items-start">
  <div class="form-group">
    <label for="grade" class="form-label custom">Grade</label>
    <select v-model="selectedGrade" class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option value="" disabled>Select a grade</option>
      <option v-for="grade in grades" :value="grade" :key="grade.id">{{ grade }}</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="subject" class="form-label custom">Subject</label>
    <select v-model="selectedSubject" class="form-select" id="floatingSelect1" aria-label="Floating label select example">
      <option value="" disabled>Select a subject</option>
      <option v-for="subject in subjects" :value="subject" :key="subject.id">{{ subject }}</option>
    </select>
  </div>
</div>


        <br>

        <div class="form-group row">
            <label for="answer" class="form-label">Answer</label>
    <textarea v-model="answer" rows="4"  cols="50" placeholder="Type Answer here" class="form-control custom-input"  required></textarea>
  </div>

  

        <br>

        <div>
          <button type="submit" class="btn btn-outline-success btn-lg">Upload</button>
        </div>
        
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'QAuploader',
    data() {
      return {
        question: '',
        answer: '',
        selectedGrade: '',
        selectedSubject: '',        
  grades: [],    
  subjects: [],
      };
    },
    mounted() {
      this.fetchgns();
    },
  
    methods: {
      
  
      async fetchgns() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/grade');
        const response2 = await axios.get('http://127.0.0.1:8000/api/subject');
        this.grades = response.data;
        this.subjects = response2.data;
  
   console.log(response,response2)
      } catch (error) {
        console.error('Error fetching grades:', error);
      }
    },

    
  
      async upload() {        
  try {
    // Send question data
    const questionResponse = await axios.post(
      'http://127.0.0.1:8000/api/questions',
      {
        question: this.question,
        grade: this.selectedGrade,
        subject: this.selectedSubject,
      },
      {
        headers: {
          'accept': 'application/json',
        },
      }
    );

    // Check the response status code
    if (questionResponse.status === 200) {
      console.log('Question data successfully submitted.');
    } else {
      console.error('Error submitting question data. Status:', questionResponse.status);
      // You can also handle specific error codes differently if needed.
      // For example, if status === 422, handle validation errors.
    }

    // Send answer data
    const answerResponse = await axios.post(
      'http://127.0.0.1:8000/api/answers',
      {
        answer: this.answer,
      },
      {
        headers: {
          'accept': 'application/json',
        },
      }
    );

    // Check the response status code
    if (answerResponse.status === 200) {
      console.log('Answer data successfully submitted.');
    } else {
      console.error('Error submitting answer data. Status:', answerResponse.status);
      // Handle specific error codes as needed.
    }

    // Log the question and answer
    console.log(this.question, this.answer);
  } catch (error) {
    console.error('Network error:', error);

    // You can also check the error.response for more details if available
    if (error.response) {
      console.error('API error:', error.response.data);
    }
  }
},


    },
   
      
      
   
  };
  </script>
  
  <style>
  .form-group {
    top: 5%;
  }
 

  </style>
  