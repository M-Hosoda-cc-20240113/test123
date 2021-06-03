import { CopyFragment } from '../../front/CopyFragment'
import {Modal} from '../../front/Modal';

export function project_create() {
  // ポジション選択
  new CopyFragment(0, 10, true)

  // スキル選択
  new CopyFragment(1, 10, true)

  new Modal()
}
