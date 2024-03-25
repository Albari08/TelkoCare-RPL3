import { memo } from 'react';
import type { FC, ReactNode } from 'react';

import resets from '../../_resets.module.css';
import { Play } from '../Play/Play';
import classes from './ButtonTextIcon_SizeSmallTypeOu.module.css';
import { IconlyBoldPlayIcon2 } from './IconlyBoldPlayIcon2.js';
import { IconlyBoldPlayIcon } from './IconlyBoldPlayIcon.js';

interface Props {
  className?: string;
  classes?: {
    root?: string;
  };
  swap?: {
    play?: ReactNode;
  };
  hide?: {
    play?: boolean;
  };
  text?: {
    button?: ReactNode;
  };
}
/* @figmaId 32:4027 */
export const ButtonTextIcon_SizeSmallTypeOu: FC<Props> = memo(function ButtonTextIcon_SizeSmallTypeOu(props = {}) {
  return (
    <button
      className={`${resets.storybrainResets} ${props.classes?.root || ''} ${props.className || ''} ${classes.root}`}
    >
      {props.swap?.play || (
        <Play
          className={classes.play}
          classes={{ iconlyBoldPlay: classes.iconlyBoldPlay }}
          swap={{
            iconlyBoldPlay: (
              <div className={classes.iconlyBoldPlay}>
                <IconlyBoldPlayIcon className={classes.icon} />
              </div>
            ),
          }}
        />
      )}
      {props.text?.button != null ? props.text?.button : <div className={classes.button}>Button</div>}
      {!props.hide?.play && (
        <Play
          className={classes.play2}
          classes={{ iconlyBoldPlay: classes.iconlyBoldPlay2 }}
          swap={{
            iconlyBoldPlay: (
              <div className={classes.iconlyBoldPlay2}>
                <IconlyBoldPlayIcon2 className={classes.icon2} />
              </div>
            ),
          }}
        />
      )}
    </button>
  );
});
