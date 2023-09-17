<template>
    <br>
<h1>Welcome to mwakenya e-learning site</h1>
<br>
<br>
<Header></Header>
<br><br>

<div>
    <img src="../assets/img/childstudying.jpg" alt="" class="img-thumbnail">
</div><br><br>

<p>
    Unlock Your Potential with Online Learning
Discover a world of knowledge and skills at your fingertips. Whether you're looking to advance your career, explore new interests, or simply enhance your expertise, Mwakenya is your gateway to limitless learning opportunities.
</p><br><br>

<div>
  <img src="../assets/img/classroom.jpg" alt="" class="img-thumbnail">  
</div>
<br><br>

<p>
    Diverse Course Catalog: Explore a vast array of courses, from business and technology to arts and sciences.
    Our comprehensive <router-link to="/books" class="nav-link active" id="link">library</router-link> ensures you'll find the perfect course to suit your goals and interests.
</p><br><br>

<div>
   <img src="../assets/img/parentnchildlookingatlaptop.jpg" alt="" class="img-thumbnail"> 
</div>
<br><br>
<section>
    <div>
        <p>
            Start your learning journey today. 

Ready to take the first step? 

<br>

    <br> <router-link to="/register"><button type="button" class="btn btn-outline-success btn-lg">Yes</button></router-link><br><br>


Join thousands of learners who have already transformed their lives with Mwakenya.
<br> Your journey to knowledge and success begins here.
        </p>
    </div>
</section>

<br>
<Footer></Footer>




<slideshow/>

</template>

<script>
import Footer from '../components/Footer.vue';
import Header from '../components/Header.vue';

export default{
    name:'Home',
    components:{
        Footer,
        Header,
    },
    data(){
        return{
            child:"",
            msg:''
            

        }

    },

    methods:{
    },
}

</script>

<style>
.img-container{
    height:200px;
    width: 300px;
}
h1{
    top:0;
}

.img-fluid{
    height:80%;
}

#link:hover{
color:blue
}

.img-thumbnail{
    height: 500px;
    width:900px
}



</style>