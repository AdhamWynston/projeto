//
// firstly, require or import vue and vue-resource
//
var Vue = require('vue');
var VueResource = require('vue-resource');
Vue.use(VueResource);

//
// secondly, require or import Vuetable and optional VuetablePagination component
//
import Vuetable from 'vuetable/src/components/Vuetable.vue';
import VuetablePagination from 'vuetable/src/components/VuetablePagination.vue';
import VuetablePaginationDropdown  from 'vuetable/src/components/VuetablePaginationDropdown.vue';

//
// thirdly, register components to Vue
//
Vue.component('vuetable', Vuetable);
Vue.component('vuetable-pagination', VuetablePagination)
Vue.component('vuetable-pagination-dropdown', VuetablePaginationDropdown)