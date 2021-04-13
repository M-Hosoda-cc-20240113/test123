const url = location.pathname;

// admin
import { project_list } from "./admin/pages/project_list";
import { user_list } from "./admin/pages/user_list";
if (url === '/admin/projects') project_list();
if (url === '/admin/users') user_list();

// front
import { index } from "./front/pages/index";
if (url === '/') index();
