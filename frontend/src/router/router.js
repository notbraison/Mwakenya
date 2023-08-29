import {createRouter,createWebHistory} from 'vue-router';
import HomePage from '../pages/HomePage.vue';
import RegistrationPage from '../pages/RegistrationPage.vue';
import LoginPage from '../pages/LoginPage.vue';
import LearningVideos from '../pages/LearningVideos.vue';
import AddVideos from '../pages/VideoUploader.vue';


const routes=[
    {
        path:'/',
        component: HomePage,
        name:'Home'
    },
     {
        path:'/register',
        component: RegistrationPage,
        name:'Registration'
    },
    
    {
        path:'/login',
        component: LoginPage,
        name:'Login'
    },
    {
        path:'/videos',
        component: LearningVideos,
        name:'LearningVideos'
    },
    {
        path:'/addvideos',
        component: AddVideos,
        name:'AddVideos'
    }

]

const router = createRouter({history:createWebHistory(),routes});
export default router;