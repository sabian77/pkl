//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/',
        name: 'jabatan.index',
        component: () => import( /* webpackChunkName: "post.index" */ '@/views/jabatan/Index.vue')
    },
    {
        path: '/create',
        name: 'jabatan.create',
        component: () => import( /* webpackChunkName: "post.create" */ '@/views/jabatan/Create.vue')
    },
    {
        path: '/edit/:id',
        name: 'jabatan.edit',
        component: () => import( /* webpackChunkName: "post.edit" */ '@/views/jabatan/Edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes  // config routes
})

export default router