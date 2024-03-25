import { memo } from 'react';
import type { FC, ReactNode } from 'react';

import resets from '../../_resets.module.css';
import { AntrianLogo } from '../AntrianLogo/AntrianLogo';
import { Category } from '../Category/Category';
import { LogoTELKOMCARE } from '../LogoTELKOMCARE/LogoTELKOMCARE';
import { Ellipse246Icon } from './Ellipse246Icon.js';
import { GroupIcon } from './GroupIcon.js';
import { HideButtonIcon } from './HideButtonIcon.js';
import { IconlyBoldCategoryIcon } from './IconlyBoldCategoryIcon.js';
import { MenuIcon2 } from './MenuIcon2.js';
import { MenuIcon3 } from './MenuIcon3.js';
import { MenuIcon4 } from './MenuIcon4.js';
import { MenuIcon5 } from './MenuIcon5.js';
import { MenuIcon } from './MenuIcon.js';
import classes from './SidebarProgram_Antrian.module.css';
import { TelkocareIcon } from './TelkocareIcon.js';

interface Props {
  className?: string;
  classes?: {
    menu?: string;
    menu2?: string;
    root?: string;
  };
  swap?: {
    group?: ReactNode;
    icon?: ReactNode;
    hideButton?: ReactNode;
  };
  text?: {
    label?: ReactNode;
    label2?: ReactNode;
  };
}
/* @figmaId 21:2603 */
export const SidebarProgram_Antrian: FC<Props> = memo(function SidebarProgram_Antrian(props = {}) {
  return (
    <div className={`${resets.storybrainResets} ${props.classes?.root || ''} ${props.className || ''} ${classes.root}`}>
      <div className={classes.frame162969}>
        <LogoTELKOMCARE
          className={classes.logoTELKOMCARE}
          classes={{ telkoCare: classes.telkoCare, line2: classes.line2, line3: classes.line3 }}
          swap={{
            telkoCare: (
              <div className={classes.telkoCare}>
                <TelkocareIcon className={classes.icon} />
              </div>
            ),
            ellipse246: <Ellipse246Icon className={classes.icon2} />,
          }}
        />
        <div className={classes.devider}></div>
        <div className={classes.frame49}>
          <div className={classes.frame46}>
            <div className={classes.topMenu}>
              <div className={classes.menu3}>
                <Category
                  className={classes.icon4}
                  classes={{ iconlyBoldCategory: classes.iconlyBoldCategory }}
                  swap={{
                    iconlyBoldCategory: (
                      <div className={classes.iconlyBoldCategory}>
                        <IconlyBoldCategoryIcon className={classes.icon3} />
                      </div>
                    ),
                  }}
                />
                <div className={classes.label}>Dashboard</div>
              </div>
              <div className={`${props.classes?.menu || ''} ${classes.menu}`}>
                <AntrianLogo
                  swap={{
                    group: props.swap?.group || <GroupIcon className={classes.icon5} />,
                  }}
                />
                {props.text?.label != null ? props.text?.label : <div className={classes.label2}>Antrian</div>}
              </div>
              <div className={classes.menu4}>
                <div className={classes.icon6}>
                  <MenuIcon className={classes.icon7} />
                </div>
                <div className={classes.label3}>Jadwal Dokter</div>
              </div>
              <div className={classes.menu5}>
                <div className={classes.icon8}>
                  <MenuIcon2 className={classes.icon9} />
                </div>
                <div className={classes.label4}>Resep Dokter</div>
              </div>
              <div className={`${props.classes?.menu2 || ''} ${classes.menu2}`}>
                <div className={classes.icon10}>{props.swap?.icon || <MenuIcon3 className={classes.icon11} />}</div>
                {props.text?.label2 != null ? props.text?.label2 : <div className={classes.label5}>Rekam Medis</div>}
              </div>
              <div className={classes.menu6}>
                <div className={classes.icon12}>
                  <MenuIcon4 className={classes.icon13} />
                </div>
                <div className={classes.label6}>Booking</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div className={classes.hideButton}>
        {props.swap?.hideButton || <HideButtonIcon className={classes.icon14} />}
      </div>
      <div className={classes.frame162977}>
        <div className={classes.halamanAkun}>Halaman Akun</div>
        <div className={classes.menu7}>
          <div className={classes.icon15}>
            <MenuIcon5 className={classes.icon16} />
          </div>
          <div className={classes.label7}>Profile</div>
        </div>
      </div>
    </div>
  );
});
