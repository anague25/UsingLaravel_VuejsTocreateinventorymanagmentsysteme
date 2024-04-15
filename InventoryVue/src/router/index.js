import { createRouter, createWebHistory } from 'vue-router'
import DashboardView from '../views/admin/main/DashboardView.vue'
import EmployeesView from '../views/admin/Employees/EmployeesView.vue'
import CreateComponent from '../components/Employees/CreateComponent.vue'
import ListComponent from '@/components/Employees/ListComponent.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component: DashboardView
    },
    //employees routes
    {
      path: '/employees', //get all employees
      name: 'employees',
      component: EmployeesView,
      children: [
        {
          path: '',
          component: ListComponent
        }
      ],
    },

    {
      path: '/employees-create',
      name: 'employees-create',
      component: EmployeesView,
      children: [
        {
          path: '',
          component: CreateComponent
        }
      ],
    },
  ]
})

export default router
