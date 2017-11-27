import Example from './components/Example.vue'
import PostIndex from './components/posts/index.vue'
import PostCreate from './components/posts/Create.vue'
import ClientIndex from './components/clients/index.vue'
const routes = [
    {
        path:'/example',
        component: Example
    },
    {
        name: 'indexPost',
        path:'/post',
        component: PostIndex
    },
    {
        path:'/post/create',
        component: PostCreate
    },
    {
        path: '/clients',
        component: ClientIndex
    }
];
export default routes