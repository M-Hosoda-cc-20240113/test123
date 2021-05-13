import { CopyFragment } from '../../front/CopyFragment'

export function project_create() {
  // ポジション選択
  new CopyFragment(0, 10, true)

  // スキル選択
  new CopyFragment(1, 10, true)
}
