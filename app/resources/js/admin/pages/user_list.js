import {Table} from '../Table';
import {CopyFragment} from '../../front/CopyFragment';
import {Modal} from '../../front/Modal';

const table = document.querySelector('table');

export function user_list() {
  new Table(table);
  new CopyFragment(0, 4, true);

  new Modal();
}
