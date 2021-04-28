const url = location.pathname;
import {routes} from './route';

// admin
import { project_list } from "./admin/pages/project_list";
import { user_list } from "./admin/pages/user_list";
if (url === routes.project_list) project_list();
if (url === routes.user_list) user_list();

// front
import { index } from "./front/pages/index";
import { user_skill_edit } from "./front/pages/user_skill_edit";
if (url === routes.index || url === routes.project_search) index();
if (url === routes.user_skill_edit) user_skill_edit();
