import {Table} from '../Table';
import {Modal} from '../../front/Modal';
import {CopyFragment} from '../../front/CopyFragment';

const table = document.querySelector('table');

export function project_list() {
  new Table(table);
  new Modal();
  new CopyFragment();
}
