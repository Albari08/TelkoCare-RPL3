import { memo } from 'react';
import type { FC, ReactNode } from 'react';

import resets from '../../_resets.module.css';
import classes from './AntrianLogo.module.css';
import { GroupIcon } from './GroupIcon.js';

interface Props {
  className?: string;
  swap?: {
    group?: ReactNode;
  };
}
/* @figmaId 21:2163 */
export const AntrianLogo: FC<Props> = memo(function AntrianLogo(props = {}) {
  return (
    <div className={`${resets.storybrainResets} ${classes.root}`}>
      <div className={classes.group}>{props.swap?.group || <GroupIcon className={classes.icon} />}</div>
    </div>
  );
});
