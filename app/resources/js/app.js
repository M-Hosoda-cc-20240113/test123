// route config
import { routes } from './route'

// common.js
import { common } from './common'

// admin
import { project_detail } from './admin/pages/project_detail'
import { project_list } from './admin/pages/project_list'
import { project_create } from './admin/pages/project_create'
import { project_edit } from './admin/pages/project_edit'
import { user_list } from './admin/pages/user_list'
import { assign_list } from './admin/pages/assign_list'

// front
import { index } from './front/pages/index'
import { user_skill_edit } from './front/pages/user_skill_edit'
import { test } from './front/pages/test'

const route_name = document.querySelector('body').dataset.routeName

// admin
switch (route_name) {
  case routes.project_detail:
    project_detail()
    break
  case routes.project_list:
    project_list()
    break
  case routes.project_create:
    project_create()
    break
  case routes.project_edit:
    project_edit()
    break
  case routes.user_list || routes.user_search:
    user_list()
    break
  case routes.assign_list:
    assign_list()
    break
  default:
    break
}

// front
switch (route_name) {
  case routes.index || routes.project_search:
    index()
    break
  case routes.user_skill_edit:
    user_skill_edit()
    break
  case routes.test:
    test()
    break
  default:
    break
}

// 全ページ共通で動かす
common()
