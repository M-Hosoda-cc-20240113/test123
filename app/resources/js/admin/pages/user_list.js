import {Table} from '../Table';
import {TabContentsLink} from "../../front/TabContentsLink";

const table = document.querySelector('table');

export function user_list() {
    new TabContentsLink();
    new Table(table);
}
