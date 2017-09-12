import Example from './components/Example.vue'
import PostIndex from './components/posts/index.vue'
import ClientIndex from './components/clients/index.vue'
const routes = [
    {
        path:'/example',
        component: Example
    },
    {
        path:'/post/create',
        component: PostIndex
    },
    {
        path: '/clients',
        component: ClientIndex
    }
];
export default routes