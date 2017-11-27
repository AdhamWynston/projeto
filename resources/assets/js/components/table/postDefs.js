export default [
    {
        name: '__handle',
        titleClass: 'text-center',
        dataClass: 'text-center'
    },
    {
        name: '__sequence',
        title: '#',
        titleClass: 'text-center',
        dataClass: 'text-right'
    },
    {
        name: '__checkbox',
        titleClass: 'text-center',
        dataClass: 'text-center'
    },
    {
        name: 'title',
        sortField: 'title',
    },
    {
        name: 'body',
        sortField: 'body'
    },
    // {
    //   name: '__component:custom-actions',
    //   title: 'Actions',
    //   titleClass: 'text-center',
    //   dataClass: 'text-center',
    // },
    {
        name: '__slot:actions',
        title: 'Slot Actions',
        titleClass: 'text-center',
        dataClass: 'text-center',
    }
]