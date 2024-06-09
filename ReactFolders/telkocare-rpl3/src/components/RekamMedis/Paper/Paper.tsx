import { memo } from 'react';
import type { FC, ReactNode } from 'react';

import resets from '../../_resets.module.css';
import { IconlyBoldPaperIcon } from './IconlyBoldPaperIcon.js';
import classes from './Paper.module.css';

interface Props {
  className?: string;
  classes?: {
    iconlyBoldPaper?: string;
    root?: string;
  };
  swap?: {
    iconlyBoldPaper?: ReactNode;
  };
}
/* @figmaId 32:4125 */
export const Paper: FC<Props> = memo(function Paper(props = {}) {
  return (
    <div className={`${resets.storybrainResets} ${props.classes?.root || ''} ${props.className || ''} ${classes.root}`}>
      <div className={`${props.classes?.iconlyBoldPaper || ''} ${classes.iconlyBoldPaper}`}>
        {props.swap?.iconlyBoldPaper || <IconlyBoldPaperIcon className={classes.icon} />}
      </div>
    </div>
  );
});
