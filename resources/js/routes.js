import Lists from './list/index.vue';
import AddItem from './list/add.vue';
import EditItem from './list/edit.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Lists
    },
    {
        name: 'add',
        path: '/add',
        component: AddItem
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditItem
    }
];
