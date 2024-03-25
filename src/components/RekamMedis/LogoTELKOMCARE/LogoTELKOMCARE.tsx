import { memo } from 'react';
import type { FC, ReactNode } from 'react';

import resets from '../../_resets.module.css';
import { Ellipse246Icon } from './Ellipse246Icon.js';
import classes from './LogoTELKOMCARE.module.css';
import { TelkocareIcon } from './TelkocareIcon.js';

interface Props {
  className?: string;
  classes?: {
    telkoCare?: string;
    line2?: string;
    line3?: string;
    root?: string;
  };
  swap?: {
    telkoCare?: ReactNode;
    ellipse246?: ReactNode;
  };
}
/* @figmaId 21:2093 */
export const LogoTELKOMCARE: FC<Props> = memo(function LogoTELKOMCARE(props = {}) {
  return (
    <div className={`${resets.storybrainResets} ${props.classes?.root || ''} ${props.className || ''} ${classes.root}`}>
      <div className={`${props.classes?.telkoCare || ''} ${classes.telkoCare}`}>
        {props.swap?.telkoCare || <TelkocareIcon className={classes.icon} />}
      </div>
      <div className={classes.ellipse246}>{props.swap?.ellipse246 || <Ellipse246Icon className={classes.icon2} />}</div>
      <div className={`${props.classes?.line2 || ''} ${classes.line2}`}></div>
      <div className={`${props.classes?.line3 || ''} ${classes.line3}`}></div>
    </div>
  );
});
