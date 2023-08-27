import {createRouter,createWebHistory} from 'vue-router';
import HomePage from '../pages/HomePage.vue';
import RegistrationPage from '../pages/RegistrationPage.vue';

/*import LoginPage from '../pages/LoginPage.vue';
import UserList from '../pages/UserList.vue'; */


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
    /*
    {
        path:'/login',
        component: LoginPage,
        name:'Login'
    },
    {
        path:'/users',
        component: UserList,
        name:'Users'
    } */

]

const router = createRouter({history:createWebHistory(),routes});
export default router;