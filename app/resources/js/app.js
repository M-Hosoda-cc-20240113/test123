const url = location.pathname;

// admin
import { project_list } from "./admin/pages/project_list";
if (url === '/admin/projects') project_list();

// front
import { index } from "./front/pages/index";
if (url === '/') index();
