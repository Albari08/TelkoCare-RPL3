import { memo } from 'react';
import type { FC, ReactNode } from 'react';

import resets from '../../_resets.module.css';
import { IconlyBoldPlayIcon } from './IconlyBoldPlayIcon.js';
import classes from './Play.module.css';

interface Props {
  className?: string;
  classes?: {
    iconlyBoldPlay?: string;
    root?: string;
  };
  swap?: {
    iconlyBoldPlay?: ReactNode;
  };
}
/* @figmaId 32:3949 */
export const Play: FC<Props> = memo(function Play(props = {}) {
  return (
    <div className={`${resets.storybrainResets} ${props.classes?.root || ''} ${props.className || ''} ${classes.root}`}>
      <div className={`${props.classes?.iconlyBoldPlay || ''} ${classes.iconlyBoldPlay}`}>
        {props.swap?.iconlyBoldPlay || <IconlyBoldPlayIcon className={classes.icon} />}
      </div>
    </div>
  );
});
