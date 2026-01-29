import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes'



const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})
// router.beforeEach(() => {
//   document.getElementById('navbarCollapse').classList.remove('show')
// })
export default router
