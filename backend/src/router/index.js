import {createRouter, createWebHistory} from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import RequestPassword from "../views/RequestPassword.vue";
import ResetPassword from "../views/ResetPassword.vue";
import AppLayout from "../components/AppLayout.vue";
import Products from "../views/Products/Products.vue";
import NotFound from "../views/NotFound.vue";
import store from "../store";


const routes = [
    {
        path:'/app',
        name: 'app',
        component: AppLayout,
        meta: {
            requireAuth: true
        },
        children:[
            {
                path: 'dashboard',
                name: 'app.dashboard',
                component: Dashboard
            },
            {
                path: 'products',
                name: 'app.products',
                component: Products
            }
        ]


    },
    
    {
        path:'/login',
        name:'login',
        component: Login,
        meta:{
            requireGuest: true
        }
    },
    {
        path:'/request-password',
        name:'request-password',
        component: RequestPassword,
        meta:{
            requireGuest: true
        }
    },
    {
        path:'/reset-password/:token',
        name:'reset-password',
        component: ResetPassword,
        meta:{
            requireGuest: true
        }
    },
    {
        path: '/:pathMatch(.*)',
        name: 'notfound',
        component: NotFound,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to,from,next)=>{
    if(to.meta.requireAuth && !store.state.user.token){
        next({name:'login'})
    }else if(to.meta.requireGuest && store.state.user.token){
        next({name:'app.dashboard'})
    }else{
        next();
    }
})

export default router;