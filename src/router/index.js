import Vue from 'vue'
import Router from 'vue-router'
import index from '@/views/index'
import article from '@/views/article'
import articleList from '@/views/articleList'
import searchList from '@/views/searchList'
import jylc from '@/views/jylc'
import sci from '@/views/sci'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: index
    },
    {
      path: '/article',
      name: 'article',
      component: article
    },
    {
      path: '/articleList',
      name: 'articleList',
      component: articleList
    },
    {
      path: '/searchList',
      name: 'searchList',
      component: searchList
    },
    {
      path: '/jylc',
      name: 'jylc',
      component: jylc
    },
    {
      path: '/sci',
      name: 'sci',
      component: sci
    },
  ]
})
