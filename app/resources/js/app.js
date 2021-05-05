// route config
import {routes} from './route';

// admin
import { project_detail } from "./admin/pages/project_detail";
import { project_list } from "./admin/pages/project_list";
import {project_create} from './admin/pages/project_create';
import {project_edit} from './admin/pages/project_edit';
import { user_list } from "./admin/pages/user_list";
import { assign_list } from "./admin/pages/assign_list";

// front
import { index } from "./front/pages/index";
import { user_skill_edit } from "./front/pages/user_skill_edit";
import {test} from './front/pages/test';

const route_name = document.querySelector('body').dataset.routeName;

// admin
if (route_name === routes.project_detail) project_detail();
if (route_name === routes.project_list) project_list();
if (route_name === routes.project_create) project_create();
if (route_name === routes.project_edit) project_edit();
if (route_name === routes.user_list) user_list();
if (route_name === routes.assign_list) assign_list();

// front
if (route_name === routes.index || route_name === routes.project_search) index();
if (route_name === routes.user_skill_edit) user_skill_edit();
if (route_name === routes.test) test();
