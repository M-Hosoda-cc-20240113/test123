// route config
import {routes} from './route';

// common.js
import {common} from './common';

// admin
import {project_detail} from './admin/pages/project_detail';
import {project_list} from './admin/pages/project_list';
import {project_create} from './admin/pages/project_create';
import {project_edit} from './admin/pages/project_edit';
import {user_list} from './admin/pages/user_list';
import {assign_list} from './admin/pages/assign_list';
import {position_list} from './admin/pages/position_list';
import {skill_list} from './admin/pages/skill_list';
import {level_list} from './admin/pages/level_list';
import {application_list} from './admin/pages/application_list';
import {station_list} from './admin/pages/station_list';
import {agent_list} from './admin/pages/agent_list';

// front
import {login} from './front/pages/login';
import {register} from './front/pages/register';
import {index} from './front/pages/index';
import {user_skill_edit} from './front/pages/user_skill_edit';
import {user_delete} from './front/pages/user_delete';
import {user_edit} from './front/pages/user_edit';
import {password_change} from './front/pages/password_change';
import {email_change} from './front/pages/email_change';

const route_name = document.querySelector('body').dataset.routeName;

// admin
switch (route_name) {
  case routes.project_detail:
    project_detail();
    break;
  case routes.project_list:
    project_list();
    break;
  case routes.project_create:
    project_create();
    break;
  case routes.project_edit:
    project_edit();
    break;
  case routes.user_list:
  case routes.user_search:
    user_list();
    break;
  case routes.assign_list:
    assign_list();
    break;
  case routes.position_list:
    position_list();
    break;
  case routes.skill_list:
    skill_list();
    break;
  case routes.level_list:
    level_list();
    break;
  case routes.application_list:
    application_list();
    break;
  case routes.station_list:
    station_list();
    break;
  case routes.agent_list:
    agent_list();
    break;

  // front
  case routes.login:
    login();
    break;
  case routes.index:
  case routes.project_search:
    index();
    break;
  case routes.register:
    register();
    break;
  case routes.user_skill_edit:
    user_skill_edit();
    break;
  case routes.user_edit:
    user_edit();
    break;
  case routes.user_delete:
    user_delete();
    break;
  case routes.password_change:
    password_change();
    break;
  case routes.email_change:
    email_change();
    break;
  default:
    break;
}

// 全ページ共通で動かす
common();
