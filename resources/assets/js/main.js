window.Vue = require('vue');
import state from './state'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state
})
