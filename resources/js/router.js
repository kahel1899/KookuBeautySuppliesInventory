import { createRouter, createWebHistory } from 'vue-router'
const Inventory = () => import('./components/pages/Inventory.vue')
const Home = () => import('./components/pages/Home.vue')
const Company = () => import('./components/pages/Company.vue')

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home,
            name: 'Home',
        },
        {
            path: '/company',
            component: Company,
            name: 'Company',
        },
        {
            path: '/Inventory',
            component: Inventory,
            name: 'Inventory',
        },
    ]
})

export default router