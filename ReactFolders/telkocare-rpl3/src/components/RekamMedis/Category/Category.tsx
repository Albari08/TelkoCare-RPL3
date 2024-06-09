import { memo } from 'react';
import type { FC, ReactNode } from 'react';

import resets from '../../_resets.module.css';
import classes from './Category.module.css';
import { IconlyBoldCategoryIcon } from './IconlyBoldCategoryIcon.js';

interface Props {
  className?: string;
  classes?: {
    iconlyBoldCategory?: string;
    root?: string;
  };
  swap?: {
    iconlyBoldCategory?: ReactNode;
  };
}
/* @figmaId 19:1329 */
export const Category: FC<Props> = memo(function Category(props = {}) {
  return (
    <div className={`${resets.storybrainResets} ${props.classes?.root || ''} ${props.className || ''} ${classes.root}`}>
      <div className={`${props.classes?.iconlyBoldCategory || ''} ${classes.iconlyBoldCategory}`}>
        {props.swap?.iconlyBoldCategory || <IconlyBoldCategoryIcon className={classes.icon} />}
      </div>
    </div>
  );
});
