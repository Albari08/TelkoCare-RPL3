import { memo } from 'react';
import type { FC } from 'react';

import resets from '../_resets.module.css';
import { ButtonTextIcon_SizeSmallTypeOu } from './ButtonTextIcon_SizeSmallTypeOu/ButtonTextIcon_SizeSmallTypeOu';
import { Ellipse247Icon } from './Ellipse247Icon.js';
import { FiSrAngleSmallUp } from './FiSrAngleSmallUp/FiSrAngleSmallUp';
import { GroupIcon } from './GroupIcon.js';
import { HideButtonIcon } from './HideButtonIcon.js';
import { IconlyBoldPaperIcon } from './IconlyBoldPaperIcon.js';
import { MenuIcon } from './MenuIcon.js';
import { NotificationsIcon } from './NotificationsIcon.js';
import { Paper } from './Paper/Paper';
import classes from './RekamMedis.module.css';
import { SidebarProgram_Antrian } from './SidebarProgram_Antrian/SidebarProgram_Antrian';
import { VectorIcon } from './VectorIcon.js';

interface Props {
  className?: string;
  hide?: {
    play?: boolean;
  };
}
/* @figmaId 38:449 */
export const RekamMedis: FC<Props> = memo(function RekamMedis(props = {}) {
  return (
    <div className={`${resets.storybrainResets} ${classes.root}`}>
      <div className={classes.profile1}>
        <div className={classes.group7}>
          <div className={classes.notifications}>
            <NotificationsIcon className={classes.icon6} />
          </div>
        </div>
        <div className={classes.unsplashC8Ta0gwPbQg}></div>
      </div>
      <div className={classes.unsplashC8Ta0gwPbQg2}></div>
      <div className={classes.line4}></div>
      <div className={classes.ellipse247}>
        <Ellipse247Icon className={classes.icon7} />
      </div>
      <SidebarProgram_Antrian
        className={classes.sidebarProgram}
        classes={{ menu: classes.menu, menu2: classes.menu2 }}
        swap={{
          group: <GroupIcon className={classes.icon} />,
          icon: <MenuIcon className={classes.icon2} />,
          hideButton: <HideButtonIcon className={classes.icon3} />,
        }}
        text={{
          label: <div className={classes.label}>Antrian</div>,
          label2: <div className={classes.label2}>Rekam Medis</div>,
        }}
      />
      <div className={classes.shortProfilePasien}>
        <div className={classes.shortProfilePasien2}>
          <div className={classes.topMenu}>
            <div className={classes.menu3}>
              <div className={classes.label3}>: Ariana Grande</div>
            </div>
            <div className={classes.menu4}>
              <div className={classes.label4}>: 1202211234</div>
            </div>
            <div className={classes.menu5}>
              <div className={classes.label5}>: Perempuan</div>
            </div>
            <div className={classes.menu6}>
              <div className={classes.label6}>: Boca Raton, 26 Juni 1993</div>
            </div>
            <div className={classes.menu7}>
              <div className={classes.label7}>: 081212345678</div>
            </div>
            <div className={classes.menu8}>
              <div className={classes.label8}>: Jalan Sukabirus, Dayeuhkolot, Kab. Bandung, Jawa Barat</div>
            </div>
          </div>
        </div>
        <div className={classes.shortProfilePasien3}>
          <div className={classes.topMenu2}>
            <div className={classes.menu9}>
              <div className={classes.label9}>Nama</div>
            </div>
            <div className={classes.menu10}>
              <div className={classes.label10}>NIM/NIK</div>
            </div>
            <div className={classes.menu11}>
              <div className={classes.label11}>Jenis Kelamin</div>
            </div>
            <div className={classes.menu12}>
              <div className={classes.label12}>TTL</div>
            </div>
            <div className={classes.menu13}>
              <div className={classes.label13}>No. HP</div>
            </div>
            <div className={classes.menu14}>
              <div className={classes.label14}>Alamat</div>
            </div>
          </div>
        </div>
      </div>
      <div className={classes.rectangle5086}></div>
      <div className={classes.catatanPenting}>Catatan Penting:</div>
      <div className={classes.pasienMemilikiRiwayatDarahTing}>
        <div className={classes.textBlock}>Pasien memiliki riwayat darah tinggi, </div>
        <div className={classes.textBlock2}>Pasien juga mengidap hemofilia</div>
      </div>
      <div className={classes.detail}>
        <div className={classes.frame162971}>
          <div className={classes.jumat3Maret2024}>Jumat, 03 Maret 2024</div>
          <FiSrAngleSmallUp
            className={classes.fiSrAngleSmallUp}
            swap={{
              vector: <VectorIcon className={classes.icon4} />,
            }}
          />
        </div>
        <div className={classes.card}>
          <div className={classes.frame1303}>
            <div className={classes.frame1320}>
              <div className={classes.dokter}>Dokter</div>
            </div>
            <div className={classes.frame1306}>
              <div className={classes.drAtulGawande}>Dr. Atul Gawande </div>
            </div>
          </div>
          <div className={classes.frame1308}>
            <div className={classes.frame13202}>
              <div className={classes.diagnosa}>Diagnosa</div>
            </div>
            <div className={classes.hipertensiHemofilia}>Hipertensi, Hemofilia</div>
          </div>
          <div className={classes.frame1309}>
            <div className={classes.frame13203}>
              <div className={classes.tindakan}>Tindakan</div>
            </div>
            <div className={classes.dietPengobatan}>Diet, Pengobatan</div>
          </div>
          <div className={classes.frame1310}>
            <div className={classes.frame13204}>
              <div className={classes.obat}>Obat</div>
            </div>
            <div className={classes.prinivilZestrilNorvasc}>Prinivil, Zestril, Norvasc</div>
          </div>
          <div className={classes.cell}>
            <ButtonTextIcon_SizeSmallTypeOu
              className={classes.buttonTextIcon}
              swap={{
                play: (
                  <Paper
                    className={classes.paper}
                    classes={{ iconlyBoldPaper: classes.iconlyBoldPaper }}
                    swap={{
                      iconlyBoldPaper: (
                        <div className={classes.iconlyBoldPaper}>
                          <IconlyBoldPaperIcon className={classes.icon5} />
                        </div>
                      ),
                    }}
                  />
                ),
              }}
              hide={{
                play: true,
              }}
              text={{
                button: <div className={classes.button}>Lihat Detail</div>,
              }}
            />
          </div>
        </div>
        <div className={classes._11}>1/1</div>
      </div>
      <div className={classes.dataRekamMedis}>Data Rekam Medis</div>
      <div className={classes.rekamMedis}>Rekam Medis</div>
      <div className={classes.rectangle5087}></div>
      <div className={classes.menu1}></div>
      <div className={classes.menu22}></div>
      <div className={classes.tampilan}>Tampilan:</div>
      <div className={classes.rectangle5089}></div>
      <div className={classes.rectangle5091}></div>
      <div className={classes.cetak}>Cetak</div>
    </div>
  );
});
