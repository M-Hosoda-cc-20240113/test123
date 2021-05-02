const route_name = document.querySelector('.Container').dataset.routeName;
const url = location.pathname;
import {routes} from './route';

// admin
import { project_detail } from "./admin/pages/project_detail";
import { project_list } from "./admin/pages/project_list";
import {project_create} from './admin/pages/project_create';
import { user_list } from "./admin/pages/user_list";
if (route_name === routes.project_detail) project_detail();
if (url === routes.project_list) project_list();
if (url === routes.project_create) project_create();
if (url === routes.user_list) user_list();

// front
import { index } from "./front/pages/index";
import { user_skill_edit } from "./front/pages/user_skill_edit";
import {test} from './front/pages/test';
if (url === routes.index || url === routes.project_search) index();
if (url === routes.user_skill_edit) user_skill_edit();
if (url === routes.test) test();
